<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "Root_Flower";
$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM user WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}
// initialize error variable
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $profile_pic_path = $user['profile_pic'];
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
        $fileName = basename($_FILES['profile_pic']['name']);
        $fileSize = $_FILES['profile_pic']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileType, $allowedTypes) && $fileSize <= 1048576) {
            $newFileName = 'user_' . $user_id . '_' . time() . '.' . $fileType;
            $dest_path = 'uploads/' . $newFileName;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $profile_pic_path = $dest_path;
            }
        }
    }
    $update = "UPDATE user SET username='$username', password='$password', profile_pic=" . ($profile_pic_path ? "'$profile_pic_path'" : "NULL") . " WHERE id=$user_id";
    if (mysqli_query($conn, $update)) {
        $_SESSION['username'] = $username;
        header("Location: user.php?success=1");
        exit();
    } else {
        $error = "Failed to update profile.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>User Profile</title>
</head>
<body>
<?php include("navigation.php"); ?>
<section class="profile-page">
    <div class="user-profile-card">
        <h1 class="user-profile-title">User Profile</h1>
        <?php if (isset($_GET['success'])) echo '<div class="message-box success">Profile updated successfully.</div>'; ?>
        <?php if (!empty($error)) echo '<div class="message-box error">'.$error.'</div>'; ?>
        <form method="post" class="user-profile-form" enctype="multipart/form-data">
            <div class="user-profile-photo-upload">
                <?php if (!empty($user['profile_pic']) && file_exists($user['profile_pic'])): ?>
                    <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Photo" class="user-profile-photo">
                <?php else: ?>
                    <img src="IMAGE/user.svg" alt="Profile Photo" class="user-profile-photo">
                <?php endif; ?>
                <label for="profile_pic" class="user-profile-label">Profile Photo (jpg/png/gif, max 1MB)</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*" class="user-profile-input">
            </div>
            <div>
                <label for="username" class="user-profile-label">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required class="user-profile-input">
            </div>
            <div>
                <label for="password" class="user-profile-label">Password</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required class="user-profile-input">
            </div>
            <button type="submit" class="user-profile-btn">Save Changes</button>
        </form>
    </div>
</section>
</body>
</html>

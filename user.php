<?php
/**
 * Filename: user.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: User profile management page.
 * Date: 2025
 */
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['user_id'])) {
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

    if (!empty($password)) {
        $update = "UPDATE user SET username='$username', password='$password' WHERE id=$user_id";
    } else {
        $update = "UPDATE user SET username='$username' WHERE id=$user_id";
    }

    if (mysqli_query($conn, $update)) {
        $_SESSION['username'] = $username;
        header("Location: user.php?success=1");
        exit();
    } else {
        $error = "Failed to update profile: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
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
        <form method="post" class="user-profile-form">
            <div>
                <label for="username" class="user-profile-label">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required class="user-profile-input">
            </div>
            <div>
                <label for="password" class="user-profile-label">Password</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" class="user-profile-input">
            </div>
            <button type="submit" class="user-profile-btn">Save Changes</button>
        </form>
    </div>
</section>
</body>
</html>

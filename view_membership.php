<?php
if (basename($_SERVER['PHP_SELF']) == 'view_membership.php' && !isset($_GET['show_create'])) {
    header("Location: adminview.php?page=membership");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $loginID = null;
    $getLoginID = $conn->prepare("SELECT loginID FROM membership WHERE id = ?");
    $getLoginID->bind_param("i", $deleteId);
    $getLoginID->execute();
    $getLoginID->bind_result($loginID);
    $getLoginID->fetch();
    $getLoginID->close();

    // Delete membership
    $deleteStmt = $conn->prepare("DELETE FROM membership WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    $deleteStmt->execute();
    $deleteStmt->close();

    // Delete user
    if (!empty($loginID)) {
        $deleteUser = $conn->prepare("DELETE FROM user WHERE username = ?");
        $deleteUser->bind_param("s", $loginID);
        $deleteUser->execute();
        $deleteUser->close();
    }

    $result = mysqli_query($conn, "SELECT id FROM membership ORDER BY id ASC");
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $newId = 1;
    foreach ($records as $record) {
        $updateStmt = $conn->prepare("UPDATE membership SET id = ? WHERE id = ?");
        $updateStmt->bind_param("ii", $newId, $record['id']);
        $updateStmt->execute();
        $updateStmt->close();
        $newId++;
    }
    mysqli_query($conn, "ALTER TABLE membership AUTO_INCREMENT = " . $newId);
    mysqli_close($conn);
}

// Handle promote action: promote a normal user to admin
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promote_id'])) {
    $promoteId = intval($_POST['promote_id']);
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $loginID = null;
    $getLoginID = $conn->prepare("SELECT loginID FROM membership WHERE id = ?");
    $getLoginID->bind_param("i", $promoteId);
    $getLoginID->execute();
    $getLoginID->bind_result($loginID);
    $getLoginID->fetch();
    $getLoginID->close();

    if (!empty($loginID)) {
        // Check current role
        $checkRole = $conn->prepare("SELECT role FROM user WHERE username = ?");
        $checkRole->bind_param("s", $loginID);
        $checkRole->execute();
        $checkRole->bind_result($currentRole);
        $checkRole->fetch();
        $checkRole->close();

        if ($currentRole === 'admin') {
            $promotion_message = "User '$loginID' is already an admin.";
        } else {
            $updateRole = $conn->prepare("UPDATE user SET role = 'admin' WHERE username = ?");
            $updateRole->bind_param("s", $loginID);
            if ($updateRole->execute()) {
                $promotion_message = "User '$loginID' has been promoted to admin.";
            } else {
                $promotion_message = "Failed to promote user '$loginID'.";
            }
            $updateRole->close();
        }
    } else {
        $promotion_message = "Membership record not found.";
    }

    mysqli_close($conn);
}

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Pull membership rows and include user's current role (if user exists)
$stmt = $conn->prepare("SELECT m.id, m.firstname, m.lastname, m.email, m.loginID, IFNULL(u.role,'user') as role FROM membership m LEFT JOIN user u ON u.username = m.loginID ORDER BY m.id ASC");
$stmt->execute();
$result = $stmt->get_result();
$memberships = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
mysqli_close($conn);
?>

<link rel="stylesheet" href="styles.css">

<div class="admin-page">
    <div class="page-title-row">
        <h1 class="page-title">Memberships Form</h1>
        <a href="create_membership.php" class="create-btn">+ Create</a>
    </div>
    <?php if (empty($memberships)): ?>
        <p>No memberships found.</p>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Login ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($memberships as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['firstname'] . ' ' . $row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['loginID']); ?></td>
                            <td>
                                <div class="action-dropdown">
                                    <input type="checkbox" id="action-<?php echo $row['id']; ?>" class="action-toggle">
                                    <label for="action-<?php echo $row['id']; ?>" class="action-btn">⋮</label>
                                    <div class="dropdown-menu">
                                        <a href="view_membership_detail.php?id=<?php echo $row['id']; ?>" class="dropdown-item view-btn">View</a>
                                        <a href="edit_membership.php?id=<?php echo $row['id']; ?>" class="dropdown-item edit-btn">Edit</a>
                                        <form method="POST" action="" class="dropdown-form">
                                            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="dropdown-item dropdown-delete-btn">Delete</button>
                                        </form>

                                        <?php if (empty($row['role']) || $row['role'] !== 'admin'): ?>
                                            <form method="POST" action="" class="dropdown-form">
                                                <input type="hidden" name="promote_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                                <button type="submit" class="dropdown-item" style="color:#6a1b9a;font-weight:500;">Promote</button>
                                            </form>
                                        <?php else: ?>
                                            <div class="dropdown-item" style="color:#777;">Already admin</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php
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

    $deleteStmt = $conn->prepare("DELETE FROM membership WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    $deleteStmt->execute();
    $deleteStmt->close();

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


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$stmt = $conn->prepare("SELECT id, firstname, lastname, email, loginID FROM membership ORDER BY id ASC");
$stmt->execute();
$result = $stmt->get_result();
$memberships = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
mysqli_close($conn);
?>

<link rel="stylesheet" href="styles.css">

<div class="admin-page">
    <h1 class="page-title">Memberships Form</h1>
    <?php if (empty($memberships)): ?>
        <p>No memberships found.</p>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Login ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($memberships as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["firstname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["lastname"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td><?php echo htmlspecialchars($row["loginID"]); ?></td>
                            <td>
                                <div class="action-dropdown">
                                    <input type="checkbox" id="action-<?php echo $row['id']; ?>" class="action-toggle">
                                    <label for="action-<?php echo $row['id']; ?>" class="action-btn">⋮</label>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item view-btn">View</button>
                                        <button class="dropdown-item edit-btn">Edit</button>
                                        <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this membership?');" style="margin: 0;">
                                            <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="dropdown-item dropdown-delete-btn">Delete</button>
                                        </form>
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
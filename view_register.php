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

    $deleteStmt = $conn->prepare("DELETE FROM workshop WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    $deleteStmt->execute();
    $deleteStmt->close();

    $result = mysqli_query($conn, "SELECT id FROM workshop ORDER BY id ASC");
    $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $newId = 1;
    foreach ($records as $record) {
        $updateStmt = $conn->prepare("UPDATE workshop SET id = ? WHERE id = ?");
        $updateStmt->bind_param("ii", $newId, $record['id']);
        $updateStmt->execute();
        $updateStmt->close();
        $newId++;
    }

    mysqli_query($conn, "ALTER TABLE workshop AUTO_INCREMENT = " . $newId);
    mysqli_close($conn);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM workshop ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$workshops = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>


<link rel="stylesheet" href="styles.css">
<div class="admin-page">
    <h1 class="page-title">Workshops</h1>
    <?php if (empty($workshops)): ?>
        <p>No workshop registrations found.</p>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                       
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Login ID</th>
                        <th>Membership Type</th>
                        <th>Interests</th>
                        <th>Number of Participants</th>
                        <th>Additional Comments</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($workshops as $workshop): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($workshop['id']); ?></td>
                            <td><?php echo htmlspecialchars($workshop['firstname'] . ' ' . $workshop['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($workshop['email']); ?></td>
                            <td><?php echo htmlspecialchars($workshop['phone'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['address'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['dob'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['loginID'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['membership_type'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['interests'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($workshop['participants'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars(substr($workshop['comments'] ?? '', 0, 50)); ?></td>
                            <!-- Delete button -->
                            <td>
                                <form method="post" onsubmit="return confirm('Delete this record? IDs will be reindexed.');">
                                    <input type="hidden" name="delete_id" value="<?php echo $workshop['id']; ?>">
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
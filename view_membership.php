<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete request first
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    
    // Prepare delete statement
    $deleteStmt = $conn->prepare("DELETE FROM membership WHERE id = ?");
    $deleteStmt->bind_param("i", $deleteId);
    
    if ($deleteStmt->execute()) {
        // Optional: Add success message logic here
    } else {
        // Optional: Add error handling here
        // echo "Error deleting record: " . $deleteStmt->error;
    }
    $deleteStmt->close();
}

// Fetch memberships after possible deletion
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
                        <th>Action</th> <!-- New column for delete button -->
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
                                <!-- Delete form with POST method -->
                                <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this membership?');">
                                    <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($row["id"]); ?>">
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
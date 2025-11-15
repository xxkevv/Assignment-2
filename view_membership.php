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

// Use prepared statement for security
$stmt = $conn->prepare("SELECT id, firstname, lastname, email, loginID FROM membership ORDER BY id ASC");
$stmt->execute();
$result = $stmt->get_result();
$memberships = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
mysqli_close($conn);
?>

<div class="admin-page">
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
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

// Retrieve enquiries
$sql = "SELECT * FROM enquiry ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$enquiries = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<div class="admin-page">
    <?php if (empty($enquiries)): ?>
        <p>No enquiries found.</p>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Enquiry Type</th>
                        <th>Priority</th>
                        <th>Preferred Date</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enquiries as $enquiry): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($enquiry['id']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['firstname'] . ' ' . $enquiry['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['phonenumber']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['enquiry_type']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['priority']); ?></td>
                            <td><?php echo htmlspecialchars($enquiry['preferred_date']); ?></td>
                            <td><?php echo htmlspecialchars(substr($enquiry['comments'], 0, 50)) . '...'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
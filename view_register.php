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

// Retrieve workshop registrations
$sql = "SELECT * FROM workshop ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$workshops = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<div class="admin-page">
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
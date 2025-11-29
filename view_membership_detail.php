<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Details - Root & Flower</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

// Get membership ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$membership = null;

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn) {
    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, loginID FROM membership WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $membership = $result->fetch_assoc();
    
    $stmt->close();
    mysqli_close($conn);
}
?>

<div class="detail-container">
    <?php if ($membership): ?>
        <div class="detail-header">
            <h1 class="detail-title">Membership Details</h1>
        </div>
        
        <div class="detail-content">
            <div class="detail-info">
                <span class="detail-label">ID:</span>
                <span class="detail-value"><?php echo htmlspecialchars($membership['id']); ?></span>
            </div>
            
            <div class="detail-info">
                <span class="detail-label">First Name:</span>
                <span class="detail-value"><?php echo htmlspecialchars($membership['firstname']); ?></span>
            </div>
            
            <div class="detail-info">
                <span class="detail-label">Last Name:</span>
                <span class="detail-value"><?php echo htmlspecialchars($membership['lastname']); ?></span>
            </div>
            
            <div class="detail-info">
                <span class="detail-label">Email:</span>
                <span class="detail-value"><?php echo htmlspecialchars($membership['email']); ?></span>
            </div>
            
            <div class="detail-info">
                <span class="detail-label">Login ID:</span>
                <span class="detail-value"><?php echo htmlspecialchars($membership['loginID']); ?></span>
            </div>
        </div>
        
        <div class="detail-actions">
            <a href="view_membership.php" class="back-link">Back to List</a>
        </div>
    <?php else: ?>
        <div class="error-message">
            <p>Membership not found or invalid ID.</p>
            <a href="view_membership.php" class="back-link">Back to List</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
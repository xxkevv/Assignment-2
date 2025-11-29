<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Root_Flower";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$membership_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM membership");
$workshop_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM workshop");
$enquiry_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM enquiry");

$membership_total = mysqli_fetch_assoc($membership_count)['count'];
$workshop_total = mysqli_fetch_assoc($workshop_count)['count'];
$enquiry_total = mysqli_fetch_assoc($enquiry_count)['count'];

mysqli_close($conn);
?>

<div class="admin-page">
    <div class="admin-welcome">
        <h1>Welcome to Admin Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Manage your Root Flower business from here.</p>
    </div>

    <div class="admin-stats">
        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3><?php echo $membership_total; ?></h3>
                <p>Total Members</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🎓</div>
            <div class="stat-info">
                <h3><?php echo $workshop_total; ?></h3>
                <p>Workshop Registrations</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">✉️</div>
            <div class="stat-info">
                <h3><?php echo $enquiry_total; ?></h3>
                <p>Total Enquiries</p>
            </div>
        </div>
    </div>

    <div class="admin-quick-actions">
        <h2>Quick Actions</h2>
        <div class="action-buttons">
            <a href="adminview.php?page=membership" class="admin-action-btn">
                <span>👥</span>
                <span>View Members</span>
            </a>
            <a href="adminview.php?page=workshop" class="admin-action-btn">
                <span>🎓</span>
                <span>View Workshops</span>
            </a>
            <a href="adminview.php?page=enquiry" class="admin-action-btn">
                <span>✉️</span>
                <span>View Enquiries</span>
            </a>
             </a>
               <a href="adminview.php?page=promotionmodule" class="admin-action-btn">
                <span>🎓</span>
                <span>View Promotions</span>
            </a>
        </div>
    </div>
</div>

<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    echo "<script>alert('Access denied! You are not admin.'); window.location.href='profile.php';</script>";
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard - Root Flower">
    <meta name="keywords" content="Admin, Dashboard, Root Flower">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Admin Dashboard - Root Flower</title>
</head>
<body class="admin-body">
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="admin-sidebar-header">
                <h2>Admin Panel</h2>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            </div>
            
            <nav class="admin-nav">
                <a href="index.php" class="admin-nav-item">
                    <span class="nav-icon">🏠</span>
                    <span>Back to Home</span>
                </a>
                <a href="adminview.php?page=dashboard" class="admin-nav-item <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
                <a href="adminview.php?page=membership" class="admin-nav-item <?php echo ($page == 'membership') ? 'active' : ''; ?>">
                    <span class="nav-icon">👥</span>
                    <span>Membership</span>
                </a>
                <a href="adminview.php?page=workshop" class="admin-nav-item <?php echo ($page == 'workshop') ? 'active' : ''; ?>">
                    <span class="nav-icon">🎓</span>
                    <span>Workshop</span>
                </a>
                <a href="adminview.php?page=enquiry" class="admin-nav-item <?php echo ($page == 'enquiry') ? 'active' : ''; ?>">
                    <span class="nav-icon">✉️</span>
                    <span>Enquiry</span>
                </a>
                <a href="logout.php" class="admin-nav-item logout">
                    <span class="nav-icon">🚪</span>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>
        
        <main class="admin-content">
            <?php
            if ($page == 'dashboard') {
                include('admin_dashboard.php');
            } elseif ($page == 'membership') {
                echo '<div class="admin-page"><h1>Membership Entries</h1><p>Membership entries will be displayed here</p></div>';
            } elseif ($page == 'workshop') {
                echo '<div class="admin-page"><h1>Workshop Entries</h1><p>Workshop entries will be displayed here</p></div>';
            } elseif ($page == 'enquiry') {
                echo '<div class="admin-page"><h1>Enquiry Entries</h1><p>Enquiry entries will be displayed here</p></div>';
            }
            ?>
        </main>
    </div>
</body>
</html>
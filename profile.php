<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title> Profile</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>

    <section class="profile-page">
    <div class="profile-container">
        <h1>Profiles Page</h1>
        <br>
        <div class="profiles">
        <!-- Profile 1 -->
        <div class="profile-card">
            <img src="IMAGE/kevinn.jpg" alt="Profile of Kevinn" class="profile-image">
            <div class="card-content">
            <div class="profile-name">Kevinn Jose Novellino Shen</div>
            <div class="profile-role">Student of Computer Science</div>
            <a href="kevinn.php" class="profile-button">
                <span>View Profile</span>
                <img src="IMAGE/right.svg" alt="Right">
            </a>
            </div>
        </div>

        <!-- Profile 2 -->
        <div class="profile-card">
            <img src="IMAGE/jiangyu.jpeg" alt="Profile of Jiangyu" class="profile-image">
            <div class="card-content">
            <div class="profile-name">Jiangyu Qiu</div>
            <div class="profile-role">Student of Computer Science</div>
            <a href="jiangyu.php" class="profile-button">
                <span>View Profile</span>
                <img src="IMAGE/right.svg" alt="Right">
            </a>
            </div>
        </div>

        <!-- Profile 3 -->
        <div class="profile-card">
            <img src="IMAGE/vincent.jpg" alt="Profile of Vincent" class="profile-image">
            <div class="card-content">
            <div class="profile-name">Vincent Ho Ming Han</div>
            <div class="profile-role">Student of Computer Science</div>
            <a href="vincent.php" class="profile-button">
                <span>View Profile</span>
                <img src="IMAGE/right.svg" alt="Right">
            </a>
            </div>
        </div>

        <!-- Profile 4 (Ahmed) -->
            <div class="profile-card">
                <img src="IMAGE/ahmed.jpg" alt="Profile of Ahmed" class="profile-image">
                <div class="card-content">
                    <div class="profile-name">Ahmed Hassan</div>
                    <div class="profile-role">Student of Engineering </div>
                    <a href="ahmedHassan.php" class="profile-button">
                        <span>View Profile</span>
                        <img src="IMAGE/right.svg" alt="Right">
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

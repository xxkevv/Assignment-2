<?php
/**
 * Filename: enhancement.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Page to select between different enhancement pages.
 * Date: 2025
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Enhancement Selection - Root Flower</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("INCLUDE/navigation.php"); ?>

    <section class="enhancement-selection">
        <h1>Select Enhancement Page</h1>
        
        <div class="selection-container">
            <div class="selection-card">
                <h2>Enhancement 1</h2>
                <a href="enhancement1.php" class="register-btn">Go to Page 1</a>
            </div>

            <div class="selection-card">
                <h2>Enhancement 2</h2>
                <a href="enhancement2.php" class="register-btn">Go to Page 2</a>
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <?php include("INCLUDE/footer.php"); ?>
</body>
</html>

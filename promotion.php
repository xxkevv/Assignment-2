<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Promotion Pages</title>
</head>
<body>

<!-- Navigation bar -->
    <?php 
    include("navigation.php");
    // Fetch promotions from database
    $servername = "localhost";
    $db_user = "root";
    $db_pass = "";
    $dbname = "Root_Flower";
    
    $conn = mysqli_connect($servername, $db_user, $db_pass, $dbname);
    if (!$conn) {
        die('Connection failed: '. mysqli_connect_error());
    }
    
    // Ensure promotions table exists
    $createPromos = "CREATE TABLE IF NOT EXISTS promotions (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(255) DEFAULT NULL,
        discount_percentage INT DEFAULT NULL,
        start_date DATE DEFAULT NULL,
        end_date DATE DEFAULT NULL,
        category VARCHAR(50) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    mysqli_query($conn, $createPromos);
    
    // Fetch all promotions from database
    $res = mysqli_query($conn, 'SELECT * FROM promotions ORDER BY created_at DESC');
    $promotions = mysqli_fetch_all($res, MYSQLI_ASSOC);
    ?>

    <main>
        <section class="promotion">
            <div class="main-promotion">
                <h1>Check Our Latest Promotion</h1>
                <p>Beautiful bouquets are available through the city's best florists. Limited time only!</p>
                <a href="allproducts.html" class="register-btn">Shop Now</a>
            </div>
            <figure class="promotion-image">
                <img src="IMAGE/promotionbg.jpg" alt="Beautiful flower bouquet">
                <figcaption>Our signature Valentine's Day flowers</figcaption>
            </figure>
        </section>

        
        <section class="promotion-features">
            <div class="feature-cards">
                <?php 
                if (empty($promotions)) {
                    // Fallback: show default cards if no promotions in DB
                    ?>
                    <div class="promotion-card">
                        <img src="IMAGE/promotions1.jpg" alt="Christmas Special Giveaway">
                        <div class="card-content">
                            <h3>Special Christmas Giveaway</h3>
                            <p>Get a special Christmas gift! 3 Lucky Winners for Christmas Floral Workshop on 23 December 2023,
                            3pm-5pm. Follow our page, like and share this post, tag 3 friends in the comment.</p>
                        </div>
                    </div>
                    
                    <div class="promotion-card">
                        <img src="IMAGE/promotions2.jpg" alt="520 Give Away">
                        <div class="card-content">
                            <h3>520 Give Away</h3>
                            <p>Cry Baby Bouquet & Hacipupu Bouquet from Pop Mart Store. Like & Follow us, Comment & tag your 3 friends, Share this post at your story, and Verify your participation.</p>
                        </div>
                    </div>
                    
                    <div class="promotion-card">
                        <img src="IMAGE/promotions3.jpg" alt="Preserved Flowers">
                        <div class="card-content">
                            <h3>Preserved Flowers in Glass</h3>
                            <p>Beautiful preserved flowers in elegant glass domes. Perfect gifts that last forever with our special preservation technique. Terms & Conditions Apply.</p>
                        </div>
                    </div>

                    <div class="promotion-card">
                        <img src="IMAGE/promotions4.jpg" alt="Valentine's Day Special">
                        <div class="card-content">
                            <h3>Valentine's Day Early Bird</h3>
                            <p>14% off early bird special! Order before 30 January 2023 and get amazing discounts on all Valentine's Day bouquets. Limited time offer.</p>
                        </div>
                    </div>

                    <div class="promotion-card">
                        <img src="IMAGE/promotions5.jpg" alt="Mother's Day Special">
                        <div class="card-content">
                            <h3>Happy Mother's Day</h3>
                            <p>10% off early birds before 30 April 2023. Show your love with beautiful bouquets for Mother's Day celebration on 14 May 2023.</p>
                        </div>
                    </div>

                    <div class="promotion-card">
                        <img src="IMAGE/promotions6.jpg" alt="Valentine Collection">
                        <div class="card-content">
                            <h3>Valentine Collection 2023</h3>
                            <p>Discover our exclusive Valentine's collection with various bouquet designs. 14% off early bird and 7% off orders before 5 February 2023.</p>
                        </div>
                    </div>
                <?php } else {
                    // Display promotions from database
                    foreach ($promotions as $promo) {
                        $img = !empty($promo['image']) && file_exists($promo['image']) ? $promo['image'] : 'IMAGE/promotions1.jpg';
                        $title = htmlspecialchars($promo['title']);
                        $desc = htmlspecialchars($promo['description']);
                        $discount = htmlspecialchars($promo['discount_percentage'] ?? '');
                        $category = htmlspecialchars($promo['category'] ?? '');
                        ?>
                        <div class="promotion-card">
                            <img src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
                            <div class="card-content">
                                <h3><?php echo $title; ?></h3>
                                <?php if (!empty($discount)) { ?>
                                    <p><strong>Discount: <?php echo $discount; ?>%</strong></p>
                                <?php } ?>
                                <?php if (!empty($category)) { ?>
                                    <p><strong>Category:</strong> <?php echo $category; ?></p>
                                <?php } ?>
                                <p><?php echo $desc; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                } 
                ?>
            </div>

        <aside class="promotion-aside">
            <h3>Popular Promotion</h3>
            <dl id="promo-categories">
                <dt>Valentine</dt>
                <dd>Exclusive discount for couples on Valentine's Day</dd>
                
                <dt>Christmas</dt>
                <dd>Exclusive discount for Christmas celebration</dd>
                
                <dt>Mother Day</dt>
                <dd>Exclusive discount to express gratitude and love to your parents</dd>
            </dl>

            <div class="membership-benefits">
                <h4>Membership Benefits</h4>
                <table>
                    <tr>
                        <th>Type</th>
                        <th>Discount</th>
                    </tr>
                    <tr>
                        <td>Non-membership</td>
                        <td>No Discount</td>
                    </tr>
                    <tr>
                        <td>Membership</td>
                        <td>Up to 5% Discount</td>
                    </tr>
                </table>
                <a href="allproducts.html" class="register-btn">Buy Product</a>
            </div>
        </aside>
    </section>
    </main>

    <!-- Footer  -->
    <?php 
    mysqli_close($conn);
    include("footer.php"); 
    include("profileicon.php"); 
    ?>

</body>
</html>
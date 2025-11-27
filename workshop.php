<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Workshop - Root Flower</title>
</head>

<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>
    <main>
    <!-- Workshop Background -->
    <section class="workshop">
            <div class="main-workshop">
                <h1>Flower Arrangement Workshop</h1>
                <p>Unleash your creativity with our flower arrangement workshops!</p>
                <a href="register.html" class="register-btn">Book Now</a>
            </div>
            <figure class="workshop-image">
                <img src="IMAGE/workshopbg.jpg" alt="Workshop Image">
                <figcaption>Our flower arrangement workshop</figcaption>
            </figure>
    </section>

   <section class="workshop-content">
    <!-- Workshop List -->
            <div class="workshop-grid">
        <!-- Workshop 1 -->
            <div class="workshop-item">
                <div class="workshop-card">
                    <div class="workshop-front">
                        <figure>
                            <img src="IMAGE/handtitedbouquet.jpg" alt="Handtied Bouquet Workshop">
                            <figcaption>Handtied Bouquet Workshop</figcaption>
                        </figure>
                    </div>
                    <div class="workshop-back">
                        <h3>Workshop Details</h3>
                        <dl class="workshop-specs">
                            <dt>Flowers: </dt>
                            <dd>Spiral Handtied (round & classic), Single Stalk Bouquet, Korean Bouquet, Russian Bouquet, Mix Flowers Bouquet</dd>
                            <dt>Schedule: </dt>
                            <dd><span>Aug/Sep/Oct 2025 </span></dd>
                        </dl>
                        <a href="register.php" class="register-btn">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Workshop 2 -->
            <div class="workshop-item">
                <div class="workshop-card">
                    <div class="workshop-front">
                        <figure>
                            <img src="IMAGE/fltobe1.jpg" alt="Florist Level 1 Training">
                            <figcaption>Florist to be level 1</figcaption>
                        </figure>
                    </div>
                    <div class="workshop-back">
                        <h3>Workshop Details</h3>
                        <dl class="workshop-specs">
                            <dt>Flowers: </dt>
                            <dd>Korean Bouquet, Spiral Handtied, Russian Bouquet, Mix Flowers, Bridal Bouquet, Single Stalk Bouquet, Flower Stand, Boutineer, Flower Basket, Centerpiece</dd>
                            <dt>Schedule: </dt>
                            <dd>Aug/Sep/Oct 2025</dd>
                        </dl>
                        <a href="register.php" class="register-btn">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Workshop 3 -->
            <div class="workshop-item">
                <div class="workshop-card">
                    <div class="workshop-front">
                        <figure>
                            <img src="IMAGE/fltobe2.jpg" alt="Florist Level 2 Training">
                            <figcaption>Florist to be level 2</figcaption>
                        </figure>
                    </div>
                    <div class="workshop-back">
                        <h3>Workshop Details</h3>
                        <dl class="workshop-specs">
                            <dt>Flowers: </dt>
                            <dd>Natural Design Bouquet, Korean Bouquet, Spiral Handtied, Russian Bouquet, Mix Flowers, Bridal Bouquet, Boutineer, Flowers Basket, Flowers Box, Mirror Flowers Stand</dd>
                            <dt>Schedule: </dt>
                            <dd>Aug/Sep/Oct 2025</dd>
                        </dl>
                        <a href="register.php" class="register-btn">Register Now</a>
                    </div>
                </div>
            </div>

            <!-- Workshop 4 -->
            <div class="workshop-item">
                <div class="workshop-card">
                    <div class="workshop-front">
                        <figure>
                            <img src="IMAGE/hobbyclass.jpg" alt="Hobby Class Workshop">
                            <figcaption>Hobby Class</figcaption>
                        </figure>
                    </div>
                    <div class="workshop-back">
                        <h3>Workshop Details</h3>
                        <dl class="workshop-specs">
                            <dt>August: </dt>
                            <dd>Mix Flowers Bouquet and Flowers Basket</dd>
                            <dt>September: </dt>
                            <dd>Mix Flowers Bouquet and Centerpiece</dd>
                            <dt>October</dt>
                            <dd>Mix Flowers Bouquet and Flowers Box</dd>
                        </dl>
                        <a href="register.php" class="register-btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Aside -->
        <aside class="workshopsidebar">
            <h3>Flower Workshop</h3>
            <ol class="category-list">
                <li><p class="category-item-workshop active">All Workshop</p></li>
                <li><p class="category-item-workshop">Handtied Bouquet</p></li>
                <li><p class="category-item-workshop">Florist to be 1</p></li>
                <li><p class="category-item-workshop">Florist to be 2</p></li>
                <li><p class="category-item-workshop">Hobby Class</p></li>
            </ol>
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
                        <td>Up to 10% Discount</td>
                    </tr>
                </table>
                <a href="register.php" class="register-btn">Register Workshop</a>
            </div>
        </aside>

    </section>
    </main>
  
    <!-- Footer  -->
    <?php include("footer.php"); ?>

    <?php include("profileicon.php"); ?>


</body>
</html>
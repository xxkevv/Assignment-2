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
    <?php include("navigation.php"); ?>

    <main>
        <section class="promotion">
            <div class="main-promotion">
                <h1>Check Our Latest Promotion</h1>
                <p>Beautiful bouquets are available through the city's best florists. Limited time only!</p>
                <button onclick="location.href='allproducts.html'">Shop Now</button>
            </div>
            <figure class="promotion-image">
                <img src="IMAGE/promotionbg.jpg" alt="Beautiful flower bouquet">
                <figcaption>Our signature Valentine's Day flowers</figcaption>
            </figure>
        </section>

        
        <section class="promotion-features">
            <div class="feature-cards">
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
            </div>

            <button class="register-btn" onclick="location.href='allproducts.html'">Buy Product</button>
        </aside>
    </section>
    </main>

    <!-- Footer  -->
    <footer class="footer-content">
    <div class="footer-container">
         <div class="other">
        <h2>Others</h2>
        <ul class="box">
            <li> <a href="enhancement.html">Enhancement</a></li>
            <li> <a href="acknowledge.html">Acknowledge</a></li>
            <li> <a href="https://youtu.be/Wnv-ve2rwts?si=N3-SYA9JKMNv45jn">Group Presentation</a>
        </ul>
        </div>
        <div class="quicklinks">
            <h2>Products</h2>
            <ul class="box">
                <li><a href="product1.html">Hand-bouquet</a> </li>
                <li><a href="product2.html">CNY decoration</a> </li>
                <li><a href="product3.html">Grand Opening</a> </li>
                <li><a href="product4.html">Graduation</a> </li>
            </ul>
        </div>

        <div class="quicklinks">
            <h2> Sign Up </h2>
            <ul class="box">
                <li><a href="register.html">Workshop</a> </li>
                <li><a href="membership.html">Membership</a> </li>
            </ul>
        </div>

        <div class="contact">
            <h2>Contact Us</h2>
            <ul class="box">
                <li> <img src="IMAGE/location.svg" alt="Location"> <p> Lorong Bdc, 93350 Kuching, Sarawak </p> 
                </li>

                <li> <img src="IMAGE/envelope.svg" alt="Email"><p> Email: <a href="mailto:105801952@students.swinburne.edu.my">therootflower@gmail.com</a></p> 
                </li>
            </ul>
        </div>
        </div>
        <div class="copyright">
        <p>&copy; 2025 Root Flower. All rights reserved.</p>
        </div>

    </footer>
    <a href="profile.html" class="profile-icon" title="Go to our profile page">
        <img src="IMAGE/profile.svg" alt="Profile">
    </a>

</body>
</html>
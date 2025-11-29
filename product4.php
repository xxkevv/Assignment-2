<?php
/**
 * Filename: product4.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Product page for Graduation.
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
    <title>Product Pages - Graduation</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("INCLUDE/navigation.php"); ?>

     <!-- Main contents -->
    <main class="main-content">
        <!-- Main products-->
        <section class="product-section">
            <div class="section-header">
                <h1>Graduation</h1>
            </div>
            
            <?php
            // Array of all products
            $products = [
                // Graduation
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation1.jpg',
                    'desc' => 'Graduation Bouquet with premium sunflower',
                    'type' => 'Premium Sunflower',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM47.50',
                    'original_price' => 'RM50.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation2.jpg',
                    'desc' => 'Graduation Bouquet with premium pompom chrysanthemum',
                    'type' => 'Premium chrysanthemum',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM38.00',
                    'original_price' => 'RM40.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation3.jpg',
                    'desc' => 'Graduation Bouquet with premium baby\'s breath flowers',
                    'type' => 'Baby\'s breath flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM60.00',
                    'original_price' => 'RM63.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation4.jpg',
                    'desc' => 'Graduation Bouquet with premium dyed baby\'s breath flowers',
                    'type' => 'Premium baby\'s breath flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM62.70',
                    'original_price' => 'RM66.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation5.jpg',
                    'desc' => 'Graduation Bouquet with premium sunflower and baby\'s breath flowers',
                    'type' => 'Premium sunflower',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM49.40',
                    'original_price' => 'RM52.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation6.jpg',
                    'desc' => 'Graduation Bouquet with premium pompom chrysanthemum',
                    'type' => 'Premium chrysanthemum',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM50.35',
                    'original_price' => 'RM53.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation7.jpg',
                    'desc' => 'Graduation 7 with premium pink chrysanthemum',
                    'type' => 'Premium pink chrysanthemum',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM51.30',
                    'original_price' => 'RM54.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Graduation Bouquet',
                    'img' => 'IMAGE/graduation8.jpg',
                    'desc' => 'Graduation Bouquet with premium sunflower',
                    'type' => 'Premium sunflower',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM55.70',
                    'original_price' => 'RM58.65',
                    'discount' => '5%'
                ]
            ];

            // Search Keyword
            $keyword = isset($_GET['keyword']) ? strtolower(trim($_GET['keyword'])) : '';

            // Product Filter
            $filtered = [];
            foreach ($products as $product) {
                if ($keyword === '' ||
                    strpos(strtolower($product['name']), $keyword) !== false ||
                    strpos(strtolower($product['type']), $keyword) !== false ||
                    strpos(strtolower($product['desc']), $keyword) !== false ||
                    strpos(strtolower($product['current_price']), $keyword) !== false
                ) {
                    $filtered[] = $product;
                }
            }
            ?>

            <form method="get" action="" class="search-form modern-search-form">
                <input type="text" name="keyword" placeholder="Search products..." value="<?php echo htmlspecialchars($keyword); ?>" class="search-input modern-search-input">
                <button type="submit" class="btn modern-search-btn">🔍 Search</button>
            </form>

            <div class="product-grid">
            <?php if (count($filtered) === 0): ?>
                <p>No products found.</p>
            <?php else: ?>
                <?php foreach ($filtered as $product): ?>
                <div class="product-card">
                    <div class="discount-badge"><p><?php echo htmlspecialchars($product['discount']); ?></p></div>
                    <figure>
                        <img src="<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-img">
                        <figcaption><?php echo htmlspecialchars($product['desc']); ?></figcaption>
                    </figure>
                    <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                    <dl class="product-specs">
                        <div>
                            <dt>Type:</dt>
                            <dd><?php echo htmlspecialchars($product['type']); ?></dd>
                        </div>
                        <div>
                            <dt>Delivery:</dt>
                            <dd><?php echo htmlspecialchars($product['delivery']); ?></dd>
                        </div>
                    </dl>
                    <div class="product-price">
                        <span class="current-price"><?php echo htmlspecialchars($product['current_price']); ?></span>
                        <span class="original-price"><?php echo htmlspecialchars($product['original_price']); ?></span>
                    </div>
                    <div class="product-actions">
                        <button class="btn wishlist-btn"><img src="IMAGE/wishlist.svg" alt="wishlist"></button>
                        <button class="btn add-to-cart">Add To Cart</button>
                        <button class="btn quick-view"><img src="IMAGE/view2.svg" alt="view"> </button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </section>

         <!-- Aside right-->
         <?php include("INCLUDE/aside.php"); ?>
    </main>
    <br>
    
    <!-- Footer  -->
    <?php include("INCLUDE/footer.php"); ?>

    <?php include("INCLUDE/profileicon.php"); ?>
</body>
</html>
    

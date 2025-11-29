<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Product Pages - Hand-bouquet</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>

    <!-- Main contents -->
    <main class="main-content">
        <!-- Main products-->
        <section class="product-section">
            <div class="section-header">
                <h1>Handtied-Bouquet</h1>
            </div>
            
            <?php
            // Array of all products
            $products = [
                // Handtied Bouquet
                [
                    'name' => 'Mix Flowers Bouquet',
                    'img' => 'IMAGE/hb1.jpg',
                    'desc' => 'Mix Handtied Flowers Bouquet with premium fresh flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM42.75',
                    'original_price' => 'RM45.00',
                    'discount' => '-5%'
                ],
                [
                    'name' => 'Bridal Bouquet',
                    'img' => 'IMAGE/hb2.jpg',
                    'desc' => 'Bridal ROM Bouquet with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM47.50',
                    'original_price' => 'RM50.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Roses Bouquet',
                    'img' => 'IMAGE/hb3.jpg',
                    'desc' => 'Roses Bouquet with premium roses',
                    'type' => 'Premium roses',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM45.60',
                    'original_price' => 'RM48.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Gerbera Mix',
                    'img' => 'IMAGE/hb4.jpg',
                    'desc' => 'Gerbera Mix Bouquet with premium daisy',
                    'type' => 'Premium daisy',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM39.90',
                    'original_price' => 'RM42.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Soap Roses Bouquet',
                    'img' => 'IMAGE/hb5.jpg',
                    'desc' => 'Soap Roses Bouquet with premium roses',
                    'type' => 'Premium roses',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM38.00',
                    'original_price' => 'RM40.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Bridal Bouquet',
                    'img' => 'IMAGE/hb6.jpg',
                    'desc' => 'Bridal ROM Bouquet with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM46.55',
                    'original_price' => 'RM49.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Cry Baby Bouquet',
                    'img' => 'IMAGE/hb7.jpg',
                    'desc' => 'Cry Baby Bouquet with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM44.65',
                    'original_price' => 'RM47.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Sunflower Bouquet',
                    'img' => 'IMAGE/hb8.jpg',
                    'desc' => 'Sunflower Bouquet with premium sunflowers',
                    'type' => 'Premium sunflowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM40.85',
                    'original_price' => 'RM43.00',
                    'discount' => '-5%'
                ],
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
         <?php include("aside.php"); ?>
    </main>
    <br>
    
    <!-- Footer  -->
    <?php include("footer.php"); ?>

    <?php include("profileicon.php"); ?>
</body>
</html>
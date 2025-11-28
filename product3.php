<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Product Pages - Grand Opening </title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("navigation.php"); ?>

    <!-- Main contents -->
    <main class="main-content">
        <!-- Main products-->
        <section class="product-section">
            <div class="section-header">
                <h1>Grand Opening</h1>
            </div>
            
            <?php
            // Array of all products
            $products = [
                // Grand Opening
                [
                    'name' => 'Grand Opening Flowers',
                    'img' => 'IMAGE/grandopening1.jpg',
                    'desc' => 'Opening Flower Stands with premium sunflower',
                    'type' => 'Premium sunflower',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM57.00',
                    'original_price' => 'RM60.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Flowers',
                    'img' => 'IMAGE/grandopening2.jpg',
                    'desc' => 'Opening Flower Stands with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM62.70',
                    'original_price' => 'RM66.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Basket',
                    'img' => 'IMAGE/grandopening3.jpg',
                    'desc' => 'Opening Flower Stands with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM43.70',
                    'original_price' => 'RM46.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Stands',
                    'img' => 'IMAGE/grandopening4.jpg',
                    'desc' => 'Opening Flower Stands with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM59.00',
                    'original_price' => 'RM62.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Stands',
                    'img' => 'IMAGE/grandopening5.jpg',
                    'desc' => 'Grand Opening Stands with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM53.40',
                    'original_price' => 'RM56.25',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Basket',
                    'img' => 'IMAGE/grandopening6.jpg',
                    'desc' => 'Grand Opening Basket with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM36.60',
                    'original_price' => 'RM38.50',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Basket',
                    'img' => 'IMAGE/grandopening7.jpg',
                    'desc' => 'Grand Opening Basket with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM36.50',
                    'original_price' => 'RM38.40',
                    'discount' => '5%'
                ],
                [
                    'name' => 'Grand Opening Basket',
                    'img' => 'IMAGE/grandopening8.jpg',
                    'desc' => 'Grand Opening Basket with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM32.80',
                    'original_price' => 'RM34.50',
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
         <?php include("aside.php"); ?>
    </main>
    <br>
    
    <!-- Footer  -->
    <?php include("footer.php"); ?>

    <?php include("profileicon.php"); ?>
</body>
</html>
    
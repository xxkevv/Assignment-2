<?php
/**
 * Filename: allproducts.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Page displaying all available products.
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
    <title>Product Pages</title>
</head>
<body>

<!-- Navigation bar -->
    <?php include("INCLUDE/navigation.php"); ?>

    <!-- Main contents -->
    <main class="main-content">
        <!-- Main products-->
        <section class="product-section">
            <div class="section-header">
                <h1>Latest Products</h1>
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
                

                // CNY Flowers
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny1.jpg',
                    'desc' => 'CNY Flowers with premium FLOWER',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM59.85',
                    'original_price' => 'RM63.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny2.jpg',
                    'desc' => 'CNY Flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM52.25',
                    'original_price' => 'RM55.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny3.jpg',
                    'desc' => 'CNY flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM66.50',
                    'original_price' => 'RM70.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny4.jpg',
                    'desc' => 'CNY flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM52.50',
                    'original_price' => 'RM55.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny5.jpg',
                    'desc' => 'CNY Flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM61.75',
                    'original_price' => 'RM65.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny6.jpg',
                    'desc' => 'CNY Flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM52.75',
                    'original_price' => 'RM55.50',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny7.jpg',
                    'desc' => 'CNY Flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM42.75',
                    'original_price' => 'RM45.00',
                    'discount' => '5%'
                ],
                [
                    'name' => 'CNY Flowers',
                    'img' => 'IMAGE/cny8.jpg',
                    'desc' => 'CNY Flowers with premium flowers',
                    'type' => 'Premium flowers',
                    'delivery' => 'Same day available',
                    'current_price' => 'RM38.00',
                    'original_price' => 'RM40.00',
                    'discount' => '5%'
                ],
            
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
                ],

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
                <button type="submit" class="btn modern-search-btn">Search</button>
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
    

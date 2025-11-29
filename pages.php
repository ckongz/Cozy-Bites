<?php
/* 
   Products Page - Cookie Catalog
   All available cookies with pricing
*/

// Shop variables
$shop_name = 'Cozy Bites';
$page_title = 'Our Products';

// Complete product catalog
$cookies = [
    ['name' => 'Classic Chocolate Chip', 'price' => 12, 'stock' => 45, 'category' => 'Classic', 'image' => 'img/chocolate-c.jpg'],
    ['name' => 'Double Fudge Brownie', 'price' => 15, 'stock' => 32, 'category' => 'Premium', 'image' => 'img/double-c.jpg'],
    ['name' => 'Vanilla Dream', 'price' => 10, 'stock' => 58, 'category' => 'Classic', 'image' => 'img/vanilla-c.jpg'],
    ['name' => 'Oatmeal Raisin', 'price' => 11, 'stock' => 40, 'category' => 'Healthy', 'image' => 'img/oatmeal-c.jpg'],
    ['name' => 'Peanut Butter Delight', 'price' => 13, 'stock' => 28, 'category' => 'Nutty', 'image' => 'img/peanutb-c.jpg'],
    ['name' => 'White Chocolate Macadamia', 'price' => 16, 'stock' => 25, 'category' => 'Premium', 'image' => 'img/macad-c.jpg'],
    ['name' => 'Snickerdoodle', 'price' => 11, 'stock' => 52, 'category' => 'Classic', 'image' => 'img/snicker-d.jpg'],
    ['name' => 'Red Velvet', 'price' => 14, 'stock' => 30, 'category' => 'Premium', 'image' => 'img/redv-c.jpg'],
    ['name' => 'Lemon Sugar', 'price' => 10, 'stock' => 48, 'category' => 'Citrus', 'image' => 'img/lemon-c.jpg'],
    ['name' => 'Coconut Macaroon', 'price' => 12, 'stock' => 35, 'category' => 'Tropical', 'image' => 'img/coconut.jpg'],
    ['name' => 'Ginger Snap', 'price' => 9, 'stock' => 60, 'category' => 'Spiced', 'image' => 'img/ginger.jpg'],
    ['name' => 'Matcha Chocolate', 'price' => 13, 'stock' => 38, 'category' => 'Premium', 'image' => 'img/matcha-c.jpg'],
];

// Calculate total stock
$total_stock = $cookies[0]['stock'] + $cookies[1]['stock'] + $cookies[2]['stock'] + 
               $cookies[3]['stock'] + $cookies[4]['stock'] + $cookies[5]['stock'] +
               $cookies[6]['stock'] + $cookies[7]['stock'] + $cookies[8]['stock'] +
               $cookies[9]['stock'] + $cookies[10]['stock'] + $cookies[11]['stock'];

// Calculate average price
$price_sum = $cookies[0]['price'] + $cookies[1]['price'] + $cookies[2]['price'] + 
             $cookies[3]['price'] + $cookies[4]['price'] + $cookies[5]['price'] +
             $cookies[6]['price'] + $cookies[7]['price'] + $cookies[8]['price'] +
             $cookies[9]['price'] + $cookies[10]['price'] + $cookies[11]['price'];

$cookie_count = 12;
$average_price = $price_sum / $cookie_count;

// Price range
$min_price = 9;
$max_price = 16;

// Bundle offer
$bundle_quantity = 6;
$bundle_regular_price = 72;
$bundle_discount = 15;
$bundle_savings = ($bundle_regular_price * $bundle_discount) / 100;
$bundle_price = $bundle_regular_price - $bundle_savings;

// Stock threshold
$low_stock = 30;
$high_stock = 50;
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $page_title ?> - <?= $shop_name ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <section class="nav-container">
            <section class="logo">
                <img src="img/Logo.png" alt="Cozy Bites Logo" class="logo-img">
                <span class="logo-text"><?= $shop_name ?></span>
            </section>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="pages.php" class="active">Products</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </section>
    </nav>

    <!-- Hero -->
    <header class="hero">
        <h1><?= $page_title ?></h1>
        <p class="tagline">Discover Our Delicious Collection</p>
    </header>

    <main class="container">
        <!-- Product Statistics -->
        <section class="welcome-box">
            <h2>Product Overview</h2>
            <p><strong>Total Cookie Varieties:</strong> <?= $cookie_count ?> unique flavors</p>
            <p><strong>Total Stock Available:</strong> <?= $total_stock ?> pieces</p>
            <p><strong>Average Price:</strong> $<?= $average_price ?> per dozen</p>
            <p><strong>Price Range:</strong> $<?= $min_price ?> - $<?= $max_price ?></p>
        </section>

        <!-- Bundle Offer -->
        <section class="special-offer">
            <h2>Special Bundle Offer</h2>
            <p>Mix & Match Any <?= $bundle_quantity ?> Dozens</p>
            <p class="price-info">
                <span class="old-price">$<?= $bundle_regular_price ?></span>
                <span class="discount"><?= $bundle_discount ?>% OFF</span>
            </p>
            <p class="final-price">Bundle Price: $<?= $bundle_price ?></p>
            <p class="savings">Save $<?= $bundle_savings ?>!</p>
        </section>

        <!-- Complete Product Table -->
        <section class="featured-section">
            <h2>Complete Cookie Catalog</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Cookie Name</th>
                        <th>Category</th>
                        <th>Price/Dozen</th>
                        <th>Stock</th>
                        <th>Availability</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="<?= $cookies[0]['image'] ?>" alt="<?= $cookies[0]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[0]['name'] ?></td>
                        <td><?= $cookies[0]['category'] ?></td>
                        <td>$<?= $cookies[0]['price'] ?></td>
                        <td><?= $cookies[0]['stock'] ?></td>
                        <td><?= ($cookies[0]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[1]['image'] ?>" alt="<?= $cookies[1]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[1]['name'] ?></td>
                        <td><?= $cookies[1]['category'] ?></td>
                        <td>$<?= $cookies[1]['price'] ?></td>
                        <td><?= $cookies[1]['stock'] ?></td>
                        <td><?= ($cookies[1]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[2]['image'] ?>" alt="<?= $cookies[2]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[2]['name'] ?></td>
                        <td><?= $cookies[2]['category'] ?></td>
                        <td>$<?= $cookies[2]['price'] ?></td>
                        <td><?= $cookies[2]['stock'] ?></td>
                        <td><?= ($cookies[2]['stock'] > $high_stock) ? 'In Stock' : 'Available' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[3]['image'] ?>" alt="<?= $cookies[3]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[3]['name'] ?></td>
                        <td><?= $cookies[3]['category'] ?></td>
                        <td>$<?= $cookies[3]['price'] ?></td>
                        <td><?= $cookies[3]['stock'] ?></td>
                        <td><?= ($cookies[3]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[4]['image'] ?>" alt="<?= $cookies[4]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[4]['name'] ?></td>
                        <td><?= $cookies[4]['category'] ?></td>
                        <td>$<?= $cookies[4]['price'] ?></td>
                        <td><?= $cookies[4]['stock'] ?></td>
                        <td><?= ($cookies[4]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[5]['image'] ?>" alt="<?= $cookies[5]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[5]['name'] ?></td>
                        <td><?= $cookies[5]['category'] ?></td>
                        <td>$<?= $cookies[5]['price'] ?></td>
                        <td><?= $cookies[5]['stock'] ?></td>
                        <td><?= ($cookies[5]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[6]['image'] ?>" alt="<?= $cookies[6]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[6]['name'] ?></td>
                        <td><?= $cookies[6]['category'] ?></td>
                        <td>$<?= $cookies[6]['price'] ?></td>
                        <td><?= $cookies[6]['stock'] ?></td>
                        <td><?= ($cookies[6]['stock'] > $high_stock) ? 'In Stock' : 'Available' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[7]['image'] ?>" alt="<?= $cookies[7]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[7]['name'] ?></td>
                        <td><?= $cookies[7]['category'] ?></td>
                        <td>$<?= $cookies[7]['price'] ?></td>
                        <td><?= $cookies[7]['stock'] ?></td>
                        <td><?= ($cookies[7]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[8]['image'] ?>" alt="<?= $cookies[8]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[8]['name'] ?></td>
                        <td><?= $cookies[8]['category'] ?></td>
                        <td>$<?= $cookies[8]['price'] ?></td>
                        <td><?= $cookies[8]['stock'] ?></td>
                        <td><?= ($cookies[8]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[9]['image'] ?>" alt="<?= $cookies[9]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[9]['name'] ?></td>
                        <td><?= $cookies[9]['category'] ?></td>
                        <td>$<?= $cookies[9]['price'] ?></td>
                        <td><?= $cookies[9]['stock'] ?></td>
                        <td><?= ($cookies[9]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[10]['image'] ?>" alt="<?= $cookies[10]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[10]['name'] ?></td>
                        <td><?= $cookies[10]['category'] ?></td>
                        <td>$<?= $cookies[10]['price'] ?></td>
                        <td><?= $cookies[10]['stock'] ?></td>
                        <td><?= ($cookies[10]['stock'] > $high_stock) ? 'In Stock' : 'Available' ?></td>
                    </tr>
                    <tr>
                        <td><img src="<?= $cookies[11]['image'] ?>" alt="<?= $cookies[11]['name'] ?>" class="cookie-image"></td>
                        <td><?= $cookies[11]['name'] ?></td>
                        <td><?= $cookies[11]['category'] ?></td>
                        <td>$<?= $cookies[11]['price'] ?></td>
                        <td><?= $cookies[11]['stock'] ?></td>
                        <td><?= ($cookies[11]['stock'] > $low_stock) ? 'Available' : 'Low Stock' ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Featured Products -->
        <section class="featured-section">
            <h2>Featured Highlights</h2>
            <section class="products-grid">
                <article class="product-card">
                    <img src="<?= $cookies[1]['image'] ?>" alt="<?= $cookies[1]['name'] ?>" class="product-image">
                    <h3><?= $cookies[1]['name'] ?></h3>
                    <span class="product-badge"><?= $cookies[1]['category'] ?></span>
                    <p class="product-price">$<?= $cookies[1]['price'] ?></p>
                    <p class="product-stock">Stock: <?= $cookies[1]['stock'] ?> dozens</p>
                </article>
                
                <article class="product-card">
                    <img src="<?= $cookies[2]['image'] ?>" alt="<?= $cookies[2]['name'] ?>" class="product-image">
                    <h3><?= $cookies[2]['name'] ?></h3>
                    <span class="product-badge"><?= $cookies[2]['category'] ?></span>
                    <p class="product-price">$<?= $cookies[2]['price'] ?></p>
                    <p class="product-stock">Stock: <?= $cookies[2]['stock'] ?> dozens</p>
                </article>
                
                <article class="product-card">
                    <img src="<?= $cookies[0]['image'] ?>" alt="<?= $cookies[0]['name'] ?>" class="product-image">
                    <h3><?= $cookies[0]['name'] ?></h3>
                    <span class="product-badge"><?= $cookies[0]['category'] ?></span>
                    <p class="product-price">$<?= $cookies[0]['price'] ?></p>
                    <p class="product-stock">Stock: <?= $cookies[0]['stock'] ?> dozens</p>
                </article>
            </section>
        </section>

        <!-- Pricing Tiers -->
        <section class="stats-grid">
            <article class="stat-card">
                <h3>Budget Friendly</h3>
                <p>$9 - $11</p>
                <p>Great taste, great value</p>
            </article>
            <article class="stat-card">
                <h3>Standard</h3>
                <p>$12 - $13</p>
                <p>Perfect everyday treats</p>
            </article>
            <article class="stat-card">
                <h3>Premium</h3>
                <p>$14 - $16</p>
                <p>Luxury cookie experience</p>
            </article>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Cozy Bites. All rights reserved.</p>
        <p>Sophia Ong</p>
    </footer>
</body>
</html>
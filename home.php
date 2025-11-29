<?php
/* 
   Cozy Bites - Home Page
   Simple cookie shop homepage
*/

// Shop variables
$shop_name = 'Cozy Bites';
$owner = 'Sophia Casey M. Ong';
$tagline = 'Freshly Baked Happiness in Every Bite';
$established = 2020;
$current_year = 2024;
$years_in_business = $current_year - $established;

// Featured cookies array
$featured_cookies = [
    ['name' => 'Classic Chocolate Chip', 'price' => 12, 'stock' => 45],
    ['name' => 'Double Fudge Brownie', 'price' => 15, 'stock' => 32],
    ['name' => 'Vanilla Dream', 'price' => 10, 'stock' => 58],
];

// Special offer calculations
$original_price = 50;
$discount_percent = 20;
$discount_amount = ($original_price * $discount_percent) / 100;
$final_price = $original_price - $discount_amount;

// Shop status
$is_open = true;
$accepting_orders = true;
$delivery_available = ($is_open && $accepting_orders);

// Stock threshold
$low_stock_threshold = 20;

// Customer greeting
$customer_name = 'Welcome';
$featured_count = 3;
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $shop_name ?> - Home</title>
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
                <li><a href="home.php" class="active">Home</a></li>
                <li><a href="pages.php">Products</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </section>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <h1><?= $shop_name ?></h1>
        <p class="tagline"><?= $tagline ?></p>
        <p class="subtitle">Serving joy for <?= $years_in_business ?> years</p>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Welcome Box -->
        <section class="welcome-box">
            <h2><?= $customer_name ?> to Our Cookie Paradise!</h2>
            <p>Managed by: <strong><?= $owner ?></strong></p>
            <p class="status">Shop Status: <?= $is_open ? 'Open' : 'Closed' ?></p>
            <p class="status">Online Orders: <?= $accepting_orders ? 'Accepting' : 'Closed' ?></p>
            <p class="status">Delivery: <?= $delivery_available ? 'Available' : 'Pickup Only' ?></p>
        </section>

        <!-- Special Offer -->
        <section class="special-offer">
            <h2>Special Offer Today!</h2>
            <p>Cookie Gift Box - Perfect for sharing</p>
            <p class="price-info">
                <span class="old-price">$<?= $original_price ?></span>
                <span class="discount"><?= $discount_percent ?>% OFF</span>
            </p>
            <p class="final-price">Now Only: $<?= $final_price ?></p>
            <p class="savings">You Save: $<?= $discount_amount ?></p>
        </section>

        <!-- Featured Cookies Table -->
        <section class="featured-section">
            <h2>Featured Cookies This Week</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Cookie Name</th>
                        <th>Price/Dozen</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $featured_cookies[0]['name'] ?></td>
                        <td>$<?= $featured_cookies[0]['price'] ?></td>
                        <td><?= $featured_cookies[0]['stock'] ?> pcs</td>
                        <td><?= ($featured_cookies[0]['stock'] > $low_stock_threshold) ? 'In Stock' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><?= $featured_cookies[1]['name'] ?></td>
                        <td>$<?= $featured_cookies[1]['price'] ?></td>
                        <td><?= $featured_cookies[1]['stock'] ?> pcs</td>
                        <td><?= ($featured_cookies[1]['stock'] > $low_stock_threshold) ? 'In Stock' : 'Low Stock' ?></td>
                    </tr>
                    <tr>
                        <td><?= $featured_cookies[2]['name'] ?></td>
                        <td>$<?= $featured_cookies[2]['price'] ?></td>
                        <td><?= $featured_cookies[2]['stock'] ?> pcs</td>
                        <td><?= ($featured_cookies[2]['stock'] > $low_stock_threshold) ? 'In Stock' : 'Low Stock' ?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Quick Stats -->
        <section class="stats-grid">
            <article class="stat-card">
                <h3><?= $featured_count ?></h3>
                <p>Featured Items</p>
            </article>
            <article class="stat-card">
                <h3><?= $years_in_business ?>+</h3>
                <p>Years of Excellence</p>
            </article>
            <article class="stat-card">
                <h3>$<?= $final_price ?></h3>
                <p>Special Bundle Price</p>
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
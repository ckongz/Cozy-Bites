<?php include 'includes/header.php'; ?>

<?php
// VARIABLES
$shop_name = 'Cozy Bites';
$page_title = 'Our Products';

// ARRAYS
$cookies = [
    ['name' => 'Classic Chocolate Chip', 'price' => 180, 'stock' => 45, 'category' => 'Classic', 'image' => 'img/chocolate-c.jpg'],
    ['name' => 'Double Fudge Brownie', 'price' => 225, 'stock' => 32, 'category' => 'Premium', 'image' => 'img/double-c.jpg'],
    ['name' => 'Vanilla Dream', 'price' => 150, 'stock' => 58, 'category' => 'Classic', 'image' => 'img/vanilla-c.jpg'],
    ['name' => 'Oatmeal Raisin', 'price' => 165, 'stock' => 40, 'category' => 'Healthy', 'image' => 'img/oatmeal-c.jpg'],
    ['name' => 'Peanut Butter Delight', 'price' => 195, 'stock' => 28, 'category' => 'Nutty', 'image' => 'img/peanutb-c.jpg'],
    ['name' => 'White Chocolate Macadamia', 'price' => 240, 'stock' => 25, 'category' => 'Premium', 'image' => 'img/macad-c.jpg'],
    ['name' => 'Snickerdoodle', 'price' => 165, 'stock' => 52, 'category' => 'Classic', 'image' => 'img/snicker-d.jpg'],
    ['name' => 'Red Velvet', 'price' => 210, 'stock' => 30, 'category' => 'Premium', 'image' => 'img/redv-c.jpg'],
    ['name' => 'Lemon Sugar', 'price' => 150, 'stock' => 48, 'category' => 'Citrus', 'image' => 'img/lemon-c.jpg'],
    ['name' => 'Coconut Macaroon', 'price' => 180, 'stock' => 35, 'category' => 'Tropical', 'image' => 'img/coconut.jpg'],
    ['name' => 'Ginger Snap', 'price' => 135, 'stock' => 60, 'category' => 'Spiced', 'image' => 'img/ginger.jpg'],
    ['name' => 'Matcha Chocolate', 'price' => 195, 'stock' => 38, 'category' => 'Premium', 'image' => 'img/matcha-c.png'],
];

// VARIABLES
$total_stock = 0;
$price_sum = 0;
$cookie_count = count($cookies);

// FOREACH LOOP
foreach ($cookies as $cookie) {
    $total_stock += $cookie['stock']; // EXPRESSIONS & OPERATORS
    $price_sum += $cookie['price'];
}

// EXPRESSIONS & OPERATORS
$average_price = $price_sum / $cookie_count;

// VARIABLES
$min_price = $cookies[0]['price'];
$max_price = $cookies[0]['price'];

// FOREACH LOOP
foreach ($cookies as $cookie) {
    // IF
    if ($cookie['price'] < $min_price) {
        $min_price = $cookie['price'];
    }
    // IF
    if ($cookie['price'] > $max_price) {
        $max_price = $cookie['price'];
    }
}

// ARRAYS
$category_counts = [];

// FOREACH LOOP
foreach ($cookies as $cookie) {
    $cat = $cookie['category'];
    // IF
    if (!isset($category_counts[$cat])) {
        $category_counts[$cat] = 0;
    }
    $category_counts[$cat]++; // OPERATORS
}

// VARIABLES
$bundle_quantity = 6;
$bundle_regular_price = 1080;
$bundle_discount = 15;

// EXPRESSIONS & OPERATORS
$bundle_savings = ($bundle_regular_price * $bundle_discount) / 100;
$bundle_price = $bundle_regular_price - $bundle_savings;

// VARIABLES
$low_stock = 30;
$high_stock = 50;
?>
    <header class="hero">
        <!-- SHORTHAND ECHO -->
        <h1><?php echo $page_title; ?></h1>
        <p class="tagline">Discover Our Delicious Collection</p>
    </header>

    <main class="container">
        <section class="welcome-box">
            <h2>Product Overview</h2>
            <!-- SHORTHAND ECHO -->
            <p><strong>Total Cookie Varieties:</strong> <?php echo $cookie_count; ?> unique flavors</p>
            <p><strong>Total Stock Available:</strong> <?php echo $total_stock; ?> pieces</p>
            <p><strong>Average Price:</strong> ₱<?php echo number_format($average_price, 2); ?> per dozen</p>
            <p><strong>Price Range:</strong> ₱<?php echo $min_price; ?> - ₱<?php echo $max_price; ?></p>
        </section>

        <section class="featured-section">
            <h2>Products by Category</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Number of Items</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- FOREACH LOOP -->
                    <?php foreach ($category_counts as $category => $count) { ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $category; ?></td>
                            <td><?php echo $count; ?> item<?php echo $count > 1 ? 's' : ''; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="special-offer">
            <h2>Special Bundle Offer</h2>
            <!-- SHORTHAND ECHO -->
            <p>Mix & Match Any <?php echo $bundle_quantity; ?> Dozens</p>
            <p class="price-info">
                <span class="old-price">₱<?php echo $bundle_regular_price; ?></span>
                <span class="discount"><?php echo $bundle_discount; ?>% OFF</span>
            </p>
            <p class="final-price">Bundle Price: ₱<?php echo $bundle_price; ?></p>
            <p class="savings">Save ₱<?php echo $bundle_savings; ?>!</p>
        </section>

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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- FOREACH LOOP -->
                    <?php foreach ($cookies as $cookie) { ?>
                        <tr>
                            <!-- SHORTHAND ECHO -->
                            <td><img src="<?php echo $cookie['image']; ?>" alt="<?php echo $cookie['name']; ?>" class="cookie-image"></td>
                            <td><?php echo $cookie['name']; ?></td>
                            <td><?php echo $cookie['category']; ?></td>
                            <td>₱<?php echo $cookie['price']; ?></td>
                            <td><?php echo $cookie['stock']; ?></td>
                            <td>
                                <?php 
                                // IF ELSEIF ELSE - Stock Status
                                if ($cookie['stock'] >= 50) {
                                    echo 'Excellent';
                                } elseif ($cookie['stock'] >= 30) {
                                    echo 'Good';
                                } elseif ($cookie['stock'] >= 15) {
                                    echo 'Limited';
                                } elseif ($cookie['stock'] > 0) {
                                    echo 'Low';
                                } else {
                                    echo 'Out';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="featured-section">
            <h2>Quantity Pricing (Buy More, Save More!)</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Price Per Dozen</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // VARIABLES
                    $base_price = 180;
                    
                    // FOR LOOP
                    for ($quantity = 1; $quantity <= 5; $quantity++) {
                        // EXPRESSIONS & OPERATORS
                        $price_per_dozen = $base_price - ($quantity * 7.50);
                        $total = $price_per_dozen * $quantity;
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $quantity; ?> dozen<?php echo $quantity > 1 ? 's' : ''; ?></td>
                            <td>₱<?php echo number_format($price_per_dozen, 2); ?></td>
                            <td>₱<?php echo number_format($total, 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="featured-section">
            <h2>Flash Sale Countdown</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Hours Left</th>
                        <th>Discount</th>
                        <th>Deal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // VARIABLES
                    $hours_left = 5;
                    
                    // DO WHILE LOOP
                    do {
                        // EXPRESSIONS & OPERATORS
                        $discount = $hours_left * 4;
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $hours_left; ?> hour<?php echo $hours_left > 1 ? 's' : ''; ?></td>
                            <td><?php echo $discount; ?>%</td>
                            <td><?php echo $discount >= 15 ? 'Great Deal!' : 'Last Chance!'; ?></td>
                        </tr>
                    <?php 
                        $hours_left--; // OPERATORS
                    } while ($hours_left > 0);
                    ?>
                </tbody>
            </table>
        </section>

        <section class="featured-section">
            <h2>Price Range Breakdown</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Price Range</th>
                        <th>Products</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // VARIABLES
                    $budget = 0;
                    $standard = 0;
                    $premium = 0;
                    
                    // FOREACH LOOP
                    foreach ($cookies as $cookie) {
                        // IF ELSEIF ELSE
                        if ($cookie['price'] <= 150) {
                            $budget++;
                        } elseif ($cookie['price'] <= 195) {
                            $standard++;
                        } else {
                            $premium++;
                        }
                    }
                    ?>
                    <!-- SHORTHAND ECHO -->
                    <tr>
                        <td>Budget Friendly (₱135-₱150)</td>
                        <td><?php echo $budget; ?> products</td>
                    </tr>
                    <tr>
                        <td>Standard (₱165-₱195)</td>
                        <td><?php echo $standard; ?> products</td>
                    </tr>
                    <tr>
                        <td>Premium (₱210+)</td>
                        <td><?php echo $premium; ?> products</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="featured-section">
            <h2>Premium Collection</h2>
            <section class="products-grid">
                <?php 
                // VARIABLES
                $premium_count = 0;
                
                // FOREACH LOOP
                foreach ($cookies as $cookie) {
                    // IF
                    if ($cookie['category'] == 'Premium' && $premium_count < 4) {
                        $premium_count++; // OPERATORS
                        
                        // VARIABLES - Price Category
                        $price_category = '';
                        
                        // SWITCH - Price Category Logic
                        switch (true) {
                            case ($cookie['price'] <= 150):
                                $price_category = 'Budget Friendly';
                                break;
                            case ($cookie['price'] <= 195):
                                $price_category = 'Standard';
                                break;
                            default:
                                $price_category = 'Premium';
                                break;
                        }
                ?>
                    <article class="product-card">
                        <!-- SHORTHAND ECHO -->
                        <img src="<?php echo $cookie['image']; ?>" alt="<?php echo $cookie['name']; ?>" class="product-image">
                        <h3><?php echo $cookie['name']; ?></h3>
                        <span class="product-badge"><?php echo $cookie['category']; ?></span>
                        <p class="product-price">₱<?php echo $cookie['price']; ?></p>
                        <p class="product-stock">Stock: <?php echo $cookie['stock']; ?> dozens</p>
                        <p class="product-stock"><?php echo $price_category; ?></p>
                    </article>
                <?php 
                    }
                } 
                ?>
            </section>
        </section>
    </main>
</body>
</html>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/header.php'; ?>

<?php
/* 
   Products Page - Complete cookie catalog
   Name: Sophia Casey M. Ong
   Section: WD - 203 
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
    ['name' => 'Matcha Chocolate', 'price' => 13, 'stock' => 38, 'category' => 'Premium', 'image' => 'img/matcha-c.png'],
];

// Calculate statistics using loops
$total_stock = 0;
$price_sum = 0;
$cookie_count = count($cookies);

foreach ($cookies as $cookie) {
    $total_stock += $cookie['stock'];
    $price_sum += $cookie['price'];
}

$average_price = $price_sum / $cookie_count;

// Find min and max prices
$min_price = $cookies[0]['price'];
$max_price = $cookies[0]['price'];

foreach ($cookies as $cookie) {
    if ($cookie['price'] < $min_price) {
        $min_price = $cookie['price'];
    }
    if ($cookie['price'] > $max_price) {
        $max_price = $cookie['price'];
    }
}

// Count by category
$category_counts = [];
foreach ($cookies as $cookie) {
    $cat = $cookie['category'];
    if (!isset($category_counts[$cat])) {
        $category_counts[$cat] = 0;
    }
    $category_counts[$cat]++;
}

// Bundle offer
$bundle_quantity = 6;
$bundle_regular_price = 72;
$bundle_discount = 15;
$bundle_savings = ($bundle_regular_price * $bundle_discount) / 100;
$bundle_price = $bundle_regular_price - $bundle_savings;

// Stock thresholds
$low_stock = 30;
$high_stock = 50;

// SWITCH STATEMENT EXAMPLE: Price categories function
function getPriceCategory($price) {
    switch (true) {
        case ($price <= 10):
            return 'Budget Friendly';
        case ($price <= 13):
            return 'Standard';
        default:
            return 'Premium';
    }
}

// Stock status function
function getStockStatus($stock) {
    if ($stock >= 50) {
        return 'Excellent';
    } elseif ($stock >= 30) {
        return 'Good';
    } elseif ($stock >= 15) {
        return 'Limited';
    } elseif ($stock > 0) {
        return 'Low';
    } else {
        return 'Out';
    }
}
?>
    <!-- Hero -->
    <header class="hero">
        <h1><?php echo $page_title; ?></h1>
        <p class="tagline">Discover Our Delicious Collection</p>
    </header>

    <main class="container">
        <!-- Product Statistics -->
        <section class="welcome-box">
            <h2>Product Overview</h2>
            <p><strong>Total Cookie Varieties:</strong> <?php echo $cookie_count; ?> unique flavors</p>
            <p><strong>Total Stock Available:</strong> <?php echo $total_stock; ?> pieces</p>
            <p><strong>Average Price:</strong> $<?php echo number_format($average_price, 2); ?> per dozen</p>
            <p><strong>Price Range:</strong> $<?php echo $min_price; ?> - $<?php echo $max_price; ?></p>
        </section>

        <!-- Category Breakdown -->
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
                    <?php foreach ($category_counts as $category => $count) { ?>
                        <tr>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $count; ?> item<?php echo $count > 1 ? 's' : ''; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Bundle Offer -->
        <section class="special-offer">
            <h2>Special Bundle Offer</h2>
            <p>Mix & Match Any <?php echo $bundle_quantity; ?> Dozens</p>
            <p class="price-info">
                <span class="old-price">$<?php echo $bundle_regular_price; ?></span>
                <span class="discount"><?php echo $bundle_discount; ?>% OFF</span>
            </p>
            <p class="final-price">Bundle Price: $<?php echo $bundle_price; ?></p>
            <p class="savings">Save $<?php echo $bundle_savings; ?>!</p>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cookies as $cookie) { ?>
                        <tr>
                            <td><img src="<?php echo $cookie['image']; ?>" alt="<?php echo $cookie['name']; ?>" class="cookie-image"></td>
                            <td><?php echo $cookie['name']; ?></td>
                            <td><?php echo $cookie['category']; ?></td>
                            <td>$<?php echo $cookie['price']; ?></td>
                            <td><?php echo $cookie['stock']; ?></td>
                            <td><?php echo getStockStatus($cookie['stock']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- FOR LOOP EXAMPLE: Quantity-Based Pricing -->
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
                    $base_price = 12;
                    
                    for ($quantity = 1; $quantity <= 5; $quantity++) {
                        $price_per_dozen = $base_price - ($quantity * 0.50);
                        $total = $price_per_dozen * $quantity;
                    ?>
                        <tr>
                            <td><?php echo $quantity; ?> dozen<?php echo $quantity > 1 ? 's' : ''; ?></td>
                            <td>$<?php echo number_format($price_per_dozen, 2); ?></td>
                            <td>$<?php echo number_format($total, 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- DO-WHILE LOOP EXAMPLE: Countdown Deals -->
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
                    $hours_left = 5;
                    
                    do {
                        $discount = $hours_left * 4;
                    ?>
                        <tr>
                            <td><?php echo $hours_left; ?> hour<?php echo $hours_left > 1 ? 's' : ''; ?></td>
                            <td><?php echo $discount; ?>%</td>
                            <td><?php echo $discount >= 15 ? 'Great Deal!' : 'Last Chance!'; ?></td>
                        </tr>
                    <?php 
                        $hours_left--;
                    } while ($hours_left > 0);
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Price Range Analysis -->
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
                    $budget = 0;
                    $standard = 0;
                    $premium = 0;
                    
                    foreach ($cookies as $cookie) {
                        if ($cookie['price'] <= 10) {
                            $budget++;
                        } elseif ($cookie['price'] <= 13) {
                            $standard++;
                        } else {
                            $premium++;
                        }
                    }
                    ?>
                    <tr>
                        <td>Budget Friendly ($9-$10)</td>
                        <td><?php echo $budget; ?> products</td>
                    </tr>
                    <tr>
                        <td>Standard ($11-$13)</td>
                        <td><?php echo $standard; ?> products</td>
                    </tr>
                    <tr>
                        <td>Premium ($14+)</td>
                        <td><?php echo $premium; ?> products</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Premium Collection -->
        <section class="featured-section">
            <h2>Premium Collection</h2>
            <section class="products-grid">
                <?php 
                $premium_count = 0;
                foreach ($cookies as $cookie) {
                    if ($cookie['category'] == 'Premium' && $premium_count < 4) {
                        $premium_count++;
                ?>
                    <article class="product-card">
                        <img src="<?php echo $cookie['image']; ?>" alt="<?php echo $cookie['name']; ?>" class="product-image">
                        <h3><?php echo $cookie['name']; ?></h3>
                        <span class="product-badge"><?php echo $cookie['category']; ?></span>
                        <p class="product-price">$<?php echo $cookie['price']; ?></p>
                        <p class="product-stock">Stock: <?php echo $cookie['stock']; ?> dozens</p>
                        <p class="product-stock"><?php echo getPriceCategory($cookie['price']); ?></p>
                    </article>
                <?php 
                    }
                } 
                ?>
            </section>
        </section>

        <!-- Low Stock Alert -->
        <section class="featured-section">
            <h2>Limited Stock - Order Now!</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Cookie Name</th>
                        <th>Price</th>
                        <th>Remaining Stock</th>
                        <th>Alert Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($cookies as $cookie) {
                        if ($cookie['stock'] < $low_stock) {
                    ?>
                        <tr>
                            <td><?php echo $cookie['name']; ?></td>
                            <td>$<?php echo $cookie['price']; ?></td>
                            <td><?php echo $cookie['stock']; ?> dozens</td>
                            <td>
                                <?php 
                                if ($cookie['stock'] < 20) {
                                    echo 'Very Low - Order Soon!';
                                } else {
                                    echo 'Low Stock';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php 
                        }
                    } 
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

<?php include 'includes/footer.php'; ?>

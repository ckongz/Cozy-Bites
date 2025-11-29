<?php include 'includes/header.php'; ?>

<?php
/* 
   Cozy Bites - Home Page
   Name: Sophia Casey M. Ong
   Section: WD - 203 
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

// Shop status - using current hour
$current_hour = 14; // 2 PM
$is_open = ($current_hour >= 8 && $current_hour < 20);
$accepting_orders = true;
$delivery_available = ($is_open && $accepting_orders);

// Stock threshold
$low_stock_threshold = 20;

// Day of week special - SWITCH STATEMENT EXAMPLE
$day_of_week = 'Monday';
switch ($day_of_week) {
    case 'Monday':
        $daily_special = '15% off Chocolate Chip';
        break;
    case 'Tuesday':
        $daily_special = '10% off all Premium cookies';
        break;
    case 'Wednesday':
        $daily_special = 'Buy 2 Get 1 Free on Classic';
        break;
    case 'Thursday':
    case 'Friday':
        $daily_special = '20% off Bundle deals';
        break;
    case 'Saturday':
    case 'Sunday':
        $daily_special = 'Weekend Special: Free delivery';
        break;
    default:
        $daily_special = 'Check our featured items';
        break;
}

// Customer greeting based on time
if ($current_hour >= 5 && $current_hour < 12) {
    $greeting = 'Good Morning';
} elseif ($current_hour >= 12 && $current_hour < 18) {
    $greeting = 'Good Afternoon';
} elseif ($current_hour >= 18 && $current_hour < 22) {
    $greeting = 'Good Evening';
} else {
    $greeting = 'Welcome';
}

// Calculate total stock
$total_stock = 0;
foreach ($featured_cookies as $cookie) {
    $total_stock += $cookie['stock'];
}

// Shop status message
if (!$is_open) {
    $status_message = 'Currently Closed - Opens at 8:00 AM';
    $status_class = 'closed';
} elseif ($current_hour >= 19) {
    $status_message = 'Closing Soon - Last orders at 8:00 PM';
    $status_class = 'closing';
} else {
    $status_message = 'Open Now - Welcome!';
    $status_class = 'open';
}
?>
    <!-- Hero Section -->
    <header class="hero">
        <h1><?php echo $shop_name; ?></h1>
        <p class="tagline"><?php echo $tagline; ?></p>
        <p class="subtitle">Serving joy for <?php echo $years_in_business; ?> years</p>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Welcome Box -->
        <section class="welcome-box">
            <h2><?php echo $greeting; ?> to Our Cookie Paradise!</h2>
            <p>Managed by: <strong><?php echo $owner; ?></strong></p>
            <p class="status">Shop Status: <strong><?php echo $status_message; ?></strong></p>
            <p class="status">Online Orders: <?php echo $accepting_orders ? 'Accepting' : 'Closed'; ?></p>
            <p class="status">Delivery: <?php echo $delivery_available ? 'Available' : 'Pickup Only'; ?></p>
            <p class="status">Today's Special: <strong><?php echo $daily_special; ?></strong></p>
        </section>

        <!-- Special Offer -->
        <section class="special-offer">
            <h2>Special Offer Today!</h2>
            <p>Cookie Gift Box - Perfect for sharing</p>
            <p class="price-info">
                <span class="old-price">$<?php echo $original_price; ?></span>
                <span class="discount"><?php echo $discount_percent; ?>% OFF</span>
            </p>
            <p class="final-price">Now Only: $<?php echo $final_price; ?></p>
            <p class="savings">You Save: $<?php echo $discount_amount; ?></p>
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
                    <?php foreach ($featured_cookies as $cookie) { ?>
                        <tr>
                            <td><?php echo $cookie['name']; ?></td>
                            <td>$<?php echo $cookie['price']; ?></td>
                            <td><?php echo $cookie['stock']; ?> pcs</td>
                            <td>
                                <?php 
                                if ($cookie['stock'] > 50) {
                                    echo 'Well Stocked';
                                } elseif ($cookie['stock'] > $low_stock_threshold) {
                                    echo 'In Stock';
                                } elseif ($cookie['stock'] > 0) {
                                    echo 'Low Stock';
                                } else {
                                    echo 'Out of Stock';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- FOR LOOP EXAMPLE: Bulk Order Discounts -->
        <section class="featured-section">
            <h2>Bulk Order Discounts</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Price Per Dozen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $base_price = 12;
                    
                    for ($qty = 1; $qty <= 10; $qty += 2) {
                        if ($qty == 1) {
                            $discount = 0;
                        } elseif ($qty <= 3) {
                            $discount = 5;
                        } elseif ($qty <= 5) {
                            $discount = 10;
                        } else {
                            $discount = 15;
                        }
                        
                        $discounted_price = $base_price - ($base_price * $discount / 100);
                    ?>
                        <tr>
                            <td><?php echo $qty; ?> dozen<?php echo $qty > 1 ? 's' : ''; ?></td>
                            <td><?php echo $discount; ?>%</td>
                            <td>$<?php echo number_format($discounted_price, 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- DO-WHILE LOOP EXAMPLE: Pack Prices -->
        <section class="featured-section">
            <h2>Cookie Pack Prices</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Number of Packs</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $pack_price = 12.99;
                    $packs = 5;
                    
                    do {
                    ?>
                        <tr>
                            <td><?php echo $packs; ?> pack<?php echo $packs > 1 ? 's' : ''; ?></td>
                            <td>$<?php echo number_format($pack_price * $packs, 2); ?></td>
                        </tr>
                    <?php 
                        $packs--;
                    } while ($packs > 0);
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Weekly Schedule -->
        <section class="featured-section">
            <h2>Weekly Special Offers</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Special Offer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $weekly_schedule = [
                        'Monday' => '15% off Chocolate Chip',
                        'Tuesday' => '10% off all Premium cookies',
                        'Wednesday' => 'Buy 2 Get 1 Free on Classic',
                        'Thursday' => '20% off Bundle deals',
                        'Friday' => '20% off Bundle deals',
                        'Saturday' => 'Weekend Special: Free delivery',
                        'Sunday' => 'Weekend Special: Free delivery'
                    ];
                    
                    foreach ($weekly_schedule as $day => $offer) {
                        $is_today = ($day == $day_of_week) ? ' (Today!)' : '';
                    ?>
                        <tr>
                            <td><strong><?php echo $day . $is_today; ?></strong></td>
                            <td><?php echo $offer; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <!-- Quick Stats -->
        <section class="stats-grid">
            <article class="stat-card">
                <h3><?php echo count($featured_cookies); ?></h3>
                <p>Featured Items</p>
            </article>
            <article class="stat-card">
                <h3><?php echo $years_in_business; ?>+</h3>
                <p>Years of Excellence</p>
            </article>
            <article class="stat-card">
                <h3>$<?php echo $final_price; ?></h3>
                <p>Special Bundle Price</p>
            </article>
            <article class="stat-card">
                <h3><?php echo $total_stock; ?></h3>
                <p>Total Stock Available</p>
            </article>
        </section>
    </main>
</body>
</html>

<?php include 'includes/footer.php'; ?>


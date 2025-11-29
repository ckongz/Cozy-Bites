<?php include 'includes/header.php'; ?>

<?php
// VARIABLES
$shop_name = 'Cozy Bites';
$owner = 'Sophia Casey M. Ong';
$tagline = 'Freshly Baked Happiness in Every Bite';
$est_year = 2020;
$curr_year = 2024;
$yrs_business = $curr_year - $est_year; // EXPRESSIONS & OPERATORS

// ARRAYS
$cookies = [
    ['name' => 'Classic Chocolate Chip', 'price' => 12, 'stock' => 45],
    ['name' => 'Double Fudge Brownie', 'price' => 15, 'stock' => 32],
    ['name' => 'Vanilla Dream', 'price' => 10, 'stock' => 58],
];

// EXPRESSIONS & OPERATORS
$orig_price = 50;
$discount_pct = 20;
$disc_amt = ($orig_price * $discount_pct) / 100;
$sale_price = $orig_price - $disc_amt;

// VARIABLES with EXPRESSIONS & OPERATORS
$hr = 14;
$open = ($hr >= 8 && $hr < 20);
$taking_orders = true;
$can_deliver = ($open && $taking_orders);

// VARIABLES
$low_stock = 20;
$today = 'Monday';
$daily_deal = '';

// SWITCH
switch ($today) {
    case 'Monday':
        $daily_deal = '15% off Chocolate Chip';
        break;
    case 'Tuesday':
        $daily_deal = '10% off all Premium cookies';
        break;
    case 'Wednesday':
        $daily_deal = 'Buy 2 Get 1 Free on Classic';
        break;
    case 'Thursday':
    case 'Friday':
        $daily_deal = '20% off Bundle deals';
        break;
    case 'Saturday':
    case 'Sunday':
        $daily_deal = 'Weekend Special: Free delivery';
        break;
    default:
        $daily_deal = 'Check our featured items';
}

// IF ELSEIF ELSE
if($hr >= 8 && $hr <= 10) {
    $delivery_est = '30 minutes';
} elseif($hr >= 11 && $hr <= 14) {
    $delivery_est = '45 minutes';
} elseif($hr >= 15 && $hr <= 18) {
    $delivery_est = '1 hour';
} elseif($hr == 19) {
    $delivery_est = '1.5 hours (Closing soon)';
} else {
    $delivery_est = 'Not available';
}

// IF ELSEIF ELSE
if ($hr >= 5 && $hr < 12) {
    $hello = 'Good Morning';
} elseif ($hr >= 12 && $hr < 18) {
    $hello = 'Good Afternoon';
} elseif ($hr >= 18 && $hr < 22) {
    $hello = 'Good Evening';
} else {
    $hello = 'Welcome';
}

// FOREACH LOOP
$total_stock = 0;
foreach ($cookies as $c) {
    $total_stock += $c['stock'];
}

// IF ELSEIF ELSE
if (!$open) {
    $stat_msg = 'Currently Closed - Opens at 8:00 AM';
    $stat_class = 'closed';
} elseif ($hr >= 19) {
    $stat_msg = 'Closing Soon - Last orders at 8:00 PM';
    $stat_class = 'closing';
} else {
    $stat_msg = 'Open Now - Welcome!';
    $stat_class = 'open';
}
?>
    <header class="hero">
        <!-- SHORTHAND ECHO -->
        <h1><?php echo $shop_name; ?></h1>
        <p class="tagline"><?php echo $tagline; ?></p>
        <p class="subtitle">Serving joy for <?php echo $yrs_business; ?> years</p>
    </header>

    <main class="container">
        <section class="welcome-box">
            <!-- SHORTHAND ECHO -->
            <h2><?php echo $hello; ?> to Our Cookie Paradise!</h2>
            <p>Managed by: <strong><?php echo $owner; ?></strong></p>
            <p class="status">Shop Status: <strong><?php echo $stat_msg; ?></strong></p>
            
            <!-- TERNARY OPERATOR -->
            <p class="status">Online Orders: <?php echo $taking_orders ? 'Accepting' : 'Closed'; ?></p>
            <p class="status">Delivery: <?php echo $can_deliver ? 'Available' : 'Pickup Only'; ?></p>
            
            <!-- SHORTHAND ECHO -->
            <p class="status">Estimated Delivery Time: <strong><?php echo $delivery_est; ?></strong></p>
            <p class="status">Today's Special: <strong><?php echo $daily_deal; ?></strong></p>
        </section>

        <section class="special-offer">
            <h2>Special Offer Today!</h2>
            <p>Cookie Gift Box - Perfect for sharing</p>
            <p class="price-info">
                <!-- SHORTHAND ECHO -->
                <span class="old-price">$<?php echo $orig_price; ?></span>
                <span class="discount"><?php echo $discount_pct; ?>% OFF</span>
            </p>
            <p class="final-price">Now Only: $<?php echo $sale_price; ?></p>
            <p class="savings">You Save: $<?php echo $disc_amt; ?></p>
        </section>

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
                    <!-- FOREACH LOOP -->
                    <?php foreach ($cookies as $c) { ?>
                        <tr>
                            <!-- SHORTHAND ECHO -->
                            <td><?php echo $c['name']; ?></td>
                            <td>$<?php echo $c['price']; ?></td>
                            <td><?php echo $c['stock']; ?> pcs</td>
                            <td>
                                <!-- IF ELSEIF ELSE -->
                                <?php 
                                if ($c['stock'] > 50) {
                                    echo 'Well Stocked';
                                } elseif ($c['stock'] > $low_stock) {
                                    echo 'In Stock';
                                } elseif ($c['stock'] > 0) {
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
                    // VARIABLES
                    $base = 12;
                    
                    // FOR LOOP
                    for ($q = 1; $q <= 10; $q += 2) {
                        // IF ELSEIF ELSE
                        if ($q == 1) {
                            $disc = 0;
                        } elseif ($q <= 3) {
                            $disc = 5;
                        } elseif ($q <= 5) {
                            $disc = 10;
                        } else {
                            $disc = 15;
                        }
                        
                        // EXPRESSIONS & OPERATORS
                        $disc_price = $base - ($base * $disc / 100);
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $q; ?> dozen<?php echo $q > 1 ? 's' : ''; ?></td>
                            <td><?php echo $disc; ?>%</td>
                            <td>$<?php echo number_format($disc_price, 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

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
                    // VARIABLES
                    $pack_cost = 12.99;
                    $num_packs = 5;
                    
                    // DO WHILE LOOP
                    do {
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $num_packs; ?> pack<?php echo $num_packs > 1 ? 's' : ''; ?></td>
                            <!-- EXPRESSIONS & OPERATORS -->
                            <td>$<?php echo number_format($pack_cost * $num_packs, 2); ?></td>
                        </tr>
                    <?php 
                        $num_packs--;
                    } while ($num_packs > 0);
                    ?>
                </tbody>
            </table>
        </section>

        <section class="featured-section">
            <h2>Limited Stock Alert!</h2>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Items Remaining</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // VARIABLES
                    $stock_left = 10;
                    
                    // WHILE LOOP
                    while ($stock_left > 0) {
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO & TERNARY OPERATOR -->
                            <td><?php echo $stock_left; ?> item<?php echo $stock_left > 1 ? 's' : ''; ?></td>
                            <!-- TERNARY OPERATOR -->
                            <td><?php echo $stock_left > 5 ? 'Available' : 'Hurry - Almost Gone!'; ?></td>
                        </tr>
                    <?php 
                        $stock_left--;
                    }
                    ?>
                </tbody>
            </table>
        </section>

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
                    // ARRAYS
                    $week_deals = [
                        'Monday' => '15% off Chocolate Chip',
                        'Tuesday' => '10% off all Premium cookies',
                        'Wednesday' => 'Buy 2 Get 1 Free on Classic',
                        'Thursday' => '20% off Bundle deals',
                        'Friday' => '20% off Bundle deals',
                        'Saturday' => 'Weekend Special: Free delivery',
                        'Sunday' => 'Weekend Special: Free delivery'
                    ];
                    
                    // FOREACH LOOP
                    foreach ($week_deals as $day => $deal) {
                        // TERNARY OPERATOR
                        $today_mark = ($day == $today) ? ' (Today!)' : '';
                    ?>
                        <tr>
                            <!-- SHORTHAND ECHO -->
                            <td><strong><?php echo $day . $today_mark; ?></strong></td>
                            <td><?php echo $deal; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section class="stats-grid">
            <article class="stat-card">
                <!-- SHORTHAND ECHO -->
                <h3><?php echo count($cookies); ?></h3>
                <p>Featured Items</p>
            </article>
            <article class="stat-card">
                <h3><?php echo $yrs_business; ?>+</h3>
                <p>Years of Excellence</p>
            </article>
            <article class="stat-card">
                <h3>$<?php echo $sale_price; ?></h3>
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

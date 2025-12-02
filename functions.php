<?php 
declare(strict_types=1); // Strict enable
include 'includes/header.php'; 

// VARIABLES
$shop_name = 'Cozy Bites';
$page_title = 'Stock Monitoring System';

// Global variable for tax rate
$tax_rate = 12; 

// Multidimensional 
$cookies = [
    'Classic Chocolate Chip' => ['price' => 180.00, 'stock' => 45],
    'Double Fudge Brownie' => ['price' => 225.00, 'stock' => 32],
    'Vanilla Dream' => ['price' => 150.00, 'stock' => 8],
    'Oatmeal Raisin' => ['price' => 165.00, 'stock' => 40],
    'Peanut Butter Delight' => ['price' => 195.00, 'stock' => 5],
    'White Chocolate Macadamia' => ['price' => 240.00, 'stock' => 25],
    'Snickerdoodle' => ['price' => 165.00, 'stock' => 52],
    'Red Velvet' => ['price' => 210.00, 'stock' => 3],
    'Lemon Sugar' => ['price' => 150.00, 'stock' => 48],
    'Coconut Macaroon' => ['price' => 180.00, 'stock' => 35],
    'Ginger Snap' => ['price' => 135.00, 'stock' => 60],
    'Matcha Chocolate' => ['price' => 195.00, 'stock' => 7],
    'Salted Caramel' => ['price' => 220.00, 'stock' => 15],
    'Blueberry Cheesecake' => ['price' => 230.00, 'stock' => 9],
    'Cookies and Cream' => ['price' => 200.00, 'stock' => 28],
];

// Function to check if reorder is needed
function get_reorder_message(int $stock): string
{
    // Ternary operator to return reorder message
    return ($stock < 10) ? 'Yes' : 'No';
}

// Function to calculate total value of stock
function get_total_value(float $price, int $quantity): float
{
    // Return price multiplied by quantity
    return $price * $quantity;
}

// Function to calculate tax due 
function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float
{
    // total tax due
    return ($price * $quantity) * ($tax_rate / 100);
}
?>

<header class="hero">
    <h1><?php echo $page_title; ?></h1>
    <p class="tagline">Real-time Inventory Management</p>
</header>

<main class="container">
    <section class="featured-section">
    <h2>Complete Stock Monitoring</h2>
        <table class="cookie-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Stock Level</th>
                    <th>Reorder?</th>
                    <th>Total Value</th>
                    <th>Tax Due</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Foreach loop
                foreach ($cookies as $product_name => $data) { 
                ?>
                    <tr>
                        <!-- Display product name -->
                        <td><?php echo $product_name; ?></td>
                        <!-- Display stock level from $data array -->
                        <td><?php echo $data['stock']; ?> dozens</td>
                        <!-- Call get_reorder_message() function -->
                        <td><?php echo get_reorder_message($data['stock']); ?></td>
                        <!-- Call get_total_value() function -->
                        <td>₱<?php echo number_format(get_total_value($data['price'], $data['stock']), 2); ?></td>
                        <!-- Call get_tax_due() function with tax rate -->
                        <td>₱<?php echo number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2); ?></td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

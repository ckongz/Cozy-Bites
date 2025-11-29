<?php
/* 
   About Us Page - Our Story
   Learn about our journey
*/

// Company information
$shop_name = 'Cozy Bites';
$founder = 'Sophia Casey M. Ong';
$established_year = 2020;
$current_year = 2024;
$years_operating = $current_year - $established_year;

// Location info
$city = 'Angeles City';
$full_location = $city;

// Team information
$team_members = [
    ['name' => 'Sophia Casey Ong', 'role' => 'Founder & Head Baker', 'experience' => 15],
    ['name' => 'Riona Karl Cee Dimalanta', 'role' => 'Pastry Chef', 'experience' => 10],
    ['name' => 'Benedict Mariano Ong', 'role' => 'Store Manager', 'experience' => 8],
    ['name' => 'Kyle Benedict Gomez', 'role' => 'Assistant Baker', 'experience' => 5],
];

// Mission stats
$cookies_baked_daily = 500;
$working_days_per_week = 6;
$weeks_per_year = 52;
$annual_cookies = $cookies_baked_daily * $working_days_per_week * $weeks_per_year;

// Customer metrics
$total_customers = 25000;
$happy_customers = 24500;
$satisfaction_rate = ($happy_customers / $total_customers) * 100;

// Core values
$core_values = ['Quality', 'Freshness', 'Community', 'Sustainability'];

// Sourcing info
$local_suppliers = 12;
$organic_percentage = 80;

// Calculate team experience
$total_experience = $team_members[0]['experience'] + $team_members[1]['experience'] + 
                    $team_members[2]['experience'] + $team_members[3]['experience'];
$team_size = 4;
$avg_experience = $total_experience / $team_size;

// Comparison operators
$established_recently = ($years_operating < 10);
$experienced_team = ($avg_experience >= 5);
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us - <?= $shop_name ?></title>
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
                <li><a href="pages.php">Products</a></li>
                <li><a href="about.php" class="active">About</a></li>
            </ul>
        </section>
    </nav>

    <!-- Hero -->
    <header class="hero">
        <h1>About <?= $shop_name ?></h1>
        <p class="tagline">Our Story & Our Passion </p>
        <p class="subtitle">Serving <?= $full_location ?> since <?= $established_year ?></p>
    </header>

    <main class="container">
        <!-- Our Story Section -->
        <section class="about-section">
            <h2>Our Story</h2>
            <p>Founded by <strong><?= $founder ?></strong> in <?= $established_year ?>, <?= $shop_name ?> has been bringing joy to our community for <?= $years_operating ?> wonderful years. What started as a small home-based operation has grown into a beloved local bakery.</p>
            <p>With over <?= $total_experience ?> years of combined baking expertise, our team creates approximately <?= $annual_cookies ?> cookies annually, each made with love and the finest ingredients.</p>
            <p>We proudly maintain a <?= $satisfaction_rate ?>% customer satisfaction rate, having served over <?= $total_customers ?> happy customers!</p>
        </section>

        <!-- Team Section -->
        <section class="featured-section">
            <h2>Meet Our Team</h2>
            <p>Our talented team brings <?= $total_experience ?> years of combined experience (average of <?= $avg_experience ?> years per person).</p>
            <table class="cookie-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Experience</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $team_members[0]['name'] ?></td>
                        <td><?= $team_members[0]['role'] ?></td>
                        <td><?= $team_members[0]['experience'] ?> years</td>
                        <td><?= ($team_members[0]['experience'] >= 10) ? 'Master Baker' : 'Professional' ?></td>
                    </tr>
                    <tr>
                        <td><?= $team_members[1]['name'] ?></td>
                        <td><?= $team_members[1]['role'] ?></td>
                        <td><?= $team_members[1]['experience'] ?> years</td>
                        <td><?= ($team_members[1]['experience'] >= 10) ? 'Master Baker' : 'Professional' ?></td>
                    </tr>
                    <tr>
                        <td><?= $team_members[2]['name'] ?></td>
                        <td><?= $team_members[2]['role'] ?></td>
                        <td><?= $team_members[2]['experience'] ?> years</td>
                        <td><?= ($team_members[2]['experience'] >= 10) ? 'Master Baker' : 'Professional' ?></td>
                    </tr>
                    <tr>
                        <td><?= $team_members[3]['name'] ?></td>
                        <td><?= $team_members[3]['role'] ?></td>
                        <td><?= $team_members[3]['experience'] ?> years</td>
                        <td><?= ($team_members[3]['experience'] >= 10) ? 'Master Baker' : 'Professional' ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Cozy Bites. All rights reserved.</p>
        <p>Sophia Ong</p>
    </footer>
</body>
</html>
<?php
require_once '../includes/config.php';
require_once '../includes/database.php';

// Fetch total products
$totalProducts = count(fetchAll("SELECT * FROM products"));

// Fetch total paid orders
$totalPaidOrders = count(fetchAll("SELECT * FROM orders WHERE status = 'paid'"));

// Fetch total categories
$totalCategories = count(fetchAll("SELECT * FROM categories"));

// Fetch total brands
$totalBrands = count(fetchAll("SELECT * FROM brands"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Inventory Management</h1>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Brands</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#" id="logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="content">
        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card total-products">
                <i class="fas fa-shopping-basket"></i>
                <span>Total Products</span>
                <p><?php echo $totalProducts; ?></p>
                <a href="#">More Details</a>
            </div>
            <div class="card total-orders">
                <i class="fas fa-shopping-cart"></i>
                <span>Total Paid Orders</span>
                <p><?php echo $totalPaidOrders; ?></p>
                <a href="#">More Details</a>
            </div>
            <div class="card total-categories">
                <i class="fas fa-cubes"></i>
                <span>Total Categories</span>
                <p><?php echo $totalCategories; ?></p>
                <a href="#">More Details</a>
            </div>
            <div class="card total-brands">
                <i class="fas fa-tag"></i>
                <span>Total Brands</span>
                <p><?php echo $totalBrands; ?></p>
                <a href="#">More Details</a>
            </div>
        </div>

        <!-- Sales Analysis -->
        <div class="sales-analysis">
            <h2>Sales Analysis</h2>
            <form id="sales-filter">
                <label for="year">Year:</label>
                <select id="year">
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
                <label for="month">Month:</label>
                <select id="month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                </select>
                <button type="submit">Submit</button>
            </form>
            <div class="charts">
                <div id="phone-brand-sales" class="chart"></div>
                <div id="category-sales" class="chart"></div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>
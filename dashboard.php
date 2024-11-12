<?php
include('db_config.php');

$totalProducts = $conn->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];
$lowStockAlerts = $conn->query("SELECT COUNT(*) AS count FROM products WHERE stock <= reorder_level")->fetch_assoc()['count'];
$pendingOrders = $conn->query("SELECT COUNT(*) AS count FROM orders WHERE status = 'Pending'")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMS Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Inventory Management System</h1>
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="inventory.php">Inventory</a>
      <a href="orders.php">Orders</a>
      <a href="add_product.php">Add Product</a>
      <a href="reports.php">Reports</a>
    </nav>
  </header>
  <main>
    <section>
      <h2>Dashboard</h2>
      <div class="stats">
        <div class="stat">Total Products: <?php echo $totalProducts; ?></div>
        <div class="stat">Low Stock Alerts: <?php echo $lowStockAlerts; ?></div>
        <div class="stat">Pending Orders: <?php echo $pendingOrders; ?></div>
      </div>
    </section>
  </main>
</body>
</html>

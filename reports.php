<?php
include('db_config.php');

// Fetch low-stock products (those at or below the reorder level)
$lowStockProducts = $conn->query("SELECT * FROM products WHERE stock <= reorder_level");

// Fetch completed orders
$completedOrders = $conn->query("SELECT * FROM orders WHERE status = 'Completed'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reports</title>
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
      <h2>Reports</h2>
      
      <h3>Low-Stock Products</h3>
      <table>
        <thead>
          <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Reorder Level</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($product = $lowStockProducts->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $product['id']; ?></td>
              <td><?php echo $product['name']; ?></td>
              <td><?php echo $product['category']; ?></td>
              <td><?php echo $product['stock']; ?></td>
              <td><?php echo $product['reorder_level']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <h3>Completed Orders</h3>
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($order = $completedOrders->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $order['id']; ?></td>
              <td><?php echo $order['customer']; ?></td>
              <td><?php echo $order['product']; ?></td>
              <td><?php echo $order['quantity']; ?></td>
              <td><?php echo $order['status']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>

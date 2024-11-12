<?php
include('db_config.php');
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory List</title>
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
      <h2>Inventory List</h2>
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
          <?php while ($row = $products->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['category']; ?></td>
              <td><?php echo $row['stock']; ?></td>
              <td><?php echo $row['reorder_level']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>

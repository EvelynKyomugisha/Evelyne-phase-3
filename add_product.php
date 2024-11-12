<?php
include('db_config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productName = $_POST['product_name'];
  $category = $_POST['category'];
  $stock = $_POST['stock'];
  $reorderLevel = $_POST['reorder_level'];

  $sql = "INSERT INTO products (name, category, stock, reorder_level) VALUES ('$productName', '$category', $stock, $reorderLevel)";
  
  if ($conn->query($sql) === TRUE) {
    echo "New product added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Product</title>
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
      <h2>Add New Product</h2>
      <form action="add_product.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="stock">Stock Quantity:</label>
        <input type="number" id="stock" name="stock" required>

        <label for="reorder_level">Reorder Level:</label>
        <input type="number" id="reorder_level" name="reorder_level" required>

        <button type="submit">Add Product</button>
      </form>
    </section>
  </main>
</body>
</html>

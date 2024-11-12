<?php
// Include the database configuration file to establish a connection
include('db_config.php');

// Handle form submission for adding a new order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form input
  $customer = $_POST['customer'];
  $product = $_POST['product'];
  $quantity = $_POST['quantity'];
  $status = $_POST['status'];

  // Insert the new order into the database
  $stmt = $conn->prepare("INSERT INTO orders (customer, product, quantity, status) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $customer, $product, $quantity, $status);
  $stmt->execute();
  $stmt->close();

  // Refresh to display the new order
  header("Location: orders.php");
  exit();
}

// Fetch all orders from the database to display in the table
$orders = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Management</title>
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
      <h2>Order Management</h2>

      <!-- Form to Add New Order -->
      <h3>Add New Order</h3>
      <form method="POST" action="orders.php">
        <label for="customer">Customer Name:</label>
        <input type="text" id="customer" name="customer" required>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required min="1">

        <label for="status">Status:</label>
        <select id="status" name="status" required>
          <option value="Pending">Pending</option>
          <option value="Completed">Completed</option>
        </select>

        <button type="submit">Add Order</button>
      </form>

      <!-- Display Orders Table -->
      <h3>Existing Orders</h3>
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
          <?php while ($row = $orders->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['customer']; ?></td>
              <td><?php echo $row['product']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['status']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </section>
  </main>
</body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <title>Product Record Input</title>
    <meta charset="utf-8" />
    <meta name="author" content="Pilvi Rajala" />

    <style>
      body {
        color: black;
      }

      table {
        border-collapse: collapse;
        text-align: center;
        background-color: #80b3ff;
        color: white; /* Font colour */
        font-family: sans-serif;
        width: 100%;
      }

      table, th, td {
        border: 1px solid white;
      }

      th, td {
        padding: 15px 10px;
      }

      th {
        background-color: #3366cc;
      }

    </style>
  </head>
  <body>

    <?php

    $productname = "";
    $productID = null;
    $supplierID = null;
    $categoryID = null;
    $quantity = -1;
    $unitprice = -1;
    $inStock = -1;
    $discontinued = null;

    //Check whether the form has been
    if( isset($_POST["productname"])){
      $productname = $_POST["productname"];
    }
    if( isset($_POST["productID"])){
      $productID = $_POST["productID"];
    }
    if( isset($_POST["supplierID"])){
      $supplierID = $_POST["supplierID"];
    }
    if( isset($_POST["categoryID"])){
      $categoryID = $_POST["categoryID"];
    }
    if( isset($_POST["quantity"])){
      $quantity = $_POST["quantity"];
    }
    if( isset($_POST["unitprice"])){
      $unitprice = $_POST["unitprice"];
    }
    if( isset($_POST["inStock"])){
      $inStock = $_POST["inStock"];
    }
    if( isset($_POST["discontinued"])){
      $discontinued = $_POST["discontinued"];
    }

    ?>

    <!-- Display form data in a HTML table -->
    <table>
      <tr>
        <th>Product ID</th>
        <th>Product name</th>
        <th>Supplier ID</th>
        <th>Category ID</th>
        <th>Quantity per unit</th>
        <th>Unit price</th>
        <th>Units in stock</th>
        <th>Discontinued</th>
      </tr>
      <tr>
        <td><?php echo $productID; ?></td>
        <td><?php echo $productname; ?></td>
        <td><?php echo $supplierID; ?></td>
        <td><?php echo $categoryID; ?></td>
        <td><?php echo $quantity; ?></td>
        <td><?php echo $unitprice; ?></td>
        <td><?php echo $inStock; ?></td>
        <td><?php echo $discontinued; ?></td>
      </tr>
    </table>

  <?php
    //Add a new product record if the record doesn't yet exist in the database
    require_once("db.php");

    $idQueryResult = null;

    if(!empty($productID)){
      $sql = "SELECT ProductName FROM Products WHERE ProductID=$productID";
      $idQueryResult = $mydb->query($sql);
    }

    //There doesn't yet exist record with the product ID
    if(mysql_num_rows($idQueryResult)==0 && !empty($productID)){
      $sql = "INSERT INTO Products(ProductID, ProductName, SupplierID, CategoryID, QuantityPerUnit, UnitPrice, UnitsInStock, Discontinued) VALUES ($productID, '$productname', $supplierID, $categoryID, '$quantity', $unitprice, $inStock, $discontinued)";
      $result = $mydb->query($sql);

      if($result == 1){
        echo "<p>A new employee record has been created.</p>";
      }
    }
    //...product ID wasn't given
    else if(empty($productID)){
      $sql = "INSERT INTO Products(ProductName, SupplierID, CategoryID, QuantityPerUnit, UnitPrice, UnitsInStock, Discontinued) VALUES ('$productname', $supplierID, $categoryID, '$quantity', $unitprice, $inStock, $discontinued)";
      $result = $mydb->query($sql);

      if($result == 1){
        echo "<p>A new employee record has been created.</p>";
      }
    }

    //Modify the existing record
    else {
      $sql = "UPDATE Products SET ProductName='$productName', SupplierID=$supplierID, CategoryID=$categoryID, QuantityPerUnit='$quantity', UnitPrice=$unitprice, UnitsInStock=$inStock, Discontinued=$discontinued WHERE ProductID=$productID";

      $result = $mydb->query($sql);

      if($result == 1){
        echo "<p>A employee record has been updated.</p>";
      }

    }

  ?>
  </body>
</html>

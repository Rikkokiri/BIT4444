<!DOCTYPE html>
<html>
<!--
Q4. PHP and MySQL (26 points)

Implement Q2 using the Products table in the Northwind database.
Write a PHP script to establish a connection to the Northwind database
and generate an HTML table that lists product name, supplier name,
units in stock, and unit price for all products.
-->
<head>
  <title>BIT - Homework 1: Question 2</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />
  <style>

    table {
      border-collapse: collapse;
      text-align: center;
      width: 80%;
      background-color: #f9decc;
      color: white; /* Font colour */
      font-family: sans-serif;
    }

    table, th, td {
      border: 1px solid white;
    }

    th, td {
      padding: 5px;
      width: 25%;
    }

    .darker {
      background-color: #e66826;
    }

  </style>
</head>
<body>
  <?php

    require_once("dbConnection.php");

    $sql = "SELECT p.ProductName AS ProductName, s.CompanyName AS CompanyName, p.UnitsInStock AS UnitsInStock, p.UnitPrice AS UnitPrice FROM Products AS p, Suppliers AS s WHERE p.SupplierID = s.SupplierID";
    $result = $mydb->query($sql);

    echo '<table>';
    echo '<tr class="darker"><th>Product Name</th><th>Supplier Name</th><th>Units in Stock</th><th>Unit Price</th></tr>';
    while($row = mysqli_fetch_array($result)){
      echo '<tr>';

      echo "<td class='darker'>".$row["ProductName"]."</td>";
      echo "<td>".$row["CompanyName"]."</td>";
      echo "<td>".$row["UnitsInStock"]."</td>";
      echo "<td>".$row["UnitPrice"]."</td>";

      echo '</tr>';
    }
    echo '</table>';
  ?>
</body>
</html>

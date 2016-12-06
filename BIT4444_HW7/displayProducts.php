<!DOCTYPE html>
<html>
<head>
  <title>Display Products</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="tablestyle.css" />

</head>
<body>
  <?php

    require_once("db.php");

    $sql = "SELECT * FROM Products";
    $result = $mydb->query($sql);

    echo '<table>';
    //Table header
    echo '<tr>';
    echo '<th>Product ID</th>';
    echo '<th>Product Name</th>';
    echo '<th>Supplier ID</th>';
    echo '<th>Category ID</th>';
    echo '<th>Quantity per unit</th>';
    echo '<th>Unit Price</th>';
    echo '<th>Units In Stock</th>';
    echo '<th>Units On Order</th>';
    echo '<th>Reorder level</th>';
    echo '<th>Discontinued</th>';
    echo '</tr>';

    while($row = mysqli_fetch_array($result)){
      if($counter % 2 != 0){
          echo '<tr class="oddrow">';
      }
      else{
        echo '<tr>';
      }

      echo "<td>".$row["ProductID"]."</td>";
      echo "<td>".$row["ProductName"]."</td>";
      echo "<td>".$row["SupplierID"]."</td>";
      echo "<td>".$row["CategoryID"]."</td>";
      echo "<td>".$row["QuantityPerUnit"]."</td>";
      echo "<td>".$row["UnitPrice"]."</td>";
      echo "<td>".$row["UnitsInStock"]."</td>";
      echo "<td>".$row["UnitsOnOrder"]."</td>";
      echo "<td>".$row["ReorderLevel"]."</td>";

      //Discontinued
      if($row["Discontinued"] == 1){
        echo "<td>Yes</td>";
      } else {
        echo "<td>No</td>";
      }

      echo '</tr>';
      $counter++;
    }

    echo '</table>';


  ?>
</body>
</html>

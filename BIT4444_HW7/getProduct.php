<!DOCTYPE html>
<html>
<head>
  <title>Product Info</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />
</head>
<body>
  <?php
    $id = 0;
    if(isset($_GET['id'])){
      $id=$_GET['id'];
    }

    require_once("db.php");

    $sql="SELECT * FROM Products WHERE productID=".$id;
    $result = $mydb->query($sql);

    if($row=mysqli_fetch_array($result)){
      echo "<p><strong>Product Details</strong></p>";
      echo "<strong>Product name: </strong>".$row["ProductName"]."<br/>";
      echo "<strong>Supplier ID: </strong>".$row["Supplierid"]."<br/>";
      echo "<strong>CategoryID: </strong>".$row["CategoryID"]."<br/>";
      echo "<strong>Quantity per unit: </strong>".$row["QuantityPerUnit"]."<br/>";
      echo "<strong>Unit price: </strong>".$row["UnitPrice"]."<br/>";
      echo "<strong>Units in stock: </strong>".$row["UnitsInStock"]."<br/>";
      echo "<strong>Units on order: </strong>".$row["UnitsOnOrder"]."<br/>";
      echo "<strong>ReorderLevel: </strong>".$row["ReorderLevel"]."<br/>";
      echo "<strong>Discontinued: </strong>".$row["Discontinued"]."<br/>";

    } else {
      echo "<p>Your product info cannot be found.</p>";

    }

  ?>
</body>
</html>

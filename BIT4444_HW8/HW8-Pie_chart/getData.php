<?php
  $supplierID = 0;

  if(isset($_GET['supplierID'])){
    $supplierID = $_GET['supplierID'];
  }

  require_once("db.php");

  $sql = "SELECT ProductName, UnitPrice * UnitsInStock AS StockValue FROM Products WHERE SupplierID = $supplierID GROUP BY(ProductID)";
  $result = $mydb->query($sql);

  $stock = array();

  for($x = 0; $x < mysqli_num_rows($result); $x++){
    $stock[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($stock);
?>

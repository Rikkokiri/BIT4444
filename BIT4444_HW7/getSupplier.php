<!DOCTYPE html>
<html>
<head>
  <title>Supplier Info</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />
</head>
<body>
  <?php
    $id = 0;
    if(isset($_GET['id'])) $id=$_GET['id'];

    require_once("db.php");

    $sql="SELECT * FROM Suppliers WHERE supplierid=".$id;
    $result = $mydb->query($sql);

    if($row=mysqli_fetch_array($result)){
      echo "<p><strong>Supplier Details</strong></p>";
      echo "<strong>Supplier name: </strong>".$row["CompanyName"]."<br />";
      echo "<strong>Contact name: </strong>".$row["ContactName"]."<br />";
      echo "<strong>Contact title: </strong>".$row["ContactTitle"]."<br />";
      echo "<strong>Address:</strong> ".$row["Address"]."<br />";
      echo "<strong>City:</strong> ".$row["City"]."<br />";
      echo "<strong>Region: </strong>".$row["Region"]."<br />";
      echo "<strong>Postal code: </strong>".$row["PostalCode"]."<br />";
      echo "<strong>Country: </strong>".$row["Country"]."<br />";
      echo "<strong>Phone: </strong>".$row["Phone"]."<br />";
      echo "<strong>Fax: </strong>".$row["Fax"]."<br />";
      echo "<strong>Homepage: </strong>".$row["HomePage"]."<br />";

    } else {
      echo "Your company info cannot be found.";
    }

  ?>
</body>
</html>

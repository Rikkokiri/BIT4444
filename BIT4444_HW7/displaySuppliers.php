<!DOCTYPE html>
<html>
<head>
  <title>Display Suppliers</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="tablestyle.css" />

</head>
<body>
  <?php

    require_once("db.php");

    $sql = "SELECT * FROM Suppliers";
    $result = $mydb->query($sql);

    echo '<table>';
    //Table header
    echo '<tr>';
    echo '<th>Supplier ID</th>';
    echo '<th>Company Name</th>';
    echo '<th>Contact Name</th>';
    echo '<th>Contact Title</th>';
    echo '<th>Address</th>';
    echo '<th>City</th>';
    echo '<th>Region</th>';
    echo '<th>Postal Code</th>';
    echo '<th>Country</th>';
    echo '<th>Phone</th>';
    echo '<th>Fax</th>';
    //echo '<th>Homepage</th>';
    echo '</tr>';

    $counter = 1;

    while($row = mysqli_fetch_array($result)){
      if($counter % 2 != 0){
          echo '<tr class="oddrow">';
      }
      else {
        echo '<tr>';
      }

      echo "<td>".$row["SupplierID"]."</td>";
      echo "<td>".$row["CompanyName"]."</td>";
      echo "<td>".$row["ContactName"]."</td>";
      echo "<td>".$row["ContactTitle"]."</td>";
      echo "<td>".$row["Address"]."</td>";
      echo "<td>".$row["City"]."</td>";
      echo "<td>".$row["Region"]."</td>";
      echo "<td>".$row["PostalCode"]."</td>";
      echo "<td>".$row["Country"]."</td>";
      echo "<td>".$row["Phone"]."</td>";
      echo "<td>".$row["Fax"]."</td>";
      //echo "<td>".$row["HomePage"]."</td>";
      echo '</tr>';

      $counter++;
    }

    echo '</table>';


  ?>
</body>
</html>

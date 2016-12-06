<!DOCTYPE html>
<html>
<head>
  <title>Login successful</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

</head>
<body>
  <?php

    //Resume the session variable
    session_start();

    $companyName = $_SESSION["companyName"];
    $supplierID = $_SESSION["supplierID"];

    $hour = date('H');
    $greeting = "";

    if($hour < 12){
      $greeting = "morning";
    } else {
      $greeting = "afternoon";
    }

    echo "Good ".$greeting." ".$companyName."! Please keep in mind that your supplier ID is ".$supplierID.".";

  ?>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>Login successful</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

</head>
<body>
  <?php

    $hour = date('H');
    $greeting = "";

    if($hour < 12){
      $greeting = "morning";
    } else {
      $greeting = "afternoon";
    }

    echo "Good ".$greeting." ".$_COOKIE["companyName"]."! Please keep in mind that your supplier ID is ".$_COOKIE["supplierID"].".";

  ?>

</body>
</html>

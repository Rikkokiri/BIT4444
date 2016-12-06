<?php
  $supplierID = null;
  $pwd = "";
  $errorFound = false;
  $loginOK = null;


  if(isset($_POST["submit"])){
    if(isset($_POST["supplierID"])) $supplierID = $_POST["supplierID"];
    if(isset($_POST["pwd"])) $pwd = $_POST["pwd"];

    //If username or password field has been left empty --> error
    if(empty($supplierID) || empty($pwd)) {
      $errorFound = true;
    }

    if(!$errorFound) {
      //Compare the username (supplier ID) and password (contact name) to the database record
      require_once("db.php");

      $sql = "SELECT ContactName FROM Suppliers WHERE SupplierID=$supplierID";
      $result = $mydb->query($sql);
      $row = mysqli_fetch_array($result);

      if($row) { //If row is not empty
        //And if the password (contact name) matches
        if(strcmp($pwd, $row["ContactName"]) == 0) {
          $loginOK = true;
        } else {
          $loginOK = false;
        }
      }

      if($loginOK) {
        //Set session variable to remember the username
        session_start();
        $_SESSION["supplierID"] = $supplierID;

        //Get the corresponding company name
        $sql = "SELECT CompanyName FROM Suppliers WHERE SupplierID=$supplierID";
        $result = $mydb->query($sql);
        $row = mysqli_fetch_array($result);
        $_SESSION["companyName"] = $row["CompanyName"];

        //Redirect the user
        header("Location:hw6q2_loginsuccess.php");
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Supplier Login</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="login-style.css" />

</head>
<body>

  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <div class="fieldcontainer">

      <h1>Supplier Login</h1>

      <label><strong>Supplier ID</strong></label> <br />
      <input type="text" name="supplierID" placeholder="Enter supplier ID" />
      <!-- Is supplierID wasn't entered, show error message -->
      <?php if($errorFound && empty($supplierID)) echo "<span class='errormessage'>Please enter a supplier ID</span>"; ?>
      <br />

      <br />

      <label><strong>Password</strong></label> <br />
      <input type="password" name="pwd" placeholder="Enter contact name"/>
      <?php if($errorFound && empty($pwd)) echo "<span class='errormessage'>Please enter a password</span>"?>
      <br />
      <!-- If login was unsuccessful, show error message -->
      <?php if(!is_null($loginOK) && $loginOK == false) echo "<span class='errormessage'>Supplier ID and password do not match.</span><br />"; ?>

      <input type="submit" name="submit" value="Login" />

    </div>

  </form>


</body>
</html>

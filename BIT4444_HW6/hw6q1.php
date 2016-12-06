<?php
  $productname = "";
  $productID = "";
  $supplierID = null;
  $categoryID = null;
  $quantity = null;
  $unitprice = null;
  $inStock = null;
  $discontinued = 0;

  $error = false;

  //Check whether the form has been
  if( isset($_POST["submit"])){

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

    //Check that non of the inputs are empty
    if(!empty($productname) && !empty($supplierID) && !empty($categoryID) && $quantity >= 0 && $unitprice >= 0 && $inStock >= 0){

      //TODO What should happen now? Redirect to success page?
      header("HTTP/1.1 307 Temporary Redirect");
      header("Location: hw6q1_product-input.php");

    }
    else {
      //If something goes wrong, change the error flag to true.
      $error = true;

    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Homework 6 - Question 1</title> <!-- TODO Change title -->
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <!-- Stylesheet -->
  <link rel="stylesheet" type="text/css" href="product-form-style.css" />

</head>
<body>
  <main>

    <form method="post" action="<? echo $_SERVER['PHP_SELF']?>">
      <div>
        <!-- Product name -->
        <h1>ENTER A PRODUCT RECORD</h1>

        <p>
          <label>Product name <br />
            <input type="text" name="productname" placeholder="Enter a product name" size="35" value="<?php echo $productname; ?>"/>
          </label>
          <?php
            //If there is an error and productname is empty
            if($error && empty($productname)){
              echo "<label class='errormessage'>Error: Please enter a product name</label>";
            }
          ?>
        </p>

        <!-- Product ID -->
        <p>
          <label>Product ID (leave blank for a new product)<br />
            <input type="text" name="productID" placeholder="Enter the product ID" size="35" value="<?php echo $productID; ?>"/>
          </label>
        </p>

        <!-- Supplier ID (drop-down, 1-29) -->
        <p>
          <label>Supplier ID <br />
            <select name="supplierID">
              <option></option>
              <!-- Generate the options from 1-29 -->
              <?php
                  for ($i=1; $i<=29; $i++){
                    ?>
                        <option value="<?php echo $i;?>"
                          <?php if(!empty($supplierID) && $supplierID == $i) echo "selected='selected'"?>>
                          <?php echo $i;?></option>
                    <?php
                  }
              ?>
            </select>
          </label>
          <?php
            if($error && ($supplierID < 1 || empty($supplierID))){
              echo "<label class='errormessage'>Error: Select a supplier ID</label>";
            }
          ?>
        </p>

        <!-- Category ID (drop-down, 1-8) -->
        <p>
          <label>Category ID <br />
            <select name="categoryID">
              <option></option>
              <!-- Generate the options from 1-8 -->
              <?php
                  for ($i=1; $i<=8; $i++){
                    ?>
                        <option value="<?php echo $i;?>"
                          <?php if(!empty($categoryID) && $categoryID == $i) echo "selected='selected'"?>>
                          <?php echo $i;?></option>
                    <?php
                  }
              ?>
            </select>
          </label>
          <?php
            if($error && ($categoryID < 1 || empty($categoryID))){
              echo "<label class='errormessage'>Error: Select a category ID</label>";
            }
          ?>
        </p>

        <!-- Quantity per unit (integer) -->
        <p>
          <label>Quantity per unit <br />
            <input name="quantity" type="number" value="<?php if($quantity >= 0) echo $quantity; ?>"/>
          </label>
          <?php
            if($error && $quantity < 0){
              echo "<label class='errormessage'>Error: Quantity per unit must be >= 0</label>";
            } else if ($error && empty($quantity)){
              echo "<label class='errormessage'>Error: Please enter quantity per unit</label>";
            }
          ?>
        </p>


        <!-- Unit price -->
        <p>
          <label>Unit price <br />
            <input name="unitprice" type="number" step="0.01" value="<?php if($unitprice >= 0) echo $unitprice; ?>"/>
          </label>
          <?php
            if($error && $unitprice < 0){
              echo "<label class='errormessage'>Error: Unit price must be >= 0</label>";
            } else if($error && empty($unitprice)){
              echo "<label class='errormessage'>Error: Please enter unit price</label>";
            }
          ?>
        </p>

        <!-- Units in stock -->
        <p>
          <label>Units in stock <br />
            <input name="inStock" type="number" value="<?php if($inStock >= 0) echo $inStock; ?>"/>
          </label>
          <?php
            if($error && $inStock < 0){
              echo "<label class='errormessage'>Error: Number of units in stock must be >= 0</label>";
            } else if($error && empty($inStock)){
              echo "<label class='errormessage'>Error: Please enter the number of units in stock</label>";
            }
          ?>
        </p>

        <!-- Discontinued (radio buttons) -->
        <p>
          Discontinued<br />
          <label>
            <input name="discontinued" type="radio" <?php if (isset($discontinued) && $discontinued=="1") echo "checked";?> value="1"/>
          </label> Yes<br />
          <label>
            <input name="discontinued" type="radio" <?php if (isset($discontinued) && $discontinued=="0") echo "checked";?> value="0"/>
          </label> No <br />
        </p>

        <p class="buttons">
          <input type="submit" name="submit" value="Submit" />
          <input type="reset" value="Reset"  />
        </p>

      </div>
    </form>
  </main>
</body>
</html>

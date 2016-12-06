<!--
(1) DevelopanHTMLpage, d3.html, that contains an HTML form. The form has a drop-down list
input element that displays all supplier ids retrieved from the suppliers
table in the Northwind database. The form also has a submit button. (10 pts)
-->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />

  <!-- jQuery -->
  <script src="jquery-3.1.1.min.js"></script>
  <script src="https://d3js.org/d3.v4.min.js"></script>

  <script>

    //Document ready function
    $(function(){

      $('#idForm').submit(function(event){

        var supplierID = $("#selectSupplierID").val();

        $.ajax({
          url: 'showProducts.php?',
          async: true,
          success: function(result) {
            $("#chart-area").html(result);

            //TODO DOES THIS WORK?
            var scripts = document.getElementById("chart-area").getElementsByTagName("script");
            for( var i=0; i<scripts.length; i++ ) {
              eval(scripts[i].innerText);
            }

          }
        })
        event.preventDefault();
      });

    }); //end documentReady

  </script>

</head>
<body>

  <!-- Form -->
  <form action="" method="POST" id="idForm"> <!-- TODO Define form action and method -->

    <p>SELECT SUPPLIER ID</p>
    <!-- Populate drop-down list with supplier IDs using PHP -->
    <?php
      require_once("db.php");
      $sql = "SELECT SupplierID FROM Suppliers";
      $result = $mydb->query($sql);

      echo '<select id="selectSupplierID">';

      while($row = mysqli_fetch_array($result)){

        echo '<option value="'.$row['SupplierID'].'">'.$row['SupplierID'].'</option>';
      }

      echo "</select>";
    ?>

    <input type="submit" value="Submit" />

  </form>

  <div id="chart-area">
    <!-- Content will be displayed here -->
    &nbsp;
  </div>


</body>
</html>

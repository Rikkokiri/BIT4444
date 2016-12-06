<!DOCTYPE html>
<html>
<!--
Write a PHP script (hw5q2.php) that renders an HTML table similar to the one shown below.
The top of the table states the product name, supplier name, units in stock, and unit price.
You must use a loop structure to generate at least 5 empty table rows. Define and apply CSS style
rules so that table header, the first column, and the rest of the table data cells have different
colors (you can define your own colors).
-->
<head>
  <title>BIT - Homework 1: Question 2</title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />
  <style>

    table {
      border-collapse: collapse;
      text-align: center;
      width: 80%;
      background-color: #f9decc;
      color: white; /* Font colour */
      font-family: sans-serif;
    }

    table, th, td {
      border: 1px solid white;
    }

    th, td {
      padding: 5px;
      width: 25%;
    }

    .darker {
      background-color: #e66826;
    }

  </style>
</head>
<body>
  <?php

    echo '<table>';
    echo '<tr class="darker"><th>Product Name</th><th>Supplier Name</th><th>Units in Stock</th><th>Unit Price</th></tr>';
    //Generate 5 empty rows
    for($rows = 0; $rows < 5; $rows++){
      echo '<tr>';
      for($columns = 0; $columns < 4; $columns++){
        if($columns == 0){
          //First column is different colour
          echo '<td class="darker">&nbsp;</td>';
        } else {
          echo '<td>&nbsp;</td>';
        }
      }
      echo '</tr>';
    }
    echo '</table>';

  ?>
</body>
</html>

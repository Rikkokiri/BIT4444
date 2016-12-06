<!DOCTYPE html>
<html>
<!-- Write a PHP script (hw5q1.php) that will send to the browser
a list of numbers that are multiples of 7 for the numbers 1-50.
Print one number per line.
-->
<head>
  <Title>BIT4444 - HW5: Question 1</Title>
  <meta charset="utf-8" />
  <meta name="author" content="Pilvi Rajala" />
</head>
<body>

  <?php

    for($num = 1; $num <= 50; $num++){
      if(($num % 7) == 0){
        //Print the number
        echo $num."<br ><br>";
      }
    }

  ?>

</body>
</html>

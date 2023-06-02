<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<?php 
  function bagi($angka1, $angka2)
  {
    if ($angka1 == 0) {
      return 0;
    }
          
    if ($angka2 == 0) {
      return INT_MAX;
    }
      
    $hasilNeg = false;
      
    // Handling negative numbers
    if ($angka1 < 0) {
      $angka1 = -$angka1 ;
        
      if ($angka2 < 0) {
        $angka2 = - $angka2; 
      } else {
        $hasilNeg = true;
      }
    } else if ($angka2 < 0) {
      $angka2 = - $angka2 ;
      $hasilNeg = true; 
    }
      
    // if angka1 is greater than equal to angka2
    // subtract angka2 from angka1 and increase
    // hasil by one.
    $hasil = 0;
    while ($angka1 >= $angka2)
    {
      $angka1 = $angka1 - $angka2 ;
      $hasil++ ;
    }
      
    // checking if neg equals to 1 then making
    // hasil negative 
    if ($hasilNeg) {
      $hasil = - $hasil ;
    }
    return $hasil ;
  }
?>
<body>
  <form action="" method="POST">
    <input type="number" name="angka1" placeholder="Masukkan Angka 1" required> /
    <input type="number" name="angka2" placeholder="Masukkan Angka 2" required>
    <input type="submit" name="submit" value="bagi">
  </form>
  <br>
  <?php
  if (isset($_POST['submit']) && isset($_POST['angka1'])  && isset($_POST['angka2']))
  {
    echo $_POST['angka1'] ." dibagi ".$_POST['angka2']." = ";
    echo bagi($_POST['angka1'], $_POST['angka2']);
  }
  ?>
</body>
</html>
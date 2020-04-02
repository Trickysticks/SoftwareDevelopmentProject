<?php

include("navbar.php");

$form944="";
$form941="";
if (isset($_GET['form944']))
  $form944=$_GET['form944'];
if (isset($_GET['form941']))
  $form941=$_GET['form941'];

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Highland Capital Tax System</title>
  </head>



  <body>
      <div style="text-align:center">
        </br></br></br>
        <h1> Success! You submitted your form </h1></br>
        <a href="index.php"> <button type="button" class="btn-lg btn-dark">Home</button> </a>
        <?php
        if ($form944=='submitted')
            echo '<a href="createFile.php?form944=submitted"> <button type="button" class="btn-lg btn-dark">Download Voucher</button> </a>';
        elseif ($form941=='submitted')
            echo '<a href="createFile.php?form941=submitted"> <button type="button" class="btn-lg btn-dark">Download Voucher</button> </a>';
        ?>
       <span>
   </body>
</html>
<?php

?>


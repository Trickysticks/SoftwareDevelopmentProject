<?php		
    include('config.php');
		session_start();

		if(isset($_SESSION["loggedin"])) {
			if ($_SESSION["loggedin"] === false){
			header("location: login.php");
			exit;
			}
		}
		else{
			header("location: login.php");
		}
  ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="css/style.css">
   </head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Highland Capital Tax System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Tax Forms
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="w4.php">Employee W4</a>
                  <a class="dropdown-item" href="w2.php">Employee W2</a>
                  <a class="dropdown-item" href="#">941 Form</a>
                  <a class="dropdown-item" href="#">944 Form</a>
                </div>
              </li>
              <li class="nav-item">
                <a style="position:fixed; right:50px;" id="logoutButton" class="nav-link" href="logout.php">Logout </a>
              </li>
             
            </ul>
          </div>
        </nav> 
</html>
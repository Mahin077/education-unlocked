<?php

include 'connect.php';
session_start();


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<title></title>
</head>

<body>	
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img style="width: 250px " src="./images/logo.png" alt="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="index.php">Home</a>
        </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="">Courses</a>
        </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="">Live</a>
        </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="">Contact Us</a>
      </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="">Team</a>
      </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="About.php">About Us</a>
      </button>
        </li>
        <?php
        if (isset($_SESSION['user_id']))
        {
             ?>
        
            <li class="nav-item">
                <a class="nav-link" href="profile.php"><?php echo $_SESSION['user_name'] ?></a>
            </li>
            <?php
        }else{
            ?>
            
            <li class="nav-item">
        <button type="button" class="btn btn-outline-danger me-3">
          <a class="nav-link text-white" href="login.php">Login</a>
        </button>
            </li>
        <?php
        }
        ?>
        
        
     </ul>
    </div>
  </div>
</nav>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>

<?php 
//This includes the session file. This file contains code that starts/resumes a session
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" href="css/site.css" />

    <title>Attendance - <?php echo $title ?></title>

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">IT Conference</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse container" id="navbarNavAltMarkup">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewrecords.php">View Records</a>
        </li>
      </ul>
      <div class="navbar-nav">
        <?php  
          if(!isset($_SESSION['userid'])) {
        ?>
          <a class="nav-link" href="login.php">Login</a>
        <?php } else { ?>
          <a class="nav-link" href="#">Hello <?php echo $_SESSION['username'] ?>!</a>
          <a class="nav-link" href="logout.php">Logout</a>
        <?php } ?>
    </div>
  </div>
</nav>

  <div class="container">
  
  

<?php
  require_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <!-- jquery CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    
    <!-- my CSS -->
    <link href="../css/style.css" rel="stylesheet">

    <title>Attendance - <?php echo $title; ?></title>
  </head>
  <body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-primary bg-dark p-3 mb-2">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">IT Conference</a>
          <button       
          class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="home page" href="index.php">Home</a>
              <a class="nav-link" href="viewRecords.php">View Attendees</a>
            </div>
            <div class="navbar-nav">
              <?php 
                if (!isset($_SESSION['userid'])) {
                    ?>
                  <a class="nav-link" aria-current="login page" href="login.php">Login</a>
              <?php } else {?>
                <a class="nav-link disabled" aria-current="login page" href="login.php">Hello <?php echo $_SESSION['username']?>!</a>
                <a class="nav-link" aria-current="logout page" href="logout.php">Logout</a>
                <?php } ?>
            </div>
          </div>
        </div>
      </nav>
    <div class="container">
 
      <br/>
      <br/>
      
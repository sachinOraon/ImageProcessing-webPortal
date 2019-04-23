<?php session_start(); if(!isset($_SESSION['fname'])) header('Location:index.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Image Processing</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <style>
    @font-face {
      font-family: 'tale_of_hawksregular';
      src: url('font/tale/tale_of_hawks-webfont.woff2') format('woff2'),
           url('font/tale/tale_of_hawks-webfont.woff') format('woff');
      font-weight: normal;
      font-style: normal;
    }
  </style>
</head>

<body style="background-color: #1a3a3d;">

  <!-- Start your project here-->
  <div class="container animated fadeInLeft" style="margin-top: 10%; width: 600px">
    <div class="row">
      <div class="col">
        <h1 class="display-3 text-white text-center" style="text-shadow: 0 0 10px #ff0000, 0 0 12px #ff0000, 0 0 14px #ff0000, 0 0 16px #ff0000, 0 0 18px #ff0000; font-family: 'tale_of_hawksregular';">Failed to Process !</h1><br>
      </div>
    </div>
    <div class="row"><div class="col" style="margin-left: 43%"><i class="fas fa-exclamation-circle fa-5x text-warning"></i></div></div><br>
    <div class="row"><div class="col" style="margin-left: 40%"><a href="filters.php" class="btn btn-outline-info btn-lg"><i class="fas fa-chevron-circle-left fa-2x"></i></a></div></div>
  </div>
  <!-- Project ends -->  
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery.min1.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.js"></script>
</body>

</html>

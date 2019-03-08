<!DOCTYPE html>
<html>
<head>
	<title>Image Processing</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	  
	<link href="css/all.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
</head>

<body style="background-color:#232323;">
	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.js"></script>
	
	<div class="bg">
		<p class="py-5 text-center"></p>
		<div class="navbar">
			<h2 class="animated fadeInLeft" style="color: white; padding: 40px;">Image Processing</h2>
			<a class="animated fadeInRight" style="margin-left: 40%" href="#home"><i class="fas fa-home"></i>Home</a>
			<a class="animated fadeInRight" href="#news"><i class="fas fa-filter"></i>Filters</a>
			<a class="animated fadeInRight" href="#contact"><i class="fas fa-phone"></i>Contact</a>
		</div>

		<div class="main">
			<div>
				<h1 id="getstarted">Get Started</h1>
				<p id="para">Upload image and choose filters</p>	
			</div>
	  	
			<form style="margin-left: 550px; margin-top: 10%" action="upload.php" method="POST" enctype="multipart/form-data">
				<label><input id="choose" class="btn peach-gradient" type="file" name="file"></label>
				<button class="btn peach-gradient" type="submit" name="upload">UPLOAD</button>
			</form>
		</div>
		<footer style="margin-top: 30%;" class="page-footer font-small cyan darken-3">

		<!-- Footer Elements -->
		<div class="container">

			<!-- Grid row-->
			<div class="row">

				<!-- Grid column -->
				<div class="col-md-12 py-5">
				<div class="mb-5 flex-center">

					<!-- Facebook -->
					<a class="fb-ic">
					<i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Twitter -->
					<a class="tw-ic">
					<i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Google +-->
					<a class="gplus-ic">
					<i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Linkedin -->
					<a class="li-ic">
					<i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Instagram-->
					<a class="ins-ic">
					<i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Pinterest-->
					<a class="pin-ic">
					<i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
					</a>
				</div>
				</div>
			<!-- Grid column -->
			</div>
			<!-- Grid row-->
		</div>
		<!-- Footer Elements -->
		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<a href="http://127.0.0.1/ip"> ImageProcessing</a>
		</div>
		<!-- Copyright -->
		</footer>
		<!-- Footer -->

	</div>
</body>
</html>


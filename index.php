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
			<h2 class="animated fadeInLeft" style="color: white;">Image Processing</h2>
			<a class="animated fadeInRight hoverable near-moon-gradient waves-effect" style="margin-left: 60%;border-radius: 50%" href="#home"><i class="fas fa-home"></i></a>
			<a class="animated fadeInRight hoverable purple-gradient waves-effect" href="#filters" style="border-radius: 48%"><i class="fas fa-filter"></i></a>
			<a class="animated fadeInRight hoverable blue-gradient waves-effect" style="border-radius: 48%" href="#contact"><i class="fas fa-phone"></i></a>
		</div>

		<div class="main">
			<div>
				<h1 id="getstarted">Get Started</h1>
				<p id="para">Upload image and choose filters</p>	
			</div>
	  	
			<form style="margin-left: 510px; margin-top: 10%" action="upload.php" method="POST" enctype="multipart/form-data">
				<div class="row no-gutters">
					<div class="col-md-6 custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="file">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
				</div>
				<button style="margin-left:17%" class="btn btn-primary morpheus-den-gradient waves-effect hoverable" type="submit" name="upload"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;UPLOAD</button>
				<?php
					session_start();
					if(isset($_SESSION['err']))
					{
						if($_SESSION['err']==1)
							$msg='Failed to upload to the server !';
						if($_SESSION['err']==2)
							$msg='File size limit exceeded (should be less than 5MB)';
						if($_SESSION['err']==3)
							$msg='Unsupported image file !';
						if($_SESSION['err']==4)
							$msg='Invalid file selected !';
						if($_SESSION['err']==5)
							$msg='Please select a file first !';
						echo '<div class="row"><div id="alert-div" style="margin-left:10%" class="text-center col-md-4 alert alert-danger alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>'.$msg.'</strong></div></div>';
						unset($_SESSION['err']);
					}
				?>
			</form>
			<script>
				// To show the name of file choosen
				$(".custom-file-input").on("change", function() {
					var fileName = $(this).val().split("\\").pop();
					$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
				});
				// To hide the alert msg
				$(".custom-file-input").on("click", function(){
					var id=document.getElementById('alert-div');
					id.style.display='none';
				});
			</script>
		</div>
		<footer style="margin-top: 30%;" class="page-footer font-small elegant-color">

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


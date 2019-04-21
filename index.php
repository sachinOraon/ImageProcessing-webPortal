<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Digital Image Processing</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #929FBA !important;
      }
    }

  </style>
</head>

<body>

  <!-- Modal to display upload notification -->
  <div class="modal fade" <?php if(isset($_SESSION['err'])) echo 'id="uploadErr"'; ?>>
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content cloudy-knoxville-gradient">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Upload Error</h4>
          <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col" style="margin-left:30%"><i class="fas fa-exclamation-circle fa-4x text-danger"></i></div>
          </div><br>
          <?php
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
              unset($_SESSION['err']);
              echo '<div class="alert alert-info"><h6 class="text-center">'.$msg.'</h6></div>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal ends -->

  <header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <div class="container">

        <i class="fas fa-eye fa-lg white-text"></i>&nbsp;<strong class="white-text">Image Processing</strong>&nbsp;&nbsp;

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-home"></i>Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about"><i class="fas fa-info-circle"></i>&nbsp;About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="filters.php"><i class="fas fa-filter"></i>&nbsp;Filters</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!--Carousel Wrapper-->
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <?php
        	if(isset($_SESSION['upldRedir']))
        		echo '<div class="carousel-item">';
        	else echo '<div class="carousel-item active">';
        ?>
          <div class="view" style="background-image: url('img/carousel1.png'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4" style="text-shadow: 4px 4px 8px #000000;">
                  <strong>Digital Image Processing using Matlab and OpenCV</strong>
                </h1>

                <p class="lead">
                  <strong>Upload an image file and apply various filters on it.</strong>
                </p>

                <p class="mb-4 d-none d-md-block">
                  <strong>
                    Contains almost all the filters that were taught in M.C.A. (Sem 4) Digital Image Processing Course.
                  </strong>
                </p>

                <a data-target="#myCarousel" data-slide-to="1" href="#" class="btn btn-outline-white btn-lg">
                  Get Started
                  <i class="fas fa-thumbs-up ml-2"></i>
                </a>
              </div>
              <!-- /Content -->

            </div>
            <!-- /Mask & flexbox options-->

          </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <?php
        	if(isset($_SESSION['upldRedir']))
        		echo '<div class="carousel-item active">';
        	else echo '<div class="carousel-item">';
        	unset($_SESSION['upldRedir']);
        ?>
          <div class="view" style="background-image: url('img/carousel2.png'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

              <!-- Content -->
              <div class="text-center white-text mx-5 wow fadeIn">
                <h1 class="mb-4" style="text-shadow: 4px 4px 8px #000000;">
                  <strong>Upload Image</strong>
                </h1>
				<form action="upload.php" method="POST" enctype="multipart/form-data">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile" name="file">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div>
					<button class="btn btn-primary morpheus-den-gradient waves-effect hoverable" type="submit" name="upload"><i class="fas fa-arrow-alt-circle-up"></i>&nbsp;UPLOAD</button>
				</form>
              </div>
              <!-- /Content -->

            </div>
            <!-- /Mask & flexbox options-->

          </div>
        </div>
        <!--/Second slide-->

      </div>
      <!--/.Slides-->

      <!--Controls-->
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <!--/.Controls-->

    </div>
    <!--/.Carousel Wrapper-->

  </header>

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-5 wow fadeIn">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <img src="img/sample1.jpg" class="img-fluid img-thumbnail z-depth-1-half">
          </div>
          <!--/Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4 z-depth-1-half" style="padding:1%">

            <!-- Main heading -->
            <h3 class="h3 mb-3 teal-text">About this project</h3>
            <p>This portal allows you to upload an image and apply various filters. At the backend the filters are applied using <strong>Matlab</strong>
            and <strong>OpenCV python</strong> library. Matlab codes are executed using <strong>Matlab Engine API</strong> for Python. We&rsquo;ve provided all the filters available in the course.</p>
            <!-- Main heading -->
            <hr>
            <p>
              This project was created under the guidance of <strong>Dr. Rajitha B (Assitant Professor, CSED, MNNIT Allahabad)</strong>
            </p><br>

            <!-- CTA -->
            <a target="_blank" href="https://github.com/sachinOraon/ImageProcessing-webPortal" class="btn btn-info">View Source
              <i class="fab fa-github fa-lg ml-1"></i>
            </a>
			<a href="#" class="btn btn-secondary">Meet The Team
              <i class="fas fa-user-friends fa-lg ml-1"></i>
            </a>
          </div>
          <!--/Grid column-->

        </div>
        <!--/Grid row-->

      </section>
      <!--Section: Main info-->

      <hr id="about" class="my-5">

      <!--Section-->
      <section>

        <h3 class="h3 text-center mb-5 blue-grey-text">About Image Processing (CS34301)</h3>

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-lg-6 col-md-12 px-4">

            <!--First row-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-info-circle fa-2x red-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Introduction</h5>
                <p class="grey-text">Digital image processing is the use of <strong>computer algorithms</strong> to perform <strong>image processing</strong> on digital images.</p>
              </div>
            </div>
            <!--/First row-->

            <div style="height:30px"></div>

            <!--Second row-->
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-image fa-2x blue-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">What is an Image ?</h5>
                <p class="grey-text">An image is defined as a two-dimensional function, <strong>F(x,y)</strong>, where <strong>x</strong> and <strong>y</strong> are <strong>spatial coordinates</strong>, and the <strong>amplitude</strong> of <strong>F</strong> at any pair of coordinates <strong>(x,y)</strong> is called the <strong>intensity</strong> of that image at that point. When <strong>x,y</strong>, and <strong>amplitude</strong> values of <strong>F</strong> are <strong>finite</strong>, we call it a <strong>digital image</strong>.
                </p>
              </div>
            </div>
            <!--/Second row-->
            <div style="height:30px"></div>
          </div>
          <div class="col-lg-6 col-md-12">
          	<div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-tasks fa-2x green-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Tasks</h5>
                <p class="grey-text">
                	Digital image processing focuses on two major tasks such as <strong>Improvement of pictorial information</strong> for human interpretation. Processing of image data for <strong>storage, transmission</strong> and <strong>representation for autonomous machine perception.</strong>
                </p>
              </div>
            </div>
            <div style="height:30px"></div>
            <div class="row">
              <div class="col-1 mr-3">
                <i class="fas fa-images fa-2x orange-text"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Image Formats</h5>
                <p class="grey-text"><strong>1 sample per point</strong>(B&W or Grayscale), <strong>3 sample per point</strong>(Red, Green, and Blue), <strong>4 samples per point</strong>(Red, Green, Blue, and “Alpha”, a.k.a. Opacity)</p>
              </div>
            </div>
          </div>
        </div>
        <!--/Grid row-->
      </section>
      <!--Section: Main features & Quick Start-->
      <hr class="my-2">
      <!--Section-->
      <section>
        <h2 class="my-5 h3 text-center deep-purple-text">Phases of Image Processing</h2>
        <!--First row-->
        <div class="row features-small mb-5 mt-3 wow fadeIn">

          <!--First column-->
          <div class="col-md-6">
            <!--First row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x purple-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Image Acquisition</h5>
                <p class="grey-text">It could be as simple as being given an image which is in digital form. The main work involves <strong>Scaling</strong>, <strong>Colour Conversion</strong>(RGB to Gray or vice-versa)</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x indigo-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Image Enhancement</h5>
                <p class="grey-text">It is amongst the simplest and most appealing in areas of Image Processing it is also used to extract some hidden details from an image and is subjective.</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Second row-->

            <!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x light-blue-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Image Restoration</h5>
                <p class="grey-text">It also deals with appealing of an image but it is objective(Restoration is based on mathematical or probabilistic model or image degradation).</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--Fourth row-->
			<div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x teal-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Colour Image Processing</h5>
                <p class="grey-text">It deals with pseudocolor and full color image processing color models are applicable to digital image processing.</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--Fifth row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x light-green-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Wavelets and Multi-resolution processing</h5>
                <p class="grey-text">It is foundation of representing images in various degrees.</p>
                <div style="height:15px"></div>
              </div>
            </div>
            <!--/Fifth row-->
          </div>
          <!--/First column-->
		  
          <!--Second column-->
          <div class="col-md-6 mt-2">
		  <!--First row-->
			<div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x amber-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Image Compression</h5>
                <p class="grey-text">It involves in developing some functions to perform this operation. It mainly deals with image size or resolution.</p>
                <div style="height:15px"></div>
              </div>
            </div>

			<!--Second row-->
			<div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x red-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Morphological Processing</h5>
                <p class="grey-text">It deals with tools for extracting image components that are useful in the representation & description of shape.</p>
                <div style="height:15px"></div>
              </div>
            </div>
            
			<!--Third row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x brown-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Segmentation</h5>
                <p class="grey-text">It includes partitioning an image into its constituent parts or objects. Autonomous segmentation is the most difficult task in Image Processing.</p>
                <div style="height:15px"></div>
              </div>
            </div>

            <!--Fourth row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x cyan-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Object Recognition</h5>
                <p class="grey-text">It is a process that assigns a label to an object based on its descriptor.</p>
                <div style="height:15px"></div>
              </div>
            </div>
			
			<!--Fifth row-->
            <div class="row">
              <div class="col-2">
                <i class="fas fa-check-circle fa-2x pink-text float-right"></i>
              </div>
              <div class="col-10">
                <h5 class="feature-title">Representation and Description</h5>
                <p class="grey-text">It follows output of segmentation stage, choosing a representation is only the part of solution for transforming raw data into processed data.</p>
                <div style="height:15px"></div>
              </div>
            </div>
          </div>
          <!--/Second column-->
        </div>
      </section>
      <!--/Section -->
    </div>
  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

    $(document).ready(function(){
      // Enable Carousel Controls
      $(".carousel-control-prev").click(function(){
        $("#myCarousel").carousel("prev");
      });

      $(".carousel-control-next").click(function(){
        $("#myCarousel").carousel("next");
      });

      $("#uploadErr").modal("show");
    });

    $("#customFile").on("click", function(){
		  $("#myCarousel").carousel("pause");
    });

    // To show the name of file choosen while uploading
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
</body>
</html>

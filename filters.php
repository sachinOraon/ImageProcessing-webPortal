<!DOCTYPE html>
<html>
<head>
	<title>Select Filter</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mdb.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/all.css" rel="stylesheet">
	<link href="css/filters.css" rel="stylesheet">
</head>

<body style="background-color: #232325;">

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mdb.js"></script>
	
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-11'>
				<div class="animated fadeInLeft" id="heading">
					<h1>CHOOSE &nbsp;&nbsp;FILTERS <img src="img/filter.png"></h1>
				</div>
			</div>
			<div class='col-md-1'>
				<a href="index.php" class="btn btn-outline-info waves-effect"><i class="fas fa-chevron-circle-left fa-lg"></i></a>
			</div>
		</div>

		<?php
			include 'parameters.php';
			include 'filters/blur_php/avg_modal.php';
			include 'filters/blur_php/gauss_modal.php';
			include 'filters/simple_int_trans/modal_range_comp.php';
			include 'filters/simple_int_trans/modal_gamma.php';
			include 'filters/freq_domain_filters/modal_ideal_low_pass.php';
			include 'filters/freq_domain_filters/modal_gauss_low_pass.php';
			include 'filters/freq_domain_filters/modal_ideal_high_pass.php';
			include 'filters/freq_domain_filters/modal_gauss_high_pass.php';
			include 'filters/freq_domain_filters/modal_bw_low_pass.php';
			include 'filters/freq_domain_filters/modal_bw_high_pass.php';
			include 'filters/freq_domain_filters/modal_homo.php';
		?>

		<script>
			//to display loading popover
			$(document).ready(function(){
				$('[data-toggle="popover"]').popover();
			});
		</script>
		<?php
			function disp_popup()
			{
				echo 'data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class=\'spinner-grow peach-gradient\'></div>"';
			}
		?>
		<div class='row'> <!-- ROW 1 BEGINS -->
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row1" style='margin-left: 40px;'>
					<h2>Simple intensity transformation</h2>
					<ul>
						<li class="waves-effect"><a href="filters/simple_int_trans/negative.php" <?php disp_popup(); ?>>Image Negatives</a></li>
						<li class="waves-effect"><a href="filters/simple_int_trans/cont_stretch_lin.php" <?php disp_popup(); ?>>Contrast Stretching [Linear]</a></li>
						<li class="waves-effect"><a href="filters/simple_int_trans/cont_stretch_nlin.php" <?php disp_popup(); ?>>Contrast Stretching [Non Linear]</a></li>
						<li class="waves-effect"><a data-toggle="modal" href="#range_comp">Range Compression</a></li>
						<li class="waves-effect"><a data-toggle="modal" href="#gamma_trans">Gamma Transformation</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row1" style='margin-left: 5%'>
					<h2>Histograms</h2>
					<ul>
						<li class="waves-effect"><a href="filters/histogram_php/hist_col.php" <?php disp_popup(); ?>>Plot Histogram For Color Image</a></li>
						<li class="waves-effect"><a href="filters/histogram_php/hist_gray.php" <?php disp_popup(); ?>>Plot Histogram For Grayscale Image</a></li>
						<li class="waves-effect"><a href="filters/histogram_php/hist_gray_eq.php" <?php disp_popup(); ?>>Equalization For Grayscale Image</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row1">
					<h2>Image Blurring</h2>
					<ul>
						<li class="waves-effect"><a href="#blur_avg" data-toggle="modal">Averaging</a></li>
						<li class="waves-effect"><a href="#blur_gauss" data-toggle="modal">Gaussian Blurring</a></li>
						<li class="waves-effect"><a href="filters/blur_php/blur_med.php" <?php disp_popup(); ?>>Median Blurring</a></li>
						<li class="waves-effect"><a href="filters/blur_php/blur_bilat.php" <?php disp_popup(); ?>>Bilateral Filtering</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 1 ENDS -->
		<!-- ROW 2 BEGINS-->
		<div class="row">
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row2" style='margin-left: 40px;'>
					<h2>Smoothing Frequency Domain Filters</h2>
					<ul>
						<li class="waves-effect"><a href="#ideal_low_pass" data-toggle="modal">Ideal Low Pass Filter</a></li>
						<li class="waves-effect"><a href="#bw_low_pass" data-toggle="modal">Butterworth Low Pass Filter</a></li>
						<li class="waves-effect"><a href="#gauss_low_pass" data-toggle="modal">Gaussian Low Pass Filter</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row2" style='margin-left: 5%'>
					<h2>Sharpening Frequency Domain Filters</h2>
					<ul>
						<li class="waves-effect"><a href="#ideal_high_pass" data-toggle="modal">Ideal High Pass Filter</a></li>
						<li class="waves-effect"><a href="#bw_high_pass" data-toggle="modal">Butterworth High Pass Filter</a></li>
						<li class="waves-effect"><a href="#gauss_high_pass" data-toggle="modal">Gaussian High Pass Filter</a></li>
						<li class="waves-effect"><a href="#homo_fil" data-toggle="modal">Homomorphic Filtering</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row2">
					<h2>Image Thresholding</h2>
					<ul>
						<li class="waves-effect"><a href="#">Simple Thresholding</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/bin.php" <?php disp_popup(); ?>>&bull; Threshold Binary</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/bin_inv.php" <?php disp_popup(); ?>>&bull; Threshold Binary Inverted</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/trunc.php" <?php disp_popup(); ?>>&bull; Truncate</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/tozero.php" <?php disp_popup(); ?>>&bull; Threshold to Zero</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/tz_inv.php" <?php disp_popup(); ?>>&bull; Threshold to Zero Inverted</a></li>
						</ul>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 2 ENDS -->
		<!-- ROW 3 BEGINS-->
		<div class="row">
			<div class="col-md-4">
				<div id="filter-box" class="zoomdiv row3" style='margin-left: 40px;'>
					<h2>Image Thresholding</h2>
					<ul>
						<li class="waves-effect"><a href="#">Adaptive Thresholding</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/adaptive/mean.php" <?php disp_popup(); ?>>&bull; Mean</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/adaptive/gauss.php" <?php disp_popup(); ?>>&bull; Gaussian</a></li>
						</ul>
						<li class="waves-effect"><a href="#">Otsu&rsquo;s Binarization</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/otsu/otsu.php" <?php disp_popup(); ?>>&bull; Otsu&rsquo;s Thresholding</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/otsu/otsu_gaus.php" <?php disp_popup(); ?>>&bull; After Gaussian Filtering</a></li>
						</ul>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row3" style='margin-left: 5%'>
					<h2>Gaussian Noise Reduction</h2>
					<ul>
						<li class="waves-effect"><a href="filters/noise_reduc_php/noise_reduc.php" <?php disp_popup(); ?>>Noise Reduction</a></li>
						<li class="waves-effect"><a href="filters/noise_reduc_php/noise_reduc_bw.php" <?php disp_popup(); ?>>Noise Reduction For Grayscale Image</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row3">
					<h2>Image Gradients</h2>
					<ul>
						<li class="waves-effect"><a href="filters/img_grad_php/lap.php" <?php disp_popup(); ?>>Laplacian Derivatives</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/sobx.php" <?php disp_popup(); ?>>Sobel X</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/soby.php" <?php disp_popup(); ?>>Sobel Y</a></li>
						<li class="waves-effect"><a href="filters/canny_php/canny.php" <?php disp_popup(); ?>>Canny Edge Detection</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/prewitt_grad.php" <?php disp_popup(); ?>>Prewitt Filter</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 3 ENDS -->
		<!-- ROW 4 BEGINS-->
		<div class="row">
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv row4" style='margin-left: 40px;'>
					<h2>Morphological Transformation</h2>
					<div class="row">
						<div class="col-sm-6">
							<ul>
								<li class="waves-effect"><a href="filters/morph_trans_php/erosion.php" <?php disp_popup(); ?>>Erosion</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/dilation.php" <?php disp_popup(); ?>>Dilation</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/open.php" <?php disp_popup(); ?>>Opening</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/close.php" <?php disp_popup(); ?>>Closing</a></li>
							</ul>
						</div>
						<div class="col-sm-6">
							<ul>
								<li class="waves-effect"><a href="filters/morph_trans_php/grad.php" <?php disp_popup(); ?>>Morphological Gradient</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/that.php" <?php disp_popup(); ?>>Top Hat</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/bhat.php" <?php disp_popup(); ?>>Black Hat</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- ROW 4 ENDS-->

	</div> <!-- CONATINER DIV ENDS -->
	
</body>
</html>
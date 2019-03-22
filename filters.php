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
		<div class='row'> <!-- ROW 1 BEGINS -->
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 400px; width: 400px; margin-left: 40px;'>
					<h2>Simple intensity transformation</h2>
					<ul>
						<li class="waves-effect"><a href="filters/simple_int_trans/negative.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Image Negatives</a></li>
						<li class="waves-effect"><a href="filters/simple_int_trans/cont_stretch_lin.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Contrast Stretching [Linear]</a></li>
						<li class="waves-effect"><a href="filters/simple_int_trans/cont_stretch_nlin.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Contrast Stretching [Non Linear]</a></li>
						<li class="waves-effect"><a data-toggle="modal" href="#range_comp">Range Compression</a></li>
						<li class="waves-effect"><a data-toggle="modal" href="#gamma_trans">Gamma Transformation</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 270px; width: 400px;'>
					<h2>Histograms</h2>
					<ul>
						<li class="waves-effect"><a href="filters/histogram_php/hist_col.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Plot Histogram For Color Image</a></li>
						<li class="waves-effect"><a href="filters/histogram_php/hist_gray.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Plot Histogram For Grayscale Image</a></li>
						<li class="waves-effect"><a href="filters/histogram_php/hist_gray_eq.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Equalization For Grayscale Image</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 340px; width: 400px;'>
					<h2>Image Blurring</h2>
					<ul>
						<li class="waves-effect"><a href="#blur_avg" data-toggle="modal">Averaging</a></li>
						<li class="waves-effect"><a href="#blur_gauss" data-toggle="modal">Gaussian Blurring</a></li>
						<li class="waves-effect"><a href="filters/blur_php/blur_med.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Median Blurring</a></li>
						<li class="waves-effect"><a href="filters/blur_php/blur_bilat.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Bilateral Filtering</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 1 ENDS -->
		<!-- ROW 2 BEGINS-->
		<div class="row">
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 300px; width: 400px; margin-left: 40px;'>
					<h2>Smoothing Frequency Domain Filters</h2>
					<ul>
						<li class="waves-effect"><a href="#ideal_low_pass" data-toggle="modal">Ideal Low Pass Filter</a></li>
						<li class="waves-effect"><a href="#bw_low_pass" data-toggle="modal">Butterworth Low Pass Filter</a></li>
						<li class="waves-effect"><a href="#gauss_low_pass" data-toggle="modal">Gaussian Low Pass Filter</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 350px; width: 400px;'>
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
				<div id="filter-box" class="zoomdiv" style='height: 420px; width: 400px;'>
					<h2>Image Thresholding</h2>
					<ul>
						<li class="waves-effect"><a href="#">Simple Thresholding</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/bin.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Threshold Binary</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/bin_inv.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Threshold Binary Inverted</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/trunc.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Truncate</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/tozero.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Threshold to Zero</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/simple/tz_inv.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Threshold to Zero Inverted</a></li>
						</ul>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 2 ENDS -->
		<!-- ROW 3 BEGINS-->
		<div class="row">
			<div class="col-md-4">
				<div id="filter-box" class="zoomdiv" style='height: 420px; width: 400px; margin-left: 40px;'>
					<h2>Image Thresholding</h2>
					<ul>
						<li class="waves-effect"><a href="#">Adaptive Thresholding</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/adaptive/mean.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Mean</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/adaptive/gauss.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Gaussian</a></li>
						</ul>
						<li class="waves-effect"><a href="#">Otsu&rsquo;s Binarization</a></li>
						<ul>
							<li class="waves-effect"><a href="filters/img_thres_php/otsu/otsu.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; Otsu&rsquo;s Thresholding</a></li>
							<li class="waves-effect"><a href="filters/img_thres_php/otsu/otsu_gaus.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">&bull; After Gaussian Filtering</a></li>
						</ul>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 250px; width: 400px;'>
					<h2>Gaussian Noise Reduction</h2>
					<ul>
						<li class="waves-effect"><a href="filters/noise_reduc_php/noise_reduc.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Noise Reduction</a></li>
						<li class="waves-effect"><a href="filters/noise_reduc_php/noise_reduc_bw.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Noise Reduction For Grayscale Image</a></li>
					</ul>
				</div>
			</div>
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='height: 360px; width: 400px;'>
					<h2>Image Gradients</h2>
					<ul>
						<li class="waves-effect"><a href="filters/img_grad_php/lap.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Laplacian Derivatives</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/sobx.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Sobel X</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/soby.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Sobel Y</a></li>
						<li class="waves-effect"><a href="filters/canny_php/canny.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Canny Edge Detection</a></li>
						<li class="waves-effect"><a href="filters/img_grad_php/prewitt_grad.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Prewitt Filter</a></li>
					</ul>
				</div>
			</div>
		</div> <!-- ROW 3 ENDS -->
		<!-- ROW 4 BEGINS-->
		<div class="row">
			<div class='col-md-4'>
				<div id="filter-box" class="zoomdiv" style='width: 420px; height: 360px; margin-left: 40px;'>
					<h2>Morphological Transformation</h2>
					<div class="row">
						<div class="col-sm-6">
							<ul>
								<li class="waves-effect"><a href="filters/morph_trans_php/erosion.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Erosion</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/dilation.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Dilation</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/open.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Opening</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/close.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Closing</a></li>
							</ul>
						</div>
						<div class="col-sm-6">
							<ul>
								<li class="waves-effect"><a href="filters/morph_trans_php/grad.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Morphological Gradient</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/that.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Top Hat</a></li>
								<li class="waves-effect"><a href="filters/morph_trans_php/bhat.php" data-trigger="focus" data-html="true" data-toggle="popover" title="<b>Please wait...</b>" data-content="<div class='spinner-grow peach-gradient'></div>">Black Hat</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- ROW 4 ENDS-->

	</div> <!-- CONATINER DIV ENDS -->
	
</body>
</html>
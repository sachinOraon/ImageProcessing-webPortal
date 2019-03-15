<?php
	function alert($msg) { echo "<script type='text/javascript'>alert('$msg');</script>"; }
	session_start();
	if(isset($_POST['submit']))
	{
		$_SESSION['kwidth']=$_POST['kwidth'];
		$_SESSION['kheight']=$_POST['kheight'];
		header('Location:filters/blur_php/blur_avg.php');
	}
?>
<!-- Averaging Modal -->
<div class="modal fade" id="blur_avg">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Image Smoothing &#8658; Averaging</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
        <!-- Modal body -->
		<div class="modal-body">
			<p>This is done by convolving image with a normalized box filter.
			It simply takes the average of all the pixels under kernel area and replace the central element.</p>
			<div class="alert alert-success">
				Specify the Width and Height of kernel.
			</div>
			<?php
				if(isset($_SESSION['fname']))
				{
					$imgpath='images/'.$_SESSION['fname'];
					list($width, $height)=getimagesize($imgpath);
					$_SESSION['width']=$width;
					$_SESSION['height']=$height;
					
					echo '<form action="filters.php" method="POST">';
				}
				else
				{
					echo '<div class="alert alert-danger">Upload an image first !</div>';
					echo '<form action="filters.php" method="POST" style="display:none;">';
				}
			?>
				<label for="width">Width : <span id="wval">0</span></label>
				<input type="range" class="custom-range" id="width" name="kwidth" value="1" min="1" max=<?php echo '"'.$_SESSION['width'].'"'; ?>>
				<label for="height">Height : <span id="hval">0</span></label>
				<input type="range" class="custom-range" id="height" name="kheight" value="1" min="1" max=<?php echo '"'.$_SESSION['height'].'"'; ?>>
				<!-- Javascript to show range values -->
				<script>
					var width = document.getElementById("width");
					var wval = document.getElementById("wval");
					var height = document.getElementById("height");
					var hval = document.getElementById("hval");
					wval.innerHTML = width.value;
					hval.innerHTML = height.value;
					width.oninput = function() {
						wval.innerHTML = this.value;
					}
					height.oninput = function() {
						hval.innerHTML = this.value;
					}
				</script>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
			<div class="spinner-border text-success" role="status" style="display:none" id="load"><span class="sr-only"></span></div>
			<?php
				if(isset($_SESSION['fname']))
					echo '<button type="submit" class="btn btn-primary waves-effect" name="submit" onclick="document.getElementById(\'load\').style.display=\'inline\'">Apply</button></form>';
			?>
        </div>
        
      </div>
    </div>
</div>
<!-- Averaging Modal Ends -->
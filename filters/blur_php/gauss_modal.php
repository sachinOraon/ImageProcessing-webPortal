<!-- Gaussian Blurring Modal -->
<div class="modal fade" id="blur_gauss">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Image Smoothing &#8658; Gaussian Blurring</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>In this gaussian kernel is used. We should specify the width and height of kernel which should be positive and odd. We also should specify the standard deviation in X and Y direction, sigmaX and sigmaY respectively.
				If both are given as zeros, they are calculated from kernel size. Gaussian blurring is highly effective in removing gaussian noise from the image.</p>
				<div class="alert alert-success">
					Specify the Width and Height of kernel.
				</div>
				<?php
				if(isset($_SESSION['fname']))
				{
					$imgpath='images/'.$_SESSION['fname'];
					echo '<form action="filters.php" method="POST">';
				}
				else
				{
					echo '<div class="alert alert-danger">Upload an image first !</div>';
					echo '<form action="filters.php" method="POST" style="display:none;">';
				}
				?>
					<label>Width : <span id="spn_kWgaus">5</span></label>
					<input type="range" class="custom-range" id="inp_kWgaus" name="inp_kWgaus" value="5" min="1" step="2" max="30">
					<label>Height : <span id="spn_kHgaus">5</span></label>
					<input type="range" class="custom-range" id="inp_kHgaus" name="inp_kHgaus" value="5" min="1" step="2" max="30">
					<!-- Javascript to show range values -->
					<script>
						var inp_kWgaus = document.getElementById("inp_kWgaus");
						var spn_kWgaus = document.getElementById("spn_kWgaus");
						var inp_kHgaus = document.getElementById("inp_kHgaus");
						var spn_kHgaus = document.getElementById("spn_kHgaus");
						spn_kWgaus.innerHTML = inp_kWgaus.value;
						spn_kHgaus.innerHTML = inp_kHgaus.value;
						inp_kWgaus.oninput = function() {
							spn_kWgaus.innerHTML = this.value;
						}
						inp_kHgaus.oninput = function() {
							spn_kHgaus.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_gaus" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="blur_gaus" onclick="document.getElementById(\'load_gaus\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Gaussian Blurring Modal Ends -->
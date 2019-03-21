<!-- Homomorphic Modal -->
<div class="modal fade" id="homo_fil">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Homomorphic Filtering</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>Homomorphic Filtering can be used for improving the appearance of a grayscale image by simultaneous intensity range compression (illumination) and contrast enhancement (reflection).
				It simultaneously normalizes the brightness across an image and increases contrast. Here we&rsquo;ve used <strong>Gaussian High Pass Filter</strong> as a frequency domain filter.</p>
				<?php
					if(isset($_SESSION['fname']))
					{
						$imgpath='images/'.$_SESSION['fname'];
						list($width, $height)=getimagesize($imgpath);
						$_SESSION['imgw']=$width;
						$_SESSION['imgh']=$height;
					
						echo '<form action="filters.php" method="POST">';
					}
					else
					{
						echo '<div class="alert alert-danger">Upload an image first !</div>';
						echo '<form action="filters.php" method="POST" style="display:none;">';
					}
				?>
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_varcfh">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_varcfh" name="inp_varcfh" value="50" min="1" max="100" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_varcfh = document.getElementById("inp_varcfh");
						var spn_varcfh = document.getElementById("spn_varcfh");

						spn_varcfh.innerHTML = inp_varcfh.value;
						inp_varcfh.oninput = function() {
							spn_varcfh.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_homo_fil" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="homo_fil" onclick="document.getElementById(\'load_homo_fil\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Homomorphic Modal Ends -->
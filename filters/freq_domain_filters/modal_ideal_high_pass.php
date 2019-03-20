<!-- Ideal high pass Modal -->
<div class="modal fade" id="ideal_high_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Ideal High Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>It cuts off all high frequency components that are a specified distance D<sub>0</sub> from the origin of the transform. Changing the distance changes the behaviour of the filter.
				The lowpass filters are radially symmetric about the origin. A high-pass filter can be obtained from a low-pass filter using :</p>
				<img src='filters/freq_domain_filters/ideal_high_pass.png' class="rounded mx-auto d-block"><br>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_ihpcf">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_ihpcf" name="inp_ihpcf" value="50" min="1" max="100" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_ihpcf = document.getElementById("inp_ihpcf");
						var spn_ihpcf = document.getElementById("spn_ihpcf");

						spn_ihpcf.innerHTML = inp_ihpcf.value;
						inp_ihpcf.oninput = function() {
							spn_ihpcf.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_ihp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="ideal_high_pass" onclick="document.getElementById(\'load_ihp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Ideal high pass Modal Ends -->
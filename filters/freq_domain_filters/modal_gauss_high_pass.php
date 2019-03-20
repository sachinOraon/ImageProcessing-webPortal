<!-- Gaussian high pass Modal -->
<div class="modal fade" id="gauss_high_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Gaussian High Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>2D Gaussian High Pass Filter is given by :</p><img src='filters/freq_domain_filters/gauss_high_pass.png' class="rounded mx-auto d-block"><br><p>where <b>D<sub>0</sub></b> is the cutoff frequency.</p>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_ghpcf">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_ghpcf" name="inp_ghpcf" value="50" min="1" max="100" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_ghpcf = document.getElementById("inp_ghpcf");
						var spn_ghpcf = document.getElementById("spn_ghpcf");

						spn_ghpcf.innerHTML = inp_ghpcf.value;
						inp_ghpcf.oninput = function() {
							spn_ghpcf.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_ghp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="gauss_high_pass" onclick="document.getElementById(\'load_ghp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Gaussian low pass Modal Ends -->
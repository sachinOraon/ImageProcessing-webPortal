<!-- Gaussian low pass Modal -->
<div class="modal fade" id="gauss_low_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Gaussian Low Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>2D Gaussian Low Pass Filter is given by :</p><img src='filters/freq_domain_filters/gauss_low_pass.png' class="rounded mx-auto d-block"><br><p>where <b>D<sub>0</sub></b> is the cutoff frequency.</p>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_cfreqG">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_cfreqG" name="inp_cfreqG" value="50" min="1" max="100" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_cfG = document.getElementById("inp_cfreqG");
						var spn_cfG = document.getElementById("spn_cfreqG");

						spn_cfG.innerHTML = inp_cfreqG.value;
						inp_cfG.oninput = function() {
							spn_cfG.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_glp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="gauss_low_pass" onclick="document.getElementById(\'load_glp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Gaussian low pass Modal Ends -->
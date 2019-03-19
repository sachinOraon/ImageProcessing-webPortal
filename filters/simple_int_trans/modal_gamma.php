<!-- Gamma Modal -->
<div class="modal fade" id="gamma_trans">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Gamma Transformation</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>It is also known as Power-Law transformation. A variety of devices used for image capture, printing, and display respond according to a power law.
				The process used to correct these power-law response phenomenon is called gamma correction. Gamma transformation is applied through matlab using this function :</p>
				<div class="alert alert-info"><code>newImg = imadjust(img, [], [], g)</code></div>
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
					<div class="alert alert-success">Specify the value for <strong><var>g : </var><span id="spn_varG">5</span></strong></div>
					<input type="range" class="custom-range" id="inp_varG" name="inp_varG" value="5" min="1" max="10" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_varG = document.getElementById("inp_varG");
						var spn_varG = document.getElementById("spn_varG");

						spn_varG.innerHTML = inp_varG.value;
						inp_varG.oninput = function() {
							spn_varG.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_gamma_trans" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="gamma_trans" onclick="document.getElementById(\'load_gamma_trans\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Gamma Transformation Modal Ends -->
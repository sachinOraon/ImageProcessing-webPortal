<!-- Butterworth low pass Modal -->
<div class="modal fade" id="bw_low_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Butterworth Low Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>To eliminate ringing effect we have to remove the sharp cut offs in frequency domain. So Butterworth filter are used, they remove the ringing effect
				but upto a certain limit. Butterworth Low Pass Filter is given by :</p><img src='filters/freq_domain_filters/bw_low_pass.png' class="rounded mx-auto d-block"><br>
				<p>where <b>D<sub>0</sub></b> is the cutoff frequency and <b>n</b> is the order of filter.</p>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_cfblp">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_cfblp" name="inp_cfblp" value="50" min="1" max="100" step="1">
					<div class="alert alert-success">Specify the order of filter <strong>n : <span id="spn_oblp">5</span></strong></div>
					<input type="range" class="custom-range" id="inp_oblp" name="inp_oblp" value="5" min="1" max="10" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_cfblp = document.getElementById("inp_cfblp");
						var spn_cfblp = document.getElementById("spn_cfblp");
						var inp_oblp = document.getElementById("inp_oblp");
						var spn_oblp = document.getElementById("spn_oblp");

						spn_cfblp.innerHTML = inp_cfblp.value;
						inp_cfblp.oninput = function() {
							spn_cfblp.innerHTML = this.value;
						}
						spn_oblp.innerHTML = inp_oblp.value;
						inp_oblp.oninput = function() {
							spn_oblp.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_blp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="bw_low_pass" onclick="document.getElementById(\'load_blp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Ideal low pass Modal Ends -->
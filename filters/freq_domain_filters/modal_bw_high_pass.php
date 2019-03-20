<!-- Butterworth high pass Modal -->
<div class="modal fade" id="bw_high_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Butterworth High Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>This is given by :</p><img src='filters/freq_domain_filters/bw_high_pass.png' class="rounded mx-auto d-block"><br>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_cfbhp">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_cfbhp" name="inp_cfbhp" value="50" min="1" max="100" step="1">
					<div class="alert alert-success">Specify the order of filter <strong>n : <span id="spn_obhp">5</span></strong></div>
					<input type="range" class="custom-range" id="inp_obhp" name="inp_obhp" value="5" min="1" max="10" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_cfbhp = document.getElementById("inp_cfbhp");
						var spn_cfbhp = document.getElementById("spn_cfbhp");
						var inp_obhp = document.getElementById("inp_obhp");
						var spn_obhp = document.getElementById("spn_obhp");

						spn_cfbhp.innerHTML = inp_cfbhp.value;
						inp_cfbhp.oninput = function() {
							spn_cfbhp.innerHTML = this.value;
						}
						spn_obhp.innerHTML = inp_obhp.value;
						inp_obhp.oninput = function() {
							spn_obhp.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_bhp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="bw_high_pass" onclick="document.getElementById(\'load_bhp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Butterworth high pass Modal Ends -->
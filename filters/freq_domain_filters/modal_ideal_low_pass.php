<!-- Ideal low pass Modal -->
<div class="modal fade" id="ideal_low_pass">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Ideal Low Pass Filter</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>It cuts off all high frequency components that are a specified distance D<sub>0</sub> from the origin of the transform. Changing the distance changes the behaviour of the filter.
				The lowpass filters are radially symmetric about the origin.</p>
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
					<div class="alert alert-success">Specify the cutoff frequency <strong>D<sub>0</sub> : <span id="spn_cfreq">50</span></strong></div>
					<input type="range" class="custom-range" id="inp_cfreq" name="inp_cfreq" value="50" min="1" max="100" step="1">
					<!-- Javascript to show range values -->
					<script>
						var inp_cf = document.getElementById("inp_cfreq");
						var spn_cf = document.getElementById("spn_cfreq");

						spn_cf.innerHTML = inp_cfreq.value;
						inp_cf.oninput = function() {
							spn_cf.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_ilp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="ideal_low_pass" onclick="document.getElementById(\'load_ilp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Ideal low pass Modal Ends -->
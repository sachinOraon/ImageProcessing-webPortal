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
					<label>Width : <span id="spn_kWavg">5</span></label>
					<input type="range" class="custom-range" id="inp_kWavg" name="inp_kWavg" value="5" min="1" max=<?php echo '"'.$_SESSION['imgw'].'"'; ?>>
					<label>Height : <span id="spn_kHavg">5</span></label>
					<input type="range" class="custom-range" id="inp_kHavg" name="inp_kHavg" value="5" min="1" max=<?php echo '"'.$_SESSION['imgh'].'"'; ?>>
					<!-- Javascript to show range values -->
					<script>
						var inp_kWavg = document.getElementById("inp_kWavg");
						var spn_kWavg = document.getElementById("spn_kWavg");
						var inp_kHavg = document.getElementById("inp_kHavg");
						var spn_kHavg = document.getElementById("spn_kHavg");
						spn_kWavg.innerHTML = inp_kWavg.value;
						spn_kHavg.innerHTML = inp_kHavg.value;
						inp_kWavg.oninput = function() {
							spn_kWavg.innerHTML = this.value;
						}
						inp_kHavg.oninput = function() {
							spn_kHavg.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_avg" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="blur_avg" onclick="document.getElementById(\'load_avg\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Averaging Modal Ends -->
<!-- Range Compression Modal -->
<div class="modal fade" id="range_comp">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Range Compression</h4>
				<button type="button" class="close" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
			</div>
        
			<!-- Modal body -->
			<div class="modal-body">
				<p>Compression of Dynamic Range is applied through Log Transformation. The general form is as follows -</p>
				<div class="alert alert-info"><code><var>x</var> = <var>c * log</var><sub>10</sub>(1 + <var>r</var>)</code></div>
				<div class="alert alert-success">Specify the range for <var>c</var></div>
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
					<label><strong>c : <span id="spn_varC">5</span></strong></label>
					<input type="range" class="custom-range" id="inp_varC" name="inp_varC" value="5" min="1" max="100" step="0.1">
					<!-- Javascript to show range values -->
					<script>
						var inp_varC = document.getElementById("inp_varC");
						var spn_varC = document.getElementById("spn_varC");

						spn_varC.innerHTML = inp_varC.value;
						inp_varC.oninput = function() {
							spn_varC.innerHTML = this.value;
						}
					</script>
					<div class="modal-footer">
						<div id="load_range_comp" class="spinner-border text-success" style="display: none"></div>
						<?php
						if(isset($_SESSION['fname']))
							echo '<button type="submit" class="btn btn-primary waves-effect" name="range_comp" onclick="document.getElementById(\'load_range_comp\').style.display=\'block\'">Apply</button>';
						?>
					</div>
				</form>
			</div>
		</div>
    </div>
</div>
<!-- Range compression Modal Ends -->
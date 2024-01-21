<div class="container" style="margin-top: 200px; margin-bottom: 200px;">

	<div class="row col-md-12">
		<center>
			<h3>Your OTP Here</h3>


			<?php if($this->session->flashdata('del')): ?>
            <div class="alert alert-danger" role="alert" style="margin-top: 25px;">
              <?php echo $this->session->flashdata('del'); ?>
            </div>
          <?php endif; ?>

          
			<form name="" action="<?=base_url()?>Home/otpverify" method="post">
			<input type="number" name="otp" placeholder="OTP" required class="form-control">
			<br>
			<input type="submit" name="" class="btn btn-primary">
			</form>
		</center>
	</div>
</div>
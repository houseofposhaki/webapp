

<body>
	<div class="blank-body-page-area">
		<div class="body-text-bb-area">
			<?php if($this->session->flashdata('del')): ?>
				<div class="alert alert-danger" role="alert" style="margin-top: 25px;">
					<?php echo $this->session->flashdata('del'); ?>
				</div>
			<?php endif; ?>
			<?php if($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert" style="margin-top: 25px;">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
			<div class="col-md-12">
				<center>
					<form name="" method="post" action="<?=base_url();?>Pages/subscribenewletter">
						<div class="col-md-6">
							<input type="email" name="email" class="form-control" placeholder="Enter Your valid Email ID" required>				
						</div>
						<div class="center">
							<input type="submit" value="Submit" class="btn btn-primary">
						</div>
					</form>
				</center>

			</div>
		</div>
	</div>



</body>
</html>

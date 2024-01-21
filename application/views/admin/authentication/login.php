<!DOCTYPE html>



<html>



<head>



	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<title>House Of Poshaki</title>

<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/front/images/logo.png" >

	



	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">



	<link rel="stylesheet" href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css">



	<link rel="shortcut icon" href="<?php echo base_url();?>assets/front/images/logo.png" />



<!-- 	<script src='https://www.google.com/recaptcha/api.js'></script> -->



	<style>



		body::after {



			content: "";



			background: blue;



			z-index: -1;



		}



	</style>



</head>







<body class="hold-transition login-page" style="">



	<div class="login-box">



		<div class="login-logo">



			<img style="height: 120px;width: 150px;" src="<?php echo base_url()?>assets/sitelogo.png">



		</div>



		<div class="card">



			<div class="card-body login-card-body">



				<p class="login-box-msg">Sign in to start your session</p>



				<?php if(!empty($this->session->flashdata('loginFailed'))) { ?>



					<span class="alert alert-danger"><?php echo $this->session->flashdata('loginFailed');?></span>



				<?php } ?>



				<form action="<?php echo base_url();?>admin/loginauth" method="post">



					<div class="input-group mb-3">



						<input type="text" class="form-control" name="username" required>



						<div class="input-group-append">



							<div class="input-group-text">



								<i class="lni-envelope"></i>



							</div>



						</div>



					</div>







					<div class="input-group mb-3">



						<input type="password" class="form-control" placeholder="Password" name="password" required>



						<div class="input-group-append">



							<div class="input-group-text">



								<i class="lni-lock"></i>



							</div>



						</div>



					</div>







			 	<!-- <div class="g-recaptcha" data-sitekey="6LdC17oUAAAAALj50gEaFbK-YfKdhCwSOc-N5LQu"></div> -->

			 	<!-- <div class="g-recaptcha" data-sitekey="6LdC17oUAAAAALj50gEaFbK-YfKdhCwSOc-N5LQu"></div>        

			 	

			 					<div class="error"><font color="red"><strong><?php //echo $this->session->flashdata('flashSuccess');?></strong></font>

			 					</div>

			 	 -->

					<div class="row">



						<div class="col-4">



							<button type="submit" class="btn btn-primary btn-block btn-flat mt-3" name="signin"><i class="lni-unlock"></i> Sign in</button>



						</div>



						<div class="col-12">



							<span class="small mt-3"></span>



						</div>



					</div>



				</form>



			</div>



		</div>



	</div>







	<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>



	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>



</html>








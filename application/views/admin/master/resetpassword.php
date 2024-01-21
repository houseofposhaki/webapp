<?php

 $userid =  $this->session->userdata['logged_in']['id'];

?>



<div class="content-wrapper mt-3">

	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->
			
			<!--action="<?php //echo base_url()?>Authentication/updatepass"-->

			<form action="<?php echo base_url()?>admin/Authentication/updatepass" method="post" onsubmit="return validateSubmit()">

				<div class="row">

		 			<div class="col-md-12">

						<div class="card card-primary">
			 				<div class="card-header">
								<h3 class="card-title">Change Password</h3>
							</div>

							<div class="card-body">

    								<input type="hidden" name="userid" value="<?=$userid?>">
    								<div class="row">
        								<div class="col-6">
        									<div class="form-group">
        										<label>Enter a new Password:</label>
        										<div class="input-groups">
        											<input type="password" name="newpass" class="form-control float-right" minlength="8" required onkeyup="CheckPasswordStrength(this.value)">
        											<small id="passwordHelpBlock" class="form-text text-muted">
                                                      Password must be 8 characters long and must combine uppercase and lowercase letters, numbers and symbols (@$!%*#?&). Only Strong Password will be accepted.
                                                    </small>
        
        										</div>
        										
        									</div>
        								</div>
        								<div class="col-2">
        								    <div class="form-group">
        								        <label style="display: block;">&nbsp;</label>
        								        <span id="password_strength" style="padding-top: 5px;"></span>
        								    </div>
        								</div>
    								</div>
    																			
    								<?php $msg = $this->session->flashdata('existpass'); 
    								if(isset($msg)){
    								?>
    								<p><font color="red"><?php echo $msg?></font></p>
    								<?php } ?>
    								<div class="col-6">
    									<input type="submit" class="btn btn-primary" name="save">
    								</div>
							</div> <!-- /.card-body -->

						</div> <!-- /.card -->

					</div> <!-- /.col-md-12 -->

				</div>

			</form>

		</div><!-- /.container-fluid -->

	</section>

</div><!-- /.content-wrapper -->



<script type="text/javascript">
    function CheckPasswordStrength(password) {
        var password_strength = document.getElementById("password_strength");
 
        //TextBox left blank.
        if (password.length == 0) {
            password_strength.innerHTML = "";
            return;
        }
 
        //Regular Expressions.
        var regex = new Array();
        regex.push("[A-Z]"); //Uppercase Alphabet.
        regex.push("[a-z]"); //Lowercase Alphabet.
        regex.push("[0-9]"); //Digit.
        regex.push("[$@$!%*#?&]"); //Special Character.
 
        var passed = 0;
 
        //Validate for each Regular Expression.
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                passed++;
            }
        }
 
        //Validate for length of Password.
        if (passed > 2 && password.length > 8) {
            passed++;
        }
 
        //Display status.
        var color = "";
        var strength = "";
        switch (passed) {
            case 0:
            case 1:
                strength = "Weak";
                color = "red";
                break;
            case 2:
            case 3:
                strength = "Good";
                color = "darkorange";
                break;                
            case 4:
            case 5:
                strength = "Strong";
                color = "darkgreen";
                break;
        }
        password_strength.innerHTML = strength;
        password_strength.style.color = color;
    }
    
    function validateSubmit() {
        if (document.getElementById('password_strength').innerHTML.indexOf("Strong") != -1) {
            return true;
        } else {
            return false;
        }
        
    }
</script>
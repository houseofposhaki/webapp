

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login mt-60">
    <div class="container">
        <div class="row">
           <!--login area start-->
           <div class="col-lg-6 col-md-6">
            <div class="account_form">
                <h2>Register</h2>
                 <?php if($this->session->flashdata('del')): ?>


            <div class="alert alert-danger" role="alert" style="margin-top: 25px;">


              <?php echo $this->session->flashdata('del'); ?>


            </div>

            
    <style>
        .contactform-buttons {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
    </style>


          <?php endif; ?>
                <form method="post" action="<?php echo base_url();?>Home/signupsave" id="myform">


                    <p>   
                        <label>Full Name <span>*</span></label>
                        <input type="text" placeholder="Full Name" required="" name="fullname">

                    </p>
                    <p>   
                        <label>Email <span>*</span></label>
                        <input type="email" placeholder="Enter your Email" required id="email" name="username">
                    </p> 
                    <p>   
                        <label>Phone No <span>*</span></label>
                        <input type="text"  placeholder="Phone Number" required 
                        name="phone" maxlength="10" minlength="10">
                    </p> 

                    <p>   
                        <label>Password <span>*</span></label>
                        <input type="password" placeholder="Enter your Password" name="password" required="">

                    </p>   

                    <div class="login_submit">
                       <!-- <a href="#">Lost your password?</a> -->
                       <label for="remember">
                        <input id="remember" type="checkbox">
                        Remember me
                    </label>
                    <button type="submit" id="submit">Register</button>

                </div>

            </form>
           <b> <p>Already have account ? <a href="<?=base_url();?>securelogin"><b>Login here<</a> </p> </b>

        </div>    
    </div>
    <!--login area start-->
</div>
</div>    
</div>
<script>
        $(document).ready(function () {
            $('.error').hide();
            $('#submit').click(function () {
                var email = $('#email').val();
 
                if (email == '') {
                    $('#email').next().show();
                    return false;
                }
                if (IsEmail(email) == false) {
                    $('#invalid_email').show();
                    return false;
                }
                $.post("", $("#myform").serialize(), 
                function (response) {
                    $('#myform').fadeOut('slow', function () {
                        $('#correct').html(response);
                        $('#correct').fadeIn('slow');
                    });
                });
                return false;
            });
        });
        function IsEmail(email) {
            var regex =
/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                return false;
            }
            else {
                return true;
            }
        }
    </script>
<!-- customer login end -->

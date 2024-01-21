



<!--breadcrumbs area start-->

<div class="breadcrumbs_area">

    <div class="container">   

        <div class="row">

            <div class="col-12">

                <div class="breadcrumb_content">

                    <ul>

                        <li>Login</li>

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

                <h2>login</h2>

                <?php if($this->session->flashdata('del')): ?>

            <div class="alert alert-danger" role="alert" style="margin-top: 25px;">
              <?php echo $this->session->flashdata('del'); ?>
            </div>
          <?php endif; ?>

          <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success" role="alert" style="margin-top: 25px;">
              <?php echo $this->session->flashdata('msg'); ?>
            </div>
          <?php endif; ?>

                <form method="post" action="<?=base_url();?>Front/loginchk">



                    <p>   

                        <label>Username or email <span>*</span></label>

                        <input type="email" placeholder="Email or Username" required name="username">

                    </p>

                    <p>   

                        <label>Passwords <span>*</span></label>

                        <input type="password" placeholder="Enter your Password" required name="password">



                    </p>   

                    <div class="login_submit">

                       <!-- <a href="#">Lost your password?</a> -->

                       <label for="remember">

                        <input id="remember" type="checkbox">

                        Remember me

                    </label>

                    <button type="submit">login</button>



                </div>



            </form>

            

            <p>Don't have an account? <a href="<?=base_url();?>signup">
                <strong>Create One</strong></a> </p>



        </div>    

    </div>

    <!--login area start-->

</div>

</div>    

</div>

<!-- customer login end -->


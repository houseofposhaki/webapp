<?php 
/*if(!empty($url))
{
  $requrl =  $url['urlis'];
}else{
  $requrl = base_url();
}*/
?>



<div class="menu-overlay"></div>

<?php include "includes/nav.php"; ?>





<!-- Main Wrapper Start -->



<div class="section_sin">



  <div class="container">



    <div class="andro_auth-wrapper">



      <div class="andro_auth-description bg-cover bg-center dark-overlay dark-overlay-2" 



      style="background-image: url('<?=base_url();?>assets/front/auth.png')">



        <div class="andro_auth-description-inner"> <i class="flaticon-diet"></i>



          <h2>Eamazonite</h2>



        </div>



      </div>



      <div class="andro_auth-form">



        <h2>Log in</h2>



        <form method="post" action="<?=base_url();?>Front/loginchk">


          <div class="form-group">



            <input type="text" class="form-control" placeholder="Username" name="username" value="">



          </div>



          <div class="form-group">



            <input type="password" class="form-control" placeholder="Password" name="password" value="">



          </div>



          <a href="#">Forgot Password?</a>



          <button type="submit" class="andro_btn-custom primary">Log in</button>



          <div class="andro_auth-seperator"> <span>OR</span> </div>



          <p>Don't have an account? <a href="<?=base_url();?>signup">Create One</a> </p>



        </form>





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





      </div>



    </div>



  </div>



</div>








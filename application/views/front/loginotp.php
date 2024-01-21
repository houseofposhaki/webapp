
  
  <!-- Main Wrapper Start -->
  <div class="section_sin">
    <div class="imgs-wrapper">
      <img src="<?=base_url()?>assets/front/images/1.png" alt="veg" class="d-none d-lg-block">
      <img src="<?=base_url()?>assets/front/images/14.png" alt="veg" class="d-none d-lg-block">
    </div>

    <?php 
    if(!empty($res))
    {
        $mobile =  $res['mobile']; 
        $otp =  $res['otp']; 
    }else{
      $mobile = "";
      $otp = "";
    }
    
    ?>
    
    <div class="container">
      <div class="andro_auth-wrapper">


        <div class="andro_auth-form">

          <h2>OTP Verification</h2>

          <form method="post" action="<?php echo base_url();?>Front/loginchk" name="">
            <input type="hidden" name="postmobile" value="<?=$mobile?>">
            <div class="form-group">
              <input type="number" class="form-control"  placeholder="OTP Here.." name="postotp" required>
            </div>

            <button type="submit" class="andro_btn-custom primary" name="signup">Verify</button>
          </form>



           <?php if($this->session->flashdata('del')): ?>


            <div class="alert alert-danger" role="alert" style="margin-top: 25px;">


              <?php echo $this->session->flashdata('del'); ?>


            </div>


          <?php endif; ?>
        </div>

      </div>
    </div>
  </div>
  <!-- Main Wrapper End --> 
</body>
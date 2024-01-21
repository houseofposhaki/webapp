



  <!-- Main Wrapper Start -->



  <div class="section_sin">



    <div class="imgs-wrapper">



      <!-- <img src="<?=base_url();?>assets/front/images/1.png" alt="veg" class="d-none d-lg-block">

      <img src="<?=base_url();?>assets/front/images/14.png" alt="veg" class="d-none d-lg-block"> -->



    </div>



    <div class="container">



      <div class="andro_auth-wrapper">







        <div class="andro_auth-description bg-cover bg-center dark-overlay dark-overlay-2" 



        style="background-image: url('<?=base_url();?>assets/front/auth.png')">



        



        </div>



        <div class="andro_auth-form">







          <h2>Seller Sign Up</h2>







          <form method="post" action="<?php echo base_url();?>Home/sellersignupsave" name="">







            <div class="form-group">



              <input type="text" class="form-control" placeholder="Full Name" name="fullname" required>



            </div>



            <div class="form-group">



              <input type="email" class="form-control form-control-light" placeholder="Email Address" required 
              name="username" value="">



            </div>


            <div class="form-group">
              <input type="number" class="form-control form-control-light" placeholder="Phone Number" required 
              name="phone" maxlength="10" minlength="10">
            </div>



            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>



             <div class="form-group">
              
              <select name="pincode" class="form-control" required>
                <option value="">-Select Pincode-</option>
                <?php 
              $pinres = $this->db->query("select * from pincode ")->result_array();
              foreach($pinres as $pinrows) { 
              ?>
                <option value="<?php echo $pinrows['pin'];?>"><?php echo $pinrows['pin'];?></option>
            <?php } ?>
              </select>
            </div>


              
              <p> <input type="checkbox" required name="">I agree the 
              <a href="<?=base_url()?>pages/vendor-terms-and-conditions">Terms & Condiitons</a> of seller registration. </p>



            <button type="submit" class="andro_btn-custom primary" name="signup">Sign Up</button>




            <p>Already have an account? <a href="<?=base_url();?>sellerlogin">Login</a> </p>







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



  








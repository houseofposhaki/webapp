
 
<?php 

  $userid = $this->session->userdata['logged_in']['id'];
  $userdetails = $this->db->query("select * from user where id='$userid'")->result_array();
  if(!empty($userdetails))
  {
      $fullname = $userdetails[0]['fullname'];    
      $username = $userdetails[0]['username'];    
      $mobile = $userdetails[0]['mobile'];    
      $address = $userdetails[0]['address'];    
      $password = base64_decode($userdetails[0]['password']);    
  }
?>

    
        <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?=base_url()?>">home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
   <!-- my account start  -->
    <section class="main_content_area">
        <div class="container">   
            <div class="account_dashboard">
                <div class="row">
                    

                          <?php include "left.php"; ?>

                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                           <form method="post" action="<?php echo base_url(); ?>Home/accountupdate" name="">







                      <div class="form-group">


                        <input type="hidden" name="userid" value="<?= $userid ?>">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" required
                          value="<?= $fullname ?>">



                      </div>



                      <div class="form-group">



                        <input type="email" class="form-control form-control-light" placeholder="Email Address" required
                          name="username" value="<?= $username ?>">



                      </div>


                      <div class="form-group">
                        <input type="number" class="form-control form-control-light" placeholder="Phone Number" readonly
                          required name="mobile" maxlength="10" minlength="10" value="<?= $mobile ?>">
                      </div>


                      <div class="form-group">
                        <textarea name="address" placeholder="Full Address"
                          class="form-control"><?php echo $address; ?></textarea>
                      </div>

                      <button type="submit" class="andro_btn-custom primary" name="signup">Update</button>


                    </form>



                    <?php if ($this->session->flashdata('del')): ?>


                      <div class="alert alert-danger" role="alert" style="margin-top: 25px;">


                        <?php echo $this->session->flashdata('del'); ?>


                      </div>


                    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>  
        </div>          
    </section>          
    <!-- my account end   --> 
    
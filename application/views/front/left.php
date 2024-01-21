

<?php 

if(!empty($this->session->userdata['logged_in']['id']))

{

  $userid = $this->session->userdata['logged_in']['id'];

  $userdetails = $this->db->query("select * from user where id='$userid'")->result_array();

  if(!empty($userdetails))

  {

      $fullname = $userdetails[0]['fullname'];    

      $username = $userdetails[0]['username'];    

      $mobile = $userdetails[0]['mobile'];    

      $address = $userdetails[0]['address'];    

      $password = base64_decode($userdetails[0]['password']);    

  }else{

    $fullname="";

    $username="";

    $mobile="";

    $address="";

    $password="";

}

}

?>

<div class="col-sm-12 col-md-3 col-lg-3">

    <!-- Nav tabs -->

    <div class="dashboard_tab_button">

        <ul role="tablist" class="nav flex-column dashboard-list">

             <h4>Welcome</h4>

        <p><?php if(!empty($fullname)) {echo $fullname ; } ?></p>

        <li><a href="<?=base_url()?>myaccount"  class="nav-link">My Profile</a></li>

      <li><a href="<?=base_url()?>Cart/myorders"  class="nav-link">My Orders</a></li>

      <li><a href="<?=base_url()?>Cart/cartlist"  class="nav-link">My Cart</a></li>

      <li><a href="<?=base_url()?>help"  class="nav-link">Help & Support</a></li>

      

      <?php 

        if(!empty($this->session->userdata['logged_in']['id']))

        {

        ?>

        <li><a href="<?php echo base_url()?>admin/Authentication/logout"  class="nav-link">Logout</a></li>

      <?php } ?>



              

      </div>

     

    </div>    

</div>
<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Medcem Pharmacy</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/front/images/logo.png">


  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/dataTables.bootstrap4.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/style.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/OverlayScrollbars.min.css">

 <!--  <link rel="stylesheet" href="<?php //echo base_url();?>assets/dist/css/daterangepicker.css"> -->

  <!--link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/summernote-bs4.css"-->  	<link rel="stylesheet" href="https://designalogoo.com/public/admin/css/summernote.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="stylesheet" href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/intlTelInput.min.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/datepicker.min.css">

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dates/jquery-ui.multidatespicker.css">

  <!-- jQuery -->

  <script src="<?php echo base_url(); ?>assets/dist/js/jquery.min.js"></script>

 </head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <?php

      $userid = $this->session->userdata['logged_in']['id'];

      $usertype = $this->session->userdata['logged_in']['usertype'];

      $ci = &get_instance();

      $this->db->select('*');

      $this->db->from('user');

      $this->db->join('userrole','userrole.id=user.usertype');

      $this->db->where('user.id',$userid);

      $res = $this->db->get()->result_array();

    //  $usertypeid =  $res[0]['usertype'];

      //$rolename = $res[0]['rolename'];

    ?>

    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link" data-widget="pushmenu" href="#"><i class="lni-menu"></i></a>

        </li>

    </ul>

    <ul class="navbar-nav ml-auto">



        <li class="nav-item">

            <a  class="nav-link">

                <?php echo 'Welcome '.$fullname = $this->session->userdata['logged_in']['fullname'].' ('.$usertype.')'; ?>

            </a>

        </li>



        <?php if($usertype=="9") { ?>

    	<li class="nav-item">

    		<a class="nav-link" href="#" data-toggle="popover" data-placement="bottom" data-content="Money receipt created with third party details. Please approve or reject them. <a href='<?php echo base_url(); ?>moneyreceiptlist' class='btn btn-sm btn-primary mt-2'>Check Money Receipt</a>">

    			<i class="lni-alarm mr-0"></i>

          <span class="notifycount">

            <?php 

            $this->db->select('*');

            $this->db->from('moneyrcpt');

            $this->db->where('status','2');

            $q=$this->db->get();

            $r = $q->num_rows();

            echo $r;

            ?>

          </span>

    		</a>

    	</li>  

       <?php } ?>



        <li class="nav-item">

            <a class="nav-link" href="<?php echo base_url()?>admin/Authentication/logout" onclick="return confirm('Are you sure to logout?')">

                <!-- <i class="lni-power-switch" style="font-weight: bold; color: #D22C26; font-size: 24px;"></i> -->

                <button class="btn-primary">Logout</button>

            </a>

        </li>

        

        <!--test-->

        <!--<button onclick="sidebar_clsp()" class="crm-collapse d-block btn btn-light" style><i class="lni-menu"></i></button>-->

        <!--test-->

        

    </ul>

  </nav>

  

  

<!-------------------------------------------------->

<!-------------CUSTOM ANB DESIGNER WORK------------->

<!-------------------------------------------------->



<script>

    // collapse sidebar in mobile devices

   function sidebar_clsp() {

       var element = document.getElementById("clsp-sidebar-1");

       element.classList.toggle("mystyle");

       var x = document.getElementsByClassName("content-wrapper");

       x.classList.toggle("slide-content-wrapper");

    }

</script>



<script>

// wrap a class around table for the responsive

jQuery( document ).ready(function() {

    jQuery( "table" ).wrap( "<div class='table-responsive'></div>" );

});

</script>


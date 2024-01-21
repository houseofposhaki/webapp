<?php

$contactres = $this->db->query("select * from  contactpg where id='1' ")->result_array();

foreach($contactres as $contactrow)

{

   $contactinfo = $contactrow['contactinfo'];

   $address = $contactrow['address'];

   $email = $contactrow['email'];

   $fburl = $contactrow['fburl'];

   $twitterurl = $contactrow['twitterurl'];

   $instaurl = $contactrow['instaurl'];

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
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
   
    <!--contact area start-->
    <div class="contact_area mt-60">
        <div class="container">   
            <?php if($this->session->flashdata('msg')): ?>
                                <div class="alert alert-success" role="alert" style="margin-top: 25px;">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                      
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : <?=$address?></li>
                            <li><i class="fa fa-phone"></i> <a href="mailto:<?=$email?>"><?=$email?></a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:<?=$contactinfo?>"><?=$contactinfo?></a>
                            </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form">
                        <h3>Tell us </h3>   
                         <form id="contact-form" action="<?=base_url()?>Home/sendmail" method="post" class="contact-form">
                                <input type="hidden" name="hidfiled" value="" >
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="name" placeholder="Name *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="phone" placeholder="Phone *" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="email" placeholder="Email *" id="email" type="text" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input name="msg" placeholder="Subject *" type="text">
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                            <textarea placeholder="Message *" name="message" class="form-control2" required=""></textarea>
                                        </div>
                                        <div class="contact-btn">
                                            <button class="" type="submit" id="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>

                    </div> 
                </div>
            </div>
        </div>    
    </div>
<script>
        $(document).ready(function () {
            $('.error').hide();
            $('#submit').click(function () {
                alert("hello");
                var email = $('#email').val();
 
                if (email == '') {
                    $('#email').next().show();
                    return false;
                }
                if (IsEmail(email) == false) {
                    $('#invalid_email').show();
                    return false;
                }
                $.post("", $("#contact-form").serialize(), 
                function (response) {
                    $('#contact-form').fadeOut('slow', function () {
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
    <!--contact area end-->
    

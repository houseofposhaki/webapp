<?php 
//contact //

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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="footer-area">
        <div class="footer-text-area">
            <div class="footer-link-area-01">
            <ul>
            <li><a href="<?php echo base_url();?>all-topics">All Topics</a></li>
            <li><a href="https://bengali.theindianvoice.net/">IV Bengali</a></li>
            <li><a href="https://hindi.theindianvoice.net/">IV Hindi</a></li>
            <li><a href="<?=base_url();?>site-map">Site Map</a></li>
            </ul>
            </div>
            
            <div class="footer-link-area-01">
            <ul>
            <li><a href="<?=base_url();?>about-us">About us</a></li>
            <li><a href="<?=base_url();?>contact-us">Contact us</a></li>
            <li><a href="<?=base_url();?>privacy-policy">Privacy Policy</a></li>
            <li><a href="<?=base_url();?>terms-conditions">Terms & Conditions</a></li>
            <li><a href="<?=base_url();?>disclaimers">Disclaimers</a></li>
            </ul>
            </div>
            
            <div class="footer-link-area-01">
            <ul>
            <li><a href="#">Follow us</a></li>
            <span>
                <a href="https://www.facebook.com/theindianvoicenews" target="_blank">
                <i class="fa fa-facebook-square" style="font-size:36px; color:#FFFFFF;"></i>
                </a>
                <a href="https://twitter.com/theindianvoice2" target="_blank">
                <i class="fa fa-twitter-square" style="font-size:36px; color:#FFFFFF; text-decoration:none;"></i>
                </a>
                <a href="https://www.instagram.com/theindianvoicenews/" target="_blank">
                <i class="fa fa-instagram" style="font-size:36px; color:#FFFFFF;"></i>
                </a>
            </span>
            <li><a href="#">Download Apps</a></li>
				 <span><a href="#" target="_blank">
                <i class="fa fa-android" style="font-size:36px; color:#FFFFFF;"></i>
                </a>
				<a href="#" target="_blank">
                <i class="fa fa-apple" style="font-size:36px; color:#FFFFFF;"></i>
                </a></span>
            </ul>
            </div>
            
            <div class="footer-link-area-02">
            <!-- <h4>The Indian Voice</h4> -->
            <h5>Sign Up the Indian Voice Email Newsletter</h5>
            <p>Subscribe to recieve all the days headlines and highlights from the The Indian Voice straight to your inbox every morning.</p>
            <br />
            <form class="form-wrapper cf">
            <input type="text" placeholder="Email Id" required>
            <button type="submit">Sing Up</button></form>
            
          </div>
        </div>
</div>




<script type="text/javascript">
function genericSocialShare(url){
    window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
    return true;
}
</script>



</body>
</html>

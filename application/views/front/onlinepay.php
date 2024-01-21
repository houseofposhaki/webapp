<?php 
$userRes = $this->db->query("select * from user where id='1'")->result_array();
foreach($userRes as $userRow)
{
	$adminName = $userRow['fullname'];
}

if(!empty($postData))
{
	$orderId = $postData['orderId'];	
	$orderAmount = $postData['orderAmount'];	
	$orderCurrency = $postData['orderCurrency'];	
	$orderNote = $postData['orderNote'];	
	$customerName = $postData['customerName'];	
	$customerPhone = $postData['customerPhone'];	
	$customerEmail = $postData['customerEmail'];	

}else{



}

?>





<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 



  <section class="paynoebg">

   <div class="box_paynow" style="margin-bottom: 225px;margin-top: 200px;">

    <center>



     <h3>Your Order No is : <?php echo $orderId ?></h3>

    <div>
     <a href="javascript:void(0)" class="btn  btn-primary  buy_now" data-amount="<?=$orderAmount?>" 
     	data-id="<?=$orderId?>" data-orderid="<?=$orderId?>">
       Pay Online
     </a> 
   </div>


    <div class="price-wrap h5">

    </div>

  </div>

</center>

</div>

</section>







<!-- script start -->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

  var SITEURL = "<?php echo base_url();?>";

  $('body').on('click', '.buy_now', function(e){

    var totalAmount = $(this).attr("data-amount");

    var product_id =  $(this).attr("data-id");

    var order_id =  $(this).attr("data-orderid");

    var options = {

     // "key": "rzp_test_j265r4RYL24GMy",
    "key": "rzp_live_PReYcp6imHYeXz",

    "amount": (<?=$orderAmount?>*100), // 2000 paise = INR 20

    "name": "<?=$adminName?>",

    "description": "Invoice payment",

    "image": "<?php echo base_url();?>/assets/sitelogo.png",

    "prefill": {

      "name": "<?php echo $customerName; ?>",

      "email": "<?php echo $customerEmail;?>",

      "contact": "<?php echo $customerPhone;?>"

    },

    "handler": function (response){

      $.ajax({

        url: SITEURL + 'Cart/razorPaySuccess',

        type: 'post',

        dataType: 'json',

        data: {

          razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id, order_id:order_id

        }, 

        success: function (msg) {

         window.location.href = SITEURL + 'Cart/RazorThankYou';

       }

     });

      

    },



    "theme": {

      "color": "#528FF0"

    }

  };

  var rzp1 = new Razorpay(options);

  rzp1.open();

  e.preventDefault();

});



</script>
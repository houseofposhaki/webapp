<?php 

$orderid = $this->uri->segment('2');

$userid = $this->uri->segment('3');

$pricedetails = $this->db->query("select * from ordertbl where orderno='".$orderid."' ")->result_array();

$priceisactive = $pricedetails[0]['grandtot'];

$userres = $this->db->query("select * from user where id='$userid'")->result_array();



if(!empty($userres))

{

  $fullname = $userres[0]['fullname'];

  $mobile = $userres[0]['mobile'];

  $username = $userres[0]['username'];



}else{

  $fullname = "";

  $mobile = "";

  $username = "";

}

?>





<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  -->



  <section class="paynoebg">

   <div class="box_paynow">

    <center>



     <h3>Your Order No is : <?php echo $this->uri->segment('2'); ?></h3>

    <div>
     <a href="javascript:void(0)" class="btn  btn-primary  buy_now" data-amount="<?=$priceisactive?>" data-id="<?=$orderid?>" data-orderid="<?=$orderid?>">
       Pay Online
     </a> 
   </div>

   <div>
     <a href="<?=base_url()?>Cart/paysuccess/<?=$orderid?>" class="btn  btn-primary" >
       COD
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

      "key": "rzp_test_j265r4RYL24GMy",

    "amount": (<?=$priceisactive?>*100), // 2000 paise = INR 20

    "name": "Medcem Pharmacy",

    "description": "Invoice payment",

    "image": "<?php echo base_url();?>/assets/sitelogo.png",

    "prefill": {

      "name": "<?php echo $fullname; ?>",

      "email": "<?php echo $username;?>",

      "contact": "<?php echo $mobile;?>"

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
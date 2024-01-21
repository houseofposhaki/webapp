<?php 

if(!empty($res))
{
  $userid = $res['userid'];
  $couponis = $res['couponis'];
  $grandtot = $res['grandtot'];
  $discountedprice = $res['discountedprice'];
  $coupondiscountamt = $res['coupondiscountamt'];
  $carttotal = $res['carttotal'];
  $totmrp = $res['totmrp'];
}else{
  $userid = "";
  $couponis = "";
  $grandtot = "";
  $discountedprice = "";
  $coupondiscountamt = "";
  $carttotal = "";
  $totmrp = "";

}





$cookie_name = "cartcookieposhaki";

if(!empty($_COOKIE[$cookie_name]))

{

  $cookievalis = $_COOKIE[$cookie_name];

}else{

  $cookievalis = "";

}





$cartconditionres = $this->db->query("select cart.*,product.id,product.mandateprescription from cart 

  left join product on cart.productid = product.id 

  where cart.cookievalis='$cookievalis' and cart.status=0 and product.mandateprescription='1'")->result_array();





  ?>
  <main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <form action="<?=base_url();?>Cart/ordersubmit" name="contact_form" method="post" enctype="multipart/form-data">
    <div class="checkout-page-wrapper section-padding">
        <div class="container">

            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Billing Details</h5>
                        <div class="billing-form-wrap">
                           

                            <input type="hidden" name="userid" value="<?=$userid?>">

                            <input type="hidden" name="couponis" value="<?=$couponis?>">

                            <input type="hidden" name="grandtot" value="<?=$grandtot?>">
                            <input type="hidden" name="totmrp" value="<?=$totmrp?>">


                            <input type="hidden" name="discountedprice" value="<?=$discountedprice?>">
                            <input type="hidden" name="coupondiscountamt" value="<?=$coupondiscountamt?>">
                            <input type="hidden" name="carttotal" value="<?=$carttotal?>">

                            <div class="row">
                             <div class="single-input-item">
                                <label for="street-address" class="  mt-20">Full Name</label>
                                <input type="text" name="name" id="" placeholder="Full Name"  />
                            </div>

                        </div>


                        <div class="single-input-item">
                            <label for="street-address" class="  mt-20">Full address</label>
                            <input type="text" name="address" id="street-address" placeholder="Street address Line 1"   />
                        </div>




                        <div class="single-input-item">
                            <label for="postcode" class=" ">Postcode / ZIP</label>
                            <input type="text" id="postcode" placeholder="Postcode / ZIP" name="pincode"   />
                        </div>

                        <div class="single-input-item">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="mobile" placeholder="Phone" />
                        </div>



                        <div class="checkout-box-wrap">
                            <div class="single-input-item">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                    <label class="custom-control-label" for="ship_to_different">Ship to a
                                    different address?</label>
                                </div>
                            </div>
                            <div class="ship-to-different single-form-row">
                                <div class="row">
                                    <div class="single-input-item">
                                        <label for="street-address_2" class="  mt-20">Shipping Name</label>
                                        <input type="text" id="street-address_2" placeholder="SHipping Person Name" name="shipping_name"   />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="street-address_2" class="  mt-20">Shipping Mobile</label>
                                        <input type="text" id="" placeholder="SHipping Mobile" name="shipping_mobile"   />
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address_2" class="  mt-20">Shipping address</label>
                                    <input type="text" id="street-address_2" placeholder="Shipping address Line 1" name="shipping_address"   />
                                </div>

                                <div class="single-input-item">
                                    <label for="postcode_2" class=" ">Postcode / ZIP</label>
                                    <input type="text" id="postcode_2" placeholder="Postcode / ZIP" name="shipping_pincode"   />
                                </div>
                            </div>
                        </div>

                  
                </div>
            </div>
        </div>

        <!-- Order Summary Details -->
        <div class="col-lg-6">
            <div class="order-summary-details">
                <h5 class="checkout-title">Your Order Summary</h5>
                <div class="order-summary-content">
                    <!-- Order Summary Table -->
                    <div class="order-summary-table table-responsive text-center">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Products</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr>
                                    <td><a href="product-details.html">Suscipit Vestibulum <strong> × 1</strong></a>
                                    </td>
                                    <td>₹165.00</td>
                                </tr>
                                <tr>
                                    <td><a href="product-details.html">Ami Vestibulum suscipit <strong> × 4</strong></a>
                                    </td>
                                    <td>₹165.00</td>
                                </tr>
                                <tr>
                                    <td><a href="product-details.html">Vestibulum suscipit <strong> × 2</strong></a>
                                    </td>
                                    <td>₹165.00</td>
                                </tr>
                            </tbody> -->
                            <tfoot>
                                <tr>
                                    <td>Sub Total</td>
                                    <td><strong>₹ <?=$carttotal?></strong></td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="d-flex justify-content-center">
                                        <ul class="shipping-type">
                                           <!--  <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                    <label class="custom-control-label" for="flatrate">Flat
                                                    Rate: ₹70.00</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                    <label class="custom-control-label" for="freeshipping">Free
                                                    Shipping</label>
                                                </div>
                                            </li> -->
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td><strong>₹ <?=$carttotal?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Order Payment Method -->
                    <div class="order-payment-method">
                        <div class="single-payment-method show">
                            <div class="payment-method-name">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                    <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                </div>
                            </div>
                            <div class="payment-method-details" data-method="cash">
                                <p>Pay with cash upon delivery.</p>
                            </div>
                        </div>
                       
                       <!--  <div class="single-payment-method">
                            <div class="payment-method-name">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                    <label class="custom-control-label" for="paypalpayment">Paypal <img src="images/paypal-card.webp" class="img-fluid paypal-card" alt="Paypal" /></label>
                                </div>
                            </div>
                            <div class="payment-method-details" data-method="paypal">
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                PayPal account.</p>
                            </div>
                        </div> -->
                        <div class="summary-footer-area">
                            <div class="custom-control custom-checkbox mb-20">
                                <input type="checkbox" class="custom-control-input" id="terms"   />
                                <label class="custom-control-label" for="terms">I have read and agree to
                                    the website <a href="<?=base_url()?>">terms and conditions.</a></label>
                                </div>
                                <button type="submit" class="btn btn-sqr">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>
<!-- checkout main wrapper end -->
</main>


<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->


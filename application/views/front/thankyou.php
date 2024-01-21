<?php 
$orderno = $this->uri->segment('2');
?>
<section>
	<div class="container" style="margin-top: 60px;">
<center>
	<div class="alert alert-success" style="width: 50%;height: 220px; margin-top: 60px;">
	<p><h4>Your Order No: <?=$orderno?></h4></p>
	<h3>Thank you for Your Order </h3>
	<br>
	<a href="<?=base_url()?>">
		<button class="btn btn-success">Continue Shopping</button>
	</a>
</div>
</center>
	</div>
</section>


<?php 

  $ordno = $this->uri->segment('2');
?>

<div class="container">

	<div style="margin-top: 165px;">
          <h2 align="center">Order No: <?=$ordno?></h2>

	<table class="table">
  <thead class="thead-dark" style="background-color: #29015e">
    <tr>
      <th scope="col" style="color: white;">#</th>
      <th scope="col" style="color: white;">Order No</th>
      <th scope="col" style="color: white;">Item</th>
      <th scope="col" style="color: white;">Price </th>
      <th scope="col" style="color: white;">Qty</th>
      <th scope="col" style="color: white;">Total</th>
    </tr>
  </thead>
  <tbody>
    	<?php 
    	$ordres = $this->db->query("select * from cart  where orderno='$ordno' and status='1' order by id desc")->result_array();
    		$i = 1 ;
    	foreach($ordres as $ordrow){
    	?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$ordrow['orderno'];?></td>
      <td>
      <?php
      $pid = $ordrow['productid'];
      $pres = $this->db->query("select * from product where id='$pid'")->result_array();
      $pname =  $pres[0]['title'];
      $pimg =  $pres[0]['featureimg'];
      ?>
      	<img src="<?=base_url()?>uploads/<?=$pimg?>" height="50px" width="50px">
      	<?php echo $pname;?>
      </td>
      <td><?=$ordrow['productprice'];?></td>
      <td><?=$ordrow['qty'];?></td>
      <td><?=$ordrow['total'];?></td>
  <?php $i++; } ?>
    </tr>
   
  </tbody>
</table>


</div>
</div>
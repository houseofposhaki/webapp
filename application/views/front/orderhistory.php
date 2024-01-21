
<?php 

  $userid = $this->session->userdata['logged_in']['id'];
?>

<div class="container">

	<div class="oderhistory">
          <h2 align="center">Order history</h2>

	<table class="table">
  <thead class="thead-dark" style="background-color: #29015e">
    <tr>
      <th scope="col" style="color: white;">#</th>
      <th scope="col" style="color: white;">Order No</th>
      <th scope="col" style="color: white;">Total</th>
      <th scope="col" style="color: white;">Date</th>
      <th scope="col" style="color: white;">Details</th>
    </tr>
  </thead>
  <tbody>
    	<?php 
    	$ordres = $this->db->query("select * from ordertbl  where userid='$userid' order by id desc")->result_array();
    		$i = 1 ;
    	foreach($ordres as $ordrow){
    	?>
    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$ordrow['orderno'];?></td>
      <td><?=$ordrow['grandtot'];?></td>
      <td><?=date('d-m-Y',strtotime($ordrow['ts']));?></td>
      <td><a href="<?=base_url()?>ordetails/<?=$ordrow['orderno'];?>">View</a></td>
  <?php $i++; } ?>
    </tr>
   
  </tbody>
</table>


</div>
</div>
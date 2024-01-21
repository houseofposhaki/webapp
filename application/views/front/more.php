<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Untitled Document</title>
	<link rel="stylesheet" href="css/new.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/topmenu.js" type="text/javascript"></script>

</head>

<body>

	<?php 
	$catselectres = $this->db->query("select * from categories where parentid='0'  order by srno asc ")->result_array();
	foreach($catselectres as $catselectrow){
		?>
		<div class="cat-log-main-area">
			<div class="cat-log-link-area">
				<h3><a href="<?=base_url();?>news/<?=$catselectrow['slugurl']?>"><?php echo $catselectrow['title'];?></a></h3>
				<ul>
					<?php 
					$postdetails = $this->db->query("select * from  categories where parentid='".$catselectrow['id']."'  ")->result_array();
					foreach($postdetails as $prow)
					{
						?>
						<li><a href="<?=base_url();?>more/<?=$prow['slugurl']?>"><?php echo $prow['title'];?></a></li>
					<?php } ?>

				</ul>
			</div>
		</div>
	<?php } ?>
	


</body>
</html>

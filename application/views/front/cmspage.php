<?php 



if(!empty($pgres))



{



	$metaname = $pgres[0]['metaname'];



	$metadesc = $pgres[0]['metadesc'];



	$title = $pgres[0]['title'];



	$description = $pgres[0]['description'];



	$iconimgae = $pgres[0]['iconimgae'];



}else{



	$metaname = "";



	$metadesc = "";



	$title = "";



	$description = "";



	$iconimgae = "";



}



if(!empty($pgsingle))



{



	$pgname = $pgsingle[0]['pgname'];



}else{



	$pgname = "";



}



if(!empty($banneres))



{



	$iconimgae = $banneres[0]['iconimgae'];



}else{



	$iconimgae = "";



}



?>




<section class="scmvpager" style="margin-top: 25px;margin-bottom: 20px;">
    <div class="container">
        <div class="col-md-12">
    	   <div><h2 alugn="center"><?php echo $title;?></h2></div>
        	<div class="">
        		<?php echo $description;?>
        	</div>
        </div>	
    </div>
</section>







<?php 
 $maintblid = $this->uri->segment('4');
if(!empty($slno))
{
  $slno = $slno;
}
else
{
    $slno =1;
}

if(!empty($childrows['id']))
{
    $itemidis = $childrows['id'];
    $color = $childrows['color'];
    $size = $childrows['size'];
    $stone = $childrows['stone'];
}else{
    $itemidis = "0";
    $color = "";
    $size = "";
    $stone = "";
}
?>


<!-- type ahead -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  

<!-- type ahead end -->


    <div class="row col-md-12">


            <input type="hidden" id="itemid" name="itemid[]" value="<?php  echo $itemidis;?>"/>

            <input type="hidden" id="slno<?php echo $slno;?>" name="slno[]" class="form-control slno" value="<?php echo $slno;?>" readonly style="width: 45px;"/>


        <div class="col-md-2">
            <input type="text" name="color[]" placeholder="Color" value="<?=$color?>" class="form-control" >
        </div>

        <div class="col-md-2">
            <input type="text" name="size[]" placeholder="Size" value="<?=$size?>" class="form-control" >
        </div>

       <!--  <div class="col-md-2">
            <input type="text" name="stone[]" placeholder="Stone" value="<?=$stone?>" class="form-control" required>
        </div>
 -->
        <div class="col-md-1">
            <input name="more" value="+" onclick="rowadd_new();" onblur="return nexttab();" type="button" style="margin: -38px 0 0 36px;">
        </div>

        <div class="col-md-1">
            <?php //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
                <a href="<?=base_url()?>admin/Managepage/itemdel/<?=$itemidis?>/<?=$maintblid?>" onclick="return confirm('ARe you sure to remove ?');"><p style="color: red;"><b>X</b></p></a>
        </div>


</div>
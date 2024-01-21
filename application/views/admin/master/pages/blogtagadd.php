<?php
//error_reporting(0);
if(isset($slno))
{
    $slno = $slno;
}
else
{
    $slno =1;
}
if(!empty($q))
{
    $itemid = (int)$q['id'];
    $slno = (int)$q['si_no'];
    $grand_total = $q['grand_total'];
}
else
{
    $itemid = 0;
    $slno = $slno;
    $grand_total = '';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-1">
            <input type="hidden" id="itemid" name="itemid[]" value="<?php echo $itemid;?>"/>
            <input type="text" id="slno<?php echo $slno;?>" name="slno[]" class="form-control slno" value="<?php echo $slno;?>" readonly style="width: 45px;"/>
        </div>
        <div class="col-md-1">
            <?php
              $type_sql = "select distinct brand_name from businessmind_item ";
            $type_sql = mysql_query($type_sql,$dbh);
            ?>
            <select id="type_<?php echo $slno;?>" name="type[]" class="form-control" onchange="get_desc(this.id);" style="margin-left: -50px;width: 130px;">
                <option value="">Select</option>

                <?php while($t = mysql_fetch_assoc($type_sql)){?>
                <option value="<?php echo $t['brand_name'];?>" <?php echo $type==$t['brand_name']?'selected':''?>><?php echo $t['brand_name'];?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-2">
            <?php
            $desc_sql = mysql_query("select distinct description from businessmind_item ");
            ?>
            <select id="desc_<?php echo $slno;?>" name="descr[]" class="form-control" 
                onchange="return getrate(this.id),getbp(this.id);" style="margin-left: -15px;width: 210px">
                <option value="">--Select--</option>
                <?php while($d = mysql_fetch_assoc($desc_sql)){?>
                    <option value="<?php echo $d['description'];?>" <?php echo $descr==$d['description']?'selected':''?>><?php echo $d['description'];?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-1">
            <input type="text" id="qty_<?php echo $slno;?>" name="qty[]" class="form-control" onkeyup="return getgst(this.id);" onblur="return getamt(this.id);" value="<?php echo $qty;?>"/>
        </div>
        <div class="col-md-1">
            <input type="text" id="rate_<?php echo $slno;?>" name="rate[]" class="form-control" value="<?php echo $rate;?>"/>
        </div>
        <div class="col-md-1">
            <input type="text" id="amt_<?php echo $slno;?>" name="amt[]" class="form-control" value="<?php echo $total;?>" style="margin-left: -25px;width: 120px"/>
        </div>
        <div class="col-md-1">
            <input type="hidden" id="rate_after_discount_<?php echo $slno;?>" name="rate_after_discount_[]" value="<?php echo $rate_after_discount;?>"/>
            <input type="text" id="other_<?php echo $slno;?>" name="other[]" class="form-control" onKeyUp="return getamt(this.id);" value="<?php echo $discount;?>"/>
        </div>
        <div class="col-md-1">
            <input type="text" id="gst_per_<?php echo $slno;?>" name="gst_per[]" class="form-control" value="<?php echo $gst;?>"/>
        </div>
        <div class="col-md-1">
            <input type="text" id="cgst_<?php echo $slno;?>" name="cgst[]" class="form-control" value="<?php echo $cgst;?>"/>
        </div>
        <div class="col-md-1">
            <input type="text" id="sgst_<?php echo $slno;?>" name="sgst[]" class="form-control" value="<?php echo $sgst;?>" style="margin-left: -20px;"/>
        </div>
        <!-- <div class="col-md-1"> -->
            <input type="hidden" id="bp_<?php echo $slno;?>" name="bp[]" class="form-control" value="<?php echo $bp;?>"/>
        <!-- </div> -->
        <div class="col-md-1">
            <input type="text" id="total_<?php echo $slno;?>" name="total[]" class="form-control total" value="<?php echo $grand_total;?>" style="margin-left: -40px;"/>
            <input name="more" value="+" onclick="rowadd_new();" onblur="return nexttab();" type="button" style="margin: -38px 0 0 36px;">
        </div>
    </div>
</div>
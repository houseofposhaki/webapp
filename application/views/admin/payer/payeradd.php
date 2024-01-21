<?php 
if(isset($getres))
{
    $id =  $getres[0]['id'];
    $payername =  $getres[0]['payername'];
    $payeraddress =  $getres[0]['payeraddress'];
    $payerphone =  $getres[0]['payerphone'];

}else{
	$id = 0 ;
	$payername="";
	$payeraddress="";
	$payerphone="";
}

  ?>

  <div class="content-wrapper">
    <section class="content mt-3">
      <div class="container-fluid">
       <form name="" action="<?php echo base_url(); ?>Payer/save" method="post" id="enquiryform">
        <div class="row">
         <div class="col-md-12">
          <div class="card card-primary">
           <div class="card-header">
             <?php 
            if($id=="0")
              { ?>
                <h3 class="card-title">Create New Payer</h3>
              <?php }else{ ?>
                <h3 class="card-title">Edit Payer</h3>
              <?php }
              ?>
            </div>
            <div class="card-body">
              <!-- Date range -->
              <input type="hidden" name="oldid" value="<?=$id?>">
              <input type="hidden" name="userid" value="<?php echo $this->session->userdata['logged_in']['id']?>">
              <input type="hidden" name="branchid" value="<?php echo $this->session->userdata['logged_in']['branchid']?>">


  <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>Payer Name<span class="required">*</span></label>
          <div class="input-group">
            <input type="text" name="payername" value="<?=$payername?>" class="form-control">
          </div>
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>Payer Address</label>
          <div class="input-group">
            <input type="text" name="payeraddress" value="<?=$payeraddress?>" class="form-control">
          </div>
        </div>
      </div>
  </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label>Payer Phone No</label>
          <div class="input-group">
            <input type="number" maxlength="10" minlength="10" name="payerphone" value="<?=$payerphone?>" class="form-control">
          </div>
        </div>
      </div>
  </div>

<div class="col-6">
  <input type="submit" class="btn btn-primary" value="Save" name="submit">
</div>
<!-- /.form group -->
</div>
</div>
</div>
</div>
</form>
</div><!-- /.container-fluid -->
</section>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        if ($("#individual").is(":checked")) {
            $("#organizationdiv").find("#organization").attr('disabled', 'disabled');
        }
        $("input[name='enquirytype']").change(function () {
            if ($("#corporate").is(":checked")) {
                $("#organizationdiv").find("#organization").attr('disabled', false);
                //$("#organizationdiv").show();
                $("#organizationdiv").required();
            } else {
                $("#organizationdiv").find("#organization").attr('disabled', 'disabled');
                $("#organizationdiv").find("#organization").attr('required', 'false');
            }
        });
    });
</script>

<script>
  function restrictAlphabets(e){
    var x=e.which||e.keycode;
    if((x>=48 && x<=57) || x==8 || (x>=35 && x<=40)|| x==46)
      return true;
    else
      return false;
  }
</script>
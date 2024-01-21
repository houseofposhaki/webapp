<?php
 if(!empty($res))
 {
    $id = $res[0]['id'];
    $usertypeid = $res[0]['usertypeid'];
    $homepage = $res[0]['homepage'];
    $adsbanner = $res[0]['adsbanner'];
    $categories = $res[0]['categories'];
    $post = $res[0]['post'];
    $comments = $res[0]['comments'];
    $contact = $res[0]['contact'];
    $joindoctor = $res[0]['joindoctor'];
    $subscriber = $res[0]['subscriber'];
 }else{
    $id = "";
    $usertypeid = "";
    $homepage = "";
    $adsbanner = "";
    $categories = "";
    $post = "";
    $comments = "";
    $contact = "";
    $joindoctor = "";
    $subscriber = "";

 }
  
?>

  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <!-- form start -->
        <form name="" action="<?php echo base_url()?>admin/User/editpermission" method="post">
          <input type="hidden" name="oldid" value="<?=$usertypeid?>">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">User Role</h3>
                </div>
                <div class="card-body">
                  <!-- Date range -->
                  <!-- Enquiry -->
                  <div class="row">
                        <div class="col-2">
                          <label>Menu</label>
                        </div>
                        <div class="col-10">
                          <div class="col-2">
                            <input type="checkbox" name="homepage" value="1" 
                            <?php if($homepage=="1"){ echo "checked";} ?>> Home Page 
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="adsbanner" value="1" 
                            <?php if($adsbanner=="1"){ echo "checked";} ?>> Ads Banner
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="categories" value="1" 
                            <?php if($categories=="1"){ echo "checked";} ?>> Categories
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="post" value="1" 
                            <?php if($post=="1"){ echo "checked";} ?>> Post
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="comments" value="1" 
                            <?php if($comments=="1"){ echo "checked";} ?>> Comments
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="contact" value="1" 
                            <?php if($contact=="1"){ echo "checked";} ?>> Contact
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="joindoctor" value="1" 
                            <?php if($joindoctor=="1"){ echo "checked";} ?>> joindoctor
                          </div>
                          <div class="col-2">
                            <input type="checkbox" name="subscriber" value="1" 
                            <?php if($subscriber=="1"){ echo "checked";} ?>> subscriber
                          </div>
                          

                      
                        </div>
                  </div>

                 

                    <div class="row">
                        <div class="col-6">
                            <input type="submit" name="submit" value="save" class="btn btn-primary">
                        </div>    
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

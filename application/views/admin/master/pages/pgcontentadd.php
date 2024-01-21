<?php



if(!empty($res)) {



	$id = $res[0]['id'];



	$metaname = $res[0]['metaname'];



	$metadesc = $res[0]['metadesc'];



	$title = $res[0]['title'];



	$description = $res[0]['description'];



	$iconimgae = $res[0]['iconimgae'];



} else {



	$id = "0";



	$metaname = "";



	$metadesc = "";



	$title = "";



	$description = "";



	$iconimgae = "";



}







?>















<div class="content-wrapper mt-3">















	<!-- Main content -->







	<section class="content">







		<div class="container-fluid">







			<!-- form start -->







			<form name="" action="<?php echo base_url()?>admin/Managepage/pgcontentsave" method="post" 







				enctype="multipart/form-data">







				<div class="row">







					<div class="col-md-12">







						<div class="card card-primary">







							<div class="card-header">







								<h3 class="card-title">Page Content</h3>







							</div>















							<?php if($this->session->flashdata('msg')): ?>







							<div class="alert alert-success" role="alert" style="margin-top: 25px;">







								<?php echo $this->session->flashdata('msg'); ?>







								</div>







							<?php endif; ?>







							<div class="card-body">







								<input type="hidden" name="oldid" value="<?=$id?>">



								<input type="hidden" name="pgid" value="<?=$pgid?>">







								<input type="hidden" name="oldiconimgae" value="<?=$iconimgae?>">







								















								<div class="col-12">



									<div class="form-group">



										<label for="metaname">Meta Name<span class="required">*</span></label>



										<input type="text" name="metaname" class="form-control" id="metaname" value="<?=$metaname?>">



									</div>



								</div>







								<div class="col-12">



									<div class="form-group">



										<label for="metadesc">Meta Keywords<span class="required">*</span></label>



										<input type="text" name="metadesc" class="form-control" id="metadesc" value="<?=$metadesc?>">



									</div>



								</div>







								<div class="col-12">



									<div class="form-group">



										<label for="title">Meta Title<span class="required">*</span></label>



										<input type="text" name="title" class="form-control" id="title" value="<?=$title?>">



									</div>



								</div>






								<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
								
								<div class="col-12">
									<div class="form-group">
										<label for="description">Desciprtion<span class=" ">*</span></label>
										<textarea name="description" required class="form-control" id="description" 
										><?=$description?></textarea>
					                <script>
					                        CKEDITOR.replace( 'description' );
					                </script>
									</div>
								</div>







								<div class="col-12">







									<div class="col-6">



										<div class="form-group">



										<label for="iconimgae">



									<?php if($iconimgae!="") { ?>



										Change Image



										<?php }else{?>



											Upload Image



										<?php } ?>



											<span class="required">*</span></label>



										<input type="file" name="iconimgae" class="form-control" id="iconimgae">



										</div>



									</div>



									<?php if($iconimgae!="") { ?>



									<div class="col-6">



										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$iconimgae?>">



									</div>



									<?php } ?>



								</div>



								<div class="row">&nbsp;</div>











								<div class="col-6">







									<input type="submit" class="btn btn-primary" name="save">







								</div>







							</div> <!-- /.card-body -->







						</div> <!-- /.card -->







					</div> <!-- /.col-md-12 -->







				</div>







			</form>







		</div><!-- /.container-fluid -->







	</section>







</div><!-- /.content-wrapper -->
<?php
if(!empty($res)) {
	$id = $res[0]['id'];
	$title = $res[0]['title'];
	$icon1 = $res[0]['icon1'];
	$head1 = $res[0]['head1'];
	$icon2 = $res[0]['icon2'];
	$head2 = $res[0]['head2'];
	$icon3 = $res[0]['icon3'];
	$head3 = $res[0]['head3'];

	$icon4 = $res[0]['icon4'];
	$head4 = $res[0]['head4'];

	$icon5 = $res[0]['icon5'];
	$head5 = $res[0]['head5'];

	$icon6 = $res[0]['icon6'];
	$head6 = $res[0]['head6'];

	$btnname = $res[0]['btnname'];
	$btnlink = $res[0]['btnlink'];
	$description = $res[0]['description'];


} else {
	$id = "0";
	$title = "";
	$icon1 = "";
	$head1 = "";
	$icon2 = "";
	$head2 = "";
	$icon3 = "";
	$head3 = "";

	$icon4 = "";
	$head4 = "";

	$icon5 = "";
	$head5 = "";

	$icon6 = "";
	$head6 = "";

	$btnname = "";
	$btnlink = "";
	$description = "";
}
?>

<div class="content-wrapper mt-3">

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- form start -->
			<form name="" action="<?php echo base_url()?>admin/Sectioncontent/section2update" method="post" 
				enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Section2</h3>
							</div>

							<?php if($this->session->flashdata('msg')): ?>
							<div class="alert alert-success" role="alert" style="margin-top: 25px;">
								<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<input type="hidden" name="oldid" value="<?=$id?>">
								<input type="hidden" name="oldicon1" value="<?=$icon1?>">
								<input type="hidden" name="oldicon2" value="<?=$icon2?>">
								<input type="hidden" name="oldicon3" value="<?=$icon3?>">
								<input type="hidden" name="oldicon4" value="<?=$icon4?>">
								<input type="hidden" name="oldicon5" value="<?=$icon5?>">
								<input type="hidden" name="oldicon6" value="<?=$icon6?>">

								<div class="col-12">
									<div class="form-group">
										<label for="title">Title<span class="required">*</span></label>
										<input type="text" name="title" class="form-control" id="title" 
										value="<?=$title?>">
									</div>
								</div>

								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon1!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon1" class="form-control" id="icon1">
										</div>
									</div>
									<?php if($icon1!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon1?>">
									</div>
									<?php } ?>
									
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding1<span class="required">*</span></label>
										<input type="text" name="head1" class="form-control" id="title" 
										value="<?=$head1?>">
									</div>
								</div>


								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon2!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon2" class="form-control" id="icon2">
										</div>
									</div>
									<?php if($icon2!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon2?>">
									</div>
									<?php } ?>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding2<span class="required">*</span></label>
										<input type="text" name="head2" class="form-control" id="title" 
										value="<?=$head2?>">
									</div>
								</div>


								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon3!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon3" class="form-control" id="icon3">
										</div>
									</div>
									<?php if($icon3!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon3?>">
									</div>
									<?php } ?>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding3<span class="required">*</span></label>
										<input type="text" name="head3" class="form-control" id="title" 
										value="<?=$head3?>">
									</div>
								</div>


								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon4!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon4" class="form-control" id="icon4">
										</div>
									</div>
									<?php if($icon4!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon4?>">
									</div>
									<?php } ?>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding4<span class="required">*</span></label>
										<input type="text" name="head4" class="form-control" id="title" 
										value="<?=$head4?>">
									</div>
								</div>


								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon5!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon5" class="form-control" id="icon5">
										</div>
									</div>
									<?php if($icon5!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon5?>">
									</div>
									<?php } ?>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding5<span class="required">*</span></label>
										<input type="text" name="head5" class="form-control" id="title" 
										value="<?=$head5?>">
									</div>
								</div>



								<div class="col-12">
									<div class="col-6">
										<div class="form-group">
										<label for="iconlogo">
									<?php if($icon6!="") { ?>
										Change Icon
										<?php }else{?>
											Upload Icon
										<?php } ?>
											
											<span class="required">*</span></label>
										<input type="file" name="icon6" class="form-control" id="icon6">
										</div>
									</div>
									<?php if($icon6!="") { ?>
									<div class="col-6">
										<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$icon6?>">
									</div>
									<?php } ?>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Heding6<span class="required">*</span></label>
										<input type="text" name="head6" class="form-control" id="title" 
										value="<?=$head6?>">
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="title">Button Name<span class="required">*</span></label>
										<input type="text" name="btnname" class="form-control" id="title" 
										value="<?=$btnname?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label for="title">Button Link<span class="required">*</span></label>
										<input type="text" name="btnlink" class="form-control" id="title" 
										value="<?=$btnlink?>">
									</div>
								</div>


								<div class="col-12">
									<div class="form-group">
										<label for="description">Desciprtion<span class="required">*</span></label>
										<textarea name="description" class="form-control" id="description" 
										value="<?=$description?>"><?=$description?></textarea>
									</div>
								</div>

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
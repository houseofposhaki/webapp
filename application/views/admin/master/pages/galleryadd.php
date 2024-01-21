<?php
$schoolid = $this->uri->segment('4');
?>



<div class="content-wrapper mt-3">



	<!-- Main content -->

	<section class="content">

		<div class="container-fluid">

			<!-- form start -->

			<form name="" action="<?php echo base_url()?>admin/Galleryadd/file_upload" method="post" 

				enctype="multipart/form-data">

				<div class="row">

					<div class="col-md-12">

						<div class="card card-primary">

							<div class="card-header">

								<h3 class="card-title">Gallery</h3>

							</div>



							<?php if($this->session->flashdata('msg')): ?>

							<div class="alert alert-success" role="alert" style="margin-top: 25px;">

								<?php echo $this->session->flashdata('msg'); ?>

								</div>

							<?php endif; ?>

							<div class="card-body">


									<div id="myRepeatingFields">
                                <div class="entry">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group">

											<input type="hidden" name="schoolid" value="<?=$schoolid?>">
											<input type="hidden" name="rowid[]" value="">
											<input type="file" name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif" multiple>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

								<div class="col-6">
      									<input type='submit' value='Upload' name='submit' class="btn btn-primary" />
								</div>

							</div> <!-- /.card-body -->

						</div> <!-- /.card -->

					</div> <!-- /.col-md-12 -->

				</div>

			</form>

		</div><!-- /.container-fluid -->

	</section>

</div><!-- /.content-wrapper -->


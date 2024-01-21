

<!-- Content Wrapper. Contains page content -->



<div class="content-wrapper">



	<!-- Content Header (Page header) -->



	<section class="content-header">



		<div class="container-fluid">



			<div class="row mb-2">



				<div class="col-sm-6">



					<h1>Products</h1>



				</div>



				<div class="col-sm-6">







				</div>



			</div>



		</div><!-- /.container-fluid -->



	</section>







	<!-- Main content -->



	<section class="content">



		<div class="row">



			<div class="col-12">



				<div class="card">



					<div class="card-header">



					<?php if($this->session->flashdata('del')): ?>

						<div class="alert alert-danger" role="alert" style="margin-top: 25px;">

							<?php echo $this->session->flashdata('del'); ?>

						</div>

					<?php endif; ?>

					<?php if($this->session->flashdata('msg')): ?>

						<div class="alert alert-success" role="alert" style="margin-top: 25px;">

							<?php echo $this->session->flashdata('msg'); ?>

						</div>

					<?php endif; ?>

				</div>



					<!-- /.card-header -->





					<div class="card-body">





					<div class="card-body">

						<div class="text-right mb-3">

							<a href="<?=base_url()?>admin/blogadd">

								<button class="btn btn-primary">Add New</button>

							</a>							

						</div> 



						<table id="datatable" class="table table-bordered table-striped">



							<thead>



								<tr>



									<th>Si No</th>

									<th>Feature Image</th>

									<th>Titlte</th>


									<th>Featured</th>
									<th>Main Category</th>
									<!-- <th>Special Category</th> -->

									<th>Add Gallery</th>


									<th>Modify</th>

									<th>Status</th>

									<th>Delete</th>

								</tr>



							</thead>



							<tbody>

								<?php 

								$i = $this->uri->segment(3);

								foreach($res as $row) { $i++; ?>

									<tr>

										<td><?=$i?></td>

										<td>

											<img height="50px" width="50px" src="<?=base_url();?>uploads/<?=$row['featureimg']?>">

										</td>

										<td><?=$row['title']?></td>


										<td>

											<?php if($row['isfeatured']=="1"){?>

											Yes

											<?php } elseif($row['isfeatured']=="0"){ ?>

											No

											<?php } ?>		

										</td>
										<td>
											<?php 
											$maincatid = $row['maincatid'];
											$catres = $this->db->query("select * from categories 
														where id='$maincatid'")->result_array();
											if(!empty($catres))
											{
												echo $catres[0]['title'];
											}
											?>
										</td>


										<!-- <td>
											<?php 
											$specialcatid = $row['specialcatid'];
											$catres = $this->db->query("select * from categories 
														where id='$specialcatid'")->result_array();
											if(!empty($catres))
											{
												echo $catres[0]['title'];
											}
											?>
										</td> -->



										<?php 

										$galleryimg = $this->db->query("select * from  photos where blogid='".$row['id']."'")->result_array();

										if(!empty($galleryimg))

										{



											$exist = "1";

										}else{

											$exist = "";

										}



										?>





										<td>

											<?php if(!empty($exist)) { ?>

											<a href="<?php echo base_url();?>admin/Galleryadd/galleryedit/<?=$row['id']?>">

												<button class="btn-warning">Edit Gallery</button>	

											</a>

										<?php } else{ ?>

											<a href="<?php echo base_url();?>admin/Galleryadd/galleryadd/<?=$row['id']?>">

												<button class="btn-success">Add Gallery</button>	

											</a>

										<?php } ?>

										</td>



										



										<!-- <td><?php //echo $row['description']?></td> -->

										<td>

											<a href="<?php echo base_url();?>admin/Managepage/blogsave/<?=$row['id']?>">

												<i class="fas fa-edit"></i>

											</a>

										</td>

										<td>

											<?php if($row['isactive']=="1"){  ?>

												<a onclick="return confirm('Are you want to published this item?')" href="<?php echo base_url();?>admin/Managepage/blogpublish/<?=$row['id']?>">

												<button class="btn btn-warning">Draft</button>

												</a>

											<?php }else{ ?>

												<a onclick="return confirm('Are you want to draft this item?')" href="<?php echo base_url();?>admin/Managepage/blogdraft/<?=$row['id']?>">

												<button class="btn btn-success">Live</button>

												</a>

											<?php } ?>

											

										</td>

										<td>

											<a href="<?php echo base_url();?>admin/Managepage/blogdelete/<?=$row['id']?>"

												onclick="return confirm('Are you sure ?')">

												<span style="color: red"><i class="fas fa-trash"></i></span>

											</a>

										</td>

									</tr>

								<?php } ?>

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>



<!-- /.content-wrapper -->
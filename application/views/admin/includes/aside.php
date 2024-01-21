<?php 

	$fullname = $this->session->userdata['logged_in']['fullname'];

	$username = $this->session->userdata['logged_in']['username'];

	$userid = $this->session->userdata['logged_in']['id'];

	$usertype = $this->session->userdata['logged_in']['usertype'];



	// fetch usertypeid against user login id //



	$ci = &get_instance();

	$this->db->select('*');

	$this->db->from('user');

	$this->db->where('id',$userid);

	$res = $this->db->get()->result_array();

	$usertypeid =  $res[0]['usertype'];

	// fetch user permission details against usertypeid //

	$this->db->select('*');

	$this->db->from('userpermission');

	$this->db->where('usertypeid',$usertypeid);

	$res = $this->db->get()->result_array();



	foreach($res as $row) {

		$usertypeid = $row['usertypeid'];

		$homepage = $row['homepage'];

		$adsbanner = $row['adsbanner'];

		$categories = $row['categories'];

		$post = $row['post'];

		$comments = $row['comments'];

		$contact = $row['contact'];

		$joindoctor = $row['joindoctor'];

		$subscriber = $row['subscriber'];

		

	}

?>



<aside class="main-sidebar sidebar-dark-primary elevation-4 expand" id="clsp-sidebar-1">

    <!--<button onclick="sidebar_clsp()" class="btn btn-light crm-collapse d-block" ><i class="lni-cross-circle"></i></button>-->

	<a  class="brand-link" style="text-align: center;background-color: #d7e4f7;">

		<img src="<?php echo base_url(); ?>assets/sitelogo.png" alt="" style="max-height: 80px;" width="230px;">

	</a>

	<div class="">&nbsp;</div>

	<div class="sidebar">



	<nav class="mt-2">

		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

					

			<li class="nav-item has-treeview">

				<a href="<?php echo base_url();?>admin/dashboard" <?php $a=$this->uri->segment(1); if($a=="dashboard"){ ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Dashboard<i class="lni-chevron-right right"></i></p>

				</a>

			</li>















			<!-- categories start -->

			<?php if($usertype == "1") { ?>

			<li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Categories<i class="lni-chevron-right right"></i></p>  

				</a>

				<ul class="nav nav-treeview">

						<li class="nav-item">

						<a href="<?php echo base_url();?>admin/parentcatlist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Main Categories</p>

						</a>

						</li>

						<li class="nav-item">

						<a href="<?php echo base_url();?>admin/categories" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Sub Categories</p>

						</a>

						</li>



						<!-- <li class="nav-item">

						<a href="<?php //echo base_url();?>admin/childcatlist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Child Categories</p>

						</a>

						</li> -->

				</ul>

			</li>

			<?php } ?>



			<!-- categories end -->



			<!-- coupon manage start -->

			

			<!-- coupon manage end -->



			

			<!-- Services start -->

			<li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Product<i class="lni-chevron-right right"></i></p>  

				</a>

				<ul class="nav nav-treeview">

					<?php if($this->session->userdata['logged_in']['id']=="1")

		{ ?>

						

						<!-- <li class="nav-item">

						<a href="<?php echo base_url();?>admin/atributelist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Attributes</p>

						</a>

						</li> -->

					<?php } ?>

						<li class="nav-item">

						<a href="<?php echo base_url();?>admin/blogadd" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Add New Product</p>

						</a>

						</li>

						<li class="nav-item">

						<a href="<?php echo base_url();?>admin/blogs" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>All Products</p>

						</a>

						</li>

				</ul>

			</li>

			<!-- Services end -->









			<?php if($usertype == "1") { ?>





				<!-- <li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Refund Request<i class="lni-chevron-right right"></i></p>  

				</a>



				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/refundreqlist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>All Refund Request Lists</p>

						</a>

					</li>



				</ul>





			</li>

 -->







			<li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Orders<i class="lni-chevron-right right"></i></p>  

				</a>



				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/orderlist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>All Orders</p>

						</a>

					</li>





					<!-- <li class="nav-item">

						<a href="<?php echo base_url();?>admin/Order/pendingorderlist" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Pending Orders</p>

						</a>

					</li> -->



				</ul>









			</li>



				<?php if($usertype == "1") { ?>

			<li class="nav-item has-treeview">

				<a href="<?php echo base_url();?>admin/couponlist" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Coupons<i class="lni-chevron-right right"></i></p>  

				</a>

			</li>

			<?php } ?>







			<?php if($usertype == "1") { ?>



				<li class="nav-item">

						<a href="<?php echo base_url();?>admin/brandlist" class="nav-link">

							<i class="nav-icon fas fa-chart-pie"></i>

							<p>Channel Partners</p>

						</a>

						</li>



				<li class="nav-item has-treeview">



				<a href="#" class="nav-link">



					<i class="nav-icon fas fa-chart-pie"></i>



					<p>Home Slider<i class="lni-chevron-right right"></i></p>  



				</a>



				<ul class="nav nav-treeview">



					<li class="nav-item">



						<a href="<?php echo base_url();?>admin/pgbanner" class="nav-link">



							<i class="far fa-circle nav-icon"></i>



							<p>Banner</p>



						</a>



					</li>



				</ul>



			</li>





			<li class="nav-item has-treeview">

				<a href="<?php echo base_url();?>admin/reviewlist" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Review/Testimonial<i class="lni-chevron-right right"></i></p>  

				</a>

			</li>





			<li class="nav-item has-treeview">



				<a href="#" class="nav-link">



					<i class="nav-icon fas fa-chart-pie"></i>



					<p>CMS Pages<i class="lni-chevron-right right"></i></p>  



				</a>





				<ul class="nav nav-treeview">



					<li class="nav-item">



						<a href="<?php echo base_url();?>admin/createpage" class="nav-link">



							<i class="far fa-circle nav-icon"></i>



							<p>Create Page</p>



						</a>



					</li>







					<li class="nav-item">



						<a href="<?php echo base_url();?>admin/pagelist" class="nav-link">



							<i class="far fa-circle nav-icon"></i>



							<p> Page List</p>



						</a>



					</li>

				</ul>

			</li>

			<?php } ?>





		





		<!-- 	<li class="nav-item has-treeview">

				<a href="<?php echo base_url();?>admin/assignprderlist" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Assign  Orders<i class="lni-chevron-right right"></i></p>  

				</a>

			</li>

 -->



			<li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Reports<i class="lni-chevron-right right"></i></p>  

				</a>



				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/ordersearch" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Mobile/Order No search</p>

						</a>

					</li>





					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/datewisesearch" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Date Wise Orders</p>

						</a>

					</li>





					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/frnchiseewisesearch" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Franchisee Wise Orders</p>

						</a>

					</li>



				</ul>



			</li>







			<?php } ?>











			<!-- <li class="nav-item has-treeview">

				<a href="<?php //echo base_url();?>admin/productqrylist" class="nav-link">

					<i class="lni-add-file"></i>

					<p>Products Enquiry<i class="lni-chevron-right right"></i></p>  

				</a>

			</li> -->

			

			<!-- <?php if($userid == "1") { ?>

				<li class="nav-item has-treeview">

					<a href="#" class="nav-link">

						<i class="nav-icon fas fa-chart-pie"></i>

						<p>Manage User <i class="lni-chevron-right right"></i></p>

					</a>

					<ul class="nav nav-treeview">

						<li class="nav-item">

							<a href="<?php echo base_url()?>admin/role" class="nav-link">

								<i class="far fa-circle nav-icon"></i>

								<p>Role</p>

							</a>

						</li>

						<li class="nav-item">

							<a href="<?php echo base_url()?>admin/pincodelist" class="nav-link">

								<i class="far fa-circle nav-icon"></i>

								<p>Pincode</p>

							</a>

						</li>

						

						<li class="nav-item">

							<a href="<?php echo base_url()?>admin/userlist" class="nav-link">

								<i class="far fa-circle nav-icon"></i>

								<p>Franchisee</p>

							</a>

						</li>





						<li class="nav-item">

							<a href="<?php echo base_url()?>admin/employeelist" class="nav-link">

								<i class="far fa-circle nav-icon"></i>

								<p>Employee</p>

							</a>

						</li>





						<li class="nav-item">

							<a href="<?php echo base_url()?>admin/customerlist" class="nav-link">

								<i class="far fa-circle nav-icon"></i>

								<p>Customer</p>

							</a>

						</li>





					</ul>

				</li>

			<?php } ?> -->

		









	



								<!-- reset password -->

			<?php if($userid == "1") { ?>





				<li class="nav-item has-treeview">



						<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

							<p>Contact<i class="lni-chevron-right right"></i></p>  

						</a>

						<ul class="nav nav-treeview">



							<li class="nav-item">

								<a href="<?php echo base_url();?>admin/contact" class="nav-link">

									<i class="lni-angle-double-right"></i>

									<p>Contact CMS</p>

								</a>



							</li>

						</ul>



					</li>



			<li class="nav-item has-treeview">

				<a href="#" class="nav-link">

					<i class="nav-icon fas fa-chart-pie"></i>

					<p>Settings <i class="lni-chevron-right right"></i></p>

				</a>

				<ul class="nav nav-treeview">

					<li class="nav-item">

						<a href="<?php echo base_url();?>admin/Authentication/resetpassuser" class="nav-link">

							<i class="far fa-circle nav-icon"></i>

							<p>Reset Password</p>

						</a>

					</li>

				</ul>

			</li>

		<?php } ?>

			<!--reset password -->



			







		</ul>

	</nav>

	</div>

</aside>
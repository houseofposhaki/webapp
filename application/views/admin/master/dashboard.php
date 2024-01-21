<!-- anblik header -->



  <!-- /.navbar -->

<?php  $usertype = $this->session->userdata['logged_in']['usertype']; ?>





  <!-- Main Sidebar Container -->



  <!-- anblik aside start here -->



<?php 



$userid =  $this->session->userdata['logged_in']['id'];



?>



  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">



    <!-- Content Header (Page header) -->



    <div class="content-header">



      <div class="container-fluid">



        <div class="row mb-2">



          <div class="col-sm-6">



            <h1 class="m-0 text-dark">Dashboard</h1>



          </div><!-- /.col -->



          <div class="col-sm-6">



            <ol class="breadcrumb float-sm-right">



              <li class="breadcrumb-item"><a href="#">Home</a></li>



              <li class="breadcrumb-item active">Dashboard</li>



            </ol>



          </div><!-- /.col -->



        </div><!-- /.row -->



      </div><!-- /.container-fluid -->



    </div>



    <!-- /.content-header -->







    <!-- Main content -->



    <section class="content">



 <div class="row">

   <div class="col-12">

  <center>

  <h3><font color="blue"></font></h3>

  </center>

  </div>



          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">

              <div class="inner">

                <?php

                $this->db->select('*');

                $this->db->from('product');

                $this->db->where('userid',$userid);

                $q=$this->db->get();

                $r = $q->num_rows();

                ?>

                <h3><?=$r?></h3>

                <p>Total Products</p>

              </div>

              <div class="icon">

                <i class="lni lni-pencil-alt"></i>

              </div>

              <a href="<?php echo base_url()?>admin/blogs" class="small-box-footer">More info 

                <i class="fas fa-arrow-circle-right"></i></a>

            </div>

          </div> 



        



       <div class="col-lg-3 col-6">



            <div class="small-box bg-success">



              <div class="inner">

                <?php

                $this->db->select('*');

                $this->db->from('categories');

                $this->db->where('parentid','0');

                $q=$this->db->get();

                $r = $q->num_rows();

                ?>

                <h3><?=$r?></h3>



                <p>Main Categories</p>



              </div>



              <div class="icon">



                <i class="lni lni-book"></i>



              </div>



              <a href="<?php echo base_url()?>admin/parentcatlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>



            </div>



          </div>







          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">

              <div class="inner">

                <?php

                $this->db->select('*');

                $this->db->from('product');

                $this->db->where('isfeatured','1');

                $q=$this->db->get();

                $r = $q->num_rows();

                ?>

                <h3><?=$r?></h3>

                <p>Featured Products</p>

              </div>



              <div class="icon">



                <i class="lni lni-bookmark"></i>



              </div>



              <a href="<?php echo base_url()?>admin/blogs" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>



            </div>



          </div>



        <div class="col-lg-3 col-6">

            <div class="small-box bg-orange">

              <div class="inner">

                <?php

                $this->db->select('*');

                $this->db->from('categories');

                $this->db->where('parentid!=','0');

                $q=$this->db->get();

                $r = $q->num_rows();

                ?>

                <h3><?=$r?></h3>

                <p>Sub Category</p>

              </div>



              <div class="icon">



                <i class="lni lni-bookmark"></i>



              </div>



              <a href="<?php echo base_url()?>admin/categories" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>



            </div>



          </div>




          <div class="col-lg-3 col-6">

            <div class="small-box bg-orange">

              <div class="inner">

                <?php

                $this->db->select('*');

                $this->db->from('ordertbl');

                $q=$this->db->get();

                $r = $q->num_rows();

                ?>

                <h3><?=$r?></h3>

                <p>Total Orders</p>

              </div>



              <div class="icon">



                <i class="lni lni-bookmark"></i>



              </div>



              <a href="<?php echo base_url()?>admin/orderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>



            </div>



          </div>




          <div class="col-lg-3 col-6">

            <div class="small-box bg-orange">

              <div class="inner">

                <?php

                $totres = $this->db->query("select sum(grandtot) as totalamt from ordertbl  ")->result_array();
                if(!empty($totres))
                {
                  $totsale = round($totres[0]['totalamt'],2);
                }else{
                  $totsale = '';
                }
                ?>

                <h3>Rs. <?=$totsale?></h3>

                <p>Order Amount</p>

              </div>



              <div class="icon">

                <i class="lni lni-bookmark"></i>

              </div>



              <a href="<?php echo base_url()?>admin/orderlist" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>



            </div>



          </div>



        </div>



    </section>



    <!-- /.content -->



  </div>



  <!-- /.content-wrapper -->



   <!-- anblik footer here -->
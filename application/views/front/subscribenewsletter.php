<section>
  <div class="contact_sec inner_title">
  	<h4 align="center">Subscribe Our News Letter</h4>
  	<?php if($this->session->flashdata('msg')): ?>
						<div align="center" style="margin-top: 25px;color: green;">
							<?php echo $this->session->flashdata('msg'); ?>
						</div>
	<?php endif; ?>
    <div class="contax">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
          <div class="contact_form_cont">
            <form action="<?php echo base_url();?>Pages/subscribesave" method="post">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label for="name">Name</label>
                  <input class="form-control contact_form_field" id="name" placeholder="Name" type="text" value="" name="name">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <label for="email">Email Id</label>
                  <input class="form-control contact_form_field" id="email" placeholder="Email Id" type="email" value="" name="email">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input type="submit" value="Subscribe" class="submit_btn">
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</section>

<?php 
	$fullname = $this->session->userdata['logged_in']['fullname'];
	$username = $this->session->userdata['logged_in']['username'];
	$userid = $this->session->userdata['logged_in']['id'];

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
		$enquiryadd = $row['enquiryadd'];
		$enquiryedit = $row['enquiryedit'];
		$enquirylist = $row['enquirylist'];
		$enquiryreport = $row['enquiryreport'];
		$moneyrecptadd = $row['moneyrecptadd'];
		$moneyrecptedit = $row['moneyrecptedit'];
		$moneyrecptlist = $row['moneyrecptlist'];
		$moneyrecptreport = $row['moneyrecptreport'];
		$travelenquiry = $row['travelenquiry'];
		$franchisee = $row['franchisee'];
		$travelagent = $row['travelagent'];
		$booking = $row['booking'];
		$bookinglist = $row['bookinglist'];
		$touradd = $row['touradd'];
		$tourlist = $row['tourlist'];
		$touredit = $row['touredit'];
	}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4 expand" id="clsp-sidebar-1">
    <button onclick="sidebar_clsp()" class="btn btn-light crm-collapse d-block" ><i class="lni-cross-circle"></i></button>
	<a  class="brand-link" style="text-align: center">
		<img src="<?php echo base_url(); ?>assets/logo/sailani-logo.png" alt="Sailani Tours Logo" style="max-height: 80px;">
	</a>
	<div class="">&nbsp;</div>
	<div class="sidebar">

	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item has-treeview">
				<a href="<?php echo base_url();?>dashboard" <?php $a=$this->uri->segment(1); if($a=="dashboard"){ ?> class="nav-link active" <?php } else { ?> class="nav-link" <?php } ?>>
					<i class="lni-home"></i>
					<p>Reset Password<i class="lni-chevron-right right"></i></p>
				</a>
			</li>
		</ul>
	</nav>
	</div>
</aside>
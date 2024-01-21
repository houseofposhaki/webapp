		<footer class="main-footer">
			<div class="d-none d-sm-inline-block"></div>
			<div class="float-right d-none d-sm-inline-block">
			</div>
		</footer>
	</div>

	<script src="<?php echo base_url(); ?>assets/dist/js/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>$.widget.bridge('uibutton', $.ui.button)</script>
	<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/tempusdominus-bootstrap-4.min.js"></script>
	<!--script src="<?php echo base_url(); ?>assets/dist/js/summernote-bs4.min.js"></script-->
	<script src="https://designalogoo.com/public/admin/js/summernote.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery.overlayScrollbars.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

	<script src="<?php echo base_url(); ?>assets/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/buttons.bootstrap4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/datatable/js/buttons.print.min.js"></script>
	

	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatable').DataTable();
			$('#datatableWithBtn').DataTable({
				dom: 'Bfrtip',
				buttons: [
					{extend: 'excel', text: 'Export to Excel', className: 'mr-2'}, 
					{extend: 'pdf', text: 'Export to PDF', className: 'mr-2'}, 
					{extend: 'print', text: 'Print'}
				]
			});				
		} );
	</script>
	<script src="<?php echo base_url(); ?>assets/dist/js/datepicker.min.js"></script>
	<script>
		$('#min').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd' 
		});
		$('#max').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd' 
		});
		$('#tentativedate').datepicker({
// 			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd' 
		});
		$('#depature').datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd' 
		});
// 		$('#dob1').datepicker({
// 			uiLibrary: 'bootstrap4',
// 			format: 'yyyy-mm-dd' 
// 		});

		
	</script>

	<!-- <script src="<?php //echo base_url(); ?>assets/dist/js/additional-methods.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/dist/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/dist/js/formValidation.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/intlTelInput.min.js"></script>
	<script>
		var input = document.querySelector("#mobileno");
		window.intlTelInput(input,{initialCountry: "IN"});
	</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo base_url();?>assets/dates/jquery-ui.multidatespicker.js"></script>
	<script>
		$(function () {
			$('#departuredate').multiDatesPicker();
            $('[data-toggle="popover"]').popover({
				html: true
			})
		});
	</script>
	<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/* $(".editor").each(function () {
				CKEDITOR.replace( $(this).attr("name") );
			}); */
			$('.editor').summernote({
				height: 300
			});
		});
	</script>
</body>
</html>
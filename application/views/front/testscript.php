<script type="text/javascript">
				$(document).ready(function(){
					$(document).on('keyup change','.qty',function(){
						var sno = $('#sno').val();
						alert(sno);die;
						var cartid = $('#cartid').val();
						var qty = $('#qty').val();
						var productprice = $('#productprice').val();
						var itemtotal = (qty*productprice);
						var successmsg = "Your cart has updated";
						$.ajax({
							url: '<?=base_url()?>Cart/updatecartajax',
							type: 'post',
							cache: false,
							data: {cartid:cartid,itemtotal: itemtotal,qty:qty},
							success: function(response){
								$('#itemtotal').text(itemtotal);
								$('#successmsg').show();
								$('#successmsg').text(successmsg);
							}
						});
					});
				});
			</script>
<div class="main_container">
	<legend> 
		<h1>
			<span class="fa fa-book"> Format 21 (CN174D-1002-01(H1))
			</span>
		</h1>
	</legend>
	<div id="div_system_message"></div>
	<div class="panel">
		<div class="btn-container">
			<p class="align-right">
				<button class="btn btn-primary fa fa-plus" id="btn_create_new_label"> Create New</button>
				<?php session_start(); ?>
				<?php								
					echo '<button class="btn btn-primary fa fa-print" id="btn_reprint_label"> Re-Print</button>';
				?>
				<button class="btn btn-danger fa fa-trash" id="btn_delete_label"> Delete</button>
			</p>
		</div>
		<div id="container_label">
			<table id="tbl_format21" class="table table-bordered" style="font-size:12px;">
				<thead>
					<tr>
						<th style="width:1%;">Select</th>
						<th>Customer P/N</th>
						<th>Manufacture P/N</th>
						<th>Qty</th>
						<th>Date Code</th>
						<th>LotNo</th>
						<th>Emp Number</th>
						<th>Partial</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_new_sticker">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <div class="row">
			<div class="col-sm-6">
				<h4 class="modal-title"><span class="fa fa-plus"></span> Create New Label</h4>
			</div>
			<div class="col-sm-6">
				<p style="text-align:right;"><button class="btn btn-primary fa fa-search" id="btn_search_modal"> Search</button></p>
			</div>
		</div>
      </div>
      <div class="modal-body">
        <form id="frm_new_label">
			<div class="row">
				<div class="col-sm-6">
					<label class="control-label">Customer P/N:</label>
					<input type="text" class="form-control" name="txt_pn" id="txt_pn" tabindex="1" value="xxxxxxxx" readonly required>
					
					<label class="control-label">Manufacture P/N:</label>
					<input type="text" class="form-control" name="txt_mpn" id="txt_mpn" tabindex="3" value="CN174D-1002-01(H1)" readonly required>
					
					<label class="control-label">Date Code:</label>
					<input type="text" class="form-control" name="txt_date" id="txt_date" tabindex="5" placeholder="" required>
				</div>
				<div class="col-sm-6">
					<label class="control-label">Qty:</label>
					<div class="row">
						<div class="col-sm-6">
					        <?php								
									echo '<input type="number" class="form-control" name="txt_qty" id="txt_qty" tabindex="2" data-qty="0" required>';
							?>    
						</div>
					</div>					
					<label class="control-label">Lot Number:</label>
					<div class="row" id="container_lot_number">
						<div class="col-sm-6"> 
							<input type="text" class="form-control" name="txt_lot_no" id="txt_lot_no" tabindex="4" placeholder="----" required>
						</div>
						<!--<div class="col-sm-1 no-padding">
							-
						</div>
						<div class="col-sm-4 no-padding"> 
							<input type="text" class="form-control" name="txt_lot_no_count" id="txt_lot_no_count" placeholder="001" required>
						</div>-->
					</div>
					<label class="control-label">Print Qty:</label>
					<div class="row">
						<div class="col-sm-4">
							<input type="number" class="form-control" name="txt_print_qty" id="txt_print_qty" tabindex="6" value="1" required>
						</div>
					</div>
				</div>
			</div>
			<h3>Sticker Format (Print Preview)</h3>
			<div id="sticker_preview">
				<p class="align-center"><img src="../img/C3_Label_Format/formatna.jpg" class="image"></p>
			</div>
			<br>
			<div class="alert alert-warning" style="padding: 3px 10px; display: none;">
				<label class="control-label">
					<input type="checkbox" class="" name="ckb_partial" id="ckb_partial" tabindex="">
					Partial
				</label>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary fa fa-print" id="btn_new_print"> Print</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_delete_label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-trash"></span> Selected label for delete</h4>
      </div>
      <div class="modal-body">
        <form id="frm_delete_label">
			<div id="container_tbl_selected_labels">
				<table class="table table-bordered" id="tbl_selected_labels">
					<thead>
						<tr>
							<th>Customer P/N</th>
							<th>Manufacture P/N</th>
							<th>Qty</th>
							<th>Date Code</th>
							<th>LotNo</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div id="container_delete_message">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger fa fa-trash" id="btn_confirm_delete"> Proceed</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_re_print_label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-print"></span> Re-Print Label</h4>
      </div>
      <div class="modal-body">
        <form id="frm_re_print_label">
			<div id="container_tbl_selected_labels_re_print">
				<table class="table table-bordered" id="tbl_selected_labels_re_print">
					<thead>
						<tr>
							<th>Customer P/N</th>
							<th>Manufacture P/N</th>
							<th>Qty</th>
							<th>Date Code</th>
							<th>LotNo</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<div id="container_message_re_print">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success fa fa-print" id="btn_confirm_re_print"> Print</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modal_search">
  <div class="modal-dialog" style="width:400px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-search"></span> Search</h4>
      </div>
      <div class="modal-body">
        <form id="frm_search">
			<div class="row">
				<div class="col-sm-5">
					<label>Search Category</label>
				</div>
				<div class="col-sm-7">
					<select class="form-control" id="cmb_search_category">
						<option value="PONo">PO Number</option>
						<option value="CODE">Product Code</option>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<label>Search</label>
				</div>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="txt_search_pattern">
				</div>						
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default fa fa-close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success fa fa-search" id="btn_confirm_re_print"> Search</button>
		</form>
	  </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="mdl_employee_number_scanner" data-formid="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header border-bottom-0 pb-0">
				<!-- <h5 class="modal-title" id="exampleModalLongTitle"></h5> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body pt-0">
				<div class="text-center text-secondary">
					Please scan your ID.
					<h1><i class="fa fa-barcode fa-lg"></i></h1>
				</div>
				<input type="text" id="txt_employee_number_scanner" autocomplete="off" class="hidden_scanner_input" style="position: absolute;opacity:0;">
			</div>
		</div>
	</div>
</div>
<!-- /.Modal -->

<script>
/* Handler and Username */
var handler = '../handler/handler.php';
var username = $('hd_username').val();

/* Array of for selected rows */
var array_selected = [];

/* Datatables serverside configuration */
var oTable = $('#tbl_format21').DataTable( {
	"bProcessing": true,
	"bServerSide": true,
	"aaSorting"	 : [],
	"sAjaxSource"		: "../server_side/format21.php"
} );


/* Create new label button event */
$('#btn_create_new_label').click(function(){
	/* clear data */
	/* To be added later on */
	// $('#sticker_preview div').empty();
	/* display modal */
	$('#modal_new_sticker').modal('show');
	get_work_week();
});

/* Preview Events */
// $('#txt_itemname').on('keyup change', function(){ change_preview_value('preview_item_name',$(this).val()); });
// $('#txt_qty').keyup(function(){ change_preview_value('preview_qty',$(this).val() + 'pcs'); });
// $('#txt_order_no').keyup(function(){ change_preview_value('preview_order_no',$(this).val()); });
// $('#txt_lot_no').keyup(function(){ change_preview_value('preview_lot_no',$(this).val() +'-'+ $('#txt_lot_no_count').val()); });
// $('#txt_remarks').keyup(function(){ change_preview_value('preview_remarks',$(this).val()); });

/* load preview */
function change_preview_value(div_id,div_value){
	$('#'+div_id).empty();
	$('#'+div_id).append(div_value);
}

/* creation of datalist for itemname */
create_datalist_item_name();

/* function for creation of datalist */
function create_datalist_item_name(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: "action=get_all_item_name",
		url		: handler,
		success	: function(result){
			/* generates a datalist and append it to the body */
			var html = '<datalist id="list_item_name">';
			for(x=0;x<result['item_name'].length;x++){
				html += '<option>'+result['item_name'][x]+'</option>';
			}
			html += '</datalist>';
			$('body').append(html);
			/* assign data list to the txt_itemaname */
			$('#txt_mpn').attr('list','list_item_name');
		},error : function(){
			alert('error handler');
		}
		
	});
}

/* event to automatically load the next lotno */
// $('#txt_lot_no').change(function(){
// 	var pn 			= $('#txt_pn').val();
// 	var lotno 		= $(this).val();
// 	check_existing_item_name_and_lotno(pn,lotno);
// });

/* function for checking existing item name and lotno */
// function check_existing_item_name_and_lotno(pn,lotno){
// 	var data = {
// 		"action" 	: "check_existing_item_name_and_lotno_format21",
// 		"pn"		: pn,
// 		"lotno"		: lotno
// 	}
// 	data = $.param(data);
// 	$.ajax({
// 		type	: "post",
// 		dataType: "json",
// 		data	: data,
// 		url		: handler,
// 		success	: function(result){
// 			/* clear lot no count field, then append the new one */
// 			$('#txt_lot_no_count').val(result['lotno_extension']);
// 			// $('#preview_lot_no').empty();
// 			// $('#preview_lot_no').append($('#txt_lot_no').val() +'-'+ $('#txt_lot_no_count').val());
// 		}
// 	});
// }
$('#ckb_partial').change(function(){
	if($(this).prop('checked') == true){
		$('#txt_qty').attr('readonly',false);
		$('#txt_qty').val('0');
	}
	else{
		$('#txt_qty').attr('readonly',true);
		$('#txt_qty').val( $('#txt_qty').attr('data-qty') );
	}
});
/* event when pressing submit on the add label modal */
$('#frm_new_label').submit(function(e){
	e.preventDefault();
	//---
	var action =  'frm_new_label';
	if( $('#ckb_partial').is(':checked') ){
		action = 'frm_new_label_partial';
	}	
	$('#txt_employee_number_scanner').val('');
	$('#mdl_employee_number_scanner').attr('data-formid',action).modal('show');
	//---
});
function frm_new_label(){
	var data = {
		"action"	: "save_new_c3_label_format21",
		"format_no"	: "21t",
		"username"	: username,
		"txt_employee_number_scanner"	: $('#txt_employee_number_scanner').val(),
		"partial"	:$('#ckb_partial').prop('checked'),
	}
	data = $.param(data) + '&' + $('#frm_new_label').serialize();
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* send zpl code to the printer */
			print_labels(result['label']);
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* clear all input in modal */
			$('#frm_new_label input').val('');	
			$('#txt_pn').val('xxxxxxxx');	
			$('#txt_mpn').val('CN174D-1002-01(H1)');
			$('#txt_qty').val('');//novs
			// $('#txt_qty').val('240');//novs
			get_work_week();
		}
	});
}
function validate_user(position,arr){
	//---
	var data2 = {
		'employee_id' 				: $('#txt_employee_number_scanner').val(),
		'status' 					: 1,
	};
	$.ajax({
		'data'      : data2,
		'type'      : 'get',
		'dataType'  : 'json',
		'url'       : 'http://rapidx/NAAYES/api/users.php',
		success : function(data3){
			var alert_msg = '';
			if($.trim(data3)){
				if(jQuery.inArray(data3[0]['position'], position) !== -1){
					switch( arr['action'] ){
						case 'frm_new_label':
							frm_new_label();
							break;

						default:
						break;
					}
				}
				else{
					alert_msg = 'Please scan Supervisor or QC Inspector\'s ID for partial qty.';
					if(data3[0]['position']!='4'){
						alert_msg = 'Invalid ID. Please scan Operator\'s ID.';
					}
				}
			}
			else{
				alert_msg = 'User ID not found in PATS.';
			}
			//---
			if(alert_msg){
				alert(alert_msg);
				return;
			}
			//---
		}
	});
}
//----------
//----------
//----------
$( ".modal" ).on('shown.bs.modal', function(){
	$(this).find('.hidden_scanner_input').focus();
});
$(document).on('keypress',function(e){
	if( ($("#mdl_employee_number_scanner").data('bs.modal') || {}).isShown ){
		$('#txt_employee_number_scanner').focus();
		if( e.keyCode == 13 ){
			$('#mdl_employee_number_scanner').modal('hide');
			var formid = $("#mdl_employee_number_scanner").attr('data-formid');

			if ( ( formid ).indexOf('#') > -1){
				$( formid ).submit();
			}
			else{
				switch( formid ){
					case 'frm_new_label':
						var arr = [];
						arr['action'] = 'frm_new_label';
						validate_user(['4','1','2','5'],arr);
						break;
					case 'frm_new_label_partial':
						var arr = [];
						arr['action'] = 'frm_new_label';
						validate_user(['1','2','5','7','8'],arr);
						break;
					default:
					break;
				}
			}
		}
	}
});
//----------
//----------
//----------
/* event for reprinting labels */
$('#btn_reprint_label').click(function(){
	/* validation to checkk if no record was selected */
	if(array_selected.length == 0){
		alert("No Record Selected!");
		return false;
	}
	/* hide the container message, display the table container, display print button */
	$('#container_message_re_print').hide();
	$('#container_tbl_selected_labels_re_print').show();
	$('#btn_confirm_re_print').show();
	/* function for generating value for records to be printed, appends the value to the table */
	load_selected_label_info('#tbl_selected_labels_re_print');
	/* display modal */
	$('#modal_re_print_label').modal('show');
});

/* event when a reprint button was submitted */
$('#frm_re_print_label').submit(function(e){
	e.preventDefault();
	/* do reprinting here */
	reprint_label();
});

/* event for deleting a label */
$('#btn_delete_label').click(function(){
	/* validation to checkk if no record was selected */
	if(array_selected.length == 0){
		alert("No Record Selected!");
		return false;
	}
	/* hide the container message, display the table container, display delete button */
	$('#container_delete_message').hide();
	$('#container_tbl_selected_labels').show();
	$('#btn_confirm_delete').show();
	/* function for generating value for records to be deleted, appends the value to the table */
	load_selected_label_info('#tbl_selected_labels');
	$('#modal_delete_label').modal('show');
});

/* event when delete label confirmation was clicked */
$('#frm_delete_label').submit(function(e){
	e.preventDefault();
	/* do deletion here */
	delete_label();
});

/* function for reprinting label */
function reprint_label(){
	var data = {
		"action"	 	: "reprint_label_format21",
		"array_pkid" 	: array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* pass the zpl commands for printing */
			print_labels(result['label']);
			/* display the message and hides the table container and re-print button */
			$('#container_message_re_print').empty();
			$('#container_message_re_print').append('<div class="alert alert-success"><h3>Label has been re-printed!<h3></div>');
			$('#container_message_re_print').show();
			$('#container_tbl_selected_labels_re_print').hide();
			$('#btn_confirm_re_print').hide();
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* empty the array */
			array_selected = [];
		}
	});
}

/* function for deleting label */
function delete_label(){
	var data = {
		"action"	 	: "delete_label_format21",
		"array_pkid" 	: array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			$('#container_delete_message').empty();
			/* display the message and hides the table container and delete button */
			$('#container_delete_message').append('<div class="alert alert-success"><h3>'+result['msg']+'<h3></div>');
			$('#container_delete_message').show();
			$('#container_tbl_selected_labels').hide();
			$('#btn_confirm_delete').hide();
			/* reload datatable serverside */
			oTable.ajax.reload();
			/* empty the array */
			array_selected = [];
		}
	});
}

/* get all selected row data */
function load_selected_label_info(tbl_id){
	var data = {
		"action"	 : "load_selected_label_info_format21",
		"array_pkid" : array_selected
	}
	data = $.param(data);
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: data,
		url		: handler,
		success	: function(result){
			/* append table data to the specified table */
			$(tbl_id+' tbody').empty();
			$(tbl_id+' tbody').append(result['html']);
		}
	});
}

/* event when checkbox is clicked */
$('#tbl_format21 tbody').on('click','#chk_select', function(){
	var selected_row = $(this).closest('tr');
	var pkid = selected_row.find('td:eq(1) #hd_pkid').val();
	/* validate if the checkbox is checked, remove the pkid to the array if not checked, else append it to the array */
	var selected = $(this).prop('checked');
	if(selected == false){ 
		selected_row.attr('style','');
		remove_value_from_array(pkid);
		console.log(array_selected);
	}else{
		selected_row.attr('style','background:teal;color:white;');
		push_new_value_to_array(pkid);
	}
	
});

/* function to remove an element(value) to the array */
function remove_value_from_array(value_remove){
	array_selected = jQuery.grep(array_selected, function(value) {
	  return value != value_remove;
	});
}

/* function to add an element(value) to the array */
function push_new_value_to_array(value_new){
	/* check if the value is existing in the array */
	var exist = 0;
	for(x=0;x<array_selected.length;x++){
		if(array_selected[x] == value_new){
			exist = 1;
		}
	}
	/* if not existing(0) add to the array */
	if(exist == 0){
		array_selected.push(value_new);
		console.log(array_selected);
	}
}

/* additional functions */
$('#btn_search_modal').click(function(){ $('#modal_search').modal('show'); });

$('#frm_search').submit(function(e){
	e.preventDefault();
	var search_category 	= $('#cmb_search_category').val();
	var search_pattern 		= $('#txt_search_pattern').val();
	search_item(search_category,search_pattern);
});

function search_item(search_category,search_pattern){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=search_item&search_category='+search_category+'&search_pattern='+search_pattern,
		url		: handler,
		success	: function(result){
			$('#txt_mpn').val('');
			// $('#txt_pn').val('');
			if(result['exist'] == 0){
				alert('Record does not exist!');
				return false;
			}
			$('#txt_mpn').val(result['item_name'][0]);
			// assign_fix_value( result['item_name'][0] );
			// $('#txt_pn').val( result['PONo'][0].substring(0, 10) );
            default_values(result['item_name'][0]);
			$('#modal_search input').val("");
			$('#modal_search').modal('hide');
		}, error : function(){
			alert('error handler');
		}
	});
}
    
function default_values(device_name){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=get_cn_default_value&item_name='+device_name,
		url		: handler,
		success	: function(result){
			console.log(result);
			$('#txt_qty').val("");
			$('#txt_pn').val(result['data']['customer_pn']);
//			$('#txt_remarks').val("");
			$('#txt_qty').val(result['data']['quantity']);//novs
			$('#txt_qty').attr('data-qty',result['data']['quantity']);//novs
//			$('#txt_order_no').val(result['data']['order_no']);
//			$('#txt_remarks').val(result['data']['remarks']);
//			change_preview_value( 'preview_item_name',$('#txt_itemname').val() );
//			change_preview_value( 'preview_qty',$('#txt_qty').val() );
//			change_preview_value( 'preview_remarks',$('#txt_remarks').val() );			
		}, error : function(){
			alert('error handler');
		}
	});
}

function assign_fix_value(devicename){
	if( devicename == "CA009-S101-001(01)" ){
		$('#txt_pn').val('14200358');
		// $('#txt_qty').val('240');//novs
		$('#txt_qty').val('');//novs
		get_work_week();
	}
}

function get_work_week(){
	$.ajax({
		type	: "post",
		dataType: "json",
		data	: 'action=get_work_week',
		url		: handler,
		success	: function(result){
			$('#txt_date').val(result['work_week']);
		}, error : function(){
			alert('error handler');
		}
	});
}

/* the zpl commands are sent here for printing */
function print_labels(array_label){
	findPrinter('ZT220',array_label);
}
//--------------------
//prevent typing of barcode/qr code
//--------------------
$(document).on('keydown',function(e){
	if ($("#txt_employee_number_scanner").is(":focus")) {
	  setTimeout(function() {
	  	$("#txt_employee_number_scanner").val('');
	  }, 200);
	}
});
//--------------------
//prevent typing of barcode/qr code
//--------------------
</script>
<!--Zebra Printing Stuff-->
<script type="text/javascript" src="../LabelPrinter/js/deployJava.js"></script>
<script type="text/javascript" src="../js/zpl_print_script.js"></script>

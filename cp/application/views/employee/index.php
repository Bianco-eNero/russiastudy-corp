
<?php usort($tableGrid, "SiteHelpers::_sort"); ?>
<div class="page-content row">

    <div class="page-content-wrapper m-t">

		<div class="ajaxLoading"></div>
		<div id="employeeView"></div>			
		<div id="employeeGrid">

<div class="sbox"  >
	<div class="sbox-title" >  
	<?php $this->load->view('employee/toolbar');?>
	</div>
	<div class="sbox-content" style="min-height: 500px;">
			

			<div class="table-responsive">
			<table id="employeeTable" class="table table-striped table-bordered table-hover display" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		            <th>ID</th>	
		            <?php if($setting['view-method'] =='expand') { ?><th></th><?php } ?>
	            <?php foreach ($tableGrid as $t) :
					if($t['view'] =='1'):
						$limited = isset($t['limited']) ? $t['limited'] :'';
						if(SiteHelpers::filterColumn($limited ))
						{
							echo '<th align="'.$t['align'].'" >'.SiteHelpers::activeLang($t['label'],(isset($t['language'])? $t['language'] : array())).'</th>';				
						} 
					endif;
				endforeach; ?>
					</tr>

				</thead>	
		               
		        <tfoot>
		            <tr>
		            	<th>ID</th>
		            	<?php if($setting['view-method'] =='expand') { ?><th></th><?php } ?>
	             <?php foreach ($tableGrid as $t) :
					if($t['view'] =='1'):?>
						<th><?php echo SiteHelpers::transForm($t['field'] , $tableForm) ;?></th>
				<?php endif;
				endforeach; ?>
		            </tr>
		        </tfoot>
		    </table>
		    </div>
		</div>
		</div>
	</div>	
</div>

<script type="text/javascript">

	$(document).ready(function() {

		$('.dataselect').select2();
		var rows_selected = []; 			
	   	var table = $('#employeeTable').DataTable( {
	        "processing": true,
	        "serverSide": true,
	        // "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	        "ajax": {
	            "url": "<?php echo site_url('employee/data');?>",
	            "type": "POST"
        	},
        	"columnDefs": [{ 
        		"targets": [0],
                "visible": false
        	},{ 
        		"targets": [<?php echo $sortable;?>],
                "orderable": false
        	}],
        	"columns": [<?php echo $column;?>],
        	'order': [[1, 'asc']],
        	<?php if($access['is_excel'] ==1 ) { ?>
        	dom: 'Bfltip',
        	buttons: [
            	'copy', 'csv', 'excel', 'pdf', 'print'
        	]
        	<?php } ?>
        	
	    });

	   	<?php if($setting['view-method'] =='expand'): ?>
		$('#employeeTable tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row( tr );
	        var id = row.data().rowId;

	        if ( row.child.isShown() ) {
	        	 row.child.hide();
            	tr.removeClass('shown');
	        }
	        else {
	            // Open this row
	            row.child.show();	            
	            row.child( expand_child(id) ).show();
	            tr.addClass('shown');
	            $.get('<?php echo site_url("employee/show") ;?>/'+id , function(callback){
	            	$('#'+id).html(callback);
	            	$('#'+id).addClass('data');
	            })
		        
	            
	        }
    	});
    	<?php endif; ?>


	    $('#employeeTable').Sdtable({
	    	tableId : '#employee',
	    	table   : table,
	    	action  : '<?php echo site_url("employee");?>' 
	    });

	   
	});


    function expand_child( id )
    {
    	return '<div id="'+ id+'"><p class="text-center"> Loading Content .. Please wait</p></div>';	
    }

</script>
<?php if($access['is_excel'] ==1 ) { ?>

<script type="text/javascript" src="<?php echo site_url('sximo/js/plugins/datatables/jszip.min.js') ;?>"></script>
<script type="text/javascript" src="<?php echo site_url('sximo/js/plugins/datatables/pdfmake.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('sximo/js/plugins/datatables/vfs_fonts.js') ?>"></script>
<?php } ?>

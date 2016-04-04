<script type="text/javascript">
$(document).ready(function() 
{ 
   $('#feedback_bar').hide();
   // init_table_sorting();
    enable_select_all(); 
    enable_row_selection();
    enable_search('<?php echo site_url("$controller_name/suggest")?>','<?php echo $this->lang->line("common_confirm_search")?>');
    //enable_email('<?php echo site_url("$controller_name/mailto")?>');
    enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>','<?php echo $this->lang->line($controller_name."_none_selected")?>');

    // following method will set the desired url and msg content in  modal existing in header.jsp by prashant 
    $('#excelImport').on('click',function () {    	
    	$('#modal-form').find('.modal-title').html('<div class="mb-title"><i class="fa fa-info-circle"></i> <strong>Import customers from Excel sheet</strong></div>');
    	  	
    	$.ajax({
                    type: 'POST',			
                    url: '<?php echo site_url("customers/excel_import");?>',
                    dataType:'html',
                    cache: false,
                    success: function(data){
                            // setting the content in the modal
                            $('#modal-form').find('.modal-body').html(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            $('#modal-form').find('.modal-body').html('Communication Failure');		
                    }, 
                    // following code will run regardless of success/failure
                    complete: function( xhr, status ) {
                            // code that run anyhow
                    } 
		});
	});
        
     //datatables
    table = $('#sortable_table').dataTable({
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('customers/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ,-1 ], //first and last column
            "orderable": false //set not orderable
        },
        ] ,
        "aLengthMenu": [
            [5, 10, 20, 30, 50, 100, -1],
        	[5, 10, 20, 30, 50, 100, "All"] // change per page values here
        ],
        // set the initial value
        "iDisplayLength": 5
        
       
    });
   

}); 
</script>
         <div class="row">
            &nbsp;
        </div> 
        <!-- START BREADCRUMB -->
           <ul class="breadcrumb">
               <li><a href="<?php echo site_url("home");?>"><i class="fa fa-lg fa-home"></i></a></li>         
               <li><label >Customer List</label></li>
           </ul>
       <!-- END BREADCRUMB -->       
        <!-- feedback-bar div show the json return message's on delete -->
         <div  id="feedback_bar"> 
         
         </div>      
         <?php if($this->session->flashdata('flashSuccess')):?>
            <div class="alert alert-success"> 
              <button type="button" class="close" data-dismiss="alert">x</button>
               <?=$this->session->flashdata('flashSuccess')?> 
            </div>
        <?php endif ?>  
        <?php if($this->session->flashdata('flashError')):?>
           <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>
                 <?=$this->session->flashdata('flashError')?>
            </div>
        <?php endif?>   
        <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                             <a class='btn btn-success btn-xs' href="<?php echo site_url("$controller_name/view/-1/");?>"><?php echo $this->lang->line($controller_name.'_new');?></a>
                             <a href="#" class="excelImport" id="excelImport" data-toggle="modal" data-target="#modal-form" title="Import from excel">
                                    <span class="btn btn-info btn-condensed btn-xs">Excel Import</span>
                            </a>
                             <a  href="<?php echo site_url("$controller_name/delete")?>" id="delete" class="btn btn-xs btn-danger"><?php echo  $this->lang->line("common_delete"); ?></a>
                        </div>
                        <div class="panel-body">                  
                            <table id="sortable_table" class="table table-striped table-bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                       <th><input type="checkbox" id="select_all" /></th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Account</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>      
                            </table>                     
                            </div>  
                       </div>
                     
            </div>
       <!-- /. ROW  -->
       
    </div> 
     
</body>
</html>
       


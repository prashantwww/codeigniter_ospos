
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="panel panel-default">
        <div class="panel-heading">                            
            <b><a href="<?php echo site_url("customers/excel");?>">Download Import Excel Template (CSV)</a></b>
        </div>  
        <div class="panel-body">
            <form action="<?php echo site_url("customers/do_excel_import");?>" method="post" id="item_form" enctype="multipart/form-data">
                <div class="row">
                   <div class="col-md-12">		                	
                        <div class="col-lg-12">                                        
                           <div class="form-group">
                              <label>File path<span class="text-danger">*</span></label>
                              <input type="file"  value="" name="file_path" class="form-control input-sm" />
                          </div>
                        </div>
                   </div>    
                </div>
                <div class="form-group pull-right">
                    <button type="reset" class="btn btn-sm btn-primary clear">Clear Form</button>                                    
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
        </div>
       </div>
     </div>
</div> <!-- end of row -->  
<ul id="error_message_box"></ul>
<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{	
	$('#item_form').validate({
		submitHandler:function(form)
		{
			$(form).ajaxSubmit({
			success:function(response)
			{
				tb_remove();
				post_person_form_submit(response);
			},
			dataType:'json'
		});

		},
		errorLabelContainer: "#error_message_box",
 		wrapper: "li",
		rules: 
		{
			file_path:"required"
   		},
		messages: 
		{
   			file_path:"Full path to excel file required"
		}
	});
});
</script>
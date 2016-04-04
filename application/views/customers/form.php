<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{
	$('#customer_form').validate({				
		rules: 
		{
		first_name: "required",
		last_name: "required",
    		email: "email"
   		},
	    errorClass: 'help-block',
	    highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            }
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
            <li><label >Manage Customer</label></li> 
        </ul>
    <!-- END BREADCRUMB -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">                        
                        <strong>Manage Customer</strong>
                        <div class="btn-group pull-right">                               
                                <a href="<?php echo site_url("customers");?>" class="btn btn-xs btn-default"><span class="fa fa-lg fa-arrow-circle-o-left"></span> Back</a>
                        </div>
                    </div>
                    <div class="panel-body">   
                       <!-- here in form action we passed param person id for edit, we can use this form for add n edit both operations --> 
                       <form action="<?php echo site_url('customers/save/'.$person_info->person_id);?>" method="post" accept-charset="utf-8" id="customer_form"> 
                            <h5 class="text-info"><?php echo $this->lang->line("customers_basic_information"); ?></h5>                        
                            <?php $this->load->view("people/form_basic_info"); ?>                            
                            <div class="row">      
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                        <label>Account#</label>
                                       
                                        <input type="text" class="form-control" name="account_number" id="account_number"  value="<?php echo $person_info->account_number?>" placeholder="Enter account#"/>
                                    </div>
                                </div>
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Taxable </label> 
                                     <div>
                                        <input type="radio" name="taxable" id="taxable" value="1"  <?php if($person_info->taxable==1){?> checked="checked"  <?php } ?>>Yes
                                         &nbsp;   
                                        <input type="radio" name="taxable" id="taxable" value="0" <?php if($person_info->taxable==0){?> checked="checked"  <?php } ?>>No
                                    </div>
                                </div> 
                              </div>
                            </div>    <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="panel-footer">
                                   <button type="reset" class="btn btn-primary clear">Clear Form</button>                                    
                                    <button type="submit" class="btn btn-success">Submit</button>                               
                            </div>
                        </form> <!-- end form-->	
                    </div>
                </div>
            </div>
        </div>
        <!--/.ROW-->
   
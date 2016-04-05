        <div class="row">
            &nbsp;
        </div>
        <!-- START BREADCRUMB -->
           <ul class="breadcrumb">
               <li><a href="<?php echo site_url("home");?>"><i class="fa fa-lg fa-home"></i></a></li>         
               <li><label >Dashboard</label></li>
           </ul>
       <!-- END BREADCRUMB --> 
        <div class="row">
            <?php
            foreach($allowed_modules->result() as $module)
            {
            ?>            
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">                    
                    <h3> <a href="<?php echo site_url("$module->module_id");?>"></h3>                   
                    <img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" border="0" alt="Menubar Image" /></a><br />
                    <a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a>
                     - <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
                </div>
            </div>               
	<?php                        
	}
	?>
        </div> 
   
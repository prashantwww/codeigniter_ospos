
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-line">DASHBOARD</h4>
            </div>
        </div>
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
   
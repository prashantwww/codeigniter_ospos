<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>assets/img/ospos_logo.jpg" width="160px" height="50px"/>
                    <?php echo date('F d, Y') ?>
                </a>
            </div>
            <div class="right-div">
                <a href="<?php echo site_url("home/logout");?>" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo site_url("home");?>" >Dashboard</a></li>                            
                            <?php
                            foreach($allowed_modules->result() as $module)
                            {
                            ?>
                                <li><a href="<?php echo site_url("$module->module_id");?>"><?php echo $this->lang->line("module_".$module->module_id) ?></a></li>
                            <?php
                            }
                            ?>    
                        </ul>
                    </div>
                </div>

            </div>
            
        </div>
    </section>
  <!-- MENU SECTION END-->
  
  <div class="modal fade" id="delete-confirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Confirm Delete</h3>
            </div>  
            <div class="modal-body">
                <strong><p id="delete-confirmation-msg"></p> </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="delete-confirmation-yes">Remove</button>
            </div>
        </div>
    </div>
</div>  
<div class="modal fade" id="delete-not-selected">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3>Confirm Delete</h3>
            </div>    
            <div class="modal-body">
                <strong><p id="delete-not-selected-msg"></p> </strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                
            </div>
        </div>
    </div>
</div>
<!-- Modal: Ajax form starts -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	 <div class="modal-header">
        	 	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <!-- modal body will be filled by javascript code -->
            </div>
        </div>
    </div>
</div>
<!-- Modal: Ajax form ends -->
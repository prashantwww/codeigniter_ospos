
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <base href="<?php echo base_url(); ?>" />
        <title>Point Of Sale</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <!-- FONT AWESOME STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.css"/>
        <!-- CUSTOM STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
         <!-- CUSTOM STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css" />
        <!-- GOOGLE FONT -->
        <link href='<?php echo base_url(); ?>assets/css/fonts-googleapis.css' rel='stylesheet' type='text/css' />

        <script>BASE_URL = '<?php echo site_url(); ?>';</script>

        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    </head>
    <body>
        <div class="content-wrapper">
            <div class="container" id="login-container">
                <div class="row">
                    <div class="col-md-12" align="center">
                       <h1> Point Of Sale <?php echo $this->config->item('application_version'); ?></h1>
                    </div>
                </div>
                <div class="row row-centered">                    
                    <div class="col-md-6 col-centered" >                    
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                Login Form 
                            </div>
                            <div class="panel-body">                            
                                <form action="<?php echo site_url('login');?>" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" name="username"/>
                                        <p class="help-block">Help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password"/>
                                        <p class="help-block">Help text here.</p>
                                    </div>
                                    <button type="submit" class="btn btn-info">Login </button>
                                </form>                                
                            </div>
                        </div>
                    </div>        
                </div>
                <!--/.ROW-->    
                 <!-- <?php echo validation_errors(); ?> -->
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
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END-->
    </body>
</html>  


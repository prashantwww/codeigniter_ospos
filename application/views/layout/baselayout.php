<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
	<base href="<?php echo base_url();?>" />
	<title>Point Of Sale</title>
	 <!-- BOOTSTRAP CORE STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" />
	<!-- FONT AWESOME STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css"/>
	<!-- CUSTOM STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/autocomplete.css" />
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/style.css" />
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/thickbox.css" />
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/css/custom.css" />
        <!-- GOOGLE FONT -->
        <link href='<?php echo base_url(); ?>assets/css/fonts-googleapis.css' rel='stylesheet' type='text/css' />
        
        <!-- Datatable STYLE  -->
        <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css"/>
                
        <script>BASE_URL = '<?php echo site_url();?>';</script>
        
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="<?php echo base_url();?>assets/js/bootstrap.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <!-- CUSTOM SCRIPTS  -->
        
        <script src="<?php echo base_url();?>assets/js/jquery.tablesorter.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/js/jquery.autocomplete.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/js/manage_tables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/js/thickbox.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
       
         <script src="<?php echo base_url();?>assets/js/jquery.validate.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
       
         <!-- browser JQUERY  -->
        <script src="<?php echo base_url();?>assets/js/jquery.browser.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/js/common.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        
         <!-- datatable JQUERY  -->
        <script src="<?php echo base_url();?>assets/datatables/js/jquery.dataTables.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        <script src="<?php echo base_url();?>assets/datatables/js/dataTables.bootstrap.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
        
</head>
<body>
        <!-- BEGIN HEADER -->   
	 <?php if($header) echo $header ;?>
	<!-- END HEADER -->
        <div class="content-wrapper">
            <div class="container">		
                <!-- BEGIN BODY CONTAINER -->
                 <?php if($body) echo $body ;?>
                <!-- END BODY CONTAINER -->
	     </div>
         </div>
	<!-- BEGIN FOOTER -->
	 <?php if($footer) echo $footer ;?>
	<!-- END FOOTER -->
    
</body>
</html>

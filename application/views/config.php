<script type='text/javascript'>

//validation and submit handling
$(document).ready(function()
{
	$('#config_form').validate({				
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
            <li><label >Store Config</label></li>           
        </ul>
    <!-- END BREADCRUMB -->
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
                <div class="panel panel-primary">
                    <div class="panel-heading">                        
                        <strong>Manage Store</strong>
                        <div class="btn-group pull-right">                               
                                <a href="<?php echo site_url("home");?>" class="btn btn-xs btn-default"><span class="fa fa-lg fa-arrow-circle-o-left"></span> Back</a>
                        </div>
                    </div>
                    <div class="panel-body">                  
                       <form action="<?php echo site_url('config/save/');?>" method="post" accept-charset="utf-8" id="config_form"> 
                            <h5 class="text-info"><?php echo $this->lang->line("config_info"); ?> </h5>                                                      
                            <div class="row">      
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                        <label>Company Name</label>                                       
                                        <input type="text" class="form-control" name="company" id="company"  value="<?php echo $this->config->item("company"); ?>" placeholder="Enter company name"/>
                                    </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Phone </label> 
                                     <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $this->config->item("phone"); ?>" placeholder="Enter phone no"/>
                                   </div>
                                </div> 
                                 <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Address </label>                                        
                                       <textarea class="form-control" rows="2" cols="66" name="address" placeholder="Enter address"><?php echo $this->config->item('address')?></textarea>                             
                                    </div>
                                </div> 
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="row">      
                                <div class="col-lg-3">                                        
                                    <div class="form-group">
                                        <label>Tax Name 1</label>                                       
                                        <input type="text" class="form-control" name="default_tax_1_name" id="default_tax_1_name"  value="<?php echo $this->config->item('default_tax_1_name')!==FALSE ? $this->config->item('default_tax_1_name') : $this->lang->line('items_sales_tax_1') ?>" placeholder="default tax 1 name"/>
                                  </div>
                                </div>                              
                                 <div class="col-lg-1">                                        
                                    <div class="form-group">
                                     <label>&nbsp;</label> 
                                      <input type="text" class="form-control" name="default_tax_1_rate" id="default_tax_1_rate"  value="<?php echo $this->config->item("default_tax_1_rate"); ?>" placeholder="rate%"/>
                                   </div>
                                </div> 
                                <div class="col-lg-3">                                        
                                    <div class="form-group">
                                        <label>Tax Name 2</label>                                       
                                        <input type="text" class="form-control" name="default_tax_2_name" id="default_tax_2_name"  value="<?php echo $this->config->item('default_tax_2_name')!==FALSE ? $this->config->item('default_tax_2_name') : $this->lang->line('items_sales_tax_2') ?>" placeholder="default tax 2 name"/>
                                  </div>
                                </div>                              
                                 <div class="col-lg-1">                                        
                                    <div class="form-group">
                                     <label>&nbsp;</label> 
                                      <input type="text" class="form-control" name="default_tax_2_rate" id="default_tax_2_rate"  value="<?php echo $this->config->item('default_tax_2_rate')?>" placeholder="rate%"/>
                                   </div>
                                </div>
                                <div class="col-lg-3">                                        
                                    <div class="form-group">
                                        <label>Currency Symbol</label>                                       
                                        <input type="text" class="form-control" name="currency_symbol" id="currency_symbol"  value="<?php echo $this->config->item('currency_symbol')?>" placeholder="Enter currency symbol"/>
                                    </div>
                                </div>
                                <div class="col-lg-1">                                        
                                    <div class="form-group">
                                     <label>Right side </label>                                     
                                     <input type="checkbox" value="<?php echo $this->config->item('currency_side')?>" class="form-control"  name="currency_side" id="currency_side" <?php if($this->config->item('currency_symbol')==0){?> checked="checked"  <?php } ?> />
                                </div>
                                </div> 
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="row">      
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                        <label>Email</label>                                       
                                        <input type="text" class="form-control" name="email" id="email"  value="<?php echo $this->config->item('email')?>" placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Fax </label> 
                                     <input type="text" class="form-control" name="fax" id="fax"  value="<?php echo $this->config->item('fax')?>" placeholder="Enter fax"/>
                                   </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Website</label> 
                                     <input type="text" class="form-control" name="website" id="website"  value="<?php echo $this->config->item('website')?>" placeholder="Enter website"/>
                                   </div>
                                </div>
                                 
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="row">      
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                        <label>Return policy</label>                                 
                                        <textarea class="form-control" rows="2" name="return_policy" placeholder="Enter return policy"><?php echo $this->config->item('return_policy')?></textarea>                                     
                                    </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Language </label> 
                                       <select class="form-control" name="language" id="language">
                                            <option value="en">English</option>
                                            <option value="es">Spanish</option>
                                            <option value="ru">Russian</option>
                                            <option value="nl-BE">Dutch</option>
                                            <option value="zh">Chinese</option>
                                            <option value="id">Indonesian</option>
                                            <option value="fr">French</option>
                                            <option value="th">Thai</option>
                                        </select>
                                   </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Timezone </label> 
                                    <select class="form-control" name="timezone" id="timezone">                                           
                                    <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                    <option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                    <option value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands</option>
                                    <option value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
                                    <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                                    <option value="America/Ensenada">(GMT-08:00) Tijuana, Baja California</option>
                                    <option value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                    <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option value="America/Denver">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                    <option value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                                    <option value="America/Belize">(GMT-06:00) Saskatchewan, Central America</option>
                                    <option value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                    <option value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                                    <option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option value="America/New_York">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option value="America/Havana">(GMT-05:00) Cuba</option>
                                    <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                    <option value="America/Caracas">(GMT-04:30) Caracas</option>
                                    <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                    <option value="America/La_Paz">(GMT-04:00) La Paz</option>
                                    <option value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
                                    <option value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                                    <option value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                    <option value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                    <option value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                    <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                    <option value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre</option>
                                    <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                    <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
                                    <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                    <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                    <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                    <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                    <option value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast</option>
                                    <option value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin</option>
                                    <option value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon</option>
                                    <option value="Europe/London">(GMT) Greenwich Mean Time : London</option>
                                    <option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                                    <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                    <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                    <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                    <option value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
                                    <option value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                    <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                    <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                    <option value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                    <option value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
                                    <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                    <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                    <option value="Asia/Damascus">(GMT+02:00) Syria</option>
                                    <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                    <option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                    <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                    <option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
                                    <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                    <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                    <option value="Asia/Baku">(GMT+05:00) Baku</option>
                                    <option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                    <option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
                                    <option value="Asia/Kolkata" selected="selected">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                    <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                    <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                    <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                    <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                    <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                    <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                    <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                    <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                    <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                    <option value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                    <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                    <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                    <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                    <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                    <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                    <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                    <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                    <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                    <option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island</option>
                                    <option value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia</option>
                                    <option value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                    <option value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                                    <option value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
                                    <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                    <option value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                    <option value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
                                    <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                    <option value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                                    </select>                                      
                                   </div>
                                </div>                                 
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                             <div class="row">      
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                        <label>Stock location</label>                                       
                                        <input type="text" class="form-control" name="stock_location" id="stock_location"  value="<?php echo $location_names?>" placeholder="Enter stock location"/>
                                    </div>
                                </div>
                                <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Sales Invoice Format </label> 
                                     <input type="text" class="form-control" name="sales_invoice_format" id="sales_invoice_format"  value="<?php echo $this->config->item('sales_invoice_format')?>" placeholder="Enter Sales Invoice Format"/>
                                   </div>
                                </div> 
                                 <div class="col-lg-4">                                        
                                    <div class="form-group">
                                     <label>Receivings Invoice Format </label> 
                                       <input type="text" class="form-control" name="recv_invoice_format" id="recv_invoice_format"  value="<?php echo $this->config->item('recv_invoice_format')?>" placeholder="Enter Receivings Invoice Format"/>
                                   </div>
                                </div> 
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="row">      
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                        <label>Print receipt after sale</label>                                       
                                        <input type="checkbox" value="<?php echo $this->config->item('print_after_sale')?>" class="form-control"  name="print_after_sale" id="print_after_sale" <?php if($this->config->item('print_after_sale')=='print_after_sale'){?> checked="checked"  <?php } ?> />
                                    </div>
                                </div>
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Tax Included </label> 
                                     <input type="checkbox" value="<?php echo $this->config->item('tax_included')?>" class="form-control"  name="tax_included" id="tax_included" <?php if($this->config->item('tax_included')=='tax_included'){?> checked="checked"  <?php } ?>/>
                                   </div>
                                </div>   
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                        <label>Custom Field 1</label>                                       
                                        <input type="text" class="form-control" name="custom1_name" id="custom1_name"  value="<?php echo $this->config->item('custom1_name')?>" placeholder="Custom 1 name"/>
                                    </div>
                                </div>
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 2 </label> 
                                     <input type="text" class="form-control" name="custom2_name" id="custom2_name"  value="<?php echo $this->config->item('custom2_name')?>" placeholder="Custom2 name"/>
                                   </div>
                                </div>
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 3 </label> 
                                     <input type="text" class="form-control" name="custom3_name" id="custom3_name"  value="<?php echo $this->config->item('custom3_name')?>" placeholder="Custom3 name"/>
                                   </div>
                                </div>
                                 <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 4 </label> 
                                     <input type="text" class="form-control" name="custom4_name" id="custom4_name"  value="<?php echo $this->config->item('custom4_name')?>" placeholder="Custom4 name"/>
                                   </div>
                                </div>
                              </div> <!-- end of row -->
                            <div class="row"> &nbsp; </div>
                            <div class="row">                                
                                 <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 5 </label> 
                                     <input type="text" class="form-control" name="custom5_name" id="custom5_name"  value="<?php echo $this->config->item('custom5_name')?>" placeholder="Custom5 name"/>
                                   </div>
                                </div> 
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 6 </label> 
                                     <input type="text" class="form-control" name="custom6_name" id="custom6_name"  value="<?php echo $this->config->item('custom6_name')?>" placeholder="Custom6 name"/>
                                   </div>
                                </div> 
                                <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 7 </label> 
                                     <input type="text" class="form-control" name="custom7_name" id="custom7_name"  value="<?php echo $this->config->item('custom7_name')?>" placeholder="Custom7 name"/>
                                   </div>
                                </div> 
                                 <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 8 </label> 
                                     <input type="text" class="form-control" name="custom8_name" id="custom8_name"  value="<?php echo $this->config->item('custom8_name')?>" placeholder="Custom8 name"/>
                                   </div>
                                </div> 
                                 <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 9 </label> 
                                     <input type="text" class="form-control" name="custom9_name" id="custom9_name"  value="<?php echo $this->config->item('custom9_name')?>" placeholder="Custom9 name"/>
                                   </div>
                                </div> 
                                 <div class="col-lg-2">                                        
                                    <div class="form-group">
                                     <label>Custom Field 10 </label> 
                                     <input type="text" class="form-control" name="custom10_name" id="custom10_name"  value="<?php echo $this->config->item('custom10_name')?>" placeholder="Custom10 name"/>
                                   </div>
                                </div> 
                              </div> <!-- end of row -->
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
   
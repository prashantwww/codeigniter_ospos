<div class="row">
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>First Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="first_name" id="first_name" autofocus="autofocus" value="<?php echo $person_info->first_name?>" placeholder="Enter first name"/>
        </div>
    </div>
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Last Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="last_name" id="last_name"  value="<?php echo $person_info->last_name?>" placeholder="Enter last name"/>
        </div>
    </div>
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email"  value="<?php echo $person_info->email?>" placeholder="Enter email"/>
        </div>
    </div>
</div> <!-- end of row -->

<div class="row">
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number"  value="<?php echo $person_info->phone_number?>" placeholder="Enter Phone Number"/>
        </div>
    </div>
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Address 1</label>
            <input type="text" class="form-control" name="address_1" id="address_1"  value="<?php echo $person_info->address_1?>" placeholder="Enter Address 1"/>
        </div>
    </div>
     <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Address 2</label>
            <input type="text" class="form-control" name="address_2" id="address_2"  value="<?php echo $person_info->address_2?>" placeholder="Enter Address 2"/>
        </div>
    </div>
</div> <!-- end of row -->

<div class="row">
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" id="city"  value="<?php echo $person_info->city?>" placeholder="Enter city"/>
        </div>
    </div>    
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>State</label>
             <input type="text" class="form-control" name="state" id="state"  value="<?php echo $person_info->state?>" placeholder="Enter state"/>
        </div>
    </div>
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Zip</label>
             <input type="text" class="form-control" name="zip" id="zip"  value="<?php echo $person_info->zip?>" placeholder="Enter zip"/>
        </div>
    </div>

</div> <!-- end of row -->

<div class="row">
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" name="country" id="country"  value="<?php echo $person_info->country?>" placeholder="Enter country"/>
        </div>
    </div>    
    <div class="col-lg-4">                                        
        <div class="form-group">
            <label>Comments</label>             
             <textarea class="form-control" rows="2" name="comments" placeholder="Enter comments">
                <?php echo $person_info->comments?>
             </textarea>    
        </div>
    </div>
</div> <!-- end of row -->

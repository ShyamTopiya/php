<!DOCTYPE html>
<?php require_once 'functions.php'?>
<html>
    <head>
        <title>Registration Form</title>
        <style>
            label{
                display: inline-block;
                width :200px;
            }
        </style>
    </head>
    <body>
        <form action="registrationUsingFunction.php" method="POST">
            <div class="account">
                <div class="prefix">
                    <label>prefix</label>
                    <?php $prefix = ["Mr","Mrs","Dr"]?>
                    <select name="account[prefix]">
                        <?php foreach($prefix as $items):?>
                          <?php $selectedValue = (getValues('account','prefix') == $items) ? "selected" : ""?>  
                        <option value="<?php echo $items ?>"
                        <?php echo $selectedValue?>>
                        <?php echo $items?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div><br>
                <div class="firstName">
                    <label>firstName</label>
                    <input type="text" name="account[fname]" value="<?php echo getvalues('account','fname');?>">
                </div><br>
                <div class="lastName">
                    <label>lastName</label>
                    <input type="text" name="account[lname]" value="<?php echo getvalues('account','lname');?>">
                </div><br>
                <div class="dob">
                    <label>DateOfBirth</label>
                    <input type="date" name="account[dob]" value="<?php echo getvalues('account','dob');?>">
                </div><br>
                <div class="phoneNumber">
                    <label>phone Number</label>
                    <input type="tel" name="account[phoneNumber]" value="<?php echo getvalues('account','phoneNumber');?>" maxlength="10">
                </div><br>
                <div class="email">
                    <label>Email</label>
                    <input type="email" name="account[email]" value="<?php echo getvalues('account','email');?>">
                </div><br>
                <div class="password">
                    <label>Password</label>
                    <input type="password" name="account[password]" value="<?php echo getvalues('account','password');?>">
                </div><br>
                <div class="cpassword">
                    <label>Confirm Password</label>
                    <input type="password" name="account[cpassword]" value="<?php echo getvalues('account','cpassword');?>">
                </div><br>
            </div>
            <hr>
            <div class="address-info">
                <div class="address">
                    <label>Address</label>
                    <textarea name="address-info[address]" cols="30" rows="3"><?php echo getValues('address-info','address');?></textarea>
                </div><br>
                <div class="company">
                    <label>Company</label>
                    <input type="text" name="address-info[company]" value="<?php echo getValues('address-info','company');?>">
                </div><br>
                <div class="city">
                    <label>City</label>
                    <input type="text" name="address-info[city]" value="<?php echo getValues('address-info','city');?>">
                </div><br>
                <div class="state">
                    <label>State</label>
                    <input type="text" name="address-info[state]" value="<?php echo getValues('address-info','state');?>">
                </div><br>
                <div class="country">
                    <label>Country</label>
                    <?php $country = ["india","pakistan","USA"]?>
                    <select name="address-info[country]">
                        <?php foreach($country as $items):?>
                          <?php $selectedValue = (getValues('address-info','country') == $items) ? "selected" : ""?>  
                        <option value="<?php echo $items ?>"
                        <?php echo $selectedValue?>>
                        <?php echo $items?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div><br>
                <div class="postalCode">
                    <label>Postal Code</label>
                    <input type="tel" name="address-info[postalcode]" value="<?php echo getValues('address-info','postalcode');?>" maxlength="6">
                </div><br>
            </div><hr>
            <div class="other-info">
                <div class="aboutYourSelf">
                    <label>Describe Yourself</label>
                    <textarea cols="30" rows="3" name="other-info[aboutYourSelf]"><?php echo getValues('other-info','aboutYourSelf');?></textarea>
                </div><br>
                <div class="profile-image">
                    <label>Profile Image</label>
                    <input type="file" name="other-info[profileImage]" value="<?php echo getValues('other-info','profileImage')?>">
                </div><br>
                <div class="certificate">
                    <label>Certificate Upload</label>
                    <input type="file" name="other-info[certificate]" value="<?php echo getValues('other-info','certificate')?>">
                </div><br>
                <div class="bussiness">
                    <label>Bussiness</label>
                    <?php $bussiness = ["Under 1 year","1-2 year","2-5 year","5-10 year","over 10 years"]?>  
                    <?php foreach($bussiness as $items):?>
                        <?php $checkedValue = (getValues('other-info','bussiness') == $items) ? 'checked' : "" ?>
                        <input type="radio" name="other-info[bussiness]" value="<?php echo $items?>"
                        <?php echo $checkedValue?>>
                        <?php echo $items?>
                    <?php endforeach;?>
                </div><br>
                <div class="uniqueClient">
                    <label>Number of unique clients you see each week?</label>
                    <?php $uniqueClient = ["1-5","6-10","11-15","15+"]?>
                    <select name="other-info[uniqueClient]">
                        <?php foreach($uniqueClient as $items):?>
                          <?php $selectedValue = (getValues('other-info','uniqueClient') == $items) ? "selected" : ""?>  
                        <option value="<?php echo $items ?>"
                        <?php echo $selectedValue?>>
                        <?php echo $items?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </div><br>
                <div class="getInTouch">
                    <label>How do you like us to get in touch with you?</label>
                    <?php $getInTouch = ["Post","Email","SMS","Phone"]?>  
                    <?php foreach($getInTouch as $items):?>
                        <?php $checkedValue = array_intersect(getValues('other-info','getInTouch'),[$items]) ? 'checked' : "" ?>
                        <input type="checkbox" name="other-info[getInTouch][]" value="<?php echo $items?>"
                        <?php echo $checkedValue?>>
                        <?php echo $items?>
                    <?php endforeach;?>
                </div><br>
                <div class="Hobbies">
                    <label>Hobbies</label>
                       
                        <select name="other-info[hobbies][]" multiple>
                        <?php $hobbies = ["ListingToMusic","Traveling","Blogging","Sports"];?>  
                        
                            <?php foreach($hobbies as $items): ?>
                                <?php $checkedValue = array_intersect(getValues('other-info','hobbies'),[$items]) ? 'selected' : "" ?>
                                <option value="<?php echo $items ; ?>" <?php echo $checkedValue ;?>>
                                <?php echo $items ; ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    
                </div><br>
            </div><hr>
            <div>
                    <input type="submit" name="submit">
                </div>
        </form>
    </body>
</html>
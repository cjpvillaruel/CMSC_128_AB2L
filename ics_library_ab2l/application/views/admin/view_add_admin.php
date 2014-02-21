<script>
        window.onload=function(){
                regForm.adminkey.onblur=validateAdminkey;
                regForm.fname.onblur=validateFname;
                regForm.minit.onblur=validateMinitial;
                regForm.lname.onblur=validateLname;
                regForm.eadd.onblur=validateEmail;
                regForm.uname.onblur=validateUser;
                regForm.pass.onblur=validatePass;
                regForm.cpass.onblur=validateCpass;
                regForm.onsubmit=validateAll;
            }
            
    function validateFname(){
        str=regForm.fname.value;
        msg="Invalid Input: ";
        
        if (str=="") msg+="First name is required!";
        else if (!str.match(/^[A-Z|a-z|\s]{3,50}$/))  msg+="Must be between 3-50 alpha character!<br/>";
        else if(msg="Invalid input") msg="";
        document.getElementsByName("helpfname")[0].innerHTML=msg;
        if(msg=="") return true;
    }   
    function validateMinitial(){
        str=regForm.minit.value;
        msg="Invalid Input: ";
        
        if (str=="") msg+="Middle Initial is required!";
        else if (!str.match(/^[A-Z]{1,3}\.$/))  msg+="Must be between 1-3 capital alpha character ended by period!<br/>";
        else if(msg="Invalid input") msg="";
        document.getElementsByName("helpmname")[0].innerHTML=msg;
        if(msg=="") return true;
    }
    function validateLname(){
                str=regForm.lname.value;
                msg="Invalid Input: ";
                
                if (str=="") msg+="Last name is required!";
                else if (!str.match(/^[A-Z|a-z\s]{2,50}$/))  msg+="Must be between 2-50 alpha character!<br/>";
                else if(msg="Invalid input") msg="";
                document.getElementsByName("helplname")[0].innerHTML=msg;
                if(msg=="") return true;
            }
    function validateAdminkey(){
                str=regForm.adminkey.value;
                msg="Invalid Input: ";
                
                if (str=="") msg+="Admin key is required!";
                else if (!str.match(/^[A-Za-z0-9]{4,10}$/))  msg+="Must be between 4-10 alphanumeric character!<br/>";
                else if(msg="Invalid input") msg="";
                document.getElementsByName("helpadminkey")[0].innerHTML=msg;
                if(msg=="") return true;
            }
            
    function validateEmail(){
                str=regForm.eadd.value;
                msg="Invalid Input: ";
            
                if (str=="") msg+="Email is required!";
                else if (!str.match(/^(\w|\.){6,30}\@([0,9]|[a-z]|[A-Z]){3,}\./))  msg+="Must be in the form: name@domain.extension!<br/>";
                else if(msg="Invalid input") msg="";
                document.getElementsByName("helpemail")[0].innerHTML=msg;
                if(msg=="") return true;
            }
    function validateUser(){
                str=regForm.uname.value;
                msg="Invalid Input: ";
                
                if (str=="") msg+="Username is required!";
                else if (!str.match(/^[A-Z|a-z|0-9]{3,20}$/))  msg+="Must be between 3-20 alpha numeric character!<br/>";
                else if(msg="Invalid input") msg="";
                document.getElementsByName("helpusername")[0].innerHTML=msg;
                if(msg=="") return true;
            }
    
    function validatePass(){
                str=regForm.pass.value;
                msg="";

                if (str=="") msg+="Password is required!";
                else if (str.match(/^([a-z]+|\d+)$/))  msg+="Invalid Input: Strength: Weak";
                else if (str.match(/^[a-zA-z]+$/))  msg+="Invalid Input: Strength: Medium";
                else if (str.match(/^[a-zA-z0-9]+$/))  msg+="Strength: Strong";
                else if(msg="") msg="";
                document.getElementsByName("helppassword")[0].innerHTML=msg;
                if(msg=="Strength: Strong") return true;
        }       
    function validateCpass(){
            str=regForm.pass.value;
            str2=regForm.cpass.value;
            msg="Invalid Input: ";
            
            if(str2=="") msg+="Confirmation of password is required!";
            else if (str2!=str){
                msg+="Password Mismatch"
            }
            else if(msg="") msg="";
            document.getElementsByName("helpcpassword")[0].innerHTML=msg;
            return true;
        }
    function validateAll(){
        if(validateFname()&&validateMinitial()&&validateLname()&&validateNumber()&&/*validateCollege()&&validateCourse()&&
           validateClassification()&&*/validateEmail()&&validateUser()&&validatePass()&&validateCpass())
        {
            return true;
        }
        else{return false;}
    }   
</script>

<div id="main-container" class="body width-fill">
					<div class="col">
                            <div class="cell">
                                <div class="page-header cell">
                                        <h1>Admin <small>Add Admin</small></h1>
                                    </div>
                                <div class="col width-fill">
                                    <div class="col">
                                        <div class="cell panel">
                                            <div class="body">
                                                <div class="cell">
                                                    <div class="col">
                                                        <div class="cell">
                                                            <?php 
                                                                $this->load->helper('form');
                                                                 $attributes = array('name' => 'regForm');
                                                                echo form_open('index.php/admin/controller_add_admin/registration',$attributes); 
                                                            ?>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">Administrator Key<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="adminkey" class="background-white" id = "admin_key" required placeholder="Administrator's Key"/>&nbsp;<span name="helpadminkey" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">First name<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="fname" class="background-white" id = "fname" required placeholder="First Name"/>&nbsp;<span name="helpfname" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">Middle name<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="minit" class="background-white" id = "minit" required placeholder="Middle Initial"/>&nbsp;<span name="helpmname" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="lastname">Last name<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="lname" class="background-white" id = "lname" required placeholder="Last Name"/>&nbsp;<span name="helplname" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="email">Email Address<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="email" name="eadd" class="background-white" id = "eadd" required placeholder="Email Address"/>&nbsp;<span name="helpemail" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="username">Username<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="uname" class="background-white" id = "uname" required placeholder="Username"/>&nbsp;<span name="helpusername" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="password">Password<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="password" class="background-white" name="pass" id = "pass" required placeholder="Password"/>&nbsp;<span name="helppassword" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="password">Confirm Password<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="password" class="background-white" name="cpass" id = "cpass" required placeholder="Confirm Password"/>&nbsp;<span name="helpcpassword" class="validate color-red"></span><br/>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="hidden" name="parent_key" id = "parent_key" value="<?php echo "cmsccmsc"; ?>"required/>
                                                                        	<input type = "submit" value = "Add Administrator"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
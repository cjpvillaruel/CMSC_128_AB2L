<div id="main-container" class="body width-fill">
					<div class="col">
                            <div class="cell">
                                <div class="page-header cell">
                                        <h1>Admin <small>Add Users</small></h1>
                                    </div>
                                <div class="col width-fill">
                                    <div class="col">
                                        <div class="cell panel">
                                            <div class="body">
                                                <div class="cell">
                                                    <div class="color-red width-fill" style="font-weight: bold;"><p>
                                                        <?php 
                                                            if(isset($msg)){
                                                                echo $msg;
                                                             }

                                                     ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="cell">
                                                              <?php 
                                                                $attributes = array('name' => 'regForm');

                                                                echo form_open("index.php/admin/controller_add_user/registration", $attributes); ?>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">First name<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="fname" class="background-white" id = "fname" placeholder="Your first name" required  /><span class="cell validate" name = "valFname"></span>
                                                                        </div>
                                                                    </div>
                                                                    <span>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">Middle Initial<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="minit" class="background-white" id = "minit" placeholder="Your middle initial" required/><span class="cell validate" name = "valInitial"></span>
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
                                                                            <input type="text" name="lname" class="background-white" id = "lname" placeholder="Your last name" required/><span class="cell validate" name = "valLname"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="classification">Classification <span class="color-red cell validate"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <br/>
                                                                            <select id = "classi" name = "classi" onclick = "checker()" >
                                                                            <option value="student">Student</option>
                                                                            <option value="faculty">Faculty</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input style="display:none;" data-required="true" data-error-message="Classification is required">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col" id= "numDiv">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="studno" id = "labelNum">Student Number<span class="color-red cell validate"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="stdNum" class="background-white" placeholder="Your ID number" id = "stdNum" required/><span class="cell validate" name = "valNumber"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                    
                                                                <div class="col" id= "collegeDiv">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="college">College <span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <br/>
                                                                            <select id = "college" name = "college" onfocus = "courseChecker()" onclick = "courseChecker()"><span class="cell validate" name = "valCollege"></span>
            
                                                                            <option value="CA">CA</option>
                                                                            <option value="CAS">CAS</option>
                                                                            <option value="CDC">CDC</option>
                                                                            
                                                                            <option value="CEAT">CEAT</option>
                                                                            <option value="CEM">CEM</option>
                                                                            <option value="CFNR">CFNR</option>
                                                                            <option value="CHE">CHE</option>

                                                                            <option value="CVM">CVM</option>
                                                                            <!--option value="SESAM">SESAM</option>
                                                                            <option value="GS">GS</option>
                                                                            <option value="CPAf">CPAf</option-->
                                                                            
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input style="display:none;" data-required="true" data-error-message="College is required">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col" id= "courseDiv">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="college">Course <span class="color-red cell validate"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                <div class="col width-fill">
                                                                        <div class="cell"><br/>
                                                                            <select id = "course" name = "course" onfocus = "courseChecker()" >
          
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input style="display:none;" data-required="true" data-error-message="Course is required">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col" id = "divEadd">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="occupation">Email Address<span class="color-red cell validate"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="email" class="background-white" name="eadd" placeholder="Your email address" id = "eadd" required/><span class="cell validate" name = "valEmail"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="occupation">Username:<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" class="background-white" name="uname" id = "uname" required/><span class="cell validate" name = "valUser"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="occupation">Password:<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="password" class="background-white" name="pass" id = "pass" required/><span class="cell validate" name = "valPass"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="occupation">Confirm Password:<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="password" class="background-white" name="cpass" id = "cpass" required/><span class="cell validate" name = "valCpass"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            </br><input type="submit" value="Submit"/>
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
            <script src="<?php echo base_url() ?>js/formValidation.js"></script>
            <script src="<?php echo base_url() ?>js/register_validation.js"></script>
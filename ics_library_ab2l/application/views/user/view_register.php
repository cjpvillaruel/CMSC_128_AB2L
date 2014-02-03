<div class="cell body">
                                    <p class="tiny">Sign-up</p>
                                </div>
						<div class="col">
                            <div class="cell">
                                <div class="col width-fill">
                                    <div class="col">
                                    	<h4>Sign-up Form</h4>
                                        <div class="cell panel">
                                            <div id="regform" class="body">
                                                <div class="cell">
                                                	<p class="tiny">* - required field</p>
                                                    <div class="col">
                                                        <div class="cell">
                                                           <?php 
                                                                $attributes = array('name' => 'regForm');

                                                                echo form_open("user/controller_register/registration", $attributes); ?>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">First name<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="fname" class="background-white" id = "fname" placeholder="Your first name" required onfocus = "disabler()" /><span name = "valFname"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="firstname">Middle Initial<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="minit" class="background-white" id = "minit" placeholder="Your middle initial" required/><span name = "valInitial"></span>
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
                                                                            <input type="text" name="lname" class="background-white" id = "lname" placeholder="Your last name" required/><span name = "valLname"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                 <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="studno">Student Number<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="text" name="stdNum" class="background-white" placeholder="Your student number" id = "stdNum" required/><span name = "valNumber"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="classification">Classification <span class="color-red"> *</span></label>
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

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="college">College <span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <br/>
                                                                            <select id = "college" name = "college" onclick = "courseChecker()" ><span name = "valCollege"></span>
            
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

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            </br><label for="college">Course <span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                <div class="col width-fill">
                                                                        <div class="cell"><br/>
                                                                            <select id = "course" name = "course" >
          


                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input style="display:none;" data-required="true" data-error-message="Course is required">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                        <div class="cell">
                                                                            <label for="occupation">Email Address<span class="color-red"> *</span></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            <input type="email" class="background-white" name="eadd" placeholder="Your email address" id = "eadd" required/><span name = "valEmail"></span>
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
                                                                            <input type="text" class="background-white" name="uname" id = "uname" required/><span name = "valUser"></span>
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
                                                                            <input type="password" class="background-white" name="pass" id = "pass" required/><span name = "valPass"></span>
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
                                                                            <input type="password" class="background-white" name="cpass" id = "cpass" required/><span name = "valCpass"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="col width-1of4">
                                                                    </div>
                                                                    <div class="col width-fill">
                                                                        <div class="cell">
                                                                            </br><button class="button" type="submit">Submit</button>
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
            <script src="<?php echo base_url() ?>js/validation.js"></script>
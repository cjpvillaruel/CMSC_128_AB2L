<div class="cell body">
               
    </div>
    <div class="col">
        <div class="cell">
            <div class="col width-fill">
                <div class="col">
                   
                    <div class="cell panel">
                        <div id="regform" class="body">
                            <div class="cell">
                                <div class="color-red width-fill" style="font-weight: bold;"><p>
                                    <?php 
                                        if(isset($msg)){
                                            echo $msg;
                                         }

                                 ?>

                                  <h4><?php echo $name?></h4>
                                </div>
                               
                                <div class="col">
                                    <div class="cell">
                                       
                                    <span id="label_username">Username:</span><em id= "username"><?php echo  $user_details->username?></em><a id = "edit_username">Edit</a><br/>
                                    <span>Classification:</span><em><?php echo  $user_details->classification?></em><br/>
                                    <span>College:</span><em><?php echo  $user_details->college?></em><br/>
                                    <span>Course:</span><em><?php echo  $user_details->course?></em><br/>
                                    <span>Email:</span><em><?php echo  $user_details->email?></em><a id = "edit_email">Edit</a><br/>
                                    <span>Status:</span><em><?php echo  $user_details->status?></em><br/>
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
     <script >

        $( document ).ready(function(){   
         $("#edit_username").click(function(){
            name= $('#username').text();
         //   $("#label_username").append("<input type = 'text' id= 'input_username'name = 'new_username'><br><span>Enter password:</span><input type= 'text'><br><input type='submit' value= 'Save'> ");
          //  $("#input_username").append(" ");
            append= "<form id= 'form_username' method= 'post' action = 'controller_editprofile/edit_username'>";
             $("#label_username").append(append);
            
            append = "<input type = 'text' id= 'input_username'name = 'new_username'><br><span>Enter password:</span><input type= 'text' id ='pword_for_username' name ='pword_for_username'><br><input type='submit' disabled= 'return validate_new_un()' value= 'Save'>";
            $("#form_username").append(append);
            
            $("#input_username").val(name);
            $("#username").hide();
            $("#edit_username").hide();

        });

      });


        

      


     </script>

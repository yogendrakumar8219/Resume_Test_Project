<?php 

include_once('../eClass/UserTools.php');
$crud = new UserTools();

?><!DOCTYPE html>
<html lang="en">
<head>
<?php include('user_header.php'); ?>
<?php include('auth.php'); ?>
<?php include('config.php'); ?>
<?php 

// update info into database 'cover_letter_table' 
if(isset($_POST['btnsubmit']))
{
    // remove element of user input array
    unset($_POST['btnsubmit']);
    echo '<br>';

    if(!empty($_FILES['input_Photo_upload_path']['name'][0]))
    {
        // pass required info about file
        $add_name_file = 'user_photo'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
        $upload_dir = './user_cv_doc';
        $set_file_size = 500000; // 500 KB
        $no_of_files_upload = 1;
        $upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 

        // ****************Upload files on server Fn.**************** //
$test_array = $crud->uni_file_upload_fn($_FILES['input_Photo_upload_path'],$add_name_file,$upload_dir,$set_file_size,$no_of_files_upload,$upload_file_types);

print_r($test_array);

        // return an array with Rename of files >- print_R($test_array);
        // ********************************************************** //

        // delete old file from server
        $result2 = $crud->uni_select_fn($table_name['5_personal_info_table'],$_SESSION['SESS_user_id_cv_id']); 
        
        while($row2 = mysqli_fetch_array($result2))
            {
                if(isset($row2['input_Photo_upload_path']))
                {
                unlink("./user_cv_doc/".$row2['input_Photo_upload_path']);
                echo '<b>delete old photo file from server</b><br>';
                }
            }
        //

        $File_name_array = array('input_Photo_upload_path' => $test_array[0]);   
        // if image file found
        $cover_letter_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$File_name_array);
    }  
    else
    {
        $cover_letter_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST);
    }    

        echo "<b>user input data</b><br>";
        print_r($cover_letter_input);

        //where condition
        $where = $_SESSION['SESS_user_id_cv_id'];  

        if($crud->uni_update_fn($table_name['5_personal_info_table'],$cover_letter_input,$where))
          {

            echo '<hr>insert data<br>';

            // redirecting to next page
          echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=social_info.php" /><style> .show { display: none; }  </style>';
          }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['5_personal_info_table'],$_SESSION['SESS_user_id_cv_id']); 
    //echo mysqli_num_rows($result);

    while($row = mysqli_fetch_array($result))
    {
            echo "<br>";
            echo '<b>fetch data from table</b>';
            echo "<br>";
            extract($row);
            print_r($row);
    }
}

?>
</head>
<body>
<div class="show">
<?php include('user_navbar.php'); ?>

<div class="container-fluid">
    <div class="row mt-1">
       <?php include('cv_steps.php'); ?>
    </div>
</div>


<div class="container-fluid mb-5">
  <div class="row">

    <div class="col-sm-6 text-center">
        <div class="mt-5">
           Live Preview Here template when user Fill up info. working latter..
           <hr>          
        </div>
    </div>

    <div class="col-sm-6">                    
            <!-- card -->
            <div class="col-sm-12 float-left">
                <div class="card mb-4 rounded-0 shadow">                    
                    <div class="card-body">
                        
                            <h4 class="card-title text-center text-uppercase">
                            <small>COMPLETE YOUR <b>Personal information </b></small> <br>                          
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" enctype="MULTIPART/FORM-DATA">
  

                            <div class="form-row">
                               <?php if($input_Photo_upload_path) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $input_Photo_upload_path;  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($input_Photo_upload_path) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_Photo_upload_path">Photo Your Upload</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_Photo_upload_path" name="input_Photo_upload_path[]" multiple>
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Name">Full Name</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Name" id="input_Name" placeholder="Full Name" value="<?php if($input_Name) echo $input_Name;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="sex">Gender</label>
                                  <select name="input_Gender" id="input_Gender" class="form-control form-control-sm rounded-0">
                                    <option selected  disabled>Choose...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="input_Address">Address</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Address" id="input_Address" placeholder="1234 Main St" value="<?php if($input_Address) echo $input_Address;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Father_name">Father's Name</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Father_name" id="input_Father_name" value="<?php if($input_Father_name) echo $input_Father_name;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="input_Dob">Date of Birth</label>
                                  <input type="Date" class="form-control form-control-sm rounded-0" name="input_Dob" id="input_Dob" value="<?php if($input_Dob) echo $input_Dob;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Mobile_no">Mobile Number</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Mobile_no" id="input_Mobile_no" placeholder="Mobile Number" value="<?php if($input_Mobile_no) echo $input_Mobile_no;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="input_Whatsapp_no">Whatsapp Number</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Whatsapp_no" id="input_Whatsapp_no" placeholder="Whatsapp Number" value="<?php if($input_Whatsapp_no) echo $input_Whatsapp_no;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="input_Email_address">Email address</label>
                                  <input type="email" class="form-control form-control-sm rounded-0" name="input_Email_address" id="input_Email_address" placeholder="Email Address" value="<?php if($input_Email_address) echo $input_Email_address;  ?>">
                                </div>  
                                <div class="form-group col-md-4">
                                  <label for="input_Zoom_id">Zoom ID</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Zoom_id" id="input_Zoom_id" placeholder="Zoom ID" value="<?php if($input_Zoom_id) echo $input_Zoom_id;  ?>">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="input_Skype_id">Skype ID</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Skype_id" id="input_Skype_id" placeholder="Skype ID" value="<?php if($input_Skype_id) echo $input_Skype_id;  ?>">
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Language_known">Languages Known</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Language_known" id="input_Language_known" placeholder="Type Language Known" value="<?php if($input_Language_known) echo $input_Language_known;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="input_Nationality">Nationality</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Nationality" id="input_Nationality" placeholder="Type Your Nationality" value="<?php if($input_Nationality) echo $input_Nationality;  ?>">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="input_Hobbies">Hobbies</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" name="input_Hobbies" id="input_Hobbies" value="<?php if($input_Hobbies) echo $input_Hobbies;  ?>">
                                </div>
                              </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="input_Passport">Have Passport</label>
                                  <select name="input_Passport" id="input_Passport" class="form-control form-control-sm rounded-0">
                                    <option selected  disabled>Choose...</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="input_Drivers_licence">Have Driver’s Licence</label>
                                  <select name="input_Drivers_licence" id="input_Drivers_licence" class="form-control form-control-sm rounded-0">
                                    <option selected  disabled>Choose...</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                  </select>
                                </div>                                
                                <div class="form-group col-md-4">
                                  <label for="input_Vehicle_own">VEHICLE YOU OWN</label>
                                  <select name="input_Vehicle_own" id="input_Vehicle_own" class="form-control form-control-sm rounded-0">
                                    <option selected  disabled>Choose...</option>
                                    <option value="CAR">CAR</option>
                                    <option value="BIKE">BIKE</option>
                                    <option value="BOTH">BOTH</option>
                                    <option value="No">No</option>
                                  </select>
                                </div> 
                            </div>
                            

                            
                        <button type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary btn-orange rounded-0">Save & Next</button>
                        </form>


                        <!-- end from -->
                        </p>                        
                    </div>
                </div>
            </div>
            <!-- card -->

    </div>

  </div>
</div>

<div class="text-center bg-dark text-white fixed-bottom m-0">
  <p>@myfullcv.com</p>
</div>

</div>
</body>
</html>

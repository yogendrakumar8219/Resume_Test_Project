<?php 

include_once('../eClass/UserTools.php');
$crud = new UserTools();

?>
<!DOCTYPE html>
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

    if(!empty($_FILES['input_Signature_file']['name'][0]))
    {
        // pass required info about file
        $add_name_file = 'Signature'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
        $upload_dir = './user_cv_doc';
        $set_file_size = 500000; // 500 KB
        $no_of_files_upload = 1;
        $upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 

        // ****************Upload files on server Fn.**************** //
$test_array = $crud->uni_file_upload_fn($_FILES['input_Signature_file'],$add_name_file,$upload_dir,$set_file_size,$no_of_files_upload,$upload_file_types);

print_r($test_array);

        // return an array with Rename of files >- print_R($test_array);
        // ********************************************************** //

        // delete old file from server
        $result2 = $crud->uni_select_fn($table_name['2_cover_letter_table'],$_SESSION['SESS_user_id_cv_id']); 
        
        while($row2 = mysqli_fetch_array($result2))
            {
                if(isset($row2['input_Signature_file']))
                {
                unlink("./user_cv_doc/".$row2['input_Signature_file']);
                echo '<b>delete old sign file from server</b><br>';
                }
            }
        //

        $File_name_array = array('input_Signature_file' => $test_array[0]);   
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

        if($crud->uni_update_fn($table_name['2_cover_letter_table'],$cover_letter_input,$where))
          {

            // redirecting to next page
          echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=cv_temp.php" /><style> .show { display: none; }  </style>';
          }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['2_cover_letter_table'],$_SESSION['SESS_user_id_cv_id']); 
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
                            <small>Cover <b>Letter</b></small> <br>
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize" enctype="MULTIPART/FORM-DATA">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Name">Your Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Name" name="input_Name" placeholder="Your Name" value="<?php if($input_Name) echo $input_Name;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Title_name_organization">Present Title in the Company</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Title_name_organization" name="input_Title_name_organization" placeholder="Present Title in the Company" value="<?php if($input_Title_name_organization) echo $input_Title_name_organization;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Street_address">Your Streeet Address</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Street_address" name="input_Street_address" placeholder="Your Street Address" value="<?php if($input_Street_address) echo $input_Street_address;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Email">Email </label>
                                <input type="email" class="form-control form-control-sm rounded-0" id="input_Email" name="input_Email" placeholder="Email" value="<?php if($input_Email) echo $input_Email;  ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Mobile_no">Mobile Number / Home Phone</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Mobile_no" name="input_Mobile_no" placeholder="Mobile Number / Home Phone" value="<?php if($input_Mobile_no) echo $input_Mobile_no;  ?>">
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="input_City">City</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_City" name="input_City" placeholder="City" value="<?php if($input_City) echo $input_City;  ?>">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="input_State">State</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_State" name="input_State" placeholder="State" value="<?php if($input_State) echo $input_State;  ?>">
                                </div>                                
                                <div class="form-group col-md-4">
                                <label for="input_Zip_code">Zip Code</label>
                                <input type="number" class="form-control form-control-sm rounded-0" id="input_Zip_code" name="input_Zip_code" placeholder="Zip Code" value="<?php if($input_Zip_code) echo $input_Zip_code;  ?>">
                                </div>
                            </div>
                                                     
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_description">Letter Description</label>
                                <textarea placeholder="For Example: I am writing this letter to you to apply for the position of (desired position) in your company (company name). I came across the position via (mention job portal source) and wanted to apply for the same.

I have a degree in (the degree relevant to the desired position), and I have worked in the field before for over (number of months/years of experience) at (current or company name). During my time as (current or last position), I have learned valuable skills that appear relevant to the position desired by your company.

In my current position as (current position), I have achieved an exponential growth in the field by increasing overall (sales or marketing) statistics by at least (percentage).

I have learned that I enjoy working in this field and that I can prove to be a valuable asset with my present skill set. I enjoy working with like-minded people, and I am a team player. The challenges that the (desired position) offers is big, and I am sure that with an expert team I can take these challenges head-on.

Thank you for your time and for considering me as a candidate. I have mentioned my contact number and email id in my resume and will send a follow-up email next week if further information is required." class="form-control form-control-sm rounded-0" id="input_letter_description" name="input_letter_description" rows="20"><?php if($input_letter_description) echo $input_letter_description;  ?></textarea>
                                </div>
                            </div>
                        <div class="form-row">                              
                            <?php if($input_Signature_file) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $input_Signature_file;  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($input_Signature_file) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_Signature_file">Signature Upload</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_Signature_file" name="input_Signature_file[]" multiple>
                              </div>
                        </div>
<hr>
                             <button type="submit" id="btnsubmit" name="btnsubmit" class="btn btn-primary btn-orange rounded-0">Save & Next</button>
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

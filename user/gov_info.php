<?php 

include_once('../eClass/UserTools.php');
$crud = new UserTools();

?><html lang="en">
<head>
 <?php include('user_header.php'); ?>
 <?php include('auth.php'); ?>
 <?php include('config.php'); ?>

<?php 
// pass required info about file
$add_name_file = 'gov_'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
$upload_dir = './user_cv_doc';
$set_file_size = 500000; // 500 KB
$upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 


// First Time insert code
    if(isset($_POST['btnsubmit']))
    {
        // remove element of user input array
        unset($_POST['btnsubmit']);  

    $concatenate_array_file_name = array();

     for($i=1; $i<=6; $i++)
     {  if (!empty($_FILES['input_upload_doc'.$i]['name']))
          {
          $test_array = $crud->uni_1_file_upload_fn($_FILES['input_upload_doc'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
          $concatenate_array_file_name += array('input_upload_doc'.$i.'' => $test_array);  


        // delete old file from server
        $result2 = $crud->uni_select_fn($table_name['14_gov_info_table'],$_SESSION['SESS_user_id_cv_id']); 
                  
        while($row2 = mysqli_fetch_array($result2))
            {
               if(!empty($row2["input_upload_doc$i"]))
                {
                unlink("./user_cv_doc/".$row2["input_upload_doc$i"]);
                echo '<b>delete old photo file from server</b><br>';
                }           
            }
          }
      }
    

    //print_r($concatenate_array_file_name);
    $initial_question_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$concatenate_array_file_name);
    
        echo "<b>user input data</b><br>";
        print_r($initial_question_input);

                //where condition
        $where = $_SESSION['SESS_user_id_cv_id'];  
    

    if($crud->uni_update_fn($table_name['14_gov_info_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;updating please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=strengths.php" /><style> .show { display: none; }  </style>';
    }
    
}

//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result3 = $crud->uni_select_fn($table_name['14_gov_info_table'],$_SESSION['SESS_user_id_cv_id']); 
    $result4 = $crud->uni_select_fn($table_name['14_gov_info_table'],$_SESSION['SESS_user_id_cv_id']); 
    //echo mysqli_num_rows($result);

    while($row1 = mysqli_fetch_array($result3))
    {
            echo "<br>";
            echo '<b>fetch data from table</b>';
            echo "<br>";
            //extract($row);
            print_r($row1);
    }
    $row = mysqli_fetch_array($result3);

}
?>
</head>
<body>

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
                            <small>Government <b>information</b></small> <br>
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form method="post" enctype="MULTIPART/FORM-DATA">

                          <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label for="input_Gov_country_id">Country ID </label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_Gov_country_id" name="input_Gov_country_id" placeholder="Country ID" value="<?php if($row['input_Gov_country_id']) echo $row['input_Gov_country_id'];  ?>">
                                </div> 

                                <div class="form-group col-md-6">
                                <label for="input_Gov_name_on_id">Name on ID</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Gov_name_on_id" name="input_Gov_name_on_id" placeholder="Name on ID" value="<?php if($row['input_Gov_name_on_id']) echo $row['input_Gov_name_on_id'];  ?>" >
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Gov_number_issue">Number</label>
                                   <input type="text" class="form-control form-control-sm rounded-0" id="input_Gov_number_issue" name="input_Gov_number_issue" placeholder="Number" value="<?php if($row['input_Gov_number_issue']) echo $row['input_Gov_number_issue'];  ?>"  >
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_Gov_country_issue">Country if Issue</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Gov_country_issue" name="input_Gov_country_issue" placeholder="Country if Issue" value="<?php if($row['input_Gov_country_issue']) echo $row['input_Gov_country_issue'];  ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Gov_issue_date">Issue Date</label>
                                   <input type="date" class="form-control form-control-sm rounded-0" id="input_Gov_issue_date" name="input_Gov_issue_date" placeholder="Issue Date" value="<?php if($row['input_Gov_issue_date']) echo $row['input_Gov_issue_date'];  ?>">
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_Gov_expiry_date">Expiry Date</label>
                                <input type="date" class="form-control form-control-sm rounded-0" id="input_Gov_expiry_date" name="input_Gov_expiry_date" placeholder="Expiry Date" value="<?php if($row['input_Gov_expiry_date']) echo $row['input_Gov_expiry_date'];  ?>">
                                </div>
                            </div>
                            
                            <div class="form-row">
                            <?php for($i=1; $i<=2; $i++) {  ?>

                            <div class="col-md-6 border-bottom">

                                <img src="<?php  if(!empty( $row["input_upload_doc$i"] )){ echo $upload_dir.'/'.$row["input_upload_doc$i"]; }
                                else { echo '../site_image/no_preview.png'; } ?>" alt="Select image" id="<?php  echo "showPreviewLogo$i"; ?>" onclick="<?php  echo "clickFocus($i)"; ?>" width="120">
                            </div>

                            <div class="form-group col-md-6">
                              <label>Upload photo <?php echo $i; ?></label>
                              <input type="file" class="form-control-file border p-2 rounded-0" name="input_upload_doc<?php echo $i; ?>" id="<?php  echo "clickMeImage$i"; ?>" onchange="<?php  echo "readURL$i(this);"; ?>">
                            </div>
                            <!--  -->
                            <script>

                                function clickFocus(vbl){
                                    $('#clickMeImage'+vbl).click();
                                }

                                function readURL<?php  echo "$i"; ?>(input)
                                {
                                    if(input.files && input.files[0]){
                                        var reader = new FileReader();
                                        reader.onload= function (a){
                                            $('#showPreviewLogo'+<?php  echo "$i"; ?>).attr('src',a.target.result);
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }

                                }
                            </script>
                            <!--  -->
                          <?php } ?>

                          </div>    

                          <h6 class="text-left border-bottom border-info">DRIVER'S LICENSE</h6> 
                             
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="input_License_name_on_id">Name on ID</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_License_name_on_id" name="input_License_name_on_id" placeholder="Name on ID" value="<?php if($row['input_License_name_on_id']) echo $row['input_License_name_on_id'];  ?>">
                                </div>  
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_License_number">Driver's License Number</label>
                                   <input type="text" class="form-control form-control-sm rounded-0" id="input_License_number" name="input_License_number" placeholder="Number" value="<?php if($row['input_License_number']) echo $row['input_License_number'];  ?>">
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_License_country_issue">Driver's License Country if Issue</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_License_country_issue" name="input_License_country_issue" placeholder="Country if Issue" value="<?php if($row['input_License_country_issue']) echo $row['input_License_country_issue'];  ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_License_issue_date">Driver's LicenseIssue Date</label>
                                   <input type="date" class="form-control form-control-sm rounded-0" id="input_License_issue_date" name="input_License_issue_date" placeholder="Issue Date" value="<?php if($row['input_License_issue_date']) echo $row['input_License_issue_date'];  ?>">
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_License_expiry_date">Driver's License Expiry Date</label>
                                <input type="date" class="form-control form-control-sm rounded-0" id="input_License_expiry_date" name="input_License_expiry_date" placeholder="Expiry Date" value="<?php if($row['input_License_expiry_date']) echo $row['input_License_expiry_date'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                               <?php if($row['input_upload_doc3']) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $row['input_upload_doc3'];  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($row['input_upload_doc3']) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_upload_doc3">Driver's License Upload photo one</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_upload_doc3" name="input_upload_doc3">
                              </div>
                            </div>

                            <div class="form-row">
                               <?php if($row['input_upload_doc4']) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $row["input_upload_doc4"];  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($row['input_upload_doc4']) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_upload_doc4">Driver's LicenseUpload photo two</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_upload_doc4" name="input_upload_doc4">
                              </div>
                            </div>



                          
                          <h6 class="text-left border-bottom border-info">PASSPORT</h6>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="input_Passport_name_on_id">Name on ID</label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_Passport_name_on_id" name="input_Passport_name_on_id" placeholder="Name on ID" value="<?php if($row['input_Passport_name_on_id']) echo $row['input_Passport_name_on_id'];  ?>">
                                </div>  
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Passport_number">Passport Number</label>
                                   <input type="text" class="form-control form-control-sm rounded-0" id="input_Passport_number" name="input_Passport_number" placeholder="Number" value="<?php if($row['input_Passport_number']) echo $row['input_Passport_number'];  ?>">
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_Passport_country_issue">Country if Issue</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Passport_country_issue" name="input_Passport_country_issue" placeholder="Country if Issue" value="<?php if($row['input_Passport_country_issue']) echo $row['input_Passport_country_issue'];  ?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="input_Passport_issue_date">Passport Issue Date</label>
                                   <input type="date" class="form-control form-control-sm rounded-0" id="input_Passport_issue_date" name="input_Passport_issue_date" placeholder="Issue Date" value="<?php if($row['input_Passport_issue_date']) echo $row['input_Passport_issue_date'];  ?>">
                                </div>                                
                                <div class="form-group col-md-6">
                                <label for="input_Passport_expiry_date"> PassportExpiry Date</label>
                                <input type="date" class="form-control form-control-sm rounded-0" id="input_Passport_expiry_date" name="input_Passport_expiry_date" placeholder="Expiry Date" value="<?php if($row['input_Passport_expiry_date']) echo $row['input_Passport_expiry_date'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                               <?php if($row['input_upload_doc5']) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $row["input_upload_doc5"];  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($row['input_upload_doc5']) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_upload_doc5">Passport Upload photo one</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_upload_doc5" name="input_upload_doc5">
                              </div>
                            </div>

                            <div class="form-row">
                               <?php if($row['input_upload_doc6']) { ?>
                              <div class="form-group col-md-6 p-2 text-center">                
                               <img src="./user_cv_doc/<?php echo $row["input_upload_doc6"];  ?>" alt="sig image" height="100" max-width="200">
                              </div>
                            <?php } ?>
                            <div class="form-group <?php if($row['input_upload_doc6']) echo 'col-sm-6'; else echo 'col-md-12'; ?>">                
                                <label for="input_upload_doc6">Passport Upload photo two</label>
                                  <input type="file" class="form-control-file border rounded-0 p-2" id="input_upload_doc6" name="input_upload_doc6">
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
</body>
</html>

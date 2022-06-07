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
$add_name_file = 'ref_'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
$upload_dir = './user_cv_doc';
$set_file_size = 500000; // 500 KB
$upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 


// First Time insert code
    if(isset($_POST['btnsubmit']))
    {
        // remove element of user input array
        unset($_POST['btnsubmit']);  

    $concatenate_array_file_name = array();

     for($i=1; $i<=4; $i++)
     {  if (!empty($_FILES['input_upload_doc'.$i]['name']))
          {
          $test_array = $crud->uni_1_file_upload_fn($_FILES['input_upload_doc'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
          $concatenate_array_file_name += array('input_upload_doc'.$i.'' => $test_array);  


        // delete old file from server
        $result2 = $crud->uni_select_fn($table_name['16_references_table'],$_SESSION['SESS_user_id_cv_id']); 
                  
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
    

    if($crud->uni_update_fn($table_name['16_references_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;updating please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=Acknowledgement.php" /><style> .show { display: none; }  </style>';
    }
    
}

//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result3 = $crud->uni_select_fn($table_name['16_references_table'],$_SESSION['SESS_user_id_cv_id']); 
    $result4 = $crud->uni_select_fn($table_name['16_references_table'],$_SESSION['SESS_user_id_cv_id']); 
    //echo mysqli_num_rows($result);
    
    while($row1 = mysqli_fetch_array($result3))
    {
            echo "<br>";
            echo '<b>fetch data from table</b>';
            echo "<br>";
            //extract($row);
            print_r($row1);
    }
    $row = mysqli_fetch_array($result4);
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
                            <small>Your <b>REFERENCES</b></small> <br>
                            <hr>                        
                            </h4>
                        
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize" enctype="MULTIPART/FORM-DATA">   

                        <h6 class="text-left border-bottom border-info">FIRST REFERENCE</h6>                         
                                                                                                             
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Name1">Their Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Name1" name="input_Name1" placeholder="Their Name" value="<?php if($row['input_Name1']) echo $row['input_Name1'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Company_name1">Their Company Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Company_name1" name="input_Company_name1" placeholder="Their Company Name" value="<?php if($row['input_Company_name1']) echo $row['input_Company_name1'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Address1">Address</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Address1" name="input_Address1" placeholder="Address" value="<?php if($row['input_Address1']) echo $row['input_Address1'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Relationship1">Relationship with you</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Relationship1" name="input_Relationship1" placeholder="Relationship with you" value="<?php if($row['input_Relationship1']) echo $row['input_Relationship1'];  ?>">
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Mobile_no1">Mobile Number</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Mobile_no1" name="input_Mobile_no1" placeholder="Mobile Number" value="<?php if($row['input_Mobile_no1']) echo $row['input_Mobile_no1'];  ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Email1">Email</label>
                                <input type="email" class="form-control form-control-sm rounded-0" id="input_Email1" name="input_Email1" placeholder="Email" value="<?php if($row['input_Email1']) echo $row['input_Email1'];  ?>">
                                </div>
                            </div> 

                            <h6 class="text-left border-bottom border-info">SECOND REFERENCE</h6>                         
                                                                                                             
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Name2">Their Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Name2" name="input_Name2" placeholder="Their Name" value="<?php if($row['input_Name2']) echo $row['input_Name2'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Company_name2">Their Company Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Company_name2" name="input_Company_name2" placeholder="Their Company Name" value="<?php if($row['input_Company_name2']) echo $row['input_Company_name2'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Address2">Address</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Address2" name="input_Address2" placeholder="Address" value="<?php if($row['input_Address2']) echo $row['input_Address2'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Relationship2">Relationship with you</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Relationship2" name="input_Relationship2" placeholder="Relationship with you" value="<?php if($row['input_Relationship2']) echo $row['input_Relationship2'];  ?>" >
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Mobile_no2">Mobile Number</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Mobile_no2" name="input_Mobile_no2" placeholder="Mobile Number" value="<?php if($row['input_Mobile_no2']) echo $row['input_Mobile_no2'];  ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Email2">Email</label>
                                <input type="email" class="form-control form-control-sm rounded-0" id="input_Email2" name="input_Email2" placeholder="Email" name="input_Email1" placeholder="Email" value="<?php if($row['input_Email2']) echo $row['input_Email2'];  ?>">
                                </div>
                            </div> 

                            <h6 class="text-left border-bottom border-info">THIRD REFERENCE</h6>                         
                                                                                                             
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Name3">Their Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Name3" name="input_Name3" placeholder="Their Name" value="<?php if($row['input_Name3']) echo $row['input_Name3'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Company_name3">Their Company Name</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Company_name3" name="input_Company_name3" placeholder="Their Company Name" value="<?php if($row['input_Company_name3']) echo $row['input_Company_name3'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Address3">Address</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Address3" name="input_Address3" placeholder="Address" value="<?php if($row['input_Address3']) echo $row['input_Address3'];  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Relationship3">Relationship with you</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Relationship3" name="input_Relationship3" placeholder="Relationship with you" value="<?php if($row['input_Relationship3']) echo $row['input_Relationship3'];  ?>">
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Mobile_no3">Mobile Number</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Mobile_no3" name="input_Mobile_no3" placeholder="Mobile Number" value="<?php if($row['input_Mobile_no3']) echo $row['input_Mobile_no3'];  ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                <label for="input_Email3">Email</label>
                                <input type="email" class="form-control form-control-sm rounded-0" id="input_Email3" name="input_Email3" placeholder="Email" name="input_Email1" placeholder="Email" value="<?php if($row['input_Email3']) echo $row['input_Email3'];  ?>">
                                </div>
                            </div>  

                            <hr> 

                            <div class="form-row">
                            <?php for($i=1; $i<=4; $i++) {  ?>

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

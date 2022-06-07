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
$add_name_file = 'work_'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
$upload_dir = './user_cv_doc';
$set_file_size = 500000; // 500 KB
$no_of_files_upload = 1;
$upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 


// First Time insert code
if(isset($_POST['btnadd']))
{
    // remove element of user input array
    unset($_POST['btnadd']);
    unset($_POST['update_id']);  


    // if any file upload with info 
$concatenate_array_file_name = array();

 for($i=1; $i<=4; $i++)
{   if (!empty($_FILES['input_Upload_doc'.$i]['name']))
      {
      $test_array = $crud->uni_1_file_upload_fn($_FILES['input_Upload_doc'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
      $concatenate_array_file_name += array('input_Upload_doc'.$i.'' => $test_array);    
      }
}
    //
    $initial_question_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$concatenate_array_file_name);
        
    if($crud->uni_insert_fn($table_insert_table['10_work_experience_table'],$initial_question_input))
    {       
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=work_experience.php" /><style> .show { display: none; }  </style>';
    }
    
}
//************************************************//

// update info 
if(isset($_POST['update_info']))
{
    // remove element of user input array
    unset($_POST['update_info']);

    $update_id = array('id' => $_POST['update_id']);

    unset($_POST['update_id']);
    echo '<br>';

// if any file upload with info 
$concatenate_array_file_name = array();

 for($i=1; $i<=4; $i++)
{   if (!empty($_FILES['input_Upload_doc'.$i]['name']))
      {
      $test_array = $crud->uni_1_file_upload_fn($_FILES['input_Upload_doc'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
      $concatenate_array_file_name += array('input_Upload_doc'.$i.'' => $test_array);  


    // delete old file from server
    $result2 = $crud->uni_select_fn($table_insert_table['10_work_experience_table'],$update_id); 
              
    while($row2 = mysqli_fetch_array($result2))
        {
           if(!empty($row2["input_Upload_doc$i"]))
            {
            unlink("./user_cv_doc/".$row2["input_Upload_doc$i"]);
            echo '<b>delete old photo file from server</b><br>';
            }           
        }
    // 


      }
}
    //

print_r($concatenate_array_file_name);



    $initial_question_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$concatenate_array_file_name);
    
    $where = array_merge($update_id,$_SESSION['SESS_user_id_cv_id']);        

    if($crud->uni_update_fn($table_insert_table['10_work_experience_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;updating please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=work_experience.php" /><style> .show { display: none; }  </style>';
    }
    
}
////////////////////////////////////////////////////

if(isset($_POST['del_id']))
{
     echo '<div class="alert alert-success rounded-0 shadow text-center m-1 mt-5 text-capitalize">
            Delete this Education Field with upload files ! <br><br>
            <a href="work_experience.php?del_conform='.$_POST['del_id'].'" class="btn btn-danger btn-sm rounded-0 shadow">Yes</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="work_experience.php" class="btn btn-success btn-sm rounded-0 shadow">No</a>
            </div><style> .show { display: none; }  </style>';  
}


// final delete //////////////////////////////////////////////////// 
if (isset($_GET['del_conform']))
{
    $where = array('id' => $_GET['del_conform']);

    echo "<br><br><h6>delete data from id</h6>";

// Section Fetch &  Delete Files ..
$result2 = $crud->uni_select_fn($table_insert_table['10_work_experience_table'],$where); 
              
    $row2 = mysqli_fetch_assoc($result2);
    for($i=1; $i<=4; $i++)
    { 
        if(!empty($row2["input_Upload_doc$i"]))            
        unlink("./user_cv_doc/".$row2["input_Upload_doc$i"]);
    }
// End ... Section Fetch &  Delete Files ..

    $query = $crud->uni_delete_fn($table_insert_table['10_work_experience_table'],$where);       
       if($crud->execute($query))
       {
       echo '<b> delete  this Id - '.$_GET['del_conform'].'</b></br>';        
       echo '<center> <button class="btn btn-danger btn-sm mt-5"><span class="spinner-grow spinner-grow-sm"></span> &nbsp;&nbsp;Deleting ...</button> </center><meta http-equiv="refresh" content="2;URL=work_experience.php" /><style> .show { display: none; }  </style>';
       }
} 
////////////////////////////////////////////////////


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

            <!--  -->

                <table class="table table-hover table-sm">
                  <thead class="text-capitalize">
                    <th>id</th>
                    <th>user_id</th>
                    <th>cv_id</th>
                    <th>Company Name</th>
                    <th>Action</th>
                  </thead>                  
                  <tbody>
<?php 
if(isset($_SESSION['SESS_user_id_cv_id']))
                        {   
$result = $crud->uni_select_fn($table_insert_table['10_work_experience_table'],$_SESSION['SESS_user_id_cv_id']); 
                        if(mysqli_num_rows($result) > 0) 
                        {

                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['cv_id']; ?></td>
                            <td><?php echo $row['input_Company_name']; ?></td>
                            <td>
                                <!--  -->
                                <form action="" method="post" id="editform<?php  echo $row['id']; ?>">
                                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>" />
                                </form>
                                     <button form="editform<?php  echo $row['id']; ?>" type="submit" name="edit" class="btn btn-primary btn-sm rounded-0">Edit</button>
                                <!--  -->
                                
                                <!--  -->
                                <button form="del_from<?php  echo $row['id']; ?>" class="btn btn-danger btn-sm rounded-0"> Delete </button>

                                <form action="" method="post" id="del_from<?php  echo $row['id']; ?>">
                                    <input type="hidden" name="del_id" value="<?php  echo $row['id']; ?>" />
                                </form>
                                <!--  -->
                            </th>
                        </td>
                                  
                    <?php 
                            }
                        }
                            else
                            {
                                echo '<tr class="text-center"><td colspan="5">No Education Data Submit Yet !</td></td>';
                            }
                        }
                    ?>                    
                  </tbody>
                </table>             
            <!--  -->


           
           <hr>
        </div>
    </div>

  <div class="col-sm-6">
                    <!-- card -->
            <div class="col-sm-12 float-left">
                <div class="card mb-4 rounded-0 shadow">                    
                    <div class="card-body">
                        <!--  -->
                            <?php 
                    if (isset($_POST['edit_id']))
                    {
                      $id = $_POST['edit_id'];
                      $sql2= "SELECT * FROM 10_work_experience_table WHERE id=$id LIMIT 1";
                      $result2 = $crud->fetch($sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                               
                        //print_r($row2);
                                                       
                    }
                    ?>

                        <!--  -->
                <h4 class="card-title text-center text-uppercase">
        <?php if (isset($_POST['edit_id'])) echo '<small><b>Update</b> work experience Details</small> <a href="work_experience.php" class="btn btn-info btn-sm rounded-0">Add new</a>'; else echo '<small>Work <b>experience</b></small> <br>' ?>

                </h4>                
                <hr>                        
        
                        
    <p class="card-text">
    <!--   -->
    <form action="" method="post" class="text-capitalize" enctype="MULTIPART/FORM-DATA">    
    
<input type="hidden" name="update_id" value="<?php if(isset($row2['id'])) echo $row2['id']; ?>" />
    
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Company_name">Company / Origination Name</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Company_name" id="input_Company_name" placeholder="Company / Origination Name" value="<?php if(isset($row2['input_Company_name'])) echo $row2['input_Company_name'];  ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input_Date_join"><small>Date of joining</small></label>
                <input type="Date" class="form-control form-control-sm rounded-0" id="input_Date_join" name="input_Date_join" value="<?php if(isset($row2['input_Date_join'])) echo $row2['input_Date_join'];  ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="input_Date_leave"><small>Date of Leaving</small></label>
                <input type="Date" class="form-control form-control-sm rounded-0" id="input_Date_leave" name="input_Date_leave" value="<?php if(isset($row2['input_Date_leave'])) echo $row2['input_Date_leave'];  ?>" >
            </div >
        </div>  

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Company_description">About the Company</label>
                <textarea class="form-control form-control-sm rounded-0" id="input_Company_description" name="input_Company_description" rows="3"><?php if(isset($row2['input_Company_description'])) echo $row2['input_Company_description'];  ?></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Designation">Your Designation</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Designation" id="input_Designation" placeholder="Your Designation" value="<?php if(isset($row2['input_Designation'])) echo $row2['input_Designation'];  ?>">
            </div>
        </div>
       
       <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Job_profile">Job Profile</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Job_profile" id="input_Job_profile" placeholder="Job Profile" value="<?php if(isset($row2['input_Job_profile'])) echo $row2['input_Job_profile'];  ?>" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input_Salary_drawn">Salary Drawn</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Salary_drawn" id="input_Salary_drawn" placeholder="Salary Drawn" value="<?php if(isset($row2['input_Salary_drawn'])) echo $row2['input_Salary_drawn'];  ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="input_Reason_leaving">Reason for Leaving</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Reason_leaving" id="input_Reason_leaving" placeholder="Reason for Leaving" value="<?php if(isset($row2['input_Reason_leaving'])) echo $row2['input_Reason_leaving'];  ?>">
            </div>
        </div>
         <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Company_contact">Company contact details</label>
                <textarea class="form-control form-control-sm rounded-0" id="input_Company_contact" name="input_Company_contact" rows="3"><?php if(isset($row2['input_Company_contact'])) echo $row2['input_Company_contact'];  ?></textarea>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
              <label for="input_Can_we_contact">Can we contact the company for Cross Reference</label>
              <select name="input_Can_we_contact" id="input_Can_we_contact" class="form-control form-control-sm rounded-0">
                <option selected>Choose...</option>
                <option>Yes</option>
                <option>No</option>                                             
             </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="input_Company_website">Company Website</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Company_website" id="input_Company_website" placeholder="Company Website" value="<?php if(isset($row2['input_Company_website'])) echo $row2['input_Company_website'];  ?>">
            </div>
        </div>

        <hr>

         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="input_Link1">Links</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Link1" id="input_Link1" placeholder="Links" value="<?php if(isset($row2['input_Link1'])) echo $row2['input_Link1'];  ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="input_Link2">Links</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Link2" id="input_Link2" placeholder="Links" value="<?php if(isset($row2['input_Link2'])) echo $row2['input_Link2'];  ?>">
            </div>
        </div>

         <hr>

         <div class="form-row">
            <?php for($i=1; $i<=4; $i++) { ?>

                <div class="col-md-6 border-bottom">
<img src="<?php if(!empty($row2["input_Upload_doc$i"])){echo $upload_dir.'/'.$row2["input_Upload_doc$i"];}else { echo '../site_image/no_preview.png'; } ?>" alt="Select image" id="<?php  echo "showPreviewLogo$i"; ?>" onclick="<?php  echo "clickFocus($i)"; ?>" width="120">
                </div>

                <div class="form-group col-md-6">
                    <label>upload Photo <?php echo $i; ?></label>
<input type="file" class="form-control-file border p-2 rounded-0" name="input_Upload_doc<?php echo $i; ?>" id="<?php  echo "clickMeImage$i"; ?>" onchange="<?php  echo "readURL$i(this);"; ?>">
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
        <br>





         <hr>

        
                             <hr>
                            <?php if(isset($_POST['edit_id']))
                            {
                              echo '<button type="submit" name="update_info" id="btnadd" class="btn btn-primary rounded-0">Update Details</button>';                                          
                            } else {
                            ?>
                            <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary rounded-0">Save & Add New Education Qualifications</button>
                              
                            <a href="project_undertaken.php" type="submit" class="btn btn-primary btn-orange rounded-0 float-right">Go To Next Step </a>
                            </form>
                        <?php } ?>

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


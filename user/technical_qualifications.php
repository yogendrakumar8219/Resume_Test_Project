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
$add_name_file = 'technical_Certificate'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
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

 for($i=1; $i<=10; $i++)
{

   if (!empty($_FILES['input_Certificate_path'.$i]['name']))
      {
      $test_array = $crud->uni_1_file_upload_fn($_FILES['input_Certificate_path'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
      $concatenate_array_file_name += array('input_Certificate_path'.$i.'' => $test_array);    
      }

}
    //
    $initial_question_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$concatenate_array_file_name);
        
    if($crud->uni_insert_fn($table_insert_table['13_technical_qualifications_table'],$initial_question_input))
    {       
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=technical_qualifications.php" /><style> .show { display: none; }  </style>';
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

 for($i=1; $i<=10; $i++)
{   if (!empty($_FILES['input_Certificate_path'.$i]['name']))
      {
      $test_array = $crud->uni_1_file_upload_fn($_FILES['input_Certificate_path'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
      $concatenate_array_file_name += array('input_Certificate_path'.$i.'' => $test_array);  


    // delete old file from server
    $result2 = $crud->uni_select_fn($table_insert_table['13_technical_qualifications_table'],$update_id); 
              
    while($row2 = mysqli_fetch_array($result2))
        {
           if(!empty($row2["input_Certificate_path$i"]))
            {
            unlink("./user_cv_doc/".$row2["input_Certificate_path$i"]);
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

    if($crud->uni_update_fn($table_insert_table['13_technical_qualifications_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;updating please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=gov_info.php" /><style> .show { display: none; }  </style>';
    }
    
}
////////////////////////////////////////////////////

if(isset($_POST['del_id']))
{
     echo '<div class="alert alert-success rounded-0 shadow text-center m-1 mt-5 text-capitalize">
            Delete this Education Field with upload files ! <br><br>
            <a href="technical_qualifications.php?del_conform='.$_POST['del_id'].'" class="btn btn-danger btn-sm rounded-0 shadow">Yes</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="gov_info.php" class="btn btn-success btn-sm rounded-0 shadow">No</a>
            </div><style> .show { display: none; }  </style>';  
}


// final delete //////////////////////////////////////////////////// 
if (isset($_GET['del_conform']))
{
    $where = array('id' => $_GET['del_conform']);

    echo "<br><br><h6>delete data from id</h6>";

// Section Fetch &  Delete Files ..
$result2 = $crud->uni_select_fn($table_insert_table['13_technical_qualifications_table'],$where); 
              
    $row2 = mysqli_fetch_assoc($result2);
    for($i=1; $i<=10; $i++)
    { 
        if(!empty($row2["input_Certificate_path$i"]))            
        unlink("./user_cv_doc/".$row2["input_Certificate_path$i"]);
    }
// End ... Section Fetch &  Delete Files ..

    $query = $crud->uni_delete_fn($table_insert_table['13_technical_qualifications_table'],$where);       
       if($crud->execute($query))
       {
       echo '<b> delete  this Id - '.$_GET['del_conform'].'</b></br>';        
       echo '<center> <button class="btn btn-danger btn-sm mt-5"><span class="spinner-grow spinner-grow-sm"></span> &nbsp;&nbsp;Deleting ...</button> </center><meta http-equiv="refresh" content="2;URL=gov_info.php" /><style> .show { display: none; }  </style>';
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
                    <th>Course Name</th>
                    <th>Action</th>
                  </thead>                  
                  <tbody>
                    <?php 
                    if(isset($_SESSION['SESS_user_id_cv_id']))
                        {   
                            $result = $crud->uni_select_fn($table_insert_table['13_technical_qualifications_table'],$_SESSION['SESS_user_id_cv_id']); 
                        if(mysqli_num_rows($result) > 0) 
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['cv_id']; ?></td>
                            <td><?php echo $row['input_Course_name']; ?></td>
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
                                echo '<tr class="text-center"><td colspan="5">No Technical Qualifications Data Submit Yet !</td></td>';
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
                      $sql2= "SELECT * FROM 13_technical_qualifications_table WHERE id=$id LIMIT 1";
                      $result2 = $crud->fetch($sql2);
                      $row2 = mysqli_fetch_assoc($result2);
                               
                        //print_r($row2);
                                                       
                    }
                    ?>

                        <!--  -->
                            <h4 class="card-title text-center text-uppercase">
                    <?php if (isset($_POST['edit_id'])) echo '<small><b>Update</b>TECHNICAL QUALIFICATIONS DETAILS</small> <a href="gov_info.php" class="btn btn-info btn-sm rounded-0">Add new</a>'; else echo '<small>Tell us about your <b>Technical Qualifications</b></small> <br>' ?>
                    
                            </h4>
                            <hr>

                        
                        
                        <p class="card-text text-left">
                        <!-- form -->                        
                        <form action="" method="post" class="text-capitalize" enctype="MULTIPART/FORM-DATA">
<input type="hidden" name="update_id" value="<?php if(isset($id)) echo $id; ?>" />                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Course_name">Name of Course</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="input_Course_name" name="input_Course_name" placeholder="Name of Course" value="<?php if(isset($row2['input_Course_name'])) echo $row2['input_Course_name'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="input_Start_Study_date"><small>Study Start Date</small></label>
                                <input type="Date" class="form-control form-control-sm rounded-0" id="input_Start_Study_date" name="input_Start_Study_date" value="<?php if(isset($row2['input_Start_Study_date'])) echo $row2['input_Start_Study_date'];  ?>">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="input_End_Study_date"><small>Study Complete Date</small></label>
                                <input type="Date" class="form-control form-control-sm rounded-0" id="input_End_Study_date" name="input_End_Study_date" value="<?php if(isset($row2['input_End_Study_date'])) echo $row2['input_End_Study_date'];  ?>">
                              </div>

                            </div>                            

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_Description_technical_education">Description of Technical Education</label>
                                <textarea class="form-control form-control-sm rounded-0" id="input_Description_technical_education" name="input_Description_technical_education" rows="3"><?php if(isset($row2['input_Description_technical_education'])) echo $row2['input_Description_technical_education'];  ?></textarea>
                                </div>
                            </div>

                           
                            <h6 class="text-left border-bottom border-info">Upload Photo of Certificates</h6> 
                                     <div class="form-row">
            <?php for($i=1; $i<=5; $i++) { ?>

                <div class="col-md-6 border-bottom">
<img src="<?php if(!empty($row2["input_Certificate_path$i"])){echo $upload_dir.'/'.$row2["input_Certificate_path$i"];}else { echo '../site_image/no_preview.png'; } ?>" alt="Select image" id="<?php  echo "showPreviewLogo$i"; ?>" onclick="<?php  echo "clickFocus($i)"; ?>" width="120">
                </div>

                <div class="form-group col-md-6">
                    <label>Certificates Upload <?php echo $i; ?></label>
<input type="file" class="form-control-file border p-2 rounded-0" name="input_Certificate_path<?php echo $i; ?>" id="<?php  echo "clickMeImage$i"; ?>" onchange="<?php  echo "readURL$i(this);"; ?>">
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


                             <h6 class="text-left border-bottom border-info">upload links</h6> 

                             <div class="form-row">
                                <div class="form-group col-md-6">                
                                <label for="input_upload_link1"></label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_upload_link1" name="input_upload_link1" placeholder="upload links" value="<?php if(isset($row2['input_upload_link1'])) echo $row2['input_upload_link1'];  ?>">
                                </div>
                                <div class="form-group col-md-6">                
                                <label for="input_upload_link2"></label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_upload_link2" name="input_upload_link2" placeholder="upload links" value="<?php if(isset($row2['input_upload_link2'])) echo $row2['input_upload_link2'];  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">                
                                <label for="input_upload_link3"></label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_upload_link3" name="input_upload_link3" placeholder="upload links" value="<?php if(isset($row2['input_upload_link3'])) echo $row2['input_upload_link3'];  ?>">
                                </div>
                                <div class="form-group col-md-6">                
                                <label for="input_upload_link4"></label>
                                  <input type="text" class="form-control form-control-sm rounded-0" id="input_upload_link4" name="input_upload_link4" placeholder="upload links" value="<?php if(isset($row2['input_upload_link4'])) echo $row2['input_upload_link4'];  ?>">
                                </div>
                            </div>
                            <hr>
                            <?php if(isset($_POST['edit_id']))
                            {
                              echo '<button type="submit" name="update_info" id="btnadd" class="btn btn-primary rounded-0">Update Details</button>';                                          
                            } else {
                            ?>
                            <button type="submit" name="btnadd" id="btnadd" class="btn btn-primary rounded-0">Save & Add New Technical Qualifications</button>
                              
                            <a href="gov_info.php" type="submit" class="btn btn-primary btn-orange rounded-0 float-right">Go To Next Step </a>
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





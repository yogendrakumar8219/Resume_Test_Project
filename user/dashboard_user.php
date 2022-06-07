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

  if (isset($_GET['cv_id']))
  {    
    // date + status array
    $gen_date = array('cv_created_date' => date("d-m-Y - h:i A"),'status' => 'active');

    // generate user_id + cv_id array
    $array_u_id_cv_id = array_merge($user_id_array,$_GET,$gen_date);  

    // user id + cv-id array only
    $array_u_id_cv_id_only = array_merge($user_id_array,$_GET);
   
    print_r($array_u_id_cv_id);  


    //**************************************************************//

    echo "<br><br><h6>insert table list</h6>";
    $check2 = false;
    foreach ($table_name as $key => $value_table_name)
    {
      if($value_table_name == '0_cv_generate_info')
      {
        $crud->uni_insert_fn($value_table_name,$array_u_id_cv_id);
        echo '<b>'.$value_table_name.'</b></br>';
        $check2 = true;
      }
      else
      {
        $crud->uni_insert_fn($value_table_name,$array_u_id_cv_id_only);
        echo '<b>'.$value_table_name.'</b></br>';
        $check2 = true;
      }
    }

    if($check2)
    {
      // -----------------------------------------------------------------//
    // generated CV_ID save into Session
        $_SESSION['SESS_user_id_cv_id'] = $array_u_id_cv_id_only;

    // redirecting to next page
      echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-grow spinner-grow-sm"></span> &nbsp;&nbsp;Creating New Resume please Wait ...</button> </center><meta http-equiv="refresh" content="2;URL=cover_latter.php" /><style> .show { display: none; }  </style>';
    // -----------------------------------------------------------------//
    }
    
    //**************************************************************//   
    
  }
  ////////////////////////////////////////////////////////////////////
  if (isset($_GET['del']))
  {
    echo '<div class="alert alert-success rounded-0 shadow text-center m-1 mt-5 text-capitalize">
            R you show want to delete this resume with all uploaed data <br><br>
            <a href="dashboard_user.php?del_conform='.$_GET['del'].'" class="btn btn-danger btn-sm rounded-0 shadow">Yes</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard_user.php" class="btn btn-success btn-sm rounded-0 shadow">No</a>
            </div><style> .show { display: none; }  </style>';
  }

  // final delete //////////////////////////////////////////////////// 
  if (isset($_GET['del_conform']))
  {
    $where = array('user_id' => $user_id,'cv_id' => $_GET['del_conform']);

    $cv_id = $_GET['del_conform'];

    echo "<br><br><h6>delete table list</h6>";
    // delete image for server folder
    // ****************************************//

    // array which conatin image fileds ..
$array_image_fileds = array(
    '2_cover_letter_table' => array(1,'input_Signature_file'),
    '5_personal_info_table' => array(1,'input_Photo_upload_path'),
    '9_achievements_table' => array(4,'input_achievements_photo1','input_achievements_photo2','input_achievements_photo3','input_achievements_photo4'),
    '10_work_experience_table' => array(4,'input_Upload_doc1','input_Upload_doc2','input_Upload_doc3','input_Upload_doc4'),
    '11_project_undertaken_table' => array(10,'input_Project_image1','input_Project_image2','input_Project_image3','input_Project_image4','input_Project_image5','input_Project_image6','input_Project_image7','input_Project_image8','input_Project_image9','input_Project_image10'),
    '12_education_info_table' => array(5,'input_Certificate_path1','input_Certificate_path2','input_Certificate_path3','input_Certificate_path4','input_Certificate_path5'),
    '13_technical_qualifications_table' => array(5,'input_Certificate_path1','input_Certificate_path2','input_Certificate_path3','input_Certificate_path4','input_Certificate_path5'),
    '14_gov_info_table' => array(6,'input_upload_doc1','input_upload_doc2','input_upload_doc3','input_upload_doc4','input_upload_doc5','input_upload_doc6'),
    '16_references_table' => array(4,'input_upload_doc1','input_upload_doc2','input_upload_doc3','input_upload_doc4')

);

  if (isset($array_image_fileds))
  {
      // 
      foreach($array_image_fileds as $table_name_d => $value)
        {
            $query = "Select * from ".$table_name_d." where user_id = ".$user_id." and cv_id=".$cv_id."";
            
            echo "<strong>table name ".$table_name_d."</strong><br>";
            
            $result = $crud->fetch($query);

            //$size = $crud->row_count($query);
            
            while($row = mysqli_fetch_assoc($result))
            {
                //print_r($row);
                //echo $row[$value[0]];
                //var_dump($table_name_d);
                for($i=1; $i<=$value[0]; $i++)
                {
                   if(!empty($row[$value[$i]]))
                    {
                    unlink("./user_cv_doc/".$row[$value[$i]]);
                    echo '<b>delete old photo file from server</b><br>';
                    }
                }
            }
            echo "<br>";
        }
      // 
  }






    //********************************************//


    // deete inserted data from table 
    $check = false;
    foreach ($table_name as $key => $value_table_name)
    {
       $query = $crud->uni_delete_fn($value_table_name,$where);       
       if($crud->execute($query))
       {
        echo '<b>'.$value_table_name.'</b></br>';
        $check = true;
       }
    }

    // conform delete then redirecting ....
    if($check)
    {
      // redirecting to next page
      // echo '<center> <button class="btn btn-danger btn-sm mt-5"><span class="spinner-grow spinner-grow-sm"></span> &nbsp;&nbsp;Deleting ...</button> </center><meta http-equiv="refresh" content="5;URL=dashboard_user.php" /><style> .show { display: none; }  </style>';
    }  

  }

  ////////////////////////////////////////////////////////////////////
  if (isset($_GET['edit_cv']))
  {   
     $edit_cv_id = array('cv_id' => $_GET['edit_cv']);    
     $_SESSION['SESS_user_id_cv_id'] = array_merge($user_id_array,$edit_cv_id); 
     print_r($_SESSION['SESS_user_id_cv_id']);
    
    // redirecting to next page
      echo '<center> <button class="btn btn-danger btn-sm mt-5"><span class="spinner-grow spinner-grow-sm"></span> &nbsp;&nbsp;Redirecting ...</button> </center><meta http-equiv="refresh" content="5;URL=cover_latter.php" /><style> .show { display: none; }  </style>';
  }
  //////////////////////////////////////////////////////////////////////
  
?>
</head>
<body>
  <div class="show">
<?php include('user_navbar.php'); ?>

 <div class="card mt-1 ml-4 mr-4">
    <div class="card-body"><a href="dashboard_user.php?cv_id=<?php echo $user_id*100000 + rand(1,10000); ?>" class="btn btn-outline-info btn-sm rounded-0">Create New Resume (cv_id = user_id + cv_created_id)</a></div>
</div>

<div class="container-fluid mt-1">  
<hr>
  <div class="row">
    <!--  -->
    <?php 
     $sql= "SELECT * FROM 0_cv_generate_info WHERE user_id=$user_id";
        
        $result = $crud->fetch($sql);        
        
        while($row = mysqli_fetch_array($result))
        {
            //print_r($row);
    ?>
    <div class="col-sm-3 mb-5">
      <!--  -->
      <div class="card rounded-0 shadow" style="width:280px">
        <img class="card-img-top rounded-0" src="https://source.unsplash.com/random/280x280" alt="Card image">
          <div class="card-body">
            <h4 class="card-title"># <?php echo $row['cv_id']; ?><small> <span class="badge pull-right badge-pill badge-success">Active</span></small></h4>
            <p class="card-text"><small>Created Date : <?php echo $row['cv_created_date']; ?></small></p>
            <a href="dashboard_user.php?edit_cv=<?php echo $row['cv_id']; ?>" class="btn btn-sm btn-primary shadow rounded-0">Edit</a> 
            <a href="dashboard_user.php?del=<?php echo $row['cv_id']; ?>" class="btn btn-sm btn-danger shadow rounded-0">Delete</a> 
            <button class="btn btn-sm btn-success shadow rounded-0">
              <span class="spinner-grow spinner-grow-sm"></span>
              Pay Now
            </button>         
          </div>
      </div>
      <!--  -->
    </div>
  <?php } ?>

    <!--  -->
  </div>
  
</div>

<?php include('footer_user.php'); ?>
</div>
</body>
</html>

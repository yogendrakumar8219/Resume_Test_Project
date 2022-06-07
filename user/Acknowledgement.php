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
   unset($_POST['btnsubmit']);
   $ak_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST);
   //where condition
    $where = $_SESSION['SESS_user_id_cv_id'];        

    if($crud->uni_update_fn($table_name['17_acknowledgement'],$ak_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=preview_demo2.php" /><style> .show { display: none; }  </style>';
    }
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['17_acknowledgement'],$_SESSION['SESS_user_id_cv_id']); 
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

<?php include('user_navbar.php'); ?>

<div class="container-fluid">
    <div class="row mt-1">
       <?php include('cv_steps.php'); ?>
    </div>
</div>


<div class="container-fluid mb-5">
  <div class="row justify-content-center align-items-center">

   

   
                 <!-- card -->
            <div class="col-sm-6 float-left">
                <div class="card mb-4 rounded-0 shadow">                    
                    <div class="card-body">

                         <h4 class="card-title text-center text-uppercase">
                            <small>Acknowledgement</small> <br>
                            <hr>                        
                            </h4>
                        
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize">

                        <span class="text-left">I confirm and affirm that all the above Information and Documents Uploaded are True and Correct. I Understand making a False Declaration is illegal under The Law of the Land. </span>     

                        <hr>                    
                                                                                                             
                            <div class="form-check-inline">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" value="enable" name="i_agree" 
                                <?php if (!empty($i_agree)) { echo 'checked'; } ?> > I agree T&C
                              </label>
                            </div>

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

<div class="text-center bg-dark text-white fixed-bottom m-0">
  <p>@myfullcv.com</p>
</div>
</body>
</html>

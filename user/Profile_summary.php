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

    $initial_question_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST);
    
    echo "<b>user input data</b><br>";
    print_r($initial_question_input);

    //where condition
    $where = $_SESSION['SESS_user_id_cv_id'];        

    if($crud->uni_update_fn($table_name['8_profile_summary_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=achivements.php" /><style> .show { display: none; }  </style>';
    }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['8_profile_summary_table'],$_SESSION['SESS_user_id_cv_id']); 
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
                            <small>Profile   <b>summary</b></small> <br>                            
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_profile_description">write a profile summary</label>
                                <textarea placeholder="EXAMPLE – Brief summary about your career and what you Will bring to the company, how your role in this company can be Beneficial to the company, why should the company hire you and No one else?" class="form-control form-control-sm rounded-0" id="input_profile_description" name="input_profile_description" rows="10"><?php if($input_profile_description) echo $input_profile_description;  ?></textarea>
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

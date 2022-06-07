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

    $career_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST);
    
    echo "<b>user input data</b><br>";
    print_r($career_input);

    //where condition
    $where = $_SESSION['SESS_user_id_cv_id'];        

    if($crud->uni_update_fn($table_name['7_career_objective_table'],$career_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=Profile_summary.php" /><style> .show { display: none; }  </style>';
    }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['7_career_objective_table'],$_SESSION['SESS_user_id_cv_id']); 
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
                            <small>Career <b>Objective</b></small> <br>                            
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_objective_description1">objective one</label>
                                <textarea placeholder="To secure a challenging position in a reputable organization to expand my learnings, knowledge, and skills." class="form-control form-control-sm rounded-0" id="input_objective_description1" name="input_objective_description1" rows="3"><?php if($input_objective_description1) echo $input_objective_description1;  ?></textarea>
                                </div>
                            </div>    
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_ description">objective Two</label>
                                <textarea placeholder="Secure a responsible career opportunity to fully utilize my training and skills, while making a significant contribution to the success of the company." class="form-control form-control-sm rounded-0" id="input_objective_description2" name="input_objective_description2" rows="3"><?php if($input_objective_description2) echo $input_objective_description2;  ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_ description">objective There</label>
                                <textarea placeholder="Seeking an entry-level position to begin my career in a high-level professional environment." class="form-control form-control-sm rounded-0" id="input_objective_description3" name="input_objective_description3" rows="3"><?php if($input_objective_description3) echo $input_objective_description3;  ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_ description">objective Four</label>
                                <textarea placeholder="A highly organized and hard-working individual looking for a responsible position to gain practical experience." class="form-control form-control-sm rounded-0" id="input_objective_description4" name="input_objective_description4" rows="3"><?php if($input_objective_description4) echo $input_objective_description4;  ?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_ description">objective Five</label>
                                <textarea placeholder="To make use of my interpersonal skills to achieve goals of a company that focuses on customer satisfaction and customer experience." class="form-control form-control-sm rounded-0" id="input_objective_description5" name="input_objective_description5" rows="3"><?php if($input_objective_description5) echo $input_objective_description5;  ?></textarea>
                                </div>
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
</div>

<div class="text-center bg-dark text-white fixed-bottom m-0">
  <p>@myfullcv.com</p>
</div>
</div>
</body>
</html>

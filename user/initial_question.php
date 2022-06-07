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

    if($crud->uni_update_fn($table_name['4_initial_question_table'],$initial_question_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=persnal_info.php" /><style> .show { display: none; }  </style>';
    }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['4_initial_question_table'],$_SESSION['SESS_user_id_cv_id']); 
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

?></head>
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
    <div class="card mb-5 rounded-0 shadow">                    
        <div class="card-body">
                        
        <h4 class="card-title text-center text-uppercase"><small>initial <b>question</b></small>
            <hr>                        
        </h4>     
                        
    <p class="card-text">
    <!--   -->
    <form action="initial_question.php" method="post" class="text-capitalize">    
    

    
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>How Many Years of Total Experience?</label>
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Total_experience" id="input_Total_experience" placeholder="How Many Years of Total Experience." value="<?php if($input_Total_experience) echo $input_Total_experience;  ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Heighest Level of Education</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Heighest_level_edu" id="input_Heighest_level_edu" placeholder="Heighest Level of Education" value="<?php if($input_Heighest_level_edu) echo $input_Heighest_level_edu;  ?>">
            </div>
        </div> 
        
        <div class="form-row">
           <div class="form-group col-md-12">
                <label>Notice Period Needed</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Notice_period" id="input_Notice_period" placeholder="Notice Period Needed" value="<?php if($input_Notice_period) echo $input_Notice_period;  ?>">
            </div>
        </div>

        <div class="form-row">            
            <div class="form-group col-md-12">
                <label>Willingness to Travel</label>
                <select name="input_Willingness_travel" id="input_Willingness_travel" class="form-control form-control-sm rounded-0">                
                    <option selected  disabled>Choose...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Expected Salary Annually</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Expected_salary_annually" id="input_Expected_salary_annually" placeholder="Expected Salary Annually" value="<?php if($input_Expected_salary_annually) echo $input_Expected_salary_annually;  ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Happy to Relocate</label>            
                <select name="input_Happy_relocate" id="input_Happy_relocate" class="form-control form-control-sm rounded-0">
                    <option selected  disabled>Choose...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Current Location</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Current_locations" id="input_Current_locations" placeholder="Current Locations" value="<?php if($input_Current_locations) echo $input_Current_locations;  ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Preferred  Locations</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Preferred_locations" id="input_Preferred_locations" placeholder="Preferred  Locations" value="<?php if($input_Preferred_locations) echo $input_Preferred_locations;  ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Mention Your Skills</label>            
                <input type="text" class="form-control form-control-sm rounded-0" name="input_Mention_skills" id="input_Mention_skills" placeholder="Mention Your Skills" value="<?php if($input_Mention_skills) echo $input_Total_experience;  ?>">
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary btn-orange rounded-0" name="btnsubmit" id="btnsubmit">Save & Next</button>
        
    </form>
  </p>
 </div>
</div>
    


    <!--   -->    
    </div>

    

  </div>
</div>


<?php include('footer_user.php'); ?>

<!--show div -->
</div>
</body>
</html>

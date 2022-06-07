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

    $social_input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST);
    
    echo "<b>user input data</b><br>";
    print_r($social_input);

    //where condition
    $where = $_SESSION['SESS_user_id_cv_id'];        

    if($crud->uni_update_fn($table_name['6_social_info_table'],$social_input,$where))
    {
    // redirecting to next page
    echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=career_objective.php" /><style> .show { display: none; }  </style>';
    }
    
}
//************************************************//

// fetch code 

if(isset($_SESSION['SESS_user_id_cv_id']))
{   

    $result = $crud->uni_select_fn($table_name['6_social_info_table'],$_SESSION['SESS_user_id_cv_id']); 
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
                            <small>Social <b>information</b></small> <br>
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                        <form action="" method="post" class="text-capitalize">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputLinkedin_id">Linkedin </label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLinkedin_id" name="inputLinkedin_id" placeholder="LINKEDIN ID" value="<?php if($inputLinkedin_id) echo $inputLinkedin_id;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputFacebook_id">Facebook</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputFacebook_id" name="inputFacebook_id" placeholder="FACEBOOK ID" value="<?php if($inputFacebook_id) echo $inputFacebook_id;  ?>">
                                </div>                                
                            </div>                            
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                <label for="inputInstagram_id"> Instagram</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputInstagram_id" name="inputInstagram_id" placeholder="INSTAGRAM ID" value="<?php if($inputInstagram_id) echo $inputInstagram_id;  ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="inputTwitter_id">Twitter</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputTwitter_id" name="inputTwitter_id" placeholder="TWITTER ID" value="<?php if($inputTwitter_id) echo $inputTwitter_id;  ?>">
                                </div>                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="inputGoogle"> Google+</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputGoogle" name="inputGoogle" placeholder="GOOGLE+ ID" value="<?php if($inputGoogle) echo $inputGoogle;  ?>">
                                </div>    
                                <div class="form-group col-md-6">
                                <label for="inputSoundcloud_id">sundclound</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputSoundcloud_id" name="inputSoundcloud_id" placeholder="SOUNDCLOUD ID" value="<?php if($inputSoundcloud_id) echo $inputSoundcloud_id;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="inputYoutube_channel">youtube channel</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputYoutube_channel" name="inputYoutube_channel" placeholder="YOUTUBE CHANNEL" value="<?php if($inputYoutube_channel) echo $inputYoutube_channel;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="inputWebsite_url">your website URL</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputWebsite_url" name="inputWebsite_url" placeholder="WEBSITE URL" value="<?php if($inputWebsite_url) echo $inputWebsite_url;  ?>">
                                </div>
                            </div>                            
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="inputLinks_to_your_work">links to your work</label>
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLinks_to_your_work" name="inputLinks_to_your_work" placeholder="LINKS TO YOUR WORK" value="<?php if($inputLinks_to_your_work) echo $inputLinks_to_your_work;  ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="inputLinks_to_your_work">5 spots for people to put any other links</label>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="inputLink1" class="col-md-2 col-form-label">Link 1</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLink1" name="inputLink1" value="<?php if($inputLink1) echo $inputLink1;  ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLink2" class="col-md-2 col-form-label">Link 2</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLink2" name="inputLink2" value="<?php if($inputLink2) echo $inputLink2;  ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLink3" class="col-md-2 col-form-label">Link 3</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLink3" name="inputLink3" value="<?php if($inputLink3) echo $inputLink3;  ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLink4" class="col-md-2 col-form-label">Link 4</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLink4" name="inputLink4" value="<?php if($inputLink4) echo $inputLink4;  ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLink5" class="col-md-2 col-form-label">Link 5</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control form-control-sm rounded-0" id="inputLink5" name="inputLink5" value="<?php if($inputLink5) echo $inputLink5;  ?>">
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

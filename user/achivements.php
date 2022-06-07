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
// pass required info about file
$add_name_file = 'achievements_'.$_SESSION['SESS_user_id_cv_id']['cv_id'];
$upload_dir = './user_cv_doc';
$set_file_size = 500000; // 500 KB
$no_of_files_upload = 1;
$upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 
/////////////////////////////////

// update info into database 'cover_letter_table' 
if(isset($_POST['btnsubmit']))
{
    // remove element of user input array
    unset($_POST['btnsubmit']);
    echo '<br>';
    print_r($_POST);


        // compress file function creation 
                        function compressImage($source,$destination,$quality)
                        {
                            $imageInfo=getimagesize($source);
                            
                            $mime=$imageInfo['mime'];
                            
                            switch($mime)
                            {
                                case 'image/jpeg':
                                $image=imagecreatefromjpeg($source);
                                break;
                                case 'image/png':
                                $image=imagecreatefrompng($source);
                                break;
                                case 'image/gif':
                                $image=imagecreatefromgif($source);
                                break;
                                default:
                                $image-imagecreatefromjpeg($source);
                            }
                            imagejpeg($image,$destination,$quality);
                            
                            return $destination;                            
                        }

        for($x=0;$x<=4;$x++)
        {
            if(!empty($_FILES["input_achievements_photo$x"]['tmp_name']))
            {
                $source=$_FILES["input_achievements_photo$x"]['tmp_name'];
                $destination=$_FILES["input_achievements_photo$x"]['tmp_name'];
                if($_FILES["input_achievements_photo$x"]['size'] < 500000)
                {
                    $quality=65;

                }
                else
                {
                    $quality=20; 
                }

                    //call the function for compressing image
                $compressimage=compressImage($source,$destination,$quality);
                $input_achievements_photo=addslashes(file_get_contents($compressimage));

             

                 // Rename of upload file ****************** //
                   $file_extction = explode(".", $_FILES["input_achievements_photo$x"]['name']);
                   $new_file_name = $x.'_'.$add_name_file.'_'.round(microtime(true)) . '.' . end($file_extction); 
                   $new_file_name = str_replace(" ", "", basename($new_file_name)); 
                   // ************************************* //      

                   echo $new_file_name;

                $filename2= $upload_dir.'/'.$new_file_name;

                if(move_uploaded_file($compressimage,$filename2))
                {
                    // delete old file from server
            $result2 = $crud->uni_select_fn($table_name['9_achievements_table'],$_SESSION['SESS_user_id_cv_id']); 
                        
                        while($row2 = mysqli_fetch_array($result2))
                            {
                                $name1 = 'input_achievements_photo'.$x;
                                echo $row2[$name1];

                                if(!empty($row2[$name1]))
                                {
                                unlink("./user_cv_doc/".$row2[$name1]);
                                echo '<b>delete old photo file from server</b><br>';
                                }
                            }
                    // 
                    $arrayName = array('input_achievements_photo'.$x.'' => $new_file_name );

                    $input = array_merge($_SESSION['SESS_user_id_cv_id'],$_POST,$arrayName);

                    $where = $_SESSION['SESS_user_id_cv_id'];

                    $crud->uni_update_fn($table_name['9_achievements_table'],$input,$where);
                    echo 'good upload';

                }
                else
                {
                    echo 'Image Not uploaded';
                }
                // 
            }
        }
/////////////////////////////////


        $where = $_SESSION['SESS_user_id_cv_id'];        

        if($crud->uni_update_fn($table_name['9_achievements_table'],$_POST,$where))
          {
            // redirecting to next page
          echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=work_experience.php" /><style> .show { display: none; }  </style>';
          }
    
}
//************************************************//



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
                            <small>Your <b>ACHIEVEMENTS</b></small> <br>                            
                            <hr>                        
                            </h4>
                        
                        
                        <p class="card-text text-left">
                        <!-- form -->
                    <?php 

                    // fetch code 

                    if(isset($_SESSION['SESS_user_id_cv_id']))
                    {   

                        $result = $crud->uni_select_fn($table_name['9_achievements_table'],$_SESSION['SESS_user_id_cv_id']); 
                        //echo mysqli_num_rows($result);

                        while($row = mysqli_fetch_array($result))
                        {                              
                                ///extract($row);
                                //print_r($row);
                    ?>

                   
                        <form action="" method="post" class="text-capitalize" enctype="MULTIPART/FORM-DATA">

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                <label for="input_letter_ description">write Your Achievements</label>
                                <textarea class="form-control form-control-sm rounded-0" id="input_letter_ description" name="input_achievements" rows="5"><?php if(isset($row['input_achievements'])) echo $row['input_achievements'];  ?></textarea>
                                </div>
                            </div>     

                            <hr>

                         <div class="form-row">
                            <?php for($i=1; $i<=4; $i++) { ?>

                            <div class="col-md-6 border-bottom">
<img src="<?php if(!empty($row["input_achievements_photo$i"])){echo $upload_dir.'/'.$row["input_achievements_photo$i"];}else { echo '../site_image/no_preview.png'; } ?>" alt="Select image" id="<?php  echo "showPreviewLogo$i"; ?>" onclick="<?php  echo "clickFocus($i)"; ?>" width="120">
                            </div>

                            <div class="form-group col-md-6">
                                <label>upload Photo <?php echo $i; ?></label>
                                <input type="file" class="form-control-file border p-2 rounded-0" name="input_achievements_photo<?php echo $i; ?>" id="<?php  echo "clickMeImage$i"; ?>" onchange="<?php  echo "readURL$i(this);"; ?>">
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
                            <button type="submit" name="btnsubmit" class="btn btn-primary btn-orange rounded-0">Save & Next</button>
                            </form>


                        <!-- end from -->

                         <?php 
                        }

                        
                    }
                    ///////////////////

                    ?>
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
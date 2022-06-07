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

if(isset($_GET['select']))
{
    $image_no = $_GET['select'];

    // select  css file 
    switch ($image_no)
    {
        case '1':
        $select_css_file = '1cv.css';
         break;

        case '2':
        $select_css_file = '2cv.css';
         break;

        case '3':
        $select_css_file = '3cv.css';
         break;    
        
        default:
             $select_css_file = 'cv_default_css_file.css';
         break;
    }

    $cv_css = array('cv_css' => $select_css_file, );
    echo "<b>select css file  insertinto DB </b><br>";
    print_r($cv_css);
    $where = $_SESSION['SESS_user_id_cv_id'];

    // update into database
    if($crud->uni_update_fn($table_name['3_cv_template'],$cv_css,$where))
     {
        // redirecting to next page
      echo '<center> <button class="btn btn-info btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> &nbsp;&nbsp;Saving please Wait ...</button> </center><meta http-equiv="refresh" content="5;URL=initial_question.php" /><style> .show { display: none; }  </style>';
     }


}

// fetch code  ******************************************* //

if(isset($_SESSION['SESS_user_id_cv_id']))
{
    $result = $crud->uni_select_fn($table_name['3_cv_template'],$_SESSION['SESS_user_id_cv_id']);     
       
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

    <div class="col-sm-12 text-center">
        <h6 class="text-center text-uppercase mb-4">Premium CV Templates ( 15 will add here )</h6>
       
        <div class="owl-carousel owl-theme">         
        <?php  for($i=1;$i<=3; $i++) { ?>
            <div class="item">

             <!-- card -->
            <div class="col-sm-12">
                <div class="card mb-4 rounded-0 shadow">
                    <img class="card-img-top rounded-0" src="../site_image/cv_image/<?php echo $i; ?>.jpg" alt="Card image" style="width:100%">
                    <div class="card-body text-center">
                        <h4 class="card-title"><small>Template <?php echo $i; ?></small></h4>
                        <p class="card-text"></p>
                        <a href="cv_temp.php?select=<?php echo $i; ?>" class="btn btn-outline-info btn-sm rounded-0">select</a>
                    </div>
                </div>
            </div>
           <!--  card -->

            
            
            </div>
        <?php } ?>
        </div>

  </div>
</div>


<?php include('footer_user.php'); ?>

<!--show div -->
</div>
</body>
</html>
<script>
 $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 6,
                loop: true,
                margin: 0,
                autoplay: true,
                autoplayTimeout:2500,
                autoplayHoverPause: true
              });
              
            })
</script>

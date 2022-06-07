<?php 

include_once('../eClass/UserTools.php');
$crud = new UserTools();

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
    <head>
        <?php include('auth.php'); ?>
        <?php include('config.php'); ?>
        <?php
        // fetch code 

        if(isset($_SESSION['SESS_user_id_cv_id']))
        {   

            $result_ak = $crud->uni_select_fn($table_name['17_acknowledgement'],$_SESSION['SESS_user_id_cv_id']); 
            //echo mysqli_num_rows($result);

            while($row_ak = mysqli_fetch_array($result_ak))
            {
                    echo "<br>";
                    echo '<b>fetch data from table</b>';
                    echo "<br>";
                    //print_r($row_ak);
                    if(empty($row_ak['i_agree']))
                    {
                          // redirecting to next page
          echo '<center> <button class="btn btn-danger btn-sm mt-5"> &nbsp;&nbsp; Redirecting ...</button> </center><meta http-equiv="refresh" content="5;URL=Acknowledgement.php" /><style> .show { display: none; }  </style>';
                    }
            }
        }

?>
        <meta charset="utf-8"> 
        
        <!-- TITLE OF SITE -->
        <title> Material CV/Resume </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Materialize portfolio one page template, Using for personal website." />
        <meta name="keywords" content="cv, resume, portfolio, materialize, onepage, personal, blog" />
        <meta name="author" content="Siful Islam, DeviserWeb">
        
        <!-- FAVICON -->
        <link rel="icon" href="images/favicon.ico"> 
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">

        
        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:500,300,400' rel='stylesheet' type='text/css'>
        
        <!-- FRAMEWORK CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
        <!--<link rel="stylesheet" href="css/lightbox.css">-->
        
        <!-- FONT ICONS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        
        <!-- ADDITIONAL CSS -->
         <link rel="stylesheet" href="assets/css/timeline.css">
         <link rel="stylesheet" href="assets/css/animate.css">
         <link rel="stylesheet" href="assets/css/nav.css">
         <link rel="stylesheet" href="assets/css/jquery.fancybox.css">
        
        <!--   COUSTOM CSS link  -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!--   COLOUR  -->
        <link rel="stylesheet" href="assets/css/color/lime.css" title="lime">
        <link rel="stylesheet" href="assets/css/color/red.css" title="red">
        <link rel="stylesheet" href="assets/css/color/green.css" title="green">
        <link rel="stylesheet" href="assets/css/color/purple.css" title="purple">
        <link rel="stylesheet" href="assets/css/color/orange.css" title="orange">
        
        <!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
        <link rel="stylesheet" href="assets/css/demo.css">
    </head>
    <body>
<div class="show"> 
        <!-- =========================================
                           HEADER TOP   
        ==========================================-->
        <header id="header-top"> <!--Start: "Header Area"-->
            <div class="container">
                <div class="row">
                    <div class="col m6 s6 left">
                         <span> <a href="dashboard_user.php" class="btn waves-effect red darken-2">back To Home</a></span>
                    </div>
                    <div class="top-contact col m6 s6 right">
                        <span><i class="fa fa-envelope"></i> <a href="mailto:">mail@alrayhan.com</a></span>
                        <span><i class="fa fa-phone"></i> <a href="tel:">+88017 195 76666 </a></span> 
                    </div>  
                </div>
            </div>
            
            <!-- =========================================
                           NAVIGATION   
            ==========================================-->
            <div id="header-bottom" class="z-depth-1"> <!--Start: "Header Area"-->
                <div id="sticky-nav">
                    <div class="container">
                        <div class="row">
                            <nav class="nav-wrap"> 
                                <ul class="hide-on-med-and-down group"  id="example-one">
                                    <li class="current_page_item"><a href="#header-top">Home</a></li>
                                    <li><a href="cover_latter_demo.php">Cover Latter</a></li> 
                                    <li><a href="#about">About</a></li>                                
                                    <li><a href="#skills">Initial Question</a></li>                                
                                    <li><a href="#works">Works</a></li>                                
                                    <li><a href="#portfolio">Portolio</a></li>                                
                                    <li><a href="#education">Education</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#pricing-table">Pricing</a></li>                                
                                    <li><a href="#clients">Client</a></li>
                                    <li><a href="#contact-form">Contact</a></li>
                                </ul>
                                <ul class="side-nav" id="slide-out">
                                    <li><a href="#header-bottom" class="active">Home</a></li>
                                    <li><a href="#about">About</a></li>                                
                                    <li><a href="#skills">Initial Question</a></li>                                
                                    <li><a href="#works">Works</a></li>                                
                                    <li><a href="#portfolio">Portolio</a></li>                                
                                    <li><a href="#education">Education</a></li>
                                    <li><a href="#blog">Blog</a></li>
                                    <li><a href="#pricing-table">Pricing</a></li>                                
                                    <li><a href="#clients">Client</a></li>
                                    <li><a href="#contact-form">Contact</a></li>
                                </ul>
                                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!--End: Header Area-->
        </header> <!--End: Header Area-->
        
        <!-- =========================================
                        ABOUT   
        ==========================================-->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="intro z-depth-1 col m12">
                        <div class="col m12 s12">
                         <?php
                         $result_5_personal_info_table = $crud->uni_select_fn($table_name['5_personal_info_table'],$_SESSION['SESS_user_id_cv_id']); 
                        $row_5_personal_info_table = mysqli_fetch_array($result_5_personal_info_table);
                        if($row_5_personal_info_table['input_Photo_upload_path']) { ?>
                            <div class="profile-pic wow fadeIn a1" data-wow-delay="0.1s" >
                            <img src="./user_cv_doc/<?php echo $row_5_personal_info_table['input_Photo_upload_path'];  ?>" alt="sig image">
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col m12 s12 co-centered wow fadeIn a2" data-wow-delay="0.2s">
                            <div class="intro-content col m10 s12">
                                <h2><?php echo $row_5_personal_info_table['input_Name'];   ?></h2>
                                <span>Creative Director of DeviserWeb</span>
                                <p>Hello everyone, My name is Al Rayhan. I am User Interface Designer from Bangladesh. I started designing 
                                things about 5 years ago. I love to explore design and interact people with it. I design Website, Icons, Logos, 
                                Print Templates, Mobile & Desktop App.</p>
                                <a href="#" class="btn waves-effect">Download CV</a>
                                <a href="#contact-form" class="btn btn-success waves-effect">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </section>
        
        <!-- =========================================
                          initial_question 
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>Initial Question</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_4_initial_question_table = $crud->uni_select_fn($table_name['4_initial_question_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_4_initial_question_table = mysqli_fetch_array($result_4_initial_question_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>Initial Question </h3>
                                    <?php 
                                    if($row_4_initial_question_table['input_Total_experience'])
                                        echo '<span>'.$row_4_initial_question_table['input_Total_experience'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                    
                                    <?php 
                                    if($row_4_initial_question_table['input_Heighest_level_edu'])
                                        echo '<span>'.$row_4_initial_question_table['input_Heighest_level_edu'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                    
                                    
                                    <?php 
                                    if($row_4_initial_question_table['input_Notice_period'])
                                        echo '<span>'.$row_4_initial_question_table['input_Notice_period'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                    
                                    
                                    <?php 
                                    if($row_4_initial_question_table['input_Willingness_travel'])
                                        echo '<span>'.$row_4_initial_question_table['input_Willingness_travel'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_4_initial_question_table['input_Expected_salary_annually'])
                                        echo '<span>'.$row_4_initial_question_table['input_Expected_salary_annually'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                                                                                                                  
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>Initial Question </h3>
                                    <?php 
                                    if($row_4_initial_question_table['input_Happy_relocate'])
                                        echo '<span>'.$row_4_initial_question_table['input_Happy_relocate'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                                                                      

                                    <?php 
                                    if($row_4_initial_question_table['input_Current_locations'])
                                        echo '<span>'.$row_4_initial_question_table['input_Current_locations'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_4_initial_question_table['input_Preferred_locations'])
                                        echo '<span>'.$row_4_initial_question_table['input_Preferred_locations'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_4_initial_question_table['input_Mention_skills'])
                                        echo '<span>'.$row_4_initial_question_table['input_Mention_skills'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
         <!-- =========================================
                          PERSONAL INFORMATION
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>PERSONAL INFORMATION</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_5_personal_info_table = $crud->uni_select_fn($table_name['5_personal_info_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_5_personal_info_table = mysqli_fetch_array($result_5_personal_info_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>PERSONAL INFORMATION </h3>

                                    <?php 
                                    if($row_5_personal_info_table['input_Photo_upload_path'])

                                        echo '<img src="./user_cv_doc/'.$row_5_personal_info_table['input_Photo_upload_path'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_5_personal_info_table['input_Name'])
                                        echo '<span>'.$row_5_personal_info_table['input_Name'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                                           
                                    
                                    <?php 
                                    if($row_5_personal_info_table['input_Gender'])
                                        echo '<span>'.$row_5_personal_info_table['input_Gender'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                           

                                    <?php 
                                    if($row_5_personal_info_table['input_Address'])
                                        echo '<span>'.$row_5_personal_info_table['input_Address'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_5_personal_info_table['input_Father_name'])
                                        echo '<span>'.$row_5_personal_info_table['input_Father_name'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_5_personal_info_table['input_Dob'])
                                        echo '<span>'.$row_5_personal_info_table['input_Dob'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                    
                                    <?php 
                                    if($row_5_personal_info_table['input_Mobile_no'])
                                        echo '<span>'.$row_5_personal_info_table['input_Mobile_no'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_5_personal_info_table['input_Whatsapp_no'])
                                        echo '<span>'.$row_5_personal_info_table['input_Whatsapp_no'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

 

                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>PERSONAL INFORMATION</h3>
                                    <?php 
                                    if($row_5_personal_info_table['input_Email_address'])
                                        echo '<span>'.$row_5_personal_info_table['input_Email_address'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                                           

                                    <?php 
                                    if($row_5_personal_info_table['input_Zoom_id'])
                                        echo '<span>'.$row_5_personal_info_table['input_Zoom_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_5_personal_info_table['input_Skype_id'])
                                        echo '<span>'.$row_5_personal_info_table['input_Skype_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_5_personal_info_table['input_Language_known'])
                                        echo '<span>'.$row_5_personal_info_table['input_Language_known'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_5_personal_info_table['input_Hobbies'])
                                        echo '<span>'.$row_5_personal_info_table['input_Hobbies'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_5_personal_info_table['input_Passport'])
                                        echo '<span>'.$row_5_personal_info_table['input_Passport'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                    

                                    <?php 
                                    if($row_5_personal_info_table['input_Drivers_licence'])
                                        echo '<span>'.$row_5_personal_info_table['input_Drivers_licence'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_5_personal_info_table['input_Vehicle_own'])
                                        echo '<span>'.$row_5_personal_info_table['input_Vehicle_own'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                                                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- =========================================
                          Social information
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>Social information</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_6_social_info_table = $crud->uni_select_fn($table_name['6_social_info_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_6_social_info_table = mysqli_fetch_array($result_6_social_info_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>Social information</h3>
                                    <?php 
                                    if($row_6_social_info_table['inputLinkedin_id'])
                                        echo '<span>'.$row_6_social_info_table['inputLinkedin_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_6_social_info_table['inputFacebook_id'])
                                        echo '<span>'.$row_6_social_info_table['inputFacebook_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputInstagram_id'])
                                        echo '<span>'.$row_6_social_info_table['inputInstagram_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputTwitter_id'])
                                        echo '<span>'.$row_6_social_info_table['inputTwitter_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputGoogle'])
                                        echo '<span>'.$row_6_social_info_table['inputGoogle'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputSoundcloud_id'])
                                        echo '<span>'.$row_6_social_info_table['inputSoundcloud_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputYoutube_channel'])
                                        echo '<span>'.$row_6_social_info_table['inputYoutube_channel'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                     
 
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>Social information</h3>
                         
                                    <?php 
                                    if($row_6_social_info_table['inputWebsite_url'])
                                        echo '<span>'.$row_6_social_info_table['inputWebsite_url'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputLinks_to_your_work'])
                                        echo '<span>'.$row_6_social_info_table['inputLinks_to_your_work'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputLink1'])
                                        echo '<span>'.$row_6_social_info_table['inputLink1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_6_social_info_table['inputLink2'])
                                        echo '<span>'.$row_6_social_info_table['inputLink2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>     

                                    <?php 
                                    if($row_6_social_info_table['inputLink3'])
                                        echo '<span>'.$row_6_social_info_table['inputLink3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_6_social_info_table['inputLink4'])
                                        echo '<span>'.$row_6_social_info_table['inputLink4'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_6_social_info_table['inputLink5'])
                                        echo '<span>'.$row_6_social_info_table['inputLink5'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
         <!-- =========================================
                          Career Objective
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>Career Objective</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_7_career_objective_table = $crud->uni_select_fn($table_name['7_career_objective_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_7_career_objective_table = mysqli_fetch_array($result_7_career_objective_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>Career Objective</h3>
                                    <?php 
                                    if($row_7_career_objective_table['input_objective_description1'])
                                        echo '<span>'.$row_7_career_objective_table['input_objective_description1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_7_career_objective_table['input_objective_description2'])
                                        echo '<span>'.$row_7_career_objective_table['input_objective_description2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_7_career_objective_table['input_objective_description3'])
                                        echo '<span>'.$row_7_career_objective_table['input_objective_description3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

 
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>Career Objective</h3>
                                    
                                    <?php 
                                    if($row_7_career_objective_table['input_objective_description4'])
                                        echo '<span>'.$row_7_career_objective_table['input_objective_description4'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_7_career_objective_table['input_objective_description5'])
                                        echo '<span>'.$row_7_career_objective_table['input_objective_description5'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

         <!-- =========================================
                          PROFILE SUMMARY
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>PROFILE SUMMARY</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_8_profile_summary_table = $crud->uni_select_fn($table_name['8_profile_summary_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_8_profile_summary_table = mysqli_fetch_array($result_8_profile_summary_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>Career Objective</h3>
                                    <?php 
                                    if($row_8_profile_summary_table['input_profile_description'])
                                        echo '<span>'.$row_8_profile_summary_table['input_profile_description'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

 
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>PROFILE SUMMARY</h3>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 


         <!-- =========================================
                         ACHIEVEMENTS
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>ACHIEVEMENTS</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_9_achievements_table = $crud->uni_select_fn($table_name['9_achievements_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_9_achievements_table = mysqli_fetch_array($result_9_achievements_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>ACHIEVEMENTS </h3>
                                    
                                    <?php 
                                    if($row_9_achievements_table['input_achievements'])
                                        echo '<span>'.$row_9_achievements_table['input_achievements'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  
                                    <?php 
                                    if($row_9_achievements_table['input_achievements_photo1'])

                                        echo '<img src="./user_cv_doc/'.$row_9_achievements_table['input_achievements_photo1'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_9_achievements_table['input_achievements_photo2'])

                                        echo '<img src="./user_cv_doc/'.$row_9_achievements_table['input_achievements_photo2'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>   

 

                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>ACHIEVEMENTS</h3>
                                                                               
                                    <?php 
                                    if($row_9_achievements_table['input_achievements_photo3'])

                                        echo '<img src="./user_cv_doc/'.$row_9_achievements_table['input_achievements_photo3'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>   

                                    <?php 
                                    if($row_9_achievements_table['input_achievements_photo4'])

                                        echo '<img src="./user_cv_doc/'.$row_9_achievements_table['input_achievements_photo4'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
        <!-- ========================================
                WORKS EXPERIENCE  
        ==========================================-->
        
        <section id="works">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2> <i class="fa fa-suitcase"> </i>Work Experience</h2>
                    </div>
                    <div id="cd-timeline" class="cd-container">
                            <?php
                            $result_10_work_experience_table = $crud->uni_select_fn($table_insert_table['10_work_experience_table'],$_SESSION['SESS_user_id_cv_id']); 

                            while($row_10_work_experience_table = mysqli_fetch_array($result_10_work_experience_table))
                            { $i_10_work_experience_table=2;?>
                            <div class="cd-timeline-block wow fadeIn a<?php echo $i_10_work_experience_table;?>" data-wow-delay="0.<?php echo $i_10_work_experience_table;?>s">
                                <div class="cd-timeline-img">
                                </div> <!-- cd-timeline-img -->
                            <div class="cd-timeline-content col m5 s12 z-depth-1">
                                <p> 

                                    <?php 
                                    if($row_10_work_experience_table['input_Company_name'])
                                        echo '<span>'.$row_10_work_experience_table['input_Company_name'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                    
                                    <?php 
                                    if($row_10_work_experience_table['input_Date_join'])
                                        echo '<span>'.$row_10_work_experience_table['input_Date_join'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Date_leave'])
                                        echo '<span>'.$row_10_work_experience_table['input_Date_leave'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Company_description'])
                                        echo '<span>'.$row_10_work_experience_table['input_Company_description'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Designation'])
                                        echo '<span>'.$row_10_work_experience_table['input_Designation'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Job_profile'])
                                        echo '<span>'.$row_10_work_experience_table['input_Job_profile'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Salary_drawn'])
                                        echo '<span>'.$row_10_work_experience_table['input_Salary_drawn'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Reason_leaving'])
                                        echo '<span>'.$row_10_work_experience_table['input_Reason_leaving'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Company_contact'])
                                        echo '<span>'.$row_10_work_experience_table['input_Company_contact'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Can_we_contact'])
                                        echo '<span>'.$row_10_work_experience_table['input_Can_we_contact'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Company_website'])
                                        echo '<span>'.$row_10_work_experience_table['input_Company_website'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Link1'])
                                        echo '<span>'.$row_10_work_experience_table['input_Link1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Link2'])
                                        echo '<span>'.$row_10_work_experience_table['input_Link2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_10_work_experience_table['input_Upload_doc1'])

                                        echo '<img src="./user_cv_doc/'.$row_10_work_experience_table['input_Upload_doc1'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_10_work_experience_table['input_Upload_doc2'])

                                        echo '<img src="./user_cv_doc/'.$row_10_work_experience_table['input_Upload_doc2'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_10_work_experience_table['input_Upload_doc3'])

                                        echo '<img src="./user_cv_doc/'.$row_10_work_experience_table['input_Upload_doc3'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_10_work_experience_table['input_Upload_doc4'])

                                        echo '<img src="./user_cv_doc/'.$row_10_work_experience_table['input_Upload_doc4'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 
                                </p>
                            </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                            
                            <?php $i_10_work_experience_table++; }
                            ?>

                	</div> <!-- cd-timeline -->
                </div>
            </div>
        </section>

        <!-- ========================================
                 PROJECTS
        ==========================================-->
        
        <section id="works">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2> <i class="fa fa-suitcase"> </i>PROJECTS</h2>
                    </div>
                    <div id="cd-timeline" class="cd-container">
                            <?php
                            $result_11_project_undertaken_table = $crud->uni_select_fn($table_insert_table['11_project_undertaken_table'],$_SESSION['SESS_user_id_cv_id']); 

                            while($row_11_project_undertaken_table = mysqli_fetch_array($result_11_project_undertaken_table))
                            { $i_11_project_undertaken_table=2;?>
                            <div class="cd-timeline-block wow fadeIn a<?php echo $i_11_project_undertaken_table;?>" data-wow-delay="0.<?php echo $i_11_project_undertaken_table;?>s">
                                <div class="cd-timeline-img">
                                </div> <!-- cd-timeline-img -->
                            <div class="cd-timeline-content col m5 s12 z-depth-1">
                                <p> 

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_name'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_name'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Contribution'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Contribution'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Description'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Description'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Duration_project'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Duration_project'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link1'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link2'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link3'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link4'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link4'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link5'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link5'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_11_project_undertaken_table['input_Project_link6'])
                                        echo '<span>'.$row_11_project_undertaken_table['input_Project_link6'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    for ($j_11_project_undertaken_table=1; $j_11_project_undertaken_table<=10; $j_11_project_undertaken_table++ )
                                    {
                                        if($row_11_project_undertaken_table['input_Project_image'.$j_11_project_undertaken_table])

                                            echo '<img src="./user_cv_doc/'.$row_11_project_undertaken_table['input_Project_image'.$j_11_project_undertaken_table].'" alt="sig image" height="100" max-width="200"><br>';
                                        else 
                                            echo "<span>Empty</span><br>";
                                        
                                    }
                                    ?>
                                </p>
                            </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                            
                            <?php $i_11_project_undertaken_table++; }
                            ?>

                    </div> <!-- cd-timeline -->
                </div>
            </div>
        </section>        

        <!-- ========================================
                 EDUCATION
        ==========================================-->
        
        <section id="works">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2> <i class="fa fa-suitcase"> </i>EDUCATION</h2>
                    </div>
                    <div id="cd-timeline" class="cd-container">
                            <?php
                            $result_12_education_info_table = $crud->uni_select_fn($table_insert_table['12_education_info_table'],$_SESSION['SESS_user_id_cv_id']); 

                            while($row_12_education_info_table = mysqli_fetch_array($result_12_education_info_table))
                            { $i_12_education_info_table=2;?>
                            <div class="cd-timeline-block wow fadeIn a<?php echo $i_12_education_info_table;?>" data-wow-delay="0.<?php echo $i_12_education_info_table;?>s">
                                <div class="cd-timeline-img">
                                </div> <!-- cd-timeline-img -->
                            <div class="cd-timeline-content col m5 s12 z-depth-1">
                                <p> 

                                    <?php 
                                    if($row_12_education_info_table['input_Education_type'])
                                        echo '<span>'.$row_12_education_info_table['input_Education_type'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Class'])
                                        echo '<span>'.$row_12_education_info_table['input_Class'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Start_Study_date'])
                                        echo '<span>'.$row_12_education_info_table['input_Start_Study_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_End_Study_date'])
                                        echo '<span>'.$row_12_education_info_table['input_End_Study_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Description_education'])
                                        echo '<span>'.$row_12_education_info_table['input_Description_education'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Study_school'])
                                        echo '<span>'.$row_12_education_info_table['input_Study_school'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Location'])
                                        echo '<span>'.$row_12_education_info_table['input_Location'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_University'])
                                        echo '<span>'.$row_12_education_info_table['input_University'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    for ($j_12_education_info_table=1; $j_12_education_info_table<=5; $j_12_education_info_table++ )
                                    {
                                        if($row_12_education_info_table['input_Certificate_path'.$j_12_education_info_table])

                                            echo '<img src="./user_cv_doc/'.$row_12_education_info_table['input_Certificate_path'.$j_12_education_info_table].'" alt="sig image" height="100" max-width="200"><br>';
                                        else 
                                            echo "<span>Empty</span><br>";
                                        
                                    }
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Link1'])
                                        echo '<span>'.$row_12_education_info_table['input_Link1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Link2'])
                                        echo '<span>'.$row_12_education_info_table['input_Link2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Link3'])
                                        echo '<span>'.$row_12_education_info_table['input_Link3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_12_education_info_table['input_Link4'])
                                        echo '<span>'.$row_12_education_info_table['input_Link4'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>


                                </p>
                            </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                            
                            <?php $i_12_education_info_table++; }
                            ?>

                    </div> <!-- cd-timeline -->
                </div>
            </div>
        </section>    

        <!-- ========================================
                 Technical Qualifications
        ==========================================-->
        
        <section id="works">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2> <i class="fa fa-suitcase"> </i>Technical Qualifications</h2>
                    </div>
                    <div id="cd-timeline" class="cd-container">
                            <?php
                            $result_13_technical_qualifications_table = $crud->uni_select_fn($table_insert_table['13_technical_qualifications_table'],$_SESSION['SESS_user_id_cv_id']); 

                            while($row_13_technical_qualifications_table = mysqli_fetch_array($result_13_technical_qualifications_table))
                            { $i_13_technical_qualifications_table=2;?>
                            <div class="cd-timeline-block wow fadeIn a<?php echo $i_13_technical_qualifications_table;?>" data-wow-delay="0.<?php echo $i_13_technical_qualifications_table;?>s">
                                <div class="cd-timeline-img">
                                </div> <!-- cd-timeline-img -->
                            <div class="cd-timeline-content col m5 s12 z-depth-1">
                                <p> 

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_Course_name'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_Course_name'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_Start_Study_date'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_Start_Study_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_End_Study_date'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_End_Study_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_Description_technical_education'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_Description_technical_education'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>



                                    <?php 
                                    for ($j_13_technical_qualifications_table=1; $j_13_technical_qualifications_table<=5; $j_13_technical_qualifications_table++ )
                                    {
                                        if($row_13_technical_qualifications_table['input_Certificate_path'.$j_13_technical_qualifications_table])

                                            echo '<img src="./user_cv_doc/'.$row_13_technical_qualifications_table['input_Certificate_path'.$j_13_technical_qualifications_table].'" alt="sig image" height="100" max-width="200"><br>';
                                        else 
                                            echo "<span>Empty</span><br>";
                                        
                                    }
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_upload_link1'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_upload_link1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_upload_link2'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_upload_link2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_upload_link3'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_upload_link3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_13_technical_qualifications_table['input_upload_link4'])
                                        echo '<span>'.$row_13_technical_qualifications_table['input_upload_link4'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                </p>
                            </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                            
                            <?php $i_13_technical_qualifications_table++; }
                            ?>

                    </div> <!-- cd-timeline -->
                </div>
            </div>
        </section>    
        <!-- =========================================
                          GOVERNMENT INFORMATION
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>GOVERNMENT INFORMATION</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_14_gov_info_table = $crud->uni_select_fn($table_name['14_gov_info_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_14_gov_info_table = mysqli_fetch_array($result_14_gov_info_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>GOVERNMENT INFORMATION</h3>
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_country_id'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_country_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>   
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_name_on_id'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_name_on_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_number_issue'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_number_issue'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_country_issue'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_country_issue'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_issue_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_issue_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Gov_expiry_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_Gov_expiry_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc1'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc1'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc2'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc2'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_License_name_on_id'])
                                        echo '<span>'.$row_14_gov_info_table['input_License_name_on_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>   
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_License_number'])
                                        echo '<span>'.$row_14_gov_info_table['input_License_number'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_License_country_issue'])
                                        echo '<span>'.$row_14_gov_info_table['input_License_country_issue'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_License_issue_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_License_issue_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_License_expiry_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_License_expiry_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>GOVERNMENT INFORMATION</h3>
                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc3'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc3'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc4'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc4'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Passport_name_on_id'])
                                        echo '<span>'.$row_14_gov_info_table['input_Passport_name_on_id'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>   
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_Passport_number'])
                                        echo '<span>'.$row_14_gov_info_table['input_Passport_number'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Passport_country_issue'])
                                        echo '<span>'.$row_14_gov_info_table['input_Passport_country_issue'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Passport_issue_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_Passport_issue_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_14_gov_info_table['input_Passport_expiry_date'])
                                        echo '<span>'.$row_14_gov_info_table['input_Passport_expiry_date'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>
                                    
                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc5'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc5'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

                                    <?php 
                                    if($row_14_gov_info_table['input_upload_doc6'])

                                        echo '<img src="./user_cv_doc/'.$row_14_gov_info_table['input_upload_doc6'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                                                             

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- =========================================
                          STRENGTHS
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>STRENGTHS</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_15_strengths_table = $crud->uni_select_fn($table_name['15_strengths_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_15_strengths_table = mysqli_fetch_array($result_15_strengths_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>STRENGTHS</h3>
                                    <?php 
                                    if($row_15_strengths_table['input_strengths'])
                                        echo '<span>'.$row_15_strengths_table['input_strengths'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>    

 
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>STRENGTHS</h3>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

         <!-- =========================================
                          REFERENCES
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>REFERENCES</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                    <?php
                                    $result_16_references_table = $crud->uni_select_fn($table_name['16_references_table'],$_SESSION['SESS_user_id_cv_id']); 
                                    $row_16_references_table = mysqli_fetch_array($result_16_references_table);
                                    ?>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>REFERENCES</h3>

                                    <?php 
                                    if($row_16_references_table['input_Name1'])
                                        echo '<span>'.$row_16_references_table['input_Name1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Company_name1'])
                                        echo '<span>'.$row_16_references_table['input_Company_name1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Address1'])
                                        echo '<span>'.$row_16_references_table['input_Address1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_16_references_table['input_Relationship1'])
                                        echo '<span>'.$row_16_references_table['input_Relationship1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_16_references_table['input_Mobile_no1'])
                                        echo '<span>'.$row_16_references_table['input_Mobile_no1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Email1'])
                                        echo '<span>'.$row_16_references_table['input_Email1'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_16_references_table['input_Name2'])
                                        echo '<span>'.$row_16_references_table['input_Name2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Company_name2'])
                                        echo '<span>'.$row_16_references_table['input_Company_name2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Address2'])
                                        echo '<span>'.$row_16_references_table['input_Address2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Relationship2'])
                                        echo '<span>'.$row_16_references_table['input_Relationship2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Mobile_no2'])
                                        echo '<span>'.$row_16_references_table['input_Mobile_no2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Email2'])
                                        echo '<span>'.$row_16_references_table['input_Email2'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>REFERENCES</h3>
                                    <?php 
                                    if($row_16_references_table['input_Name3'])
                                        echo '<span>'.$row_16_references_table['input_Name3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Company_name3'])
                                        echo '<span>'.$row_16_references_table['input_Company_name3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Address3'])
                                        echo '<span>'.$row_16_references_table['input_Address3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Relationship3'])
                                        echo '<span>'.$row_16_references_table['input_Relationship3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Mobile_no3'])
                                        echo '<span>'.$row_16_references_table['input_Mobile_no3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?> 

                                    <?php 
                                    if($row_16_references_table['input_Email3'])
                                        echo '<span>'.$row_16_references_table['input_Email3'].'</span><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  


                                    <?php 
                                    if($row_16_references_table['input_upload_doc1'])

                                        echo '<img src="./user_cv_doc/'.$row_16_references_table['input_upload_doc1'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>

                                    <?php 
                                    if($row_16_references_table['input_upload_doc2'])

                                        echo '<img src="./user_cv_doc/'.$row_16_references_table['input_upload_doc2'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_16_references_table['input_upload_doc3'])

                                        echo '<img src="./user_cv_doc/'.$row_16_references_table['input_upload_doc3'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>  

                                    <?php 
                                    if($row_16_references_table['input_upload_doc4'])

                                        echo '<img src="./user_cv_doc/'.$row_16_references_table['input_upload_doc4'].'" alt="sig image" height="100" max-width="200"><br>';
                                    else 
                                        echo "<span>Empty</span><br>";
                                    ?>                         

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- =========================================
                    PORTFOLIO   
        ==========================================-->
        
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2><i class="fa fa-th-list"></i>Portfolio</h2>
                    </div>
                    <div class="col m12 s12 portfolio-nav">
                        <ul>
                            <li class="filter" data-filter="all">Show All</li>
                            <li class="filter" data-filter=".category-1">Art</li>
                            <li class="filter" data-filter=".category-2">Icons</li>
                            <li class="filter" data-filter=".category-3">Web Design</li>
                            <li class="filter" data-filter=".category-4">Materials</li>
                        </ul>
                    </div>
                    <div id="loader">
                        <div class="loader-icon"></div>
                    </div>
                    <div class="screenshots" id="portfolio-item" >
                        <div class="row">
                            <ul class="grid">
                                <!-- Portfolio one-->
                                <li class="col m3 s12 mix category-1">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-one">
                                        <figure class="more">
                                        <img src="assets/images/p-1.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Minimal Design</h2>
                                                        <p>Work hard for what you want because 
                                                        it won't come to you without a fight</p>
                                                    </div>							
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                    			</li>
                    			<!-- Portfolio two-->
                                <li class="col m3 s12 mix category-2">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-two">
                                        <figure class="more">
                                            <img src="assets/images/p-2.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Lorem Design</h2>
                                                        <p>Work hard for what you want because 
                                                        it won't come to you without a fight</p>
                                                    </div>				
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio three-->
                                <li class="col m3 s12 mix category-1">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-three">
                                        <figure class="more">
                                        <img src="assets/images/p-3.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Creative Design</h2>
                                                        <p>Lorem Ipsum because 
                                                        it won't come to you without a fight</p>
                                                    </div>								
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio four-->
                                <li class="col m3 s12 mix category-2">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-four">
                                        <figure class="more">
                                        <img src="assets/images/p-4.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Material Design</h2>
                                                        <p>Work hard for what you want because 
                                                        it won't come to you.</p>
                                                    </div>	
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio five-->
                                <li class="col m3 s12 mix category-4">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-five">
                                        <figure class="more">
                                        <img src="assets/images/p-5.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Clean Code</h2>
                                                        <p>You want because 
                                                        it won't come to you without a fight</p>
                                                    </div>					
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio six-->
                                <li class="col m3 s12 mix category-1">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-six">
                                        <figure class="more">
                                        <img src="assets/images/p-6.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>SEO Optimize</h2>
                                                        <p>Work hard for what you want because 
                                                        it won't come to you without a fight</p>
                                                    </div>					
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio seven-->
                                <li class="col m3 s12 mix category-2">
                                    <a href="project.html" class="sa-view-project-detail" data-action="#project-seven">
                                        <figure class="more">
                                        <img src="assets/images/p-7.jpg" alt="Screenshot">
                                            <figcaption>
                                                <div class="caption-content">
                                                    <div class="single_image">
                                                        <h2>Responsive Design</h2>
                                                        <p>Work hard for what you want because 
                                                        it won't come to you without a fight</p>
                                                    </div>									
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                                <!-- Portfolio eight-->
                                <li class="col m3 s12 mix category-3">
                                    <a href="project.html" class="sa-view-project-detail"  data-action="#project-eight">
                                        <figure class="more"> 
                                        <img src="assets/images/p-8.jpg" alt="Screenshot 01">
                                            <figcaption>
                                                <div class="caption-content ">
                                                    <div class="single_image">
                                                        <h2>Minimal Design</h2>
                                                        <p>
                                                        Work hard for what you want need lorem ipsuum. </p>
                                                    </div>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </li>
                    		</ul>
                		</div>
                	</div>
                	
                <!-- PROJECT DETAILS WILL BE LOADED HERE -->
                <div class="sa-project-gallery-view" id="project-gallery-view"></div>

                <div class="back-btn col s12">  
                    <a id="back-button" class="btn btn-info waves-effect" href="#" ><i class="fa fa-long-arrow-left"></i> Go Back </a>
                </div>
        
            	<!-- =========================================
                        MARKET PLACE   
                ==========================================-->
                    <div class="market-place col m12 s12 z-depth-1 wow fadeIn a3" data-wow-delay="0.3s">
                        <ul>
                            <li><a href=""><h3>Behence</h3></a></li>
                            <li><a href=""><h3>Dribble</h3></a></li>
                            <li><a href=""><h3>Envato</h3></a></li>
                            <li><a href=""><h3>Github</h3></a></li>
                            <li><a href=""><h3>Twitter</h3></a></li>
                            <li><a href=""><h3>Facebook</h3></a></li>
                        </ul>
                    </div>
                </div>  
            </div>
        </section>
        <!-- =========================================
                EDUCATION  
        ==========================================-->
        <section id="education">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-graduation-cap"></i>Education</h2>
                    </div>
                    
                    <div class="cd-container" id="ed-timeline">
                        <div class="cd-timeline-block wow fadeIn a2" data-wow-delay="0.2s">
                			<div class="cd-timeline-img">
                			</div> <!-- cd-timeline-img -->
                			<div class="cd-timeline-content col m5 s12 z-depth-1">
                				<a href=""><h2>UI & WEB DESIGNER @Academy</h2></a>
                				<span>11 Jan 2015 </span>
                				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, 
                				dolorum provident rerum aut hic quasi placeat iure tempora.</p>
                			</div> <!-- cd-timeline-content -->
                        </div> <!-- cd-timeline-block -->
                		<div class="cd-timeline-block wow fadeIn a3" data-wow-delay="0.3s">
                			<div class="cd-timeline-img">
                			</div> <!-- cd-timeline-img -->
                			<div class="cd-timeline-content col m5 s12 z-depth-1">
                				<a href=""><h2>UI & WEB DESIGNER @Academy</h2></a>
                				<span>11 Jan 2015 </span>
                				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, 
                				dolorum provident rerum aut hic quasi placeat iure tempora.</p>
                			</div> <!-- cd-timeline-content -->
                		</div> <!-- cd-timeline-block -->
                
                		<div class="cd-timeline-block wow fadeIn a4" data-wow-delay="0.4s">
                			<div class="cd-timeline-img">
                			</div> <!-- cd-timeline-img -->
                			<div class="cd-timeline-content col m5 s12 z-depth-1">
                				<a href=""><h2>UI & WEB DESIGNER @Academy</h2></a>
                				<span>11 Jan 2015 </span>
                				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, 
                				dolorum provident rerum aut hic quasi placeat iure tempora.</p>
                			</div> <!-- cd-timeline-content -->
                		</div> <!-- cd-timeline-block -->
                		<div class="cd-timeline-block wow fadeIn a5" data-wow-delay="0.5s">
                			<div class="cd-timeline-img">
            			    </div> <!-- cd-timeline-img -->
                			<div class="cd-timeline-content col m5 s12 z-depth-1">
                				<a href=""><h2>UI & WEB DESIGNER @Academy</h2></a>
                				<span>11 Jan 2015 </span>
                				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, 
                				dolorum provident rerum aut hic quasi placeat iure tempora.</p>
                			</div> <!-- cd-timeline-content -->
                		</div> <!-- cd-timeline-block -->
                	</div> <!-- cd-timeline -->
                    
                </div>
            </div>
        </section>
        <!-- =========================================
                BLOG 
        ==========================================-->
        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-edit"> </i>Blog</h2>
                    </div>
                    <div class="row">
                        <div class="blog">
                            <div class="col m4 s12 blog-post wow fadeIn a2" data-wow-delay="0.2s">
                                <div class="thumbnail z-depth-1 animated">
                                    <a href="blog-full-post.html"><img src="assets/images/b-1.jpg" alt="" class="responsive-img"></a>                                       
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-1">
                                            <a href="blog-full-post.html">
                                                <h2>Website Design</h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">                                            
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>                           
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                            <div class="col m4 s12 blog-post wow fadeIn a3" data-wow-delay="0.3s">
                                <div class="thumbnail z-depth-1">
                                    <a href="blog-full-post.html"><img src="assets/images/b-2.jpg" alt="" class="responsive-img"></a>                                        
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-2">
                                            <a href="blog-full-post.html">
                                                <h2>Website Redesign</h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                            <div class="col m4 s12 blog-post wow fadeIn a4" data-wow-delay="0.4s">
                                <div class="thumbnail z-depth-1">
                                    <a href="blog-full-post.html"><img src="assets/images/b-4.jpg" alt="" class="responsive-img"></a>                                       
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-3">
                                            <a href="blog-full-post.html">
                                                <h2>Music Player Design</h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>                               
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                            <div class="col m4 s12 blog-post wow fadeIn a5" data-wow-delay="0.5s">
                                <div class="thumbnail z-depth-1">
                                    <a href="blog-full-post.html"><img src="assets/images/b-3.jpg" alt="" class="responsive-img"></a>                                       
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-4">
                                            <a href="blog-full-post.html">
                                                <h2>Marketing Partner</h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p> 
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                            <div class="col m4 s12 blog-post wow fadeIn a6" data-wow-delay="0.6s">
                                <div class="thumbnail z-depth-1">
                                    <a href="blog-full-post.html"><img src="assets/images/b-5.jpg" alt="" class="responsive-img"></a>                                       
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-6">
                                            <a href="blog-full-post.html">
                                                <h2>Marketing Partner</h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                            <div class="col m4 s12 blog-post wow fadeIn a7" data-wow-delay="0.7s">
                                <div class="thumbnail z-depth-1">
                                    <a href="blog-full-post.html"><img src="assets/images/b-6.jpg" alt="" class="responsive-img"></a>                                       
                                    <div class="blog-details">
                                        <div class="post-title" id="blog-post-5">
                                            <a href="blog-full-post.html">
                                                <h2>Web development </h2>
                                                <span>branding, ui-ux, article</span>
                                            </a>
                                        </div> 
                                        <div class="post-details">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Aliquam ornare arcu ac velit ultricies fermentum.
                                            Aliquam ornare arcu ac velit ultricies fermentum.</p> 
                                        </div> 
                                    </div>              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- =========================================
                  PRICING 
         ==========================================-->
         
        <section id="pricing-table">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa  fa-money "></i>Pricing Table </h2>
                    </div>
                    <div class="pricing wow fadeIn a3" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="plan col m4 s12">
                                <ul class="thumbnail z-depth-1">
                                    <li> <strong>START-UP</strong> </li>
                                    <li> <h3>$299</h3> </li>
                                    <li><div class="span"> Logo</div></li>
                                    <li><div class="span"> Domine & Hosting</div></li>
                                    <li><div class="span"> One Page Landing</div></li>
                                    <li><div class="span"> Email Marketing</div></li>
                                    <li><div class="span"> Email Marketing</div></li>
                                    <li><div class="span"> SEO</div></li>
                                    <li> <button type="button" class="btn btn-info waves-effect">Order now</button></li>
                                </ul>
                            </div>
                            <div class="plan col m4 s12">
                                <ul class="thumbnail z-depth-1">
                                    <li> <strong>SMALL BUSINESS</strong> </li>
                                    <li> <h3>$499</h3> </li>
                                    <li><div class="span"> Logo</div></li>
                                    <li><div class="span"> Domine & Hosting</div></li>
                                    <li><div class="span"> One Page Landing</div></li>
                                    <li><div class="span"> Adsence</div></li>
                                    <li><div class="span"> Email Marketing</div></li>
                                    <li><div class="span"> SEO</div></li>
                                    <li><button type="button" class="btn btn-info waves-effect">Order now</button></li>
                                </ul>
                            </div>
                            <div class="plan col m4 s12">
                                <ul class="thumbnail z-depth-1">
                                    <li> <strong>ENTERPRISE</strong></li>
                                    <li> <h3>$799</h3> </li>
                                    <li><div class="span"> Logo</div></li>
                                    <li><div class="span"> Domine & Hosting</div></li>
                                    <li><div class="span"> One Page Landing</div></li>
                                    <li><div class="span"> One Page Landing</div></li>
                                    <li><div class="span"> Email Marketing</div></li>
                                    <li><div class="span"> SEO</div></li>
                                    <li>  <button type="button" class="btn btn-info waves-effect">Order now</button> </li>
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        
        <!-- =========================================
                CLIENTS
        ==========================================-->
        <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-quote-left"></i>Clients</h2>
                    </div>
                    <div class="clients-quates wow fadeIn a3" data-wow-delay="0.3s">
                        <div class="row">
                            <div class="quates col m4 s12">
                                <div class="thumbnail z-depth-1">
                                    <img src="assets/images/team1.jpg" alt="">
                                    <h3>Jhon Doe</h3>
                                    <span>CEO, Creative Market</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam 
                                    ornare arcu ac velit ultricies fermentum. Aliquam ornare arcu ac velit ultricies fermentum..</p>
                                </div>
                            </div>
                            <div class="quates col m4 s12">
                                <div class="thumbnail z-depth-1">
                                    <img src="assets/images/team2.jpg" alt="">
                                    <h3>Jhon Adnan</h3>
                                    <span>CEO, Lorem Ipsum</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Aliquam ornare arcu ac velit ultricies fermentum.Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                </div>
                            </div>
                            <div class="quates col m4 s12">
                                <div class="thumbnail z-depth-1">
                                    <img src="assets/images/team3.jpg" alt="">
                                    <h3>Mark Anwar</h3>
                                    <span>CEO, Bdpark Market</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                    Aliquam ornare arcu ac velit ultricies fermentum. Aliquam ornare arcu ac velit ultricies fermentum.</p>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- =========================================
                            CLIENTS LOGO   
                    ==========================================-->
                    <div class="clients-logo z-depth-1">
                        <div class="row">
                            <ul class="wow fadeIn a4" data-wow-delay="0.4s">
                                <li class="col m2 s6"><a href=""><img src="assets/images/client1.png" alt="" class="responsive-img"></a></li>
                                <li class="col m2 s6"><a href=""><img src="assets/images/client2.png" alt="" class="responsive-img"></a></li>
                                <li class="col m2 s6"><a href=""><img src="assets/images/client3.png" alt="" class="responsive-img"></a></li>
                                <li class="col m2 s6"><a href=""><img src="assets/images/client4.png" alt="" class="responsive-img"></a></li>
                                <li class="col m2 s6"><a href=""><img src="assets/images/client6.png" alt="" class="responsive-img"></a></li>
                                <li class="col m2 s6"><a href=""><img src="assets/images/client7.png" alt="" class="responsive-img"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
        <!-- =========================================
                CONTACT  
        ==========================================-->
        <section id="contact-form">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-send"></i>Contact</h2>
                    </div>
                    <div class="contact-form z-depth-1" id="contact">   
                        <div class="row">                                   
                            <form id="contactForm" data-toggle="validator">
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="input-field col m6 s12 wow fadeIn a2" data-wow-delay="0.2s">
                                    <label for="name" class="h4">Full Name *</label>
                                    <input type="text" class="form-control validate" id="name" required data-error="NEW ERROR MESSAGE">
                                </div>
                                <div class="input-field col m6 s12 wow fadeIn a4" data-wow-delay="0.4s">
                                    <label for="email" class="h4">Email *</label>
                                    <input type="email" class="form-control validate" id="email"  required>                
                                </div>
                                <div class="input-field col m6 s12 wow fadeIn a3" data-wow-delay="0.3s">
                                    <label for="last_name" class="h4">Subject *</label>
                                    <input type="text" class="form-control validate" id="last_name" required>
                                </div> 
                                <div class="input-field col m6 s12 wow fadeIn a5" data-wow-delay="0.5s" >
                                    <select>
                                      <option value="">Choose your Budget</option>
                                      <option value="1">$10000-$20000</option>
                                      <option value="2">$50000-$100000</option>
                                      <option value="3">$50000-$1000000</option>
                                    </select>
                                </div>
                                <div class="input-field col m12 s12 wow fadeIn a6" data-wow-delay="0.6s">
                                    <label for="message" class="h4 ">Message *</label>
                                    <textarea id="message" class="form-control materialize-textarea validate" required></textarea>           
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-success waves-effect wow fadeIn a7" data-wow-delay="0.7s">Submit</button>
                                                             
                            </form>                                     
                        </div> 
                    </div>
                    
                    <!-- =========================================
                            INTEREST  
                    ==========================================-->
                    
                    <div class="interests col s12 m12 l12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                            <ul class="z-depth-1"> <!-- interetsr icon start -->
                                <li><i class="fa fa-facebook-official tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Facebook"></i></li>
                                <li><i class="fa fa-twitter tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Twitter"></i></li>
                                <li><i class="fa fa-linkedin tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="linkedin"></i></li>
                                <li><i class="fa fa-whatsapp tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Whatsapp"></i></li>
                                <li><i class="fa fa-youtube tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Youtube"></i></li>
                                <li><i class="fa fa-vimeo tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Vimeo"></i></li>
                            </ul> <!-- interetsr icon end -->
                        </div>
                    </div>  
                </div>
            </div> 
        </section>
		
        <!-- SCRIPTS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js'></script>
    <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>  
    <script src="assets/js/masonry.pkgd.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="assets/js/validator.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/init.js"></script>
    
        <!-- =========================================================
            STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
        ===========================================================-->
        
        <!-- Style switter js -->
        <script src="assets/js/styleswitcher.js"></script>
        
        <div class="cv-style-switch" id="switch-style">
            <a id="toggle-switcher" class="switch-button icon_tools"> <i class="fa fa-cogs"></i></a>
            <div class="switched-options">                
                <div class="config-title">
                    Colors :
                </div>
                <ul class="styles">
                    <li><a href="index.html#" onclick="setActiveStyleSheet('red'); return false;" title="Red">
                    <div class="red"></div>
                    </a></li>                    
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('purple'); return false;" title="purple">
                    <div class="purple"></div>
                    </a></li>

                    <li><a href="index.html#" onclick="setActiveStyleSheet('orange'); return false;" title="orange">
                    <div class="orange"></div>
                    </a></li>
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('green'); return false;" title="green">
                    <div class="green"></div>
                    </a></li>
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('lime'); return false;" title="lime">
                    <div class="lime"></div>
                    </a></li>

                    <li class="p">
                        ( NOTE: Pre Defined Colors. You can change colors very easily )
                    </li>
                </ul>
            </div>
        </div>


</div>
    </body>
</html>

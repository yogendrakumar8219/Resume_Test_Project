<?php

include('./includeClass.php');
//print_r($_COOKIE);

if(isset($_COOKIE['Cooki_id_user']))
{
    $_SESSION['SESS_USER_ID'] = $_COOKIE['Cooki_id_user'];
    echo '<center> <button class="btn btn-success btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span>Allredy Login ...</button> </center><meta http-equiv="refresh" content="5;URL=user/dashboard_user.php" /><style> .container { display: none; }  </style>';
}

if (isset($_POST['send']))
{
   if(isset($_POST['remember_me']))
   {
    $remeber_me = $_POST['remember_me'];
   } 
  include("./eClass/ValidatorA/gump.class.php");
  $token = $_POST['token'];
  $validator = new GUMP();

  $_POST = array(
      'User_Email'          => $_POST['User_Email'],
      'User_Password'       => $_POST['User_Password'],      
  );

  $_POST = $validator->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.

  $validator->validation_rules(array(
    'User_Email'           => 'required|valid_email',
    'User_Password'        => 'required',   
  ));

  $validator->filter_rules(array(    
    'User_Email'           => 'trim|sanitize_email',    
    'User_Password'        => 'trim|base64_encode',   
  ));

  $validated_data = $validator->run($_POST);

  if($validated_data === false) 
  {
    $er = $validator-> get_errors_array(true); 
  
  }
  else
  {
    extract($_POST);
       
    $checkquery ="SELECT * FROM reg_email WHERE user_email='$User_Email' AND u_pass='$User_Password' LIMIT 1"; 
    
    if($crud->row_count($checkquery) > 0)
    { //
    
      $checkquery ="SELECT * FROM reg_email WHERE user_email='$User_Email' AND u_pass='$User_Password' AND email_status='enable' LIMIT 1"; 

      if($crud->row_count($checkquery) > 0)
        {
        ///////////////////////////////////////////////////////////
            
        $result = $crud->fetch($checkquery);
        $row = mysqli_fetch_assoc($result);
        extract($row); 

        session_start();

        $_SESSION['SESS_USER_ID'] = $id_user;
        $_SESSION['SESS_FIRST_NAME'] = $user_name;

        $last_id = $id_user;

        //update login details //
        if(!empty($last_id))
          {
            
            // token unset by shubham
              session_start();
            if($token != $_SESSION["token"])
            {
                // RESET TOKEN BY SHUBHAM
                unset($_SESSION["token"]);
                header("location: ./user/index.php");
                exit();
            }
            // start token else partition unset by shubham
            else
            {

                if(isset($remeber_me))
                {
                    $crud->cookie_password($id_user);
                    echo $_COOKIE['Cooki_id_user'];
                }

                $fquery="SELECT * FROM login_deteil WHERE id_user='$last_id' LIMIT 1";

                 if($crud->row_count($fquery) > 0)
                {
                  date_default_timezone_set('Asia/Kolkata');
                  $email_time = date('Y-m-d H:i');
                  $iquery="UPDATE login_deteil SET login_activity='$email_time' WHERE id_user='$last_id'";
                  $crud->execute($iquery);

                  unset($_SESSION["token"]);
                  echo '<center> <button class="btn btn-success btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span> Login ...</button> </center><meta http-equiv="refresh" content="5;URL=./user/dashboard_user.php" /><style> .container { display: none; }  </style>';             
                }
                else
                {
                  date_default_timezone_set('Asia/Kolkata');
                  $email_time = date('Y-m-d H:i');
                  $iquery="INSERT INTO login_deteil (id_user,login_activity) VALUES('$last_id','$email_time')";
                  $crud->execute($iquery);
                  unset($_SESSION["token"]);
                  echo '<center> <button class="btn btn-success btn-sm mt-5"><span class="spinner-border spinner-border-sm"></span>  Login ...</button> </center><meta http-equiv="refresh" content="5;URL=./user/dashboard_user.php" /><style> .container { display: none; }  </style>'; 
                }
            }
            // end token else partition unset by shubham
          }
            ///////////////////////////////////////////////////////////

        }
        else
        {
                $Error = "your account has been disabled  <hr><b>contact to team leader for activate</b>";
        }
    
    }//
    else
    {
        $Error = "You Are Not Authorized Login & Invalid Credential Details";
    }
  }



}
?><!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>

        <div class="container text-center text-dark" style="margin-top: 50px;">
        logo here
        <h4>once user login:  Resume system work.</h4> 
        
                    <div class="row">
                                    <div class="col-12 col-sm-6 col-sm-4 mx-auto">
                                            <div class="text-center">

                                            <hr>

                                            <?php include('./eClass/displayError.php'); ?>

        
                                                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="needs-validation" method="post">

                                                                            <input type="hidden" name="token" value="<?php echo $crud->token();?>">
                                                                            <div class="form-group">
                                                                            
                                                                            <input type="text" class="form-control"  placeholder="Enter Email" name="User_Email" required value="test@gmail.com">
                                                                            
                                                                            </div>
                                                                            <div class="form-group">
                                                                            
                                                                            <input type="password" class="form-control" placeholder="Enter password" name="User_Password" required value="test12">
                                                                        
                                                                            </div>

                                                                            

                                                                            <div class="form-group">
                                                                            
                                                                            <input type="checkbox" class="form-control" name="remember_me" value="1"> REMEMBER ME
                                                                            
                                                                            </div>
                                                                            
                                                                            <button type="submit" name="send" class="btn btn-success">LOGIN</button>
                                                                        </form>

                                                </div>
                                        </div>
                    </div>
        </div>

<hr>
Test only <br>
user email: test@gmail.com    <br>
password: test12

</body>
</html>

<?php
include_once("DB.php");
class UserTools extends DB

// *********************Start Class UserTools**************************//
{
  public function test()
  {
    return 'class connected successful';
  }


////////////////////////////////////////////////////////

  // cookie for remember password start
  public function cookie_password($id_user)
  {
    setcookie("Cooki_id_user",$id_user,time()+ 3600);   
  } 




  ////////////////////////////////////////////////////////
  public function uni_insert_fn($table, $data)
  {

     $query='INSERT INTO '.$table.' (';
      foreach($data as $key => $value)
      {
          $query .= $key.','; 
      }
      // remove , in last
      $query = substr($query, 0, -1);

      $query .= ') VALUES (';
      foreach($data as $key => $value)
      {
        if(filter_var($value,FILTER_VALIDATE_INT)==true)
          $query .= ''.$value.',';
         else if (gettype($value)=="string")
          $query .= '"'.$value.'",';

      }
      // remove , in last
      $query = substr($query, 0, -1);

      $query .= ');';

      //return $query;
     // $insert->execute($data);

       $result = $this->connection->query($query);
        
        if ($result == false)
        {
            return false;
        }
        else {
            return true;
        }     

  }




////////////////////////////////////////////////////////
public function uni_update_fn($table_name, $my_data, $my_wheres)
{
     $sql = "Update ".$table_name." SET ";
    $i = 0;
    foreach($my_data as $key => $value)
    {
        if(filter_var($value,FILTER_VALIDATE_INT)==true)
        {
            $sql.= $key." = ".$value."";    
        }
        else
        {
        $sql.= $key." = '".$value."'";
        }
        if ($i < count($my_data) - 1)
        {
            $sql.= " , ";
        }
        $i++;
    }
    if (count($my_wheres) > 0)
    {
        $sql.= " WHERE ";
        $i = 0;
        foreach($my_wheres as $key => $value)
        {
            $sql.= $key.
            " = ".$value;
            if ($i < count($my_wheres) - 1)
            {
                $sql.= " AND ";
            }
            $i++;
        }
    }    
    
    // return $sql;
    $result = $this->connection->query($sql);
        
        if ($result == false)
        {
            return false;
        }
        else
        {
            return true;
        }  
}       



////////////////////////////////////////////////////////
public function uni_delete_fn($table_name, $my_wheres)
  {
    
     $sql = "DELETE FROM ".$table_name."";
    
    if (count($my_wheres) > 0) {
        $sql.= " WHERE ";
        $i = 0;
        foreach($my_wheres as $key => $value)
        {
            $sql.= $key.
            " = ".$value;
            if ($i < count($my_wheres) - 1)
            {
                $sql.= " AND ";
            }
            $i++;
        }
    } 
    return $sql;
  }





////////////////////////////////////////////////////////
public function uni_select_fn($table_name, $my_wheres)
  {
    
     $sql = "SELECT * FROM ".$table_name."";
    
    if (count($my_wheres) > 0) {
        $sql.= " WHERE ";
        $i = 0;
        foreach($my_wheres as $key => $value)
        {
            $sql.= $key.
            " = ".$value;
            if ($i < count($my_wheres) - 1)
            {
                $sql.= " AND ";
            }
            $i++;
        }
    } 
    $result = $this->connection->query($sql);
    return $result;
  }





////////////////////////////////////////////////////////

// cookie for remember pass end Start Function Token() BY SHUBHAM
    public function token()
    {
    if(isset($_SESSION["token"]))
      {
        // Reuse the token
        $token = $_SESSION["token"];
      }
      else
      {
        // When no token present and generate a new one
        $token = md5(uniqid(rand(),true));
        $_SESSION["token"] = $token;

      }
      return $token;
    }
////////////////////////////////////////////////////////





// find last inserted id fn.
public function findlastid()
    {
      return $this->connection->insert_id;
    }
////////////////////////////////////////////////////////   
 




//if pass Query Fetch data fn.  
public function fetch($query)    
    {        
        $result = $this->connection->query($query);
        return $result;
    }
////////////////////////////////////////////////////////





// pass query row count fn.
public function row_count($query)
    {        
        $result = $this->connection->query($query);
        $row_count = mysqli_num_rows($result);
        return $row_count;
    } 
////////////////////////////////////////////////////////

//     // Affect rows
// public function row_affect($query)
//     {        
//         $result = $this->connection->query($query);
//         $row_affect = $this->connection->mysqli_affected_rows($query);
//         return $row_affect;
//     } 
////////////////////////////////////////////////////////




// if pass query and need to be execute Fn.
public function execute($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false)
        {
            return false;
        }
        else {
            return true;
        }        
    }
////////////////////////////////////////////////////////

// remoeve escape string from user input value fn.

public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }



///multipla file upload fn.
//  1.  array($fileToUpload) need must pass  (name="fileToUpload[]" multiple required)
//  2.  upload_dir ( pass a string directory name )
//  3.  file_type pass in array ----------------------------------------------------------
//  4.  file size pass (500 kb = 500000)
//  5.  no_of_files_upload (how many files u want to upload)

// file type , size , directory , multy array fils , for remane first word variable pass
public function uni_file_upload_fn($fileToUpload,$add_name,$upload_dir,$set_file_size,$no_of_files_upload,$upload_file_types)
    {
      extract($fileToUpload);
      // Count total files with name
     $countfiles = count($name);

      // *** Error Return If Type Missmatch *** //
      for($i=0; $i<$countfiles; $i++)
        {
              if(!in_array($type[$i], $upload_file_types))
              {
                return $Error[] = "Unsupported file type Error";
              }

              //Check file size 500KB
              if ($size[$i] > $set_file_size)
              {
                $set_file_size = $set_file_size/1000;
                return $Error[] = 'Sorry, your file is too large. plz upload Under '.$set_file_size.' KB';
              }
        }
      // *** ***************************** *** // 

    // reading all files info
    for($i=0; $i<$no_of_files_upload; $i++)
    { 

      // Rename of upload file ****************** //
       $file_extction[$i] = explode(".", $name[$i]);
       $new_file_name[$i] = $i.'_'.$add_name.'_'.round(microtime(true)) . '.' . end($file_extction[$i]); 
       $new_file_name[$i] = str_replace(" ", "", basename($new_file_name[$i])); 
       // ************************************* //      

        //  Uplaod files into given Directory 
        if(move_uploaded_file($tmp_name[$i],$upload_dir.'/'.$new_file_name[$i]))
        {            
           $Error['success_msg'] = 'done';
        }
          
    }

    // everything good return New file name
      if($Error['success_msg'] == 'done')
      {
        return $new_file_name;      
      }

      
  }
////////////////////////////////////////////////////////

  
// singel File upload on server   calling code
//   if (isset($_POST['btnsubmit']))
// { 

//   $add_name_file = 'Signature';
//   $upload_dir = './user_cv_doc';
//   $set_file_size = 500000; // 500 KB
//   $no_of_files_upload = 1;
//   $upload_file_types= array('image/jpeg','image/jpg','image/gif','image/png'); 

//   $concatenate_array_file_name = array();
// // ****************Upload files on server Fn.**************** //
//  for($i=1; $i<=2; $i++)
//  {
//   if (!empty($_FILES['input_Signature_file'.$i]['name']))
//   {

//   $test_array = uni_1_file_upload_fn($_FILES['input_Signature_file'.$i],$add_name_file,$upload_dir,$set_file_size,$upload_file_types,$i);
//   $concatenate_array_file_name += array('input_Signature_file'.$i.'' => $test_array);
    
//   }

// }

//   print_r($concatenate_array_file_name);

// }

  //singel File upload on server  function
////////////////////////////////////////////////////////
 function uni_1_file_upload_fn($fileToUpload,$add_name,$upload_dir,$set_file_size,$upload_file_types,$i)
{

  if(!in_array($fileToUpload['type'], $upload_file_types))
  {
    return $fileToUpload['error'] = "Unsupported file type Error";
  }


  //Check file size 500KB
  if ($fileToUpload['size'] > $set_file_size)
  {
    $set_file_size = $set_file_size/1000;
    return $fileToUpload['error'] = 'Sorry, your file is too large. plz upload Under '.$set_file_size.' KB';
  }


// Rename of upload file ****************** //

  $file_extction = explode(".", $fileToUpload['name']);
  $new_file_name = $i.'_'.$add_name.'_'.round(microtime(true)) . '.' . end($file_extction); 
  $new_file_name = str_replace(" ", "", basename($new_file_name)); 
// ************************************* //      


  if(move_uploaded_file($fileToUpload['tmp_name'],$upload_dir.'/'.$new_file_name))
  {      

    $Error['success_msg'] = 'done';
  }

  if($Error['success_msg'] == 'done')
  {
    return $new_file_name;      
  }

}
/////////////////////////////////////////////////////////







// Function to get the client IP address
  public function get_client_ip()
  {
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP']))
          $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_X_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
          $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_FORWARDED']))
          $ipaddress = $_SERVER['HTTP_FORWARDED'];
      else if(isset($_SERVER['REMOTE_ADDR']))
          $ipaddress = $_SERVER['REMOTE_ADDR'];
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }
////////////////////////////////////////////////////////




//get MAC Address fn.///////////////////////
  function GetMAC()
  {
      ob_start();
      system('getmac');
      $Content = ob_get_contents();
      ob_clean();
      return substr($Content, strpos($Content,'\\')-20, 17);
  }
////////////////////////////////////////////////////////




//  cal. time interval fn.
    public function differenceInHours($enddate)
        {
        date_default_timezone_set('Asia/Kolkata');
        $C_date = date('Y-m-d H:i');
        $datetime1 = new DateTime($C_date);//start time
        $datetime2 = new DateTime($enddate);//end time
        $interval = $datetime1->diff($datetime2);

        return $interval->format('%dDay %HH %im');

        }
////////////////////////////////////////////////////////



//  cal. if give end date -> find expire_date
    public function cal_exp_date($input_format)
        {
            date_default_timezone_set('Asia/Kolkata');
                $C_date = date('Y-m-d H:i');              
                $date = new DateTime($C_date);
                $date->add(new DateInterval($input_format));
                $expire_date = $date->format("Y-m-d H:i");

        return $expire_date;

        }
////////////////////////////////////////////////////////




// call for db connect
public function __construct()
    {
        parent::__construct();
    }

}
// *********************End Start Class UserTools**************************//
?>
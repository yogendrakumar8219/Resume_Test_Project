<?php 
// connection 
    define('DB_HOSTNAME', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'epiz_26927936_resume');
    define('DB_PORT', 3308);


    $mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);

    echo 'INFO: Connected to MySQL at ' . DB_HOSTNAME . ':' . DB_PORT . '/' . DB_DATABASE
      . ' (' . DB_USERNAME . ')<br />';

$arr1 = array(
    '2_cover_letter_table' => array(1,'input_Signature_file'),
    '5_personal_info_table' => array(1,'input_Photo_upload_path'),
    '9_achievements_table' => array(4,'input_achievements_photo1','input_achievements_photo2','input_achievements_photo3','input_achievements_photo4'),
    '10_work_experience_table' => array(4,'input_Upload_doc1','input_Upload_doc2','input_Upload_doc3','input_Upload_doc4'),
    '11_project_undertaken_table' => array(10,'input_Project_image1','input_Project_image2','input_Project_image3','input_Project_image4','input_Project_image5','input_Project_image6','input_Project_image7','input_Project_image8','input_Project_image9','input_Project_image10'),
    '12_education_info_table' => array(5,'input_Certificate_path1','input_Certificate_path2','input_Certificate_path3','input_Certificate_path4','input_Certificate_path5'),
    '13_technical_qualifications_table' => array(5,'input_Certificate_path1','input_Certificate_path2','input_Certificate_path3','input_Certificate_path4','input_Certificate_path5'),
    '14_gov_info_table' => array(6,'input_upload_doc1','input_upload_doc2','input_upload_doc3','input_upload_doc4','input_upload_doc5','input_upload_doc6'),
    '16_references_table' => array(4,'input_upload_doc1','input_upload_doc2','input_upload_doc3','input_upload_doc4')

);
//var_dump($arr1);
if(isset($_POST['btnsubmit']))
{

    $user_id =6;
    $cv_id = 609038;

    
        foreach($arr1 as $table_name => $value)
        {
            $query = "Select * from ".$table_name." where user_id = ".$user_id." and cv_id=".$cv_id."";
            //echo $query;
            echo "<strong>table name ".$table_name."</strong><br>";
            $resultSet = $mysqli->query($query) or die("Error: DROP TABLE failed: ({$mysqli->errno}) {$mysqli->error}");
            //printf("Affected rows (SELECT): %d\n", $mysqli->affected_rows);
            $size = $mysqli->affected_rows;
            while($row = $resultSet->fetch_assoc()){
                //print_r($row);
                //echo $row[$value[0]];
                //var_dump($table_name);
                for($i=1; $i<=$value[0]; $i++)
                {
                    if(!empty($row[$value[$i]]))
                    {
                    unlink("./user_cv_doc/".$row[$value[$i]]);
                    echo '<b>delete old photo file from server</b><br>';
                    }
                 
                }
            }
            echo "<br>";
        }
}


?>
<form action="" method="post">
	<input type="submit" name="btnsubmit" id="submit">
</form>

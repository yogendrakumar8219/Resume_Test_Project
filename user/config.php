<?php

//user id
$user_id = $_SESSION['SESS_USER_ID'];

$user_id_array = array('user_id' => $user_id);
echo "<b>online user id</b><br>";
print_r($user_id_array);
echo '<hr>';


// table info array
$table_name = array(
	'0_cv_generate_info' => '0_cv_generate_info',
	'1_cover_letter_template' => '1_cover_letter_template',
	'2_cover_letter_table' => '2_cover_letter_table',
	'3_cv_template' => '3_cv_template',
	'4_initial_question_table' => '4_initial_question_table',
	'5_personal_info_table' => '5_personal_info_table',
	'6_social_info_table' => '6_social_info_table',
	'7_career_objective_table' => '7_career_objective_table',
	'8_profile_summary_table' => '8_profile_summary_table',
	'9_achievements_table' => '9_achievements_table',
	'14_gov_info_table' => '14_gov_info_table',
	'15_strengths_table' => '15_strengths_table',
	'16_references_table' => '16_references_table',
	'17_acknowledgement' => '17_acknowledgement'
	 );

$table_insert_table = array(
	'10_work_experience_table' => '10_work_experience_table',
	'11_project_undertaken_table' => '11_project_undertaken_table',
	'12_education_info_table' => '12_education_info_table',
	'13_technical_qualifications_table' => '13_technical_qualifications_table'
	 );

// echo "<br><b>table list array</b><br>";
// //print_r($table_name);
// echo "<hr>";

// '12_education_info_table'=> '12_education_info_table'

?>
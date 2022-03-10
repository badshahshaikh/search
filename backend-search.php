<?php

error_reporting(E_ERROR | E_PARSE);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = new mysqli("localhost", "root", "", "justjafh_application");

$sql = "SELECT * FROM candidate_info Where 'cd_id' != ''  ";

if( isset($_REQUEST["gender"]) )
{
	if( $_REQUEST["gender"] == 1 ){
		$sql .= 'AND cd_gender = "Male" ';
	}elseif( $_REQUEST["gender"] == 2 ){
		$sql .= 'AND cd_gender = "Female" ';
	}elseif( $_REQUEST["gender"] == 0 ){
		$sql .= 'AND ( cd_gender = "Male" OR cd_gender = "Female" ) ';
	}
}


if(!empty($_POST['qual_std'])) {

	$qual_std_arr=array();
	foreach($_POST['qual_std'] as $value){
		array_push($qual_std_arr,$value) ;
	}
	$brandii=implode("','",$qual_std_arr); 
	$sql .= "AND cd_qualification_std IN ('".$brandii."')";

}

if(!empty($_POST['qual_strm'])) {

	$qual_str_arr=array();
	foreach($_POST['qual_strm'] as $value){
		array_push($qual_str_arr,$value) ;
	}
	$brandii=implode("','",$qual_str_arr); 
	$sql .= "AND cd_qualification_stream IN ('".$brandii."')";

}

if(!empty($_POST['exp_c'])) {

	$exp=array();
	foreach($_POST['exp_c'] as $value){
		array_push($exp,$value) ;
	}
	$brandii=implode("','",$exp); 
	$sql .= "AND cd_fresher_intern_exp IN ('".$brandii."')";

}

if(!empty($_POST['lang_'])) {

	$lang_=array();
	foreach($_POST['lang_'] as $value){
		array_push($lang_,$value) ;
	}
	$brandii=implode("%",$lang_); 
	$sql .= "AND cd_languages LIKE '%".$brandii."%'";
}


if(!empty($_POST['exp_des'])) {

	$exp_des=array();
	foreach($_POST['exp_des'] as $value){
		array_push($exp_des,$value) ;
	}

	$brandii=implode("','",$exp_des); 
	$sql .= "AND cd_exp_designation LIKE ('".$brandii."')";

}


if(!empty($_POST['location'])) {

	$loc_arr=array();
	foreach($_POST['location'] as $value){
		array_push($loc_arr,$value) ;
	}
	$brandii=implode("','",$loc_arr); 
	$sql .= "AND cd_current_location IN ('".$brandii."')";

}

if(!empty($_POST['comm'])) {

	$comm_arr=array();
	foreach($_POST['comm'] as $value){
		array_push($comm_arr,$value) ;
	}
	$comm=implode("','",$comm_arr); 
	$sql .= "AND cd_communication IN ('".$comm."')";

}

if(!empty($_POST['jpo'])) {

	$jpo_arr=array();
	foreach($_POST['jpo'] as $value){
		array_push($jpo_arr,$value) ;
	}
	$jpo=implode("','",$jpo_arr); 
	$sql .= "AND cd_job_profile_one IN ('".$jpo."')";

}


if(!empty($_POST['jdo'])) {

	$jdo_arr=array();
	foreach($_POST['jdo'] as $value){
		array_push($jdo_arr,$value) ;
	}
	$jdo=implode("','",$jdo_arr); 
	$sql .= "AND cd_job_designation_one IN ('".$jdo."')";

}

if(!empty($_POST['jpt'])) {

	$jpt_arr=array();
	foreach($_POST['jpt'] as $value){
		array_push($jdo_arr,$value) ;
	}
	$jpt=implode("','",$jpt_arr); 
	$sql .= "AND cd_job_profile_two IN ('".$jpt."')";

}

if(!empty($_POST['jdt'])) {

	$jdt_arr=array();
	foreach($_POST['jdt'] as $value){
		array_push($jdt_arr,$value) ;
	}
	$jdt=implode("','",$jdt_arr); 
	$sql .= "AND cd_job_designation_two IN ('".$jdt."')";

}

if(!empty($_POST['epi'])) {

	$epi_arr=array();
	foreach($_POST['epi'] as $value){
		array_push($epi_arr,$value) ;
	}
	$epi=implode("','",$epi_arr); 
	$sql .= "AND cd_exp_job_industry IN ('".$epi."')";

}

if(!empty($_POST['cd'])) {

	$cd_arr=array();
	foreach($_POST['cd'] as $value){
		array_push($cd_arr,$value) ;
	}
	$cd=implode("%",$cd_arr); 
	$sql .= "AND cd_documents LIKE '%".$cd."%'";

}
// echo $sql;
// exit();
	$result = $link->query($sql);

	echo '<br> total = '.mysqli_num_rows ( $result ).'<br>';

	echo "<table id='customers'>
	<tr>
	  <th>id</th>	
	  <th>Name</th>
	  <th>Gender</th>
	  <th>Qualification Std</th>
	  <th>Qualification Stream</th>
	  <th>Experience</th>
	  <th>Language</th>
	  <th>Designation</th>
	  <th>Location</th>
	  <th>Communication</th>
	  <th>Job Profiel One</th>
	  <th>Job Designation One One</th>
	  <th>Industry</th>
	  <th>Document</th>
	</tr>
	<tbody>";

	/* fetch object array */
	while ($row = $result->fetch_assoc()) {

		echo "<tr>
		<td> ". $row['cd_id'] . "</td>
		<td> ". $row['cd_full_name'] . "</td>
		<td> ". $row['cd_gender'] . "</td>
		<td> ". $row['cd_qualification_std'] . "</td>
		<td> ". $row['cd_qualification_stream'] . "</td>
		<td> ". $row['cd_fresher_intern_exp'] . "</td>
		<td> ". $row['cd_languages'] . "</td>
		<td> ". $row['cd_exp_designation'] . "</td>
		<td> ". $row['cd_current_location'] . "</td>
		<td> ". $row['cd_communication'] . "</td>
		<td> ". $row['cd_job_profile_one'] . "</td>
		<td> ". $row['cd_job_designation_one'] . "</td>
		<td> ". $row['cd_exp_job_industry'] . "</td>
		<td> ". $row['cd_documents'] . "</td>
		
		
		
	  </tr>";
	}

	echo "</tbody>
	</table>";

 
 
 
// close connection
mysqli_close($link);
?>

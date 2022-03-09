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


if( $_REQUEST["below_ssc"] == 'on' || $_REQUEST["ssc_pass"] == 'on' || $_REQUEST["hsc_pass"] == 'on' || $_REQUEST["under_graduate"] == 'on' || $_REQUEST["graduate"] == 'on' || $_REQUEST["post_graduate"] == 'on' || $_REQUEST["phd"] == 'on' )
{

	$qualification_arr = array();

	( $_REQUEST["below_ssc"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'Below SSC'") : '';
	( $_REQUEST["ssc_pass"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'SSC Passed'") : '';
	( $_REQUEST["hsc_pass"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'HSC Passed'") : '';
	( $_REQUEST["under_graduate"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'Under Graduate'") : '';
	( $_REQUEST["graduate"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'Graduate'") : '';
	( $_REQUEST["post_graduate"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'Post Graduate'") : '';
	( $_REQUEST["phd"] == 'on' ) ? array_push($qualification_arr,"cd_qualification_std = 'PHD'") : '';
	$sel_qual = implode(" OR ",$qualification_arr);

	$sql .= ' AND ( '.$sel_qual.' ) ';

}

if(!empty($_POST['qual_strm'])) {

	$qual_str_arr=array();
	foreach($_POST['qual_strm'] as $value){
		array_push($qual_str_arr,$value) ;
	}
	$brandii=implode("','",$qual_str_arr); 
	$sql .= "AND cd_qualification_stream IN ('".$brandii."')";

}

if( $_REQUEST["fresher"] == 'on' || $_REQUEST["below1year"] == 'on' || $_REQUEST["onetotwoyears"] == 'on' || $_REQUEST["threestofiveyears"] == 'on' || $_REQUEST["sixtonineyears"] == 'on' || $_REQUEST["tenplusyears"] == 'on' )
{
	$exp_arr = array();
	( $_REQUEST["fresher"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = 'Fresher'") : '';
	( $_REQUEST["below1year"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = 'below-1 year'") : '';
	( $_REQUEST["1to2year"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = '1-2 years'") : '';
	( $_REQUEST["3to5year"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = '3-5 years'") : '';
	( $_REQUEST["6to9year"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = '6-9 years'") : '';
	( $_REQUEST["10plusyear"] == 'on' ) ? array_push($exp_arr,"cd_fresher_intern_exp = '10+ years'") : '';
	$sel_exp = implode(" OR ",$exp_arr);
	$sql .= ' AND ( '.$sel_exp.' ) ';		
}

if( $_REQUEST["lng_hindi"] == 'on' || $_REQUEST["lng_marathi"] == 'on' || $_REQUEST["lng_eng"] == 'on' || $_REQUEST["lng_tamil"] == 'on' || $_REQUEST["lng_urdu"] == 'on' || $_REQUEST["lng_guj"] == 'on' )
{
	$language_sql = 'AND cd_languages LIKE "%'; 
	$language_arr = array();
	
	( $_REQUEST["lng_hindi"] == 'on' ) ? array_push($language_arr,"Hindi") : '';
	( $_REQUEST["lng_marathi"] == 'on' ) ? array_push($language_arr,"Marathi")  : '';
	( $_REQUEST["lng_eng"] == 'on' ) ? array_push($language_arr,"English") : '';
	( $_REQUEST["lng_tamil"] == 'on' ) ? array_push($language_arr,"Tamil") : '';
	( $_REQUEST["lng_urdu"] == 'on' ) ? array_push($language_arr,"Urdu") : '';
	( $_REQUEST["lng_guj"] == 'on' ) ? array_push($language_arr,"Gujrati") : '';
	$sel_lang = implode("%",$language_arr);

	$sql .= $language_sql.$sel_lang.'%"';
}


if( $_REQUEST["Intern"] == 'on' || $_REQUEST["Executive"] == 'on' || $_REQUEST["Sr_Executive"] == 'on' || $_REQUEST["Team_leader"] == 'on' || $_REQUEST["Trainer"] == 'on' || $_REQUEST["Assistant_Manager"] == 'on' || $_REQUEST["Manager"] == 'on' || $_REQUEST["Sr_Manager"] == 'on' || $_REQUEST["Head"] == 'on' || $_REQUEST["AVP"] == 'on' || $_REQUEST["VP"] == 'on'  )
{

	$des_arr = array();

	( $_REQUEST["Intern"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Internship'") : '';
	( $_REQUEST["Executive"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Executive'") : '';
	( $_REQUEST["Sr_Executive"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Sr Executive'") : '';
	( $_REQUEST["Team_leader"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Team leader'") : '';
	( $_REQUEST["Trainer"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Trainer'") : '';
	( $_REQUEST["Assistant_Manager"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Assistant Manager'") : '';
	( $_REQUEST["Manager"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Manager'") : '';
	( $_REQUEST["Sr_Manager"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Sr Manager'") : '';
	( $_REQUEST["Head"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'Head'") : '';
	( $_REQUEST["AVP"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'AVP'") : '';
	( $_REQUEST["VP"] == 'on' ) ? array_push($des_arr,"cd_exp_designation = 'VP'") : '';
	$sel_des = implode(" OR ",$des_arr);
	$sql .= ' AND ( '.$sel_des.' ) ';	

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
echo $sql;
exit();
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
		
		
		
	  </tr>";
	}

	echo "</tbody>
	</table>";

 
 
 
// close connection
mysqli_close($link);
?>

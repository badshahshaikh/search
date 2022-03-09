<?php                            
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $link = new mysqli("localhost", "root", "", "justjafh_application");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fontawesome 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <title>CSS Vertical Accordion Menu Example</title>
  <style>
  body{
    font-family: 'Roboto', sans-serif;
    background: #eee;
    line-height: 1.5;
   }

   table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

  </style>


</head>
<body>
<main style="display: flex;">


    <div class="middle">

        <form id="test_sub">

            <div class="menu" >
                

                    <ul>
                        <li class="item" id="Gender">
                            <a href="#Gender" class="btn"><i class="fa fa-venus-mars"></i> Gender </a>
                            <div class="smenu">
                                <a><input type="radio" id="Male" name="gender" value="1" ><label for="Male">Male</label><br></a>
                                <a><input type="radio" id="Female" name="gender" value="2"  ><label for="Female">Female</label><br></a>
                                <a><input type="radio" id="Both" name="gender" value="0"  ><label for="Both">Both</label><br></a>
                                
                            </div>
                        </li>

                        <li class="item" id="Qualification">
                            <a href="#Qualification" class="btn"><i class="fa fa-book"></i> Qualification Standard </a>
                            <div class="smenu">
                                <a><input type="checkbox" id="below_ssc" name="below_ssc" ><label for="below_ssc">Below SSC</label><br></a>
                                <a><input type="checkbox" id="ssc_pass" name="ssc_pass" ><label for="ssc_pass">SSC Pass</label><br></a>
                                <a><input type="checkbox" id="hsc_pass" name="hsc_pass" ><label for="hsc_pass">HSC Pass</label><br></a>
                                <a><input type="checkbox" id="under_graduate" name="under_graduate" ><label for="under_graduate">Under Graduate</label><br></a>
                                <a><input type="checkbox" id="graduate" name="graduate" ><label for="graduate">Graduate</label><br></a>
                                <a><input type="checkbox" id="post_graduate" name="post_graduate" ><label for="post_graduate">Post Graduate</label><br></a>
                                <a><input type="checkbox" id="phd" name="phd" ><label for="phd">PHD</label><br></a>
                                
                            </div>
                        </li>

                        

                        <?php

                            
                            $sql = 'SELECT DISTINCT cd_qualification_stream FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="qual_strm">
                            <a href="#qual_strm" class="btn"><i class="fa fa-briefcase"></i> Qualification Stream </a>
                            <div class="smenu">

                            <?php
                                $qual_strm = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="qual_strm_'.$qual_strm.'" name="qual_strm[]" value="'.$row['cd_qualification_stream'].'" ><label for="qual_strm_'.$qual_strm.'">'.$row['cd_qualification_stream'].'</label><br></a>';
                                    
                                    
                                    $qual_strm++;

                                }


                            ?>

                        </div>
                        </li>

                        <li class="item" id="Experience">
                            <a href="#Experience" class="btn"><i class="fa fa-briefcase"></i> Experience </a>
                            <div class="smenu">
                                <a><input type="checkbox" id="fresher" name="fresher" ><label for="fresher">Fresher</label><br></a>
                                <a><input type="checkbox" id="below1year" name="below1year" ><label for="below1year">Below 1 year</label><br></a>
                                <a><input type="checkbox" id="1to2year" name="1to2year" ><label for="1to2year">1 - 2 years</label><br></a>
                                <a><input type="checkbox" id="3to5year" name="3to5year" ><label for="3to5year">3 - 5 years</label><br></a>
                                <a><input type="checkbox" id="6to9year" name="6to9year" ><label for="6to9year">6 - 9 years</label><br></a>
                                <a><input type="checkbox" id="10plusyear" name="10plusyear" ><label for="10plusyear">10+ years</label><br></a>

                            </div>
                        </li>

                        <li class="item" id="Language">
                            <a href="#Language" class="btn"><i class="fa fa-language"></i> Language </a>
                            <div class="smenu">
                                <a><input type="checkbox" id="lng_hindi" name="lng_hindi" ><label for="lng_hindi">Hindi</label><br></a>
                                <a><input type="checkbox" id="lng_eng" name="lng_eng" ><label for="lng_eng">English</label><br></a>
                                <a><input type="checkbox" id="lng_marathi" name="lng_marathi" ><label for="lng_marathi">Marathi</label><br></a>
                                <a><input type="checkbox" id="lng_tamil" name="lng_tamil" ><label for="lng_tamil">Tamil</label><br></a>
                                <a><input type="checkbox" id="lng_urdu" name="lng_urdu" ><label for="lng_urdu">Urdu</label><br></a>
                                <a><input type="checkbox" id="lng_guj" name="lng_guj" ><label for="lng_guj">Gujrati</label><br></a>
                            </div>
                        </li>

                        <li class="item" id="Designation">
                            <a href="#Designation" class="btn"><i class="fa fa-briefcase"></i> Designation </a>
                            <div class="smenu">
                                <a><input type="checkbox" id="Intern" name="Intern" ><label for="Intern">Intern</label><br></a>
                                <a><input type="checkbox" id="Executive" name="Executive" ><label for="Executive">Executive</label><br></a>
                                <a><input type="checkbox" id="Sr_Executive" name="Sr_Executive" ><label for="Sr_Executive">Sr Executive</label><br></a>
                                <a><input type="checkbox" id="Team_leader" name="Team_leader" ><label for="Team_leader">Team leader</label><br></a>
                                <a><input type="checkbox" id="Trainer" name="Trainer" ><label for="Trainer">Trainer</label><br></a>
                                <a><input type="checkbox" id="Assistant_Manager" name="Assistant_Manager" ><label for="Assistant_Manager">Assistant Manager</label><br></a>
                                <a><input type="checkbox" id="Manager" name="Manager" ><label for="Manager">Manager</label><br></a>
                                <a><input type="checkbox" id="Sr_Manager" name="Sr_Manager" ><label for="Sr_Manager">Sr Manager</label><br></a>
                                <a><input type="checkbox" id="Head" name="Head" ><label for="Head">Head</label><br></a>
                                <a><input type="checkbox" id="AVP" name="AVP" ><label for="AVP">AVP</label><br></a>
                                <a><input type="checkbox" id="VP" name="VP" ><label for="VP">VP</label><br></a>
                            
                            </div>
                        </li>
                        <?php

                            
                            $sql = 'SELECT DISTINCT cd_current_location FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="Location">
                            <a href="#Location" class="btn"><i class="fa fa-briefcase"></i> Location </a>
                            <div class="smenu">

                            <?php
                                $loc = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="location_'.$loc.'" name="location[]" value="'.$row['cd_current_location'].'" ><label for="location_'.$loc.'">'.$row['cd_current_location'].'</label><br></a>';
                                    
                                    
                                    $loc++;

                                }


                            ?>

                        </div>
                        </li>
                        <?php
                        $sql1 = 'SELECT DISTINCT cd_communication FROM candidate_info';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="communication">
                            <a href="#communication" class="btn"><i class="fa fa-briefcase"></i> Communication </a>
                            <div class="smenu">

                            <?php
                                $com_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="comm_'.$com_n.'" name="comm[]" value="'.$row['cd_communication'].'" ><label for="comm_'.$com_n.'">'.$row['cd_communication'].'</label><br></a>';
                                    
                                    $com_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql2 = 'SELECT DISTINCT cd_job_profile_one FROM candidate_info';
                        $result2 = $link->query($sql2);
                        ?>
                        <li class="item" id="job_profile_one">
                            <a href="#job_profile_one" class="btn"><i class="fa fa-briefcase"></i> Job Role One </a>
                            <div class="smenu">

                            <?php
                                $jpo_n = 1;
                                while ($row = $result2->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jpo_'.$jpo_n.'" name="jpo[]" value="'.$row['cd_job_profile_one'].'" ><label for="jpo_'.$jpo_n.'">'.$row['cd_job_profile_one'].'</label><br></a>';
                                    
                                    $jpo_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql1 = 'SELECT DISTINCT cd_job_designation_one FROM candidate_info';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="jdo">
                            <a href="#jdo" class="btn"><i class="fa fa-briefcase"></i> Job Designation One </a>
                            <div class="smenu">

                            <?php
                                $jdo_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jdo_'.$jdo_n.'" name="jdo[]" value="'.$row['cd_job_designation_one'].'" ><label for="jdo_'.$jdo_n.'">'.$row['cd_job_designation_one'].'</label><br></a>';
                                    
                                    $jdo_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql1 = 'SELECT DISTINCT cd_job_profile_two FROM candidate_info WHERE cd_job_profile_two <> ""';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="jpt">
                            <a href="#jpt" class="btn"><i class="fa fa-briefcase"></i> Job Profile Two </a>
                            <div class="smenu">

                            <?php
                                $jpt_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jpt_'.$com_n.'" name="jpt[]" value="'.$row['cd_job_profile_two'].'" ><label for="jpt_'.$com_n.'">'.$row['cd_job_profile_two'].'</label><br></a>';
                                    
                                    $jpt_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql1 = 'SELECT DISTINCT cd_job_designation_two FROM candidate_info WHERE cd_job_designation_two <> "" ';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="jdt">
                            <a href="#jdt" class="btn"><i class="fa fa-briefcase"></i> Job Designation Two </a>
                            <div class="smenu">
                            <a><input type="text"><br></a>
                            <?php
                                $jdt_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jdt_'.$com_n.'" name="jdt[]" value="'.$row['cd_job_designation_two'].'" ><label for="jdt_'.$com_n.'">'.$row['cd_job_designation_two'].'</label><br></a>';
                                    
                                    $jdt_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql1 = 'SELECT DISTINCT cd_exp_job_industry FROM candidate_info WHERE cd_job_designation_two <> "" ';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="epi">
                            <a href="#epi" class="btn"><i class="fa fa-briefcase"></i> Industry </a>
                            <div class="smenu Imenu">
                            <a><input type="text"><br></a>
                            <?php
                                $epi_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="epi_'.$epi_n.'" name="epi[]" value="'.$row['cd_exp_job_industry'].'" ><label for="epi_'.$epi_n.'">'.$row['cd_exp_job_industry'].'</label><br></a>';
                                    
                                    $epi_n++;
                                }
                            ?>
                        </div>
                        </li>

                        <?php
                        $sql1 = 'SELECT * FROM `cd_document` ';
                        $result1 = $link->query($sql1);
                        ?>
                        <li class="item" id="cd">
                            <a href="#cd" class="btn"><i class="fa fa-briefcase"></i> Document </a>
                            <div class="smenu dmenu">
                            <a><input type="text"><br></a>
                            <?php
                                $cd_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="cd_'.$cd_n.'" name="cd[]" value="'.$row['name'].'" ><label for="cd_'.$cd_n.'">'.$row['name'].'</label><br></a>';
                                    
                                    $cd_n++;
                                }
                            ?>
                        </div>
                        </li>

                        

                    </ul>

                   
                
            </div>
            <button type="submit" value="submit">submit</button>
        </form>

    </div>

    <div class="data_from_db">

    </div>

	</main>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>

        $("#test_sub").submit(function(ev) {
            ev.preventDefault();
            var form = $("#test_sub");
            var url = 'backend-search.php';
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data) {
                    console.log(data);
                    $('.data_from_db').html(data);
                },
                error: function(data) {

                    alert("some Error");
                }
            });
        });
        
        $("input").keyup(function() {

            var search_text = $(this).val().toLowerCase();

            if ( $(".dmenu a input").val()  != '' ) {
                $(".dmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });
            }

            if ( $(".Imenu a input").val()  != '' ) {
                $(".Imenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            
        });
        
        
    </script>
    


</body>
</html>
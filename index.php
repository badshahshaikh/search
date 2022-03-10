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

.menu input[type=text]{
    height: 20px;
    width: 85%;
}

.see_checked{
    width: 15px;
    height: 15px;
    margin-left: 5px;
}
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
                            <div class="smenu gen_menu">
                            <a><input type="text">  <br></a>
                                <a><input type="radio" id="Male" name="gender" value="1" ><label for="Male">Male</label><br></a>
                                <a><input type="radio" id="Female" name="gender" value="2"  ><label for="Female">Female</label><br></a>
                                <a><input type="radio" id="Both" name="gender" value="0"  ><label for="Both">Both</label><br></a>
                                
                            </div>
                        </li>



                        <?php

                            
                        $sql = 'SELECT DISTINCT cd_qualification_std FROM candidate_info';
                        $result = $link->query($sql);
                        ?>
                        <li class="item" id="Qualification">
                        <a href="#Qualification" class="btn"><i class="fa fa-briefcase"></i> Qualification Standard </a>
                        <div class="smenu qual_menu">
                        <a><input type="text"> <input class="see_checked" type="checkbox" >  <br></a>
                        <?php
                            $qual_std = 1;
                            while ($row = $result->fetch_assoc()) {

                                echo '<a><input type="checkbox" id="qual_strm_'.$qual_std.'" name="qual_std[]" value="'.$row['cd_qualification_std'].'" ><label for="qual_strm_'.$qual_std.'">'.$row['cd_qualification_std'].'</label><br></a>';
                                
                                
                                $qual_std++;

                            }


                        ?>

                        </div>
                        </li>

                        <?php
                            $sql = 'SELECT DISTINCT cd_qualification_stream FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="qual_strm">
                            <a href="#qual_strm" class="btn"><i class="fa fa-briefcase"></i> Qualification Stream </a>
                            <div class="smenu qualstr_menu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" >  <br></a>
                            <?php
                                $qual_strm = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="qual_strm_'.$qual_strm.'" name="qual_strm[]" value="'.$row['cd_qualification_stream'].'" ><label for="qual_strm_'.$qual_strm.'">'.$row['cd_qualification_stream'].'</label><br></a>';
                                    
                                    
                                    $qual_strm++;

                                }


                            ?>

                        </div>
                        </li>


                        <?php
                            $sql = 'SELECT DISTINCT cd_fresher_intern_exp FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="Experience">
                            <a href="#Experience" class="btn"><i class="fa fa-briefcase"></i> Experience </a>
                            <div class="smenu exp_menu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" >  <br></a>
                            <?php
                                $Experience = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="exp_'.$Experience.'" name="exp_c[]" value="'.$row['cd_fresher_intern_exp'].'" ><label for="exp_'.$Experience.'">'.$row['cd_fresher_intern_exp'].'</label><br></a>';
                                    
                                    
                                    $Experience++;

                                }


                            ?>

                        </div>
                        </li>


                        <?php
                            $sql = 'SELECT * FROM cd_language';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="Language">
                            <a href="#Language" class="btn"><i class="fa fa-briefcase"></i> Language </a>
                            <div class="smenu lang_menu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" >  <br></a>
                            <?php
                                $Language = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="lang_'.$Language.'" name="lang_[]" value="'.$row['name'].'" ><label for="lang_'.$Language.'">'.$row['name'].'</label><br></a>';
                                    
                                    $Language++;

                                }

                            ?>

                        </div>
                        </li>
                        

                        <?php
                            $sql = 'SELECT DISTINCT cd_exp_designation FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="Designation">
                            <a href="#Designation" class="btn"><i class="fa fa-briefcase"></i> Designation </a>
                            <div class="smenu des_menu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" >  <br></a>
                            <?php
                                $exp_des = 1;
                                while ($row = $result->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="exp_des'.$exp_des.'" name="exp_des[]" value="'.$row['cd_exp_designation'].'" ><label for="exp_des'.$exp_des.'">'.$row['cd_exp_designation'].'</label><br></a>';
                                    
                                    $exp_des++;

                                }

                            ?>

                        </div>
                        </li>

                        <?php

                            
                            $sql = 'SELECT DISTINCT cd_current_location FROM candidate_info';
                            $result = $link->query($sql);
                        ?>
                        <li class="item" id="Location">
                            <a href="#Location" class="btn"><i class="fa fa-briefcase"></i> Location </a>
                            <div class="smenu locmenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
                            <div class="smenu cmenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
                            <div class="smenu jpomenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
                            <div class="smenu jdmenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
                            <div class="smenu jpmenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
                            <?php
                                $jpt_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jpt_'.$jpt_n.'" name="jpt[]" value="'.$row['cd_job_profile_two'].'" ><label for="jpt_'.$jpt_n.'">'.$row['cd_job_profile_two'].'</label><br></a>';
                                    
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
                            <div class="smenu jmenu">
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
                            <?php
                                $jdt_n = 1;
                                while ($row = $result1->fetch_assoc()) {

                                    echo '<a><input type="checkbox" id="jdt_'.$jdt_n.'" name="jdt[]" value="'.$row['cd_job_designation_two'].'" ><label for="jdt_'.$jdt_n.'">'.$row['cd_job_designation_two'].'</label><br></a>';
                                    
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
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
                            <a><input type="text"> <input class="see_checked" type="checkbox" > <br></a>
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
        


        // search input

        $("input").on('input',function() {

            if( $(".dmenu a input").val() == '' )$('.dmenu a').show();
            if( $(".Imenu a input").val() == '' )$('.Imenu a').show();
            if( $(".jmenu a input").val() == '' )$('.jmenu a').show();
            if( $(".jpmenu a input").val() == '' )$('.jpmenu a').show();
            if( $(".jdmenu a input").val() == '' )$('.jdmenu a').show();
            if( $(".jpomenu a input").val() == '' )$('.jpomenu a').show();
            if( $(".cmenu a input").val() == '' )$('.cmenu a').show();
            if( $(".locmenu a input").val() == '' )$('.locmenu a').show();
            if( $(".des_menu a input").val() == '' )$('.des_menu a').show();
            if( $(".lang_menu a input").val() == '' )$('.lang_menu a').show();
            if( $(".exp_menu a input").val() == '' )$('.exp_menu a').show();
            if( $(".qualstr_menu a input").val() == '' )$('.qualstr_menu a').show();
            if( $(".qual_menu a input").val() == '' )$('.qual_menu a').show();
            if( $(".gen_menu a input").val() == '' )$('.gen_menu a').show();


            if ( $(".dmenu a input").val()  != '' ) {
                var search_text = $(".dmenu a input").val().toLowerCase();
                $(".dmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });
            }

            if ( $(".Imenu a input").val()  != '' ) {
                var search_text = $(".Imenu a input").val().toLowerCase();
                $(".Imenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }
            
            if ( $(".jmenu a input").val()  != '' ) {
                var search_text = $(".jmenu a input").val().toLowerCase();
                $(".jmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".jpmenu a input").val()  != '' ) {
                var search_text = $(".jpmenu a input").val().toLowerCase();
                $(".jpmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".jdmenu a input").val()  != '' ) {
                var search_text = $(".jdmenu a input").val().toLowerCase();
                $(".jdmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".jpomenu a input").val()  != '' ) {
                var search_text = $(".jpomenu a input").val().toLowerCase();
                $(".jpomenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".cmenu a input").val()  != '' ) {
                var search_text = $(".cmenu a input").val().toLowerCase();
                $(".cmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".locmenu a input").val()  != '' ) {
                var search_text = $(".locmenu a input").val().toLowerCase();
                $(".locmenu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".des_menu a input").val()  != '' ) {
                var search_text = $(".des_menu a input").val().toLowerCase();
                $(".des_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            
            if ( $(".lang_menu a input").val()  != '' ) {
                var search_text = $(".lang_menu a input").val().toLowerCase();
                $(".lang_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            if ( $(".exp_menu a input").val()  != '' ) {
                var search_text = $(".exp_menu a input").val().toLowerCase();
                $(".exp_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }
            if ( $(".qualstr_menu a input").val()  != '' ) {
                var search_text = $(".qualstr_menu a input").val().toLowerCase();
                $(".qualstr_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }
            if ( $(".qual_menu a input").val()  != '' ) {
                var search_text = $(".qual_menu a input").val().toLowerCase();
                $(".qual_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }
            if ( $(".gen_menu a input").val()  != '' ) {
                var search_text = $(".gen_menu a input").val().toLowerCase();
                $(".gen_menu a label").filter(function() {
                    $(this).parent('a').toggle( $(this).text().toLowerCase().indexOf(search_text) !== -1 )
                });            
            }

            
        });
        



        // see_checked
        $(".see_checked").change(function() {
            console.log( this.checked )
            console.log( $(this).parents('li.item').attr('id')  )

            
            if ( this.checked &&  $(this).parents('li.item').attr('id') == 'Qualification' ){
                $(".qual_menu a input").not(':checked,:first').each(function() {
                    $(this).parent('a').toggle();
                });
            }

            if ( this.checked &&  $(this).parents('li.item').attr('id') == 'qual_strm' ){
                $(".qualstr_menu a input").not(':checked,:first').each(function() {
                    $(this).parent('a').toggle();
                });
            }

            
        })



    </script>
    


</body>
</html>

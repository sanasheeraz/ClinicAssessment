<?php
session_start();
include 'header.php';
include 'connection.php';
if((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id']) )
{
    $MSA_Id = $_GET['id'];
    $pid = $_GET['pid'];

    $query = "Select * from patient where P_Id ='$pid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $G1Query = "Select * from f_general_assessment_1 where MSA_Id='$MSA_Id'";
    $G1Result = mysqli_query($conn, $G1Query);
    $G1Row = mysqli_fetch_row($G1Result);

    $G2Query = "Select * from f_general_assessment_2 where MSA_Id='$MSA_Id'";
    $G2Result = mysqli_query($conn, $G2Query);
    $G2Row = mysqli_fetch_row($G2Result);

    $ThQuery = "Select * from f_thyroid_assessment where MSA_Id='$MSA_Id'";
    $ThResult = mysqli_query($conn, $ThQuery);
    $ThRow = mysqli_fetch_row($ThResult);

    $StrQuery = "Select * from f_stress_assessment where MSA_Id='$MSA_Id'";
    $StrResult = mysqli_query($conn, $StrQuery);
    $StrRow = mysqli_fetch_row($StrResult);

    $HQuery = "Select * from f_hormone_assessment where MSA_Id='$MSA_Id'";
    $HResult = mysqli_query($conn, $HQuery);
    $HRow = mysqli_fetch_row($HResult);

    $T1Query = "Select * from f_toxic_assessment_1 where MSA_Id='$MSA_Id'";
    $T1Result = mysqli_query($conn, $T1Query);
    $T1Row = mysqli_fetch_row($T1Result);

    $T2Query = "Select * from f_toxic_assessment_2 where MSA_Id='$MSA_Id'";
    $T2Result = mysqli_query($conn, $T2Query);
    $T2Row = mysqli_fetch_row($T2Result);

    $T3Query = "Select * from f_toxic_assessment_3 where MSA_Id='$MSA_Id'";
    $T3Result = mysqli_query($conn, $T3Query);
    $T3Row = mysqli_fetch_row($T3Result);

    $CQuery = "Select * from f_consumption_assessment where MSA_Id='$MSA_Id'";
    $CResult = mysqli_query($conn, $CQuery);
    $CRow = mysqli_fetch_row($CResult);
} ?>

<div class="content">
    <div class="container-fluid">
        <div style="text-align:center">
            <a class="btn btn-primary" href="<?php echo 'FinalResult.php?id=' . $MSA_Id . '&pid=' . $pid; ?>">Back to Result</a>    
        </div>
        <div style="text-align:center">
            <h3><b>Male Symptom Assessment</b></h3>
        </div>
        <form method="POST" action="<?php echo 'MaleSubmitAssessment.php?id=' . $id ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Name : </label>
                        <?php
                        if (!((isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id']))) {
                        ?>
                            <input type="text" class="form-control" />
                        <?php
                        } else {
                        ?>
                            <input type="text" class="form-control" value="<?= $row[1] ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>BirthDate : </label>
                        <?php
                        if (!((isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id']))) {
                        ?>
                            <input type="text" class="form-control" />
                        <?php
                        } else {
                        ?>
                            <input type="text" class="form-control" value="<?= $row[2] ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Gender : </label>
                        <?php
                        if (!((isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id']))) {
                        ?>
                            <input type="text" class="form-control" />
                        <?php
                        } else {
                        ?>
                            <input type="text" class="form-control" value="<?= $row[3] ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Email : </label>
                        <?php
                        if (!((isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id']))) {
                        ?>
                            <input type="text" class="form-control" />
                        <?php
                        } else {
                        ?>
                            <input type="text" class="form-control" value="<?= $row[4] ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Phone : </label>
                        <?php
                        if (!((isset($_SESSION['admin']) or isset($_SESSION['Patient'])) and isset($_GET['id']))) {
                        ?>
                            <input type="text" class="form-control" />
                        <?php
                        } else {
                        ?>
                            <input type="text" class="form-control" value="<?= $row[6] ?>" readonly />
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <h4><b>General Health Assessment (Part 1)</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate how frequently you experience the following symptoms according to these guidelines:</i>
                <br>
                <b>Never</b> = 0% of the time<br>
                <b>Rarely</b> = Less than 30% of the time<br>
                <b>Sometimes</b> = About 50% of the time<br>
                <b>Often </b>= More than 70% of the time
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Do you feel tired most of the time?</td>
                            <?php
                            if ($G1Row[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Lifestyle-altering fatigue </td>
                            <?php
                            if ($G1Row[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Intestinal gas </td>
                            <?php
                            if ($G1Row[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Abdominal bloating </td>
                            <?php
                            if ($G1Row[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sugar cravings </td>
                            <?php
                            if ($G1Row[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Bread or beer cravings </td>
                            <?php
                            if ($G1Row[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Constipation and/or diarrhea </td>
                            <?php
                            if ($G1Row[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Irritability and/or moodiness </td>
                            <?php
                            if ($G1Row[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Brain fog and/or poor memory </td>
                            <?php
                            if ($G1Row[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Feeling faint, dizzy, or lightheaded </td>
                            <?php
                            if ($G1Row[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Muscle or body aches </td>
                            <?php
                            if ($G1Row[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Itching or burning sensation in rectum or vagina </td>
                            <?php
                            if ($G1Row[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Loss of sexual desire </td>
                            <?php
                            if ($G1Row[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> White thrush or yellow fuzzy tongue </td>
                            <?php
                            if ($G1Row[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Athlete’s foot, ringworm, or jock itch </td>
                            <?php
                            if ($G1Row[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fingernail or toenail fungus </td>
                            <?php
                            if ($G1Row[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sensitivity to perfumes, insecticides, or other chemical smells </td>
                            <?php
                            if ($G1Row[17] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[17] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[17] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[17] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Weight gain and/or struggling to maintain a healthy weight </td>
                            <?php
                            if ($G1Row[18] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[18] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[18] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[18] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Think your weight is out of control </td>
                            <?php
                            if ($G1Row[19] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[19] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[19] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G1Row[19] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4><b>General Health Assessment (Part 2)</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate how frequently you’ve taken the following medications throughout your life.</i>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Antibiotics </td>
                            <?php
                            if ($G2Row[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Birth Control </td>
                            <?php
                            if ($G2Row[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Steroid drugs (possibly for allergies, asthma, or injuries) </td>
                            <?php
                            if ($G2Row[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Synthetic hormones (such as HRT or bioidentical) </td>
                            <?php
                            if ($G2Row[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($G2Row[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>


            <h4><b>Thyroid Function Assessment</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate to how frequently you experience the following symptoms and conditions according to these guidelines:</i>
                <br>
                <b>Never</b> = 0% of the time<br>
                <b>Rarely</b> = Less than 30% of the time<br>
                <b>Sometimes</b> = About 50% of the time<br>
                <b>Often </b>= More than 70% of the time
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Difficulty getting out of bed in the morning </td>
                            <?php
                            if ($ThRow[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Need caffeine or other stimulants to get going </td>
                            <?php
                            if ($ThRow[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Gain weight easily </td>
                            <?php
                            if ($ThRow[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Difficulty losing weight </td>
                            <?php
                            if ($ThRow[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Dry skin </td>
                            <?php
                            if ($ThRow[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Irregular menstrual cycles </td>
                            <?php
                            if ($ThRow[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Mood swings </td>
                            <?php
                            if ($ThRow[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Thinning hair </td>
                            <?php
                            if ($ThRow[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Outer third of eyebrows missing or thinning </td>
                            <?php
                            if ($ThRow[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Outer third of eyebrows missing or thinning </td>
                            <?php
                            if ($ThRow[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Dry or brittle hair </td>
                            <?php
                            if ($ThRow[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> High cholesterol </td>
                            <?php
                            if ($ThRow[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Low blood pressure </td>
                            <?php
                            if ($ThRow[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Depression </td>
                            <?php
                            if ($ThRow[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Yellow skin </td>
                            <?php
                            if ($ThRow[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($ThRow[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Do you have a family history of thyroid disease? </td>
                            <?php
                            if ($ThRow[17] == "Yes") {
                            ?>
                            <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="Yes" checked/> Yes</td>
                            <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="No" disabled/> No</td>
                            <?php
                            } else if ($ThRow[17] == "No") {
                                ?>
                                <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="Yes" disabled/> Yes</td>
                                <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="No" checked/> No</td>
                            <?php
                                }else {
                                    ?>
                                     <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="Yes" disabled/> Yes</td>
                                <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="No" disabled/> No</td>
                                    <?php
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4><b>Stress Assessment</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate how frequently you experience the following symptoms according to these guidelines:</i>
                <br>
                <b>Never</b> = 0% of the time<br>
                <b>Rarely</b> = Less than 30% of the time<br>
                <b>Sometimes</b> = About 50% of the time<br>
                <b>Often </b>= More than 70% of the time
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Close support network of family and friends </td>
                            <?php
                            if ($StrRow[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Happy with your current job/profession </td>
                            <?php
                            if ($StrRow[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Exercise regularly </td>
                            <?php
                            if ($StrRow[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Eat 3 meals and 0-2 snacks per day </td>
                            <?php
                            if ($StrRow[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Consume caffeine, sugar, and/or refined carbohydrates </td>
                            <?php
                            if ($StrRow[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Take time off work to recharge your batteries </td>
                            <?php
                            if ($StrRow[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Take a multivitamin/mineral </td>
                            <?php
                            if ($StrRow[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Worry about money and finances </td>
                            <?php
                            if ($StrRow[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Satisfaction with your life and its direction </td>
                            <?php
                            if ($StrRow[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> 8 hours of uninterrupted sleep at night </td>
                            <?php
                            if ($StrRow[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Anxiety and/or panic attacks </td>
                            <?php
                            if ($StrRow[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Think you’re too stressed </td>
                            <?php
                            if ($StrRow[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Suffer from allergies, arthritis, fibromyalgia, and/or asthma </td>
                            <?php
                            if ($StrRow[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Trouble falling asleep </td>
                            <?php
                            if ($StrRow[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Feel exhausted after exercising </td>
                            <?php
                            if ($StrRow[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Major life stressors such as death, divorce, etc. </td>
                            <?php
                            if ($StrRow[17] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[17] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[17] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[17] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Catch colds and flu easily </td>
                            <?php
                            if ($StrRow[18] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[18] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[18] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($StrRow[18] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4><b>Hormone Assessment</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate how frequently you experience the following symptoms according to these guidelines:</i>
                <br>
                <b>Never</b> = 0% of the time<br>
                <b>Rarely</b> = Less than 30% of the time<br>
                <b>Sometimes</b> = About 50% of the time<br>
                <b>Often </b>= More than 70% of the time
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Vaginal dryness    </td>
                            <?php
                            if ($HRow[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Mood Swings  </td>
                            <?php
                            if ($HRow[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sagging Skin   </td>
                            <?php
                            if ($HRow[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                        <td style="font-size: 13px;"> Poor sleep quality </td>
                            <?php
                            if ($HRow[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Memory problems </td>
                            <?php
                            if ($HRow[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Night Sweats  </td>
                            <?php
                            if ($HRow[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Hot flashes </td>
                            <?php
                            if ($HRow[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful Intercourse  </td>
                            <?php
                            if ($HRow[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Bladder Infections  </td>
                            <?php
                            if ($HRow[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Low Blood Sugar </td>
                            <?php
                            if ($HRow[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Migraine/tension headaches   </td>
                            <?php
                            if ($HRow[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Heavy Blood Flow  </td>
                            <?php
                            if ($HRow[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Puffiness/bloating  </td>
                            <?php
                            if ($HRow[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Anxiety   </td>
                            <?php
                            if ($HRow[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Insomnia </td>
                            <?php
                            if ($HRow[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Infertility </td>
                            <?php
                            if ($HRow[17] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[17] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[17] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[17] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Miscarriages </td>
                            <?php
                            if ($HRow[18] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[18] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[18] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[18] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> PMS Symptoms </td>
                            <?php
                            if ($HRow[19] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[19] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[19] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[19] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful or lumpy breasts  </td>
                            <?php
                            if ($HRow[20] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[20] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[20] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[20] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Endometriosis  </td>
                            <?php
                            if ($HRow[21] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[21] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[21] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[21] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Osteoporosis  </td>
                            <?php
                            if ($HRow[22] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[22] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[22] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[22] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Water retention  </td>
                            <?php
                            if ($HRow[23] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[23] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[23] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[23] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Unusual facial/arm/leg hair  </td>
                            <?php
                            if ($HRow[24] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[24] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[24] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[24] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Acne breakouts  </td>
                            <?php
                            if ($HRow[25] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[25] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[25] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[25] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful Ovaries </td>
                            <?php
                            if ($HRow[26] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[26] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[26] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[26] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Brown age spots  </td>
                            <?php
                            if ($HRow[27] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[27] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[27] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[27] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Inability to exercise </td>
                            <?php
                            if ($HRow[28] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[28] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[28] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($HRow[28] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <h4><b>Toxic Burden Assessment (Part 1 - Consumption)</b></h4>
            <div style="font-size: 13px;">
                <i>Please indicate how frequently you consume the following foods on daily and/or weekly basis according to these guidelines:</i>
                <br>
                <b>Never</b> = 0% of the time<br>
                <b>Rarely</b> = Less than 30% of the time<br>
                <b>Sometimes</b> = About 50% of the time<br>
                <b>Often </b>= More than 70% of the time
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Organic, pesticide-free produce </td>
                            <?php
                            if ($T1Row[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> A wide variety of different colored fruits and vegetables </td>
                            <?php
                            if ($T1Row[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Salads with dark leafy greens </td>
                            <?php
                            if ($T1Row[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Flaxseeds and/or flaxseed oil </td>
                            <?php
                            if ($T1Row[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Green juices or smoothies </td>
                            <?php
                            if ($T1Row[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Organic, extra-virgin oils </td>
                            <?php
                            if ($T1Row[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fresh green herbs </td>
                            <?php
                            if ($T1Row[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Coffee (including specialty) </td>
                            <?php
                            if ($T1Row[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Tobacco and nicotine (including e-cigarettes) </td>
                            <?php
                            if ($T1Row[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Alcohol (beer, wine, hard liquor, etc.) </td>
                            <?php
                            if ($T1Row[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Soda (regular and/or diet) </td>
                            <?php
                            if ($T1Row[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> “Diet foods” sweetened with aspartame, Splenda, or saccharin </td>
                            <?php
                            if ($T1Row[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Vegetable oil, canola oil, and/or margarine </td>
                            <?php
                            if ($T1Row[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods flavored with MSG (monosodium glutamate) </td>
                            <?php
                            if ($T1Row[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods that are artificially colored </td>
                            <?php
                            if ($T1Row[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods microwaved in plastic containers </td>
                            <?php
                            if ($T1Row[17] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[17] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[17] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[17] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fast foods </td>
                            <?php
                            if ($T1Row[18] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[18] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[18] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[18] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Processed foods (from a box, bag, or can) </td>
                            <?php
                            if ($T1Row[19] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[19] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[19] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T1Row[19] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4><b>Toxic Burden Assessment (Part 2 - Supplementation)</b></h4>
            <div style="font-size: 13px;">
                <i>Please mark how frequently you use the following supplements or medications on a daily and/or weekly basis:</i>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Hormone and antibiotic-free whey protein </td>
                            <?php
                            if ($T2Row[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Probiotic and/or prebiotic supplements </td>
                            <?php
                            if ($T2Row[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Digestive enzymes </td>
                            <?php
                            if ($T2Row[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Prescription or over-the-counter (OTC) drugs </td>
                            <?php
                            if ($T2Row[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Healthy oil supplements (like salmon, flaxseed, or evening primrose oil) </td>
                            <?php
                            if ($T2Row[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Clean and 100% pure supplements (like the Solutions4 products that are sold in our office) </td>
                            <?php
                            if ($T2Row[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T2Row[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4><b>Toxic Burden Assessment (Part 3 – Lifestyle and Habits)</b></h4>
            <div style="font-size: 13px;">
                <i>Please mark how frequently you do the following:</i>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Overeat </td>
                            <?php
                            if ($T3Row[2] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[2] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[2] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[2] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Chew your food completely </td>
                            <?php
                            if ($T3Row[3] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[3] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[3] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[3] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Experience lower bowel issues </td>
                            <?php
                            if ($T3Row[4] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[4] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[4] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[4] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Exercise to induce a hard sweat </td>
                            <?php
                            if ($T3Row[5] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[5] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[5] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[5] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sit in a sauna </td>
                            <?php
                            if ($T3Row[6] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[6] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[6] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[6] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use a cell phone with a headset or hands-free </td>
                            <?php
                            if ($T3Row[7] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[7] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[7] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[7] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Live or work in an environment that recirculates the indoor air </td>
                            <?php
                            if ($T3Row[8] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[8] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[8] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[8] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use pesticides on your property </td>
                            <?php
                            if ($T3Row[9] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[9] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[9] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[9] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Travel by plane </td>
                            <?php
                            if ($T3Row[10] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[10] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[10] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[10] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use a computer </td>
                            <?php
                            if ($T3Row[11] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[11] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[11] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[11] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Live with someone who smokes </td>
                            <?php
                            if ($T3Row[12] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[12] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[12] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[12] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use household cleaners (such as bleach, etc.) </td>
                            <?php
                            if ($T3Row[13] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[13] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[13] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[13] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Keep green plants in your house </td>
                            <?php
                            if ($T3Row[14] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[14] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[14] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[14] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Filter your water </td>
                            <?php
                            if ($T3Row[15] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[15] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[15] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[15] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use air purifiers in your home </td>
                            <?php
                            if ($T3Row[16] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[16] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[16] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[16] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Drink half your body weight in ounces of water each day </td>
                            <?php
                            if ($T3Row[17] == "Never") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never" Checked /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[17] == "Rearly") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly" Checked /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[17] == "Sometimes") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes" Checked /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often" disabled /> Often</td>
                            <?php
                            } else if ($T3Row[17] == "Often") {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often" Checked /> Often</td>
                            <?php
                            } else {
                            ?>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never" disabled /> Never</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly" disabled /> Rearly</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes" disabled /> Sometimes</td>
                                <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often" disabled /> Often</td>
                            <?php
                            }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4><b>Frequency of Consumption</b></h4>
            <div style="font-size: 13px;">
                <i>Please mark how many of each item(s) you consume on weekly basis.</i>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered ">
                    <tbody>
                        <tr>
                            <td style="font-size: 13px;"> Soda </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[2];?>" readonly min="0" style="width: 40px;" name="Soda" /> Weekly</td>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Brewed Coffee </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[3];?>" readonly min="0" style="width: 40px;" name="Brewed" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Specialty Coffee </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[4];?>" readonly min="0" style="width: 40px;" name="Coffee" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Chips </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[5];?>" readonly min="0" style="width: 40px;" name="Chips" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Candy </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[6];?>" readonly min="0" style="width: 40px;" name="Candy" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Gum </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[7];?>" readonly min="0" style="width: 40px;" name="Gum" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Alcoholic Beverage </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[8];?>" readonly min="0" style="width: 40px;" name="Alcohol" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Cigarettes </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[9];?>" readonly min="0" style="width: 40px;" name="Cigarettes" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Energy Drinks </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[10];?>" readonly min="0" style="width: 40px;" name="Energy" /> Weekly</td>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Protein Bars </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[11];?>" readonly min="0" style="width: 40px;" name="Protein" /> Weekly</td>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Bagels / Muffins / Donuts / Twinkies </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[12];?>" readonly min="0" style="width: 40px;" name="Bagels" /> Weekly</td>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Fast Food </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[13];?>" readonly min="0" style="width: 40px;" name="FastFood" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Ice Cream </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[14];?>" readonly min="0" style="width: 40px;" name="IceCream" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Kombucha </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[15];?>" readonly min="0" style="width: 40px;" name="Kombucha" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Tea </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[16];?>" readonly min="0" style="width: 40px;" name="Tea" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Other Drinks </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[17];?>" readonly min="0" style="width: 40px;" name="Drinks" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Restaurant </td>
                            <td style="font-size: 13px;"><input type="number" value="<?php echo $CRow[18];?>" readonly min="0" style="width: 40px;" name="Restaurant" /> Weekly</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                      
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>
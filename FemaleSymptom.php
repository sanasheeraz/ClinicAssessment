<?php
session_start();
include 'header.php';
include 'connection.php';
if((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id']) )
{
$id=$_GET['id'];
$query="Select * from patient where P_Id ='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);
}
?>

<div class="content">
    <div class="container-fluid">
        <div style="text-align:center">
            <h3><b>Female Symptom Assessment</b></h3>
        </div>
        <form method="POST" action="<?php echo 'FemaleSubmitAssessment.php?id='.$id?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Name : </label>
                        <?php
                        if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
                        {
                        ?>
                        <input type="text" class="form-control" />
                        <?php
                        }else {
                        ?>
                        <input type="text" class="form-control" value="<?=$row[1]?>" readonly/>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>BirthDate : </label>
                        <?php
                        if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
                        {
                        ?>
                        <input type="text" class="form-control" />
                        <?php
                        }else {
                        ?>
                        <input type="text" class="form-control" value="<?=$row[2]?>" readonly/>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Gender : </label>
                        <?php
                        if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
                        {
                        ?>
                        <input type="text" class="form-control" />
                        <?php
                        }else {
                        ?>
                        <input type="text" class="form-control" value="<?=$row[3]?>" readonly/>
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
                        if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
                        {
                        ?>
                        <input type="text" class="form-control" />
                        <?php
                        }else {
                        ?>
                        <input type="text" class="form-control" value="<?=$row[4]?>" readonly/>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Phone : </label>
                        <?php
                        if(!((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])))
                        {
                        ?>
                        <input type="text" class="form-control" />
                        <?php
                        }else {
                        ?>
                        <input type="text" class="form-control" value="<?=$row[6]?>" readonly/>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            // if(isset($_SESSION['Patient']))
            // {
             ?>
            <!-- <div style="text-align:center"><a  class="btn btn-primary" href="<?php echo 'UpdateProfile.php?id='.$id?>">Edit Profile</a></div>            -->
            <?php
            //}
            ?>
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
                            <td style="font-size: 13px;"> Do you feel tired most ofhe time?</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Tired" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Lifestyle-altering fatigue </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Life" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Intestinal gas </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Gas" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Abdominal bloating </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Abdominal" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sugar cravings </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sugar" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Bread or beer cravings </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Bread" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Constipation and/or diarrhea </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Constipation" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Irritability and/or moodiness </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Irritability" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Brain fog and/or poor memory </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Brain" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Feeling faint, dizzy, or lightheaded </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Feeling" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Muscle or body aches </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Muscles" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Itching or burning sensation in rectum or vagina </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Itching" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Loss of sexual desire </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Loss" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> White thrush or yellow fuzzy tongue </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1White" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1White" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1White" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1White" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Athlete’s foot, ringworm, or jock itch </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Athlete" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fingernail or toenail fungus </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Fingernail" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sensitivity to perfumes, insecticides, or other chemical smells </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Sensitivity" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Weight gain and/or struggling to maintain a healthy weight </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Weight" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Think your weight is out of control </td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g1Think" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"> Antibiotics 	</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Antibiotic" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Birth Control </td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Birth" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Steroid drugs (possibly for allergies, asthma, or injuries) </td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Steroid" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Synthetic hormones (such as HRT or bioidentical) </td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="g2Synthetic" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"><input type="radio" name="tBed" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBed" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBed" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBed" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Need caffeine or other stimulants to get going  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCaffeine" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Gain weight easily </td>
                            <td style="font-size: 13px;"><input type="radio" name="tGain" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGain" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGain" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGain" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Difficulty losing weight  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDifficulty" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Dry skin  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tDry" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDry" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDry" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDry" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Irregular menstrual cycles </td>
                            <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tIrregular" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Mood swings  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tMood" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMood" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMood" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMood" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Thinning hair  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tThinning" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Outer third of eyebrows missing or thinning  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tEyebrows" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Dry or brittle hair  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDryHair" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> High cholesterol </td>
                            <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCholesterol" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Low blood pressure  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tBP" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBP" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBP" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tBP" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Depression  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDepression" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Yellow skin  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSkin" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Do you have a family history of thyroid disease? </td>
                            <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily"value="Yes"/> Yes</td>
                            <td colspan="2" style="font-size: 13px;"><input type="radio" name="tFamily" value="No"/> No</td>
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
                            <td style="font-size: 13px;"> Close support network of family and friends  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sClose" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sClose" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sClose" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sClose" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Happy with your current job/profession  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sHappy" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Exercise regularly  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExercise" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Eat 3 meals and 0-2 snacks per day  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sEat" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sEat" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sEat" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sEat" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Consume caffeine, sugar, and/or refined carbohydrates </td>
                            <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCaffeine" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Take time off work to recharge your batteries   </td>
                            <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sRecharge" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Take a multivitamin/mineral  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMultivitamin" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Worry about money and finances   </td>
                            <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sMoney" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Satisfaction with your life and its direction  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSatisfaction" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> 8 hours of uninterrupted sleep at night  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sSleep" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Anxiety and/or panic attacks  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAnxiety" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Think you’re too stressed   </td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressed" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Suffer from allergies, arthritis, fibromyalgia, and/or asthma </td>
                            <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sAllergies" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Trouble falling asleep  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sTrouble" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Feel exhausted after exercising  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sExhausted" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Major life stressors such as death, divorce, etc.  </td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sStressors" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Catch colds and flu easily </td>
                            <td style="font-size: 13px;"><input type="radio" name="sCold" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCold" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCold" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="sCold" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hVaginal" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Mood Swings  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hMood" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMood" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMood" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMood" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sagging Skin   </td>
                            <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSagging" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Poor sleep quality   </td>
                            <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSleep" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Memory problems  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMemory" value="Often"/> Often</td>
                        </tr>

                        <tr>
                            <td style="font-size: 13px;"> Night Sweats  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hNight" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hNight" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hNight" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hNight" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Hot flashes </td>
                            <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFlashes" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful Intercourse  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hIntercourse" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Bladder Infections  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBladder" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Low Blood Sugar </td>
                            <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hSugar" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Migraine/tension headaches   </td>
                            <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMigraine" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Heavy Blood Flow  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBlood" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Puffiness/bloating  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPuffiness" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Anxiety   </td>
                            <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAnxiety" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Insomnia </td>
                            <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInsomnia" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Infertility </td>
                            <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hInfertility" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Miscarriages </td>
                            <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hMiscarriages" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> PMS Symptoms </td>
                            <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hPMS" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful or lumpy breasts  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBreast" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Endometriosis  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hEndometriosis" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Osteoporosis  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOsteoporosis" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Water retention  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hWater" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hWater" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hWater" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hWater" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Unusual facial/arm/leg hair  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hFacial" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Acne breakouts  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hAcne" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Painful Ovaries </td>
                            <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hOvaries" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Brown age spots  </td>
                            <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hBrown" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Inability to exercise </td>
                            <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="hExercise" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"> Organic, pesticide-free produce    </td>
                            <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOrganic" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> A wide variety of different colored fruits and vegetables </td>
                            <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFruits" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Salads with dark leafy greens </td>
                            <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSalad" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Flaxseeds and/or flaxseed oil </td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlaxseeds" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Green juices or smoothies  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tGreen" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Organic, extra-virgin oils   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tOil" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOil" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOil" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tOil" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fresh green herbs    </td>
                            <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFresh" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Coffee (including specialty)  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tCoffee" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Tobacco and nicotine (including e-cigarettes)  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tTobacco" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Alcohol (beer, wine, hard liquor, etc.)    </td>
                            <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tAlcohol" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Soda (regular and/or diet)  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tSoda" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> “Diet foods” sweetened with aspartame, Splenda, or saccharin   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tDiet" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Vegetable oil, canola oil, and/or margarine   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tVegetable" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods flavored with MSG (monosodium glutamate) </td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFlavoured" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods that are artificially colored  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tArtificial" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Foods microwaved in plastic containers   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tMicrowave" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fast foods </td>
                            <td style="font-size: 13px;"><input type="radio" name="tFast" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFast" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFast" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tFast" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Processed foods (from a box, bag, or can) </td>
                            <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tProcessed" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"> Hormone and antibiotic-free whey protein  </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHormone" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Probiotic and/or prebiotic supplements </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttProbiotic" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Digestive enzymes </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttDigestive" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Prescription or over-the-counter (OTC) drugs </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttPrescription" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Healthy oil supplements (like salmon, flaxseed, or evening primrose oil)  </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttHealthy" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Clean and 100% pure supplements (like the Solutions4 products that are sold in our office)    </td>
                            <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="ttClean" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttOvereat" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Chew your food completely  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttChew" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Experience lower bowel issues   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttExperience" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Exercise to induce a hard sweat  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSweat" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Sit in a sauna  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSit" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use a cell phone with a headset or hands-free  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPhone" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Live or work in an environment that recirculates the indoor air </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttEnvironment" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use pesticides on your property  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPesticides" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Travel by plane  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttTravel" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use a computer </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttComputer" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Live with someone who smokes  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttSmokes" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use household cleaners (such as bleach, etc.)  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttCleaner" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Keep green plants in your house   </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttPlants" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Filter your water  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttFilter" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Use air purifiers in your home  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttAir" value="Often"/> Often</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Drink half your body weight in ounces of water each day  </td>
                            <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Never"/> Never</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Rearly"/> Rearly</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Sometimes"/> Sometimes</td>
                            <td style="font-size: 13px;"><input type="radio" name="tttDrink" value="Often"/> Often</td>
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
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Soda"/> Weekly</td>
                        </tr>
                        
                        <tr>
                            <td style="font-size: 13px;"> Brewed Coffee  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Brewed"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Specialty Coffee  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Coffee"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Chips </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Chips"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Candy </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Candy"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Gum </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Gum"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Alcoholic Beverage </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Alcohol"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Cigarettes  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Cigarettes"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Energy Drinks  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;"  name="Energy"/> Weekly</td>
                        </tr>
                        
                        <tr>
                            <td style="font-size: 13px;"> Protein Bars </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Protein"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Bagels / Muffins / Donuts / Twinkies  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Bagels"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Fast Food  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="FastFood"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Ice Cream </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="IceCream"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Kombucha  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Kombucha" /> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Tea </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Tea"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Other Drinks </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Drinks"/> Weekly</td>
                        </tr>
                        <tr>
                            <td style="font-size: 13px;"> Restaurant  </td>
                            <td style="font-size: 13px;"><input type="number" value="" min="0" style="width: 40px;" name="Restaurant"/> Weekly</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            if((isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id']))
            {
            ?>
             <div style="text-align:center"><button type="submit" name="btnSubmit" class="btn btn-primary">Submit Assessment</button></div>   
            <?php
            }
            ?>
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>
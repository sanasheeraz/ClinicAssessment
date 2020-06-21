<?php
session_start();
if (!(isset($_SESSION['admin'])OR isset($_SESSION['Patient']))AND isset($_GET['id'])AND isset($_GET['pid'])) {
    header('location:Admin.php');
} else {
    include 'header.php';
    include 'connection.php';
    $pid = $_GET['pid'];
    $id = $_GET['id'];
    $query = "Select * from Patient where P_Id = '$pid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $ConQuery;
    $fatquery1;
    $fatquery2;
    $Candida1;
    $Candida2;
    $Candida3;
    $Digestionquery;
    $Hormone1;
    $Hormone2;
    if ($row[3] == "Male") {
        $ConQuery = "Select * from m_consumption_assessment where MSA_Id='$id'";
        $fatquery1 = "Select * from m_toxic_assessment_1 where MSA_Id='$id'";
        $fatquery2 = "Select * from m_toxic_assessment_2 where MSA_Id='$id'";
        $Candida1 = "SELECT * from m_general_assessment_1 where MSA_Id='$id'";
        $Candida2 = "SELECT * from m_general_assessment_2 where MSA_Id='$id'";
        $Candida3 = "SELECT * from m_stress_assessment where MSA_Id='$id'";
        $Digestionquery = "SELECT * from m_toxic_assessment_3 where MSA_Id='$id'";
        $Hormone1 = "SELECT * from m_hormone_assessment where MSA_Id='$id'";
        $Hormone2 = "SELECT * from m_thyroid_assessment where MSA_Id='$id'";
    } else {
        $ConQuery = "Select * from f_consumption_assessment where MSA_Id='$id'";
        $fatquery1 = "Select * from f_toxic_assessment_1 where MSA_Id='$id'";
        $fatquery2 = "Select * from f_toxic_assessment_2 where MSA_Id='$id'";
        $Candida1 = "SELECT * from f_general_assessment_1 where MSA_Id='$id'";
        $Candida2 = "SELECT * from f_general_assessment_2 where MSA_Id='$id'";
        $Candida3 = "SELECT * from f_stress_assessment where MSA_Id='$id'";
        $Digestionquery = "SELECT * from f_toxic_assessment_3 where MSA_Id='$id'";
        $Hormone1 = "SELECT * from f_hormone_assessment where MSA_Id='$id'";
        $Hormone2 = "SELECT * from f_thyroid_assessment where MSA_Id='$id'";
    }
    $ConResult = mysqli_query($conn, $ConQuery);
    $ConRow = mysqli_fetch_row($ConResult);

    //Fat Retention
    //toxic1
    $fatResult = mysqli_query($conn, $fatquery1);
    $fatRow = mysqli_fetch_row($fatResult);
    $fatRetention = 0;
    $i = 2;
    $divident = 0;
    while ($i <= 19) {
        if ($fatRow[$i] == "Never") {
            $fatRetention = $fatRetention + 0;
            $divident += 100;
        } else if ($fatRow[$i] == "Rearly") {
            $fatRetention = $fatRetention + 30;
            $divident += 100;
        } else if ($fatRow[$i] == "Sometimes") {
            $fatRetention = $fatRetention + 50;
            $divident += 100;
        } else if ($fatRow[$i] == "Often") {
            $fatRetention = $fatRetention + 70;
            $divident += 100;
        }
        $i++;
    }
    //toxic2
    $fatResult = mysqli_query($conn, $fatquery2);
    $fatRow = mysqli_fetch_row($fatResult);
    $i = 2;
    while ($i <= 5) {
        if ($fatRow[$i] == "Never") {
            $fatRetention = $fatRetention + 0;
            $divident += 100;
        } else if ($fatRow[$i] == "Rearly") {
            $fatRetention = $fatRetention + 30;
            $divident += 100;
        } else if ($fatRow[$i] == "Sometimes") {
            $fatRetention = $fatRetention + 50;
            $divident += 100;
        } else if ($fatRow[$i] == "Often") {
            $fatRetention = $fatRetention + 70;
            $divident += 100;
        }
        $i++;
    }
    if($divident!=0)
    $fatRetention = ($fatRetention / $divident) * 100;
    $fatRetention=number_format((float)$fatRetention, 1, '.', '');
    $fatSeverity="";
    if($fatRetention>=0  && $fatRetention<=19)
    {
        $fatSeverity="Approaching Optimal";
    }else if($fatRetention>=20  && $fatRetention<=39)
    {
        $fatSeverity="Healing Restorative";
    }else if($fatRetention>=40  && $fatRetention<=59)
    {
        $fatSeverity="Sicky, Unwell, Toxic";
    }else if($fatRetention>=60  && $fatRetention<=79)
    {
        $fatSeverity="Alarming, Unsafe, Unstable";
    }else if($fatRetention>=80  && $fatRetention<=100)
    {
        $fatSeverity="Critical";
    }
    //Candida
    //general1
    $CandidaResult = mysqli_query($conn, $Candida1);
    $CandidaRow = mysqli_fetch_row($CandidaResult);
    $Candida = 0;
    $divident = 0;
    $i = 2;
    while ($i <= 19) {
        if ($CandidaRow[$i] == "Never") {
            $Candida = $Candida + 0;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Rearly") {
            $Candida = $Candida + 30;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Sometimes") {
            $Candida = $Candida + 50;
            $divident = 100;
        } else if ($CandidaRow[$i] == "Often") {
            $Candida = $Candida + 70;
            $divident += 100;
        }
        $i++;
    }
    //general2
    $CandidaResult = mysqli_query($conn, $Candida2);
    $CandidaRow = mysqli_fetch_row($CandidaResult);
    $i = 2;
    while ($i <= 5) {
        if ($CandidaRow[$i] == "Never") {
            $Candida = $Candida + 0;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Rearly") {
            $Candida = $Candida + 30;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Sometimes") {
            $Candida = $Candida + 50;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Often") {
            $Candida = $Candida + 70;
            $divident += 100;
        }
        $i++;
    }
    //stress
    $CandidaResult = mysqli_query($conn, $Candida3);
    $CandidaRow = mysqli_fetch_row($CandidaResult);
    $i = 2;
    while ($i <= 18) {
        if ($CandidaRow[$i] == "Never") {
            $Candida = $Candida + 0;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Rearly") {
            $Candida = $Candida + 30;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Sometimes") {
            $Candida = $Candida + 50;
            $divident += 100;
        } else if ($CandidaRow[$i] == "Often") {
            $Candida = $Candida + 70;
            $divident += 100;
        }
        $i++;
    }
    if($divident!=0)
    $Candida = ($Candida / $divident) * 100;
    $Candida=number_format((float)$Candida, 1, '.', '');
    $CandidaSeverity="";
    if($Candida>=0  && $Candida<=19)
    {
        $CandidaSeverity="Approaching Optimal";
    }else if($Candida>=20  && $Candida<=39)
    {
        $CandidaSeverity="Healing Restorative";
    }else if($Candida>=40  && $Candida<=59)
    {
        $CandidaSeverity="Sicky, Unwell, Toxic";
    }else if($Candida>=60  && $Candida<=79)
    {
        $CandidaSeverity="Alarming, Unsafe, Unstable";
    }else if($Candida>=80  && $Candida<=100)
    {
        $CandidaSeverity="Critical";
    }
    //Digestion
    //toxic3
    $DigestionResult = mysqli_query($conn, $Digestionquery);
    $DigestionRow = mysqli_fetch_row($DigestionResult);
    $Digestion = 0;
    $divident = 0;
    $i = 2;
    while ($i <= 17) {
        if ($DigestionRow[$i] == "Never") {
            $Digestion = $Digestion + 0;
            $divident += 100;
        } else if ($DigestionRow[$i] == "Rearly") {
            $Digestion = $Digestion + 30;
            $divident += 100;
        } else if ($DigestionRow[$i] == "Sometimes") {
            $Digestion = $Digestion + 50;
            $divident += 100;
        } else if ($DigestionRow[$i] == "Often") {
            $Digestion = $Digestion + 70;
            $divident += 100;
        }
        $i++;
    }
    if($divident!=0)
    $Digestion = ($Digestion / $divident) * 100;
    $Digestion=number_format((float)$Digestion, 1, '.', '');
    $DigestionSeverity="";
    if($Digestion>=0  && $Digestion<=19)
    {
        $DigestionSeverity="Approaching Optimal";
    }else if($Digestion>=20  && $Digestion<=39)
    {
        $DigestionSeverity="Healing Restorative";
    }else if($Digestion>=40  && $Digestion<=59)
    {
        $DigestionSeverity="Sicky, Unwell, Toxic";
    }else if($Digestion>=60  && $Digestion<=79)
    {
        $DigestionSeverity="Alarming, Unsafe, Unstable";
    }else if($Digestion>=80  && $Digestion<=100)
    {
        $DigestionSeverity="Critical";
    }
    //Hormone
    //hormone
    $HormoneResult = mysqli_query($conn, $Hormone1);
    $HormoneRow = mysqli_fetch_row($HormoneResult);
    $Hormone = 0;
    $divident = 0;
    $i = 2;

    if ($row[3] == "Male") {
        while ($i <= 17) {
            if ($HormoneRow[$i] == "Never") {
                $Hormone = $Hormone + 0;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Rearly") {
                $Hormone = $Hormone + 30;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Sometimes") {
                $Hormone = $Hormone + 50;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Often") {
                $Hormone = $Hormone + 70;
                $divident += 100;
            }
            $i++;
        }
    } else if ($row[3] == "Female") {
        while ($i <= 28) {
            if ($HormoneRow[$i] == "Never") {
                $Hormone = $Hormone + 0;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Rearly") {
                $Hormone = $Hormone + 30;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Sometimes") {
                $Hormone = $Hormone + 50;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Often") {
                $Hormone = $Hormone + 70;
                $divident += 100;
            }
            $i++;
        }
    }

    //thyroid
    $HormoneResult = mysqli_query($conn, $Hormone2);
    $HormoneRow = mysqli_fetch_row($HormoneResult);
    $i = 2;
    if ($row[3] == "Male") {
        while ($i <= 15) {
            if ($HormoneRow[$i] == "Never") {
                $Hormone = $Hormone + 0;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Rearly") {
                $Hormone = $Hormone + 30;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Sometimes") {
                $Hormone = $Hormone + 50;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Often") {
                $Hormone = $Hormone + 70;
                $divident += 100;
            }
            $i++;
        }
    } else if ($row[3] == "Female") {
        while ($i <= 16) {
            if ($HormoneRow[$i] == "Never") {
                $Hormone = $Hormone + 0;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Rearly") {
                $Hormone = $Hormone + 30;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Sometimes") {
                $Hormone = $Hormone + 50;
                $divident += 100;
            } else if ($HormoneRow[$i] == "Often") {
                $Hormone = $Hormone + 70;
                $divident += 100;
            }
            $i++;
        }
    }
    if($divident!=0)
    $Hormone = ($Hormone / $divident) * 100;
    $Hormone=number_format((float)$Hormone, 1, '.', '');
    $HormoneSeverity="";
    if($Hormone>=0  && $Hormone<=19)
    {
        $HormoneSeverity="Approaching Optimal";
    }else if($Hormone>=20  && $Hormone<=39)
    {
        $HormoneSeverity="Healing Restorative";
    }else if($Hormone>=40  && $Hormone<=59)
    {
        $HormoneSeverity="Sicky, Unwell, Toxic";
    }else if($Hormone>=60  && $Hormone<=79)
    {
        $HormoneSeverity="Alarming, Unsafe, Unstable";
    }else if($Hormone>=80  && $Hormone<=100)
    {
        $HormoneSeverity="Critical";
    }

    $WeeklyTotal = 0;
    $MonthlyTotal = 0;
    $AnnualTotal = 0;
    $TenTotal = 0;

    function calculateWeekly($quantity, $price)
    {
        if ($quantity == "") {
            return 0.0;
        } else {
            $GLOBALS['WeeklyTotal'] += ($quantity * $price);
            return $quantity * $price;
        }
    }
    function calculateMonthly($quantity, $price)
    {
        if ($quantity == "") {
            return 0.0;
        } else {
            $GLOBALS['MonthlyTotal'] += ($quantity * $price * 4);
            return $quantity * $price * 4;
        }
    }
    function calculateAnnual($quantity, $price)
    {

        if ($quantity == "") {
            return 0.0;
        } else {
            $GLOBALS['AnnualTotal'] += ($quantity * $price * 52);
            return $quantity * $price * 52;
        }
    }
    function calculateTen($quantity, $price)
    {
        $answer = 0;
        if ($quantity == "") {
            return 0.0;
        } else {
            $GLOBALS['TenTotal'] += ($quantity * $price * 52 * 10);
            return $quantity * $price * 52 * 10;
        }
    }
?>
    <div class="content">
        <div class="container-fluid">
            <div style="text-align: center;">
                <h2>Assessment Results</h2>
            </div>
            <table>
                <tr>
                    <th>Name</th>
                    <th><?php echo $row[1] ?></th>
                </tr>
                <tr>
                    <th>Gender</th>
                    <th><?php echo $row[3] ?></th>
                </tr>
                <tr>
                    <th>Date Of Birth</th>
                    <th><?php echo $row[2] ?></th>
                </tr>
                <tr>
                    <th>Address</th>
                    <th><?php echo $row[4] ?></th>
                </tr>
                <tr>
                    <th>Contact No</th>
                    <th><?php echo $row[5] ?></th>
                </tr>
            </table>
            <h3>Fat Burning Disability Index</h3>
            <table id="resultTable">
                <tr>
                    <th>Rank</th>
                    <th>Description</th>
                    <th>Severity</th>
                    <th>Percentage</th>
                    <th>Notes</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Fat Retention</td>
                    <td><?php echo $fatSeverity;?></td>
                    <td><?php echo $fatRetention. "%" ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Candida</td>
                    <td><?php echo $CandidaSeverity;?></td>
                    <td><?php echo $Candida. "%" ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Digestion Imbalance</td>
                    <td><?php echo $DigestionSeverity;?></td>
                    <td><?php echo $Digestion . "%" ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Hormone Imbalance</td>
                    <td><?php echo $HormoneSeverity;?></td>
                    <td><?php echo $Hormone . "%" ?></td>
                    <td></td>
                </tr>
            </table>
            <br>
            <table id="Range">
                <tr>
                    <td>Ranges : </td>
                    <td>0-19% <br>Approaching Optimal</td>
                    <td>20-39%<br> Healing Restorative</td>
                    <td>40-59%<br>Sicky, Unwell, Toxic</td>
                    <td>60-79%<br>Alarming, Unsafe, Unstable</td>
                    <td>80-100%<br>Critical</td>
                </tr>
            </table>
            <h3>Profiles</h3>
            <table id="profiles">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <h4>Danger Levels:</h4></b>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="130">&nbsp;Diet Balance:</td>
                        <td width="35"></td>
                        <td width="60">&nbsp;Severity:&nbsp;&nbsp;</td>
                        <td width="140"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Pre&minus;Diabetic&nbsp;Profile:</td>
                        <td></td>
                        <td>&nbsp;Severity:&nbsp;&nbsp;</td>
                        <td></td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Adrenal Profile:</td>
                        <td></td>
                        <td>&nbsp;Severity:&nbsp;&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Thyroid Profile:</td>
                        <td></td>
                        <td>&nbsp;Severity:&nbsp;&nbsp;</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <div>
                Recommended Products for Hormone Imbalance
            </div>
            <hr>
            <h3>Money Savings</h3>
            <table id="MoneyTable">
                <thead>
                    <tr>
                        <th>Habit</th>
                        <th>Price</th>
                        <th>Weekly</th>
                        <th>Weekly Cost</th>
                        <th>Monthly Cost</th>
                        <th>Annual Cost</th>
                        <th>10 Year Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Can of Soda</td>
                        <td class="money">$1.19</td>
                        <td><?php echo $ConRow[2]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[2], 1.19); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[2], 1.19); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[2], 1.19); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[2], 1.19); ?></td>
                    </tr>

                    <tr>
                        <td>Cup of Brewed Coffee</td>
                        <td class="money">$2.10</td>
                        <td><?php echo $ConRow[3]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[3], 2.10); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[3], 2.10); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[3], 2.10); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[3], 2.10); ?></td>

                    </tr>

                    <tr>
                        <td>Cup of Specialty Coffee</td>
                        <td class="money">$4.75</td>
                        <td><?php echo $ConRow[4]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[4], 4.75); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[4], 4.75); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[4], 4.75); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[4], 4.75); ?></td>

                    </tr>

                    <tr>
                        <td>Handful of Chips</td>
                        <td class="money">$1.69</td>
                        <td><?php echo $ConRow[5]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[5], 1.69); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[5], 1.69); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[5], 1.69); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[5], 1.69); ?></td>
                    </tr>

                    <tr>
                        <td>Bar of Candy</td>
                        <td class="money">$1.84</td>
                        <td><?php echo $ConRow[6]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[6], 1.84); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[6], 1.84); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[6], 1.84); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[6], 1.84); ?></td>
                    </tr>

                    <tr>
                        <td>Pack of Gum</td>
                        <td class="money">$2.24</td>
                        <td><?php echo $ConRow[7]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[7], 2.24); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[7], 2.24); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[7], 2.24); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[7], 2.24); ?></td>
                    </tr>

                    <tr>
                        <td>Glass of Alcoholic Beverage</td>
                        <td class="money">$6.95</td>
                        <td><?php echo $ConRow[8]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[8], 6.95); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[8], 6.95); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[8], 6.95); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[8], 6.95); ?></td>
                    </tr>

                    <tr>
                        <td>Single of Cigarettes</td>
                        <td class="money">$0.45</td>
                        <td><?php echo $ConRow[9]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[9], 0.45); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[9], 0.45); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[9], 0.45); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[9], 0.45); ?></td>
                    </tr>

                    <tr>
                        <td>Can of Energy Drinks</td>
                        <td class="money">$2.49</td>
                        <td><?php echo $ConRow[10]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[10], 2.49); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[10], 2.49); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[10], 2.49); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[10], 2.49); ?></td>
                    </tr>

                    <tr>
                        <td>Bar of Protein Bars</td>
                        <td class="money">$1.99</td>
                        <td><?php echo $ConRow[11]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[11], 1.99); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[11], 1.99); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[11], 1.99); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[11], 1.99); ?></td>
                    </tr>

                    <tr>
                        <td>One of Bagels / Muffins / Donuts / Twinkies</td>
                        <td class="money">$2.95</td>
                        <td><?php echo $ConRow[12]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[12], 2.95); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[12], 2.95); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[12], 2.95); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[12], 2.95); ?></td>
                    </tr>

                    <tr>
                        <td>Meal of Fast Food</td>
                        <td class="money">$8.00</td>
                        <td><?php echo $ConRow[13]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[13], 8.00); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[13], 8.00); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[13], 8.00); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[13], 8.00); ?></td>
                    </tr>

                    <tr>
                        <td>Scoop of Ice Cream</td>
                        <td class="money">$2.79</td>
                        <td><?php echo $ConRow[14]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[14], 2.79); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[14], 2.79); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[14], 2.79); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[14], 2.79); ?></td>
                    </tr>

                    <tr>
                        <td>16 Oz of Kombucha</td>
                        <td class="money">$3.50</td>
                        <td><?php echo $ConRow[15]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[15], 3.50); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[15], 3.50); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[15], 3.50); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[15], 3.50); ?></td>
                    </tr>

                    <tr>
                        <td>Cup of Tea</td>
                        <td class="money">$2.50</td>
                        <td><?php echo $ConRow[16]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[16], 2.50); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[16], 2.50); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[16], 2.50); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[16], 2.50); ?></td>
                    </tr>

                    <tr>
                        <td>Bottle of Other Drinks</td>
                        <td class="money">$2.00</td>
                        <td><?php echo $ConRow[17]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[17], 2.00); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[17], 2.00); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[17], 2.00); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[17], 2.00); ?></td>
                    </tr>

                    <tr>
                        <td>Meal of Restaurant</td>
                        <td class="money">$15.00</td>
                        <td><?php echo $ConRow[18]; ?></td>
                        <td><?php echo "$" . calculateWeekly($ConRow[18], 15.00); ?></td>
                        <td><?php echo "$" . calculateMonthly($ConRow[18], 15.00); ?></td>
                        <td><?php echo "$" . calculateAnnual($ConRow[18], 15.00); ?></td>
                        <td><?php echo "$" . calculateTen($ConRow[18], 15.00); ?></td>
                    </tr>
                </tbody>
                <tr>
                    <th class="totals">Totals:</th>
                    <th class="totals"></th>
                    <th class="totals"></th>
                    <th class="money totals"><?php echo "$" . $WeeklyTotal; ?></th>
                    <th class="money totals"><?php echo "$" . $MonthlyTotal; ?></th>
                    <th class="money totals"><?php echo "$" . $AnnualTotal; ?></th>
                    <th class="money totals"><?php echo "$" . $TenTotal; ?></th>
                </tr>
            </table>
        </div>
    </div>
<?php
    include 'footer.php';
}
?>
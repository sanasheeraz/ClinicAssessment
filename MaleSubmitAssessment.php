<?php
if (isset($_POST['btnSubmit'])) {
    include 'connection.php';
    $Date = date('Y-m-d');
    $PatientId;
    //Initialized Variable with Null
    $g1Tired=$g1Life=$g1Gas=$g1Abdominal=$g1Sugar=$g1Bread=$g1Constipation=$g1Irritability=$g1Brain =$g1Feeling =$g1Muscles = $g1Itching = $g1Loss =$g1White =  $g1Athlete = $g1Fingernail =$g1Sensitivity = $g1Weight = $g1Think =NULL;
    $g2Antibiotic = $g2Birth =$g2Steroid =$g2Synthetic =NULL;
    $tBed =$tCaffeine = $tGain =$tDifficulty = $tDry = $tIrregular =$tMood = $tThinning = $tEyebrows = $tDryHair = $tCholesterol =$tBP =$tDepression =$tSkin =$tFamily = NULL;
    $sClose =$sHappy =$sExercise =$sEat =$sCaffeine =$sRecharge =$sMultivitamin =$sMoney =$sSatisfaction =$sSleep =$sAnxiety =$sStressed =$sAllergies =$sTrouble =$sExhausted =$sStressors =$sCold = NULL;
    $hSleep =$hMemory = $hPuffiness = $hAnxiety = $hInsomnia = $hAcne = $hBrown = $hExercise = $hFatty = $hSoft = $hMuscle = $hStamina = $hHeadache = $hProstate = $hUrination = $hFoggy ="";
    $tOrganic = $tFruits = $tSalad = $tFlaxseeds = $tGreen = $tOil = $tFresh = $tCoffee = $tTobacco = $tAlcohol = $tSoda = $tDiet = $tVegetable =$tFlavoured = $tArtificial = $tMicrowave = $tFast = $tProcessed = NULL;
    $ttHormone = $ttProbiotic = $ttDigestive = $ttPrescription = $ttHealthy = $ttClean = NULL;
    $tttOvereat = $tttChew = $tttExperience = $tttSweat = $tttSit = $tttPhone = $tttEnvironment = $tttPesticides = $tttTravel = $tttComputer = $tttSmokes = $tttCleaner = $tttPlants = $tttFilter = $tttAir =$tttDrink = NULL;
    $Soda = $Brewed =$Coffee = $Chips =$Candy = $Gum = $Alcohol = $Cigarettes = $Energy = $Protein = $Bagels = $FastFood = $IceCream = $Kombucha = $Tea = $Drinks = $Restaurant = NULL;

    if (isset($_SESSION['Patient'])) {
        $PatientId = $_SESSION['Patient'];
    } else {
        $PatientId = $_GET['id'];
    }
    $q = "Select * from m_symptom_assessment where MSA_Date='$Date' AND P_Id='$PatientId'";
    $r = mysqli_query($conn, $q);
    if ($r) 
    {
        if (mysqli_num_rows($r) == 0) 
        {
            $query = "INSERT INTO m_symptom_assessment(P_Id, MSA_Date) VALUES ('$PatientId','$Date')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                // $query1="SELECT MAX(MSA_Id) FROM m_symptom_assessment";
                // $MSA_Id=mysqli_query($conn,$query1);

                $MSA_Id = mysqli_insert_id($conn);

                //General Assessment 1
                $g1Tired = $_POST['g1Tired'];
                $g1Life = $_POST['g1Life'];
                $g1Gas = $_POST['g1Gas'];
                $g1Abdominal = $_POST['g1Abdominal'];
                $g1Sugar = $_POST['g1Sugar'];
                $g1Bread = $_POST['g1Bread'];
                $g1Constipation = $_POST['g1Constipation'];
                $g1Irritability = $_POST['g1Irritability'];
                $g1Brain = $_POST['g1Brain'];
                $g1Feeling = $_POST['g1Feeling'];
                $g1Muscles = $_POST['g1Muscles'];
                $g1Itching = $_POST['g1Itching'];
                $g1Loss = $_POST['g1Loss'];
                $g1White = $_POST['g1White'];
                $g1Athlete = $_POST['g1Athlete'];
                $g1Fingernail = $_POST['g1Fingernail'];
                $g1Sensitivity = $_POST['g1Sensitivity'];
                $g1Weight = $_POST['g1Weight'];
                $g1Think = $_POST['g1Think'];

                $Generalquery = "INSERT INTO m_general_assessment_1(MSA_Id, Tried, Lifestyle, Abdominal, Sugar, 
            Bread, Constipation, Irritability, Brain_Fog, Feeling_Faint, Muscles, Itching, Sexual, 
            White_Thrush, Athelete_Foot, FingerNail, Sensitivity, Weight_Gain, Think_Weight) VALUES (
                '$MSA_Id','$g1Tired','$g1Life','$g1Abdominal','$g1Sugar','$g1Bread','$g1Constipation','$g1Irritability','$g1Brain',
                '$g1Feeling','$g1Muscles','$g1Itching','$g1Loss','$g1White','$g1Athlete','$g1Fingernail','$g1Sensitivity',
                '$g1Weight','$g1Think'
            )";
                $GeneralResult = mysqli_query($conn, $Generalquery);

                if ($GeneralResult) {
                    echo "General" . $GeneralResult;
                } else {
                    echo "General Error" . mysqli_error($GeneralResult);
                }

                //General Assessment 2
                $g2Antibiotic = $_POST['g2Antibiotic'];
                $g2Testosterone = $_POST['g2Testosterone '];
                $g2Steroid = $_POST['g2Steroid'];
                $g2Synthetic = $_POST['g2Synthetic'];

                $Generalquery2 = "INSERT INTO m_general_assessment_2(MSA_Id, Antibiotics, Tetosterone, Steriod_Drugs, 
            Synthetic_Hormones) VALUES ('$MSA_Id','$g2Antibiotic','$g2Testosterone','$g2Steroid','$g2Synthetic')";
                $GeneralResult2 = mysqli_query($conn, $Generalquery2);

                if ($GeneralResult2)
                    echo "GENENRAL " . $GeneralResult2;
                else
                    echo "General2 Error " . mysqli_error($conn);


                //Throid Assessment
                $tBed = $_POST['tBed'];
                $tCaffeine = $_POST['tCaffeine'];
                $tGain = $_POST['tGain'];
                $tDifficulty = $_POST['tDifficulty'];
                $tDry = $_POST['tDry'];
                $tMood = $_POST['tMood'];
                $tThinning = $_POST['tThinning'];
                $tEyebrows = $_POST['tEyebrows'];
                $tDryHair = $_POST['tDryHair'];
                $tCholesterol = $_POST['tCholesterol'];
                $tBP = $_POST['tBP'];
                $tDepression = $_POST['tDepression'];
                $tSkin = $_POST['tSkin'];
                $tFamily = $_POST['tFamily'];

                $Thyroidquery = "INSERT INTO m_thyroid_assessment(MSA_Id, Bed, Caffeine, Get_Weight, 
            Losing_Weight, Dry_Skin, Mood_Swings, Thinning_Hair, Eyebrows_Missing, 
            Dry_Brittle_Hair, High_Cholestrol, Low_Blood_Pressure, Depression, Yellow_Skin, Throid_In_Family) 
            VALUES ('$MSA_Id','$tBed','$tCaffeine','$tGain','$tDifficulty','$tDry','$tMood','$tThinning','$tEyebrows',
            '$tDryHair','$tCholesterol','$tBP','$tDepression','$tSkin','$tFamily')";
                $ThyroidResult = mysqli_query($conn, $Thyroidquery);

                if ($ThyroidResult)
                    echo "Thyroid " . $ThyroidResult;
                else
                    echo "Thyroid Error " . mysqli_error($conn);

                //Stress Assessment
                $sClose = $_POST['sClose'];
                $sHappy = $_POST['sHappy'];
                $sExercise = $_POST['sExercise'];
                $sEat = $_POST['sEat'];
                $sCaffeine = $_POST['sCaffeine'];
                $sRecharge = $_POST['sRecharge'];
                $sMultivitamin = $_POST['sMultivitamin'];
                $sMoney = $_POST['sMoney'];
                $sSatisfaction = $_POST['sSatisfaction'];
                $sSleep = $_POST['sSleep'];
                $sAnxiety = $_POST['sAnxiety'];
                $sStressed = $_POST['sStressed'];
                $sAllergies = $_POST['sAllergies'];
                $sTrouble = $_POST['sTrouble'];
                $sExhausted = $_POST['sExhausted'];
                $sStressors = $_POST['sStressors'];
                $sCold = $_POST['sCold'];

                $Stressquery = "INSERT INTO m_stress_assessment(MSA_Id, Network, Happy, Exercise_Regularly, Eat_3_Meals, 
            Consume_Carbohydrates, Recharge, Multivitamins, Finance, Satisfaction, Uninterrupted_Sleep, Anxiety, Stress, Allergies,
            Trouble_Sleep, Exhausted, Life_Stressors, Cold) VALUES ('$MSA_Id','$sClose','$sHappy','$sExercise','$sEat','$sCaffeine','$sRecharge','$sMultivitamin',
            '$sMoney','$sSatisfaction','$sSleep','$sAnxiety','$sStressed','$sAllergies','$sTrouble','$sExhausted','$sStressors','$sCold')";
                $StressResult = mysqli_query($conn, $Stressquery);

                if ($StressResult)
                    echo "Stress " . $StressResult;
                else
                    echo "Stress Error " . mysqli_error($conn);


                //Hormone

                $hSleep = $_POST['hSleep'];
                $hMemory = $_POST['hMemory'];
                $hPuffiness = $_POST['hPuffiness'];
                $hAnxiety = $_POST['hAnxiety'];
                $hInsomnia = $_POST['hInsomnia'];
                $hAcne = $_POST['hAcne'];
                $hBrown = $_POST['hBrown'];
                $hExercise = $_POST['hExercise'];
                $hFatty = $_POST['hfatty'];
                $hSoft = $_POST['hSoft'];
                $hMuscle = $_POST['hMuscle'];
                $hStamina = $_POST['hStamina'];
                $hHeadache = $_POST['hHeadache'];
                $hProstate = $_POST['hProstate'];
                $hUrination = $_POST['hUrination'];
                $hFoggy = $_POST['hFoggy'];

                $Hormonequery = "INSERT INTO m_hormone_assessment(MSA_Id, Poor_Sleep, Memory_Problem, Puffiness, Anxiety, 
            Insomnia, Acne_Breakouts, Brown_Age_Spots, Inability_To_Exercise, Fatty_Breast, Soft_Erection, Loss_Of_Muscle, 
            Loss_Of_Stamina, Headaches, Enlarged_Prostate, Night_Urination, Foggy_Thinking) VALUES ('$MSA_Id','$hSleep',
            '$hMemory','$hPuffiness','$hAnxiety','$hInsomnia','$hAcne','$hBrown','$hExercise','$hFatty','$Soft','$hMuscle',
            '$hStamina','$hHeadache','$hProstate','$hUrination','$hFoggy')";
                $HormoneResult = mysqli_query($conn, $Hormonequery);

                if ($HormoneResult)
                    echo "Hormone " . $HormoneResult;
                else
                    echo "Hormone Error " . mysqli_error($conn);

                //Toxic Burden Assessment 1
                $tOrganic = $_POST['tOrganic'];
                $tFruits = $_POST['tFruits'];
                $tSalad = $_POST['tSalad'];
                $tFlaxseeds = $_POST['tFlaxseeds'];
                $tGreen = $_POST['tGreen'];
                $tOil = $_POST['tOil'];
                $tFresh = $_POST['tFresh'];
                $tCoffee = $_POST['tCoffee'];
                $tTobacco = $_POST['tTobacco'];
                $tAlcohol = $_POST['tAlcohol'];
                $tSoda = $_POST['tSoda'];
                $tDiet = $_POST['tDiet'];
                $tVegetable = $_POST['tVegetable'];
                $tFlavoured = $_POST['tFlavoured'];
                $tArtificial = $_POST['tArtificial'];
                $tMicrowave = $_POST['tMicrowave'];
                $tFast = $_POST['tFast'];
                $tProcessed = $_POST['tProcessed'];

                $Toxicquery1 = "INSERT INTO m_toxic_assessment_1(MSA_Id, Organic_pesticides_free, Fruits_Vegetables, Salads, 
            Flaxseeds, Green_juices, Virgin_Oils, Green_Herbs, Coffee, Tobacco, Alcohol, Soda, Diet_Food, Vegetable_Oil, 
            Food_Flavoured_MSG, Food_Colored, Food_Microwave, Fast_Food, Processed_Food) VALUES ('$MSA_Id','$tOrganic','$tFruits','$tSalad',
            '$tFlaxseeds','$tGreen','$tOil','$tFresh','$tCoffee','$tTobacco','$tAlcohol','$tsoda','$tDiet','$tVegetable','$tFlavoured','$tArtificial',
            '$tMicrowave','$tFast','$tProcessed')";
                $ToxicResult1 = mysqli_query($conn, $Toxicquery1);


                if ($ToxicResult1)
                    echo "Toxic1 " . $ToxicResult1;
                else
                    echo "Toxic1 Error " . mysqli_error($conn);

                //Toxic Burden Assessment 2
                $ttHormone = $_POST['ttHormone'];
                $ttProbiotic = $_POST['ttProbiotic'];
                $ttDigestive = $_POST['ttDigestive'];
                $ttPrescription = $_POST['ttPrescription'];
                $ttHealthy = $_POST['ttHealthy'];
                $ttClean = $_POST['ttClean'];

                $Toxicquery2 = "INSERT INTO m_toxic_assessment_2(MSA_Id, Hormones, Probiotic, Digestive_Enzymes, Prescription_drugs, 
            Healthy_Oil_Supplements, Pure_Supplements) VALUES ('$MSA_Id','$ttHormone','$ttProbiotic','$ttDigestive','$ttPrescription',
            '$ttHealthy','$ttClean')";
                $ToxicResult2 = mysqli_query($conn, $Toxicquery2);

                if ($ToxicResult2)
                    echo "Toxic 2 " . $ToxicResult2;
                else
                    echo "Toxic 2 Error " . mysqli_error($conn);

                //Toxic Burden Assessment 3
                $tttOvereat = $_POST['tttOvereat'];
                $tttChew = $_POST['tttChew'];
                $tttExperience = $_POST['tttExperience'];
                $tttSweat = $_POST['tttSweat'];
                $tttSit = $_POST['tttSit'];
                $tttPhone = $_POST['tttPhone'];
                $tttEnvironment = $_POST['tttEnvironment'];
                $tttPesticides = $_POST['tttPesticides'];
                $tttTravel = $_POST['tttTravel'];
                $tttComputer = $_POST['tttComputer'];
                $tttSmokes = $_POST['tttSmokes'];
                $tttCleaner = $_POST['tttCleaner'];
                $tttPlants = $_POST['tttPlants'];
                $tttFilter = $_POST['tttFilter'];
                $tttAir = $_POST['tttAir'];
                $tttDrink = $_POST['tttDrink'];

                $Toxicquery3 = "INSERT INTO m_toxic_assessment_3(MSA_Id, Overeat, Chew_Food, Lower_Bowel, Hard_Sweat, 
            Sit_Sauna, Cell_Phone, Environment, Use_Pesticides, Travel_By_Plane, Use_Computer, Live_Smoke, Use_Cleaners, 
            Green_Plants, Filter_Water, Air_Purifiers, Drink_Water) VALUES ('$MSA_Id','$tttOvereat','$tttChew','$tttExperience','$tttSweat','$tttSit',
            '$tttPhone','$tttEnvironment','$tttPesticides','$tttTravel','$tttComputer','$tttSmokes','$tttCleaner','$tttPlants','$tttFilter','$tttAir','$tttDrink')";
                $ToxicResult3 = mysqli_query($conn, $Toxicquery3);

                if ($ToxicResult3)
                    echo "Toxic3 " . $ToxicResult3;
                else
                    echo "Toxic3 Error " . mysqli_error($conn);


                //Consumption Assessment
                $Soda = $_POST['Soda'];
                $Brewed = $_POST['Brewed'];
                $Coffee = $_POST['Coffee'];
                $Chips = $_POST['Chips'];
                $Candy = $_POST['Candy'];
                $Gum = $_POST['Gum'];
                $Alcohol = $_POST['Alcohol'];
                $Cigarettes = $_POST['Cigarettes'];
                $Energy = $_POST['Energy'];
                $Protein = $_POST['Protein'];
                $Bagels = $_POST['Bagels'];
                $FastFood = $_POST['FastFood'];
                $IceCream = $_POST['IceCream'];
                $Kombucha = $_POST['Kombucha'];
                $Tea = $_POST['Tea'];
                $Drinks = $_POST['Drinks'];
                $Restaurant = $_POST['Restaurant'];

                $Consumptionquery = "INSERT INTO m_consumption_assessment(MSA_Id, Soda, Brewed_Coffee, Specialty_Coffee, Chips, Candy, 
            Gum, Alcoholic_Beverage, Cigarettes, Energy_Drinks, Protein_Bar, Bagels, Fast_Food, Ice_Cream, Kombucha, Tea, Other_Drinks, 
            Restaurant) VALUES ('$MSA_Id','$Soda','$Brewed','$Coffee','$Chips','$Candy','$Gum','$Alcohol','$Cigarettes','$Energy','$Protein','$Bagels',
            '$FastFood','$IceCream','$Kombucha','$Tea','$Drinks','$Restaurant')";
                $ConsumptionResult = mysqli_query($conn, $Consumptionquery);

                if ($ConsumptionResult)
                    echo "Consumption " . $ConsumptionResult;
                else
                    echo "Consumption Error " . mysqli_error($conn);

                if (($GeneralResult) and ($GeneralResult2) and ($ThyroidResult) and ($StressResult) and ($HormoneResult) and ($ToxicResult1) and ($ToxicResult2) and ($ToxicResult3) and ($ConsumptionResult)) {
                    echo "<script>document.location.href='FinalResult.php'</script>";
                }
            } 
        }
            else {
                echo "<script>alert('Already Addedd');</script>";
                echo "<script>document.location.href='FinalResult.php'</script>";
            }
        } else {
            echo mysqli_error($conn);
        }
}

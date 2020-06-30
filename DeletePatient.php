<?php
session_start();
if ($_SESSION['admin']) {
    include 'connection.php';
    $id = $_GET['id'];

    $patient = "Select * from patient where P_Id='$id'";
    $P_result = mysqli_query($conn, $patient);
    $P_row = mysqli_fetch_row($P_result);

    $query = "Select * from m_symptom_assessment where P_Id ='$id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) 
    {
        $row = mysqli_fetch_row($result);
        if ($P_row[3] == "Female") {
            $MSA_Id = $row[0];
            $G1Query = "Delete from f_general_assessment_1 where MSA_Id='$MSA_Id'";
            $G1Result = mysqli_query($conn, $G1Query);

            $G2Query = "Delete from f_general_assessment_2 where MSA_Id='$MSA_Id'";
            $G2Result = mysqli_query($conn, $G2Query);

            $ThQuery = "Delete from f_thyroid_assessment where MSA_Id='$MSA_Id'";
            $ThResult = mysqli_query($conn, $ThQuery);

            $StrQuery = "Delete from f_stress_assessment where MSA_Id='$MSA_Id'";
            $StrResult = mysqli_query($conn, $StrQuery);

            $HQuery = "Delete from f_hormone_assessment where MSA_Id='$MSA_Id'";
            $HResult = mysqli_query($conn, $HQuery);

            $T1Query = "Delete from f_toxic_assessment_1 where MSA_Id='$MSA_Id'";
            $T1Result = mysqli_query($conn, $T1Query);

            $T2Query = "Delete from f_toxic_assessment_2 where MSA_Id='$MSA_Id'";
            $T2Result = mysqli_query($conn, $T2Query);

            $T3Query = "Delete from f_toxic_assessment_3 where MSA_Id='$MSA_Id'";
            $T3Result = mysqli_query($conn, $T3Query);

            $CQuery = "Delete from f_consumption_assessment where MSA_Id='$MSA_Id'";
            $CResult = mysqli_query($conn, $CQuery);

            $MQuery="Delete from m_symptom_assessment where MSA_Id='$MSA_Id'";
            $MResult = mysqli_query($conn, $MQuery);

            $PQuery="Delete from patient where P_Id='$id'";
            $PResult = mysqli_query($conn, $PQuery);
            header('location:Patient.php');
            
        } else if ($P_row[3] == "Male") {
            $MSA_Id = $row[0];
            $G1Query = "Delete from m_general_assessment_1 where MSA_Id='$MSA_Id'";
            $G1Result = mysqli_query($conn, $G1Query);

            $G2Query = "Delete from m_general_assessment_2 where MSA_Id='$MSA_Id'";
            $G2Result = mysqli_query($conn, $G2Query);

            $ThQuery = "Delete from m_thyroid_assessment where MSA_Id='$MSA_Id'";
            $ThResult = mysqli_query($conn, $ThQuery);

            $StrQuery = "Delete from m_stress_assessment where MSA_Id='$MSA_Id'";
            $StrResult = mysqli_query($conn, $StrQuery);

            $HQuery = "Delete from m_hormone_assessment where MSA_Id='$MSA_Id'";
            $HResult = mysqli_query($conn, $HQuery);

            $T1Query = "Delete from m_toxic_assessment_1 where MSA_Id='$MSA_Id'";
            $T1Result = mysqli_query($conn, $T1Query);

            $T2Query = "Delete from m_toxic_assessment_2 where MSA_Id='$MSA_Id'";
            $T2Result = mysqli_query($conn, $T2Query);

            $T3Query = "Delete from m_toxic_assessment_3 where MSA_Id='$MSA_Id'";
            $T3Result = mysqli_query($conn, $T3Query);

            $CQuery = "Delete from m_consumption_assessment where MSA_Id='$MSA_Id'";
            $CResult = mysqli_query($conn, $CQuery);

            $MQuery="Delete from m_symptom_assessment where MSA_Id='$MSA_Id'";
            $MResult = mysqli_query($conn, $MQuery);

            $PQuery="Delete from patient where P_Id='$id'";
            $PResult = mysqli_query($conn, $PQuery);
            header('location:Patient.php');
        }
    } else {
            $PQuery="Delete from patient where P_Id='$id'";
            $PResult = mysqli_query($conn, $PQuery);
            header('location:Patient.php');
    }
}

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 04:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_Id` int(11) NOT NULL,
  `A_UserName` varchar(50) NOT NULL,
  `A_Email` varchar(50) NOT NULL,
  `A_Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_Id`, `A_UserName`, `A_Email`, `A_Password`) VALUES
(1, 'MGrego', 'MGrego@gmail.com', 'MGrego');

-- --------------------------------------------------------

--
-- Table structure for table `f_consumption_assessment`
--

CREATE TABLE `f_consumption_assessment` (
  `FCA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Soda` varchar(100) DEFAULT NULL,
  `Brewed_Coffee` varchar(100) DEFAULT NULL,
  `Specialty_Coffee` varchar(100) DEFAULT NULL,
  `Chips` varchar(100) DEFAULT NULL,
  `Candy` varchar(100) DEFAULT NULL,
  `Gum` varchar(100) DEFAULT NULL,
  `Alcoholic_Beverage` varchar(100) DEFAULT NULL,
  `Cigarettes` varchar(100) DEFAULT NULL,
  `Energy_Drinks` varchar(100) DEFAULT NULL,
  `Protein_Bar` varchar(100) DEFAULT NULL,
  `Bagels` varchar(100) DEFAULT NULL,
  `Fast_Food` varchar(100) DEFAULT NULL,
  `Ice_Cream` varchar(100) DEFAULT NULL,
  `Kombucha` varchar(100) DEFAULT NULL,
  `Tea` varchar(100) DEFAULT NULL,
  `Other_Drinks` varchar(100) DEFAULT NULL,
  `Restaurant` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_consumption_assessment`
--

INSERT INTO `f_consumption_assessment` (`FCA_Id`, `MSA_Id`, `Soda`, `Brewed_Coffee`, `Specialty_Coffee`, `Chips`, `Candy`, `Gum`, `Alcoholic_Beverage`, `Cigarettes`, `Energy_Drinks`, `Protein_Bar`, `Bagels`, `Fast_Food`, `Ice_Cream`, `Kombucha`, `Tea`, `Other_Drinks`, `Restaurant`) VALUES
(11, 33, '1', '2', '', '4', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 34, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 35, '2', '2', '3', '7', '10', '3', '0', '0', '0', '2', '2', '5', '6', '', '12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_general_assessment_1`
--

CREATE TABLE `f_general_assessment_1` (
  `FGA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Tried` varchar(100) DEFAULT NULL,
  `Lifestyle` varchar(100) DEFAULT NULL,
  `Abdominal` varchar(100) DEFAULT NULL,
  `Sugar` varchar(100) DEFAULT NULL,
  `Bread` varchar(100) DEFAULT NULL,
  `Constipation` varchar(100) DEFAULT NULL,
  `Irritability` varchar(100) DEFAULT NULL,
  `Brain_Fog` varchar(100) DEFAULT NULL,
  `Feeling_Faint` varchar(100) DEFAULT NULL,
  `Muscles` varchar(100) DEFAULT NULL,
  `Itching` varchar(100) DEFAULT NULL,
  `Sexual` varchar(100) DEFAULT NULL,
  `White_Thrush` varchar(100) DEFAULT NULL,
  `Athelete_Foot` varchar(100) DEFAULT NULL,
  `FingerNail` varchar(100) DEFAULT NULL,
  `Sensitivity` varchar(100) DEFAULT NULL,
  `Weight_Gain` varchar(100) DEFAULT NULL,
  `Think_Weight` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_general_assessment_1`
--

INSERT INTO `f_general_assessment_1` (`FGA_Id`, `MSA_Id`, `Tried`, `Lifestyle`, `Abdominal`, `Sugar`, `Bread`, `Constipation`, `Irritability`, `Brain_Fog`, `Feeling_Faint`, `Muscles`, `Itching`, `Sexual`, `White_Thrush`, `Athelete_Foot`, `FingerNail`, `Sensitivity`, `Weight_Gain`, `Think_Weight`) VALUES
(15, 33, 'Never', 'Rearly', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 34, 'Never', 'Often', 'Rearly', 'Sometimes', 'Often', 'Often', 'Sometimes', 'Rearly', 'Never', '', 'Rearly', 'Rearly', '', 'Rearly', 'Often', 'Never', '', ''),
(17, 35, 'Never', 'Rearly', 'Sometimes', 'Rearly', 'Never', '', 'Rearly', 'Sometimes', 'Often', 'Sometimes', 'Rearly', 'Rearly', 'Sometimes', 'Sometimes', '', 'Sometimes', 'Rearly', 'Often');

-- --------------------------------------------------------

--
-- Table structure for table `f_general_assessment_2`
--

CREATE TABLE `f_general_assessment_2` (
  `FGA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Antibiotics` varchar(100) DEFAULT NULL,
  `BirthControl` varchar(100) DEFAULT NULL,
  `Steriod_Drugs` varchar(100) DEFAULT NULL,
  `Synthetic_Hormones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_general_assessment_2`
--

INSERT INTO `f_general_assessment_2` (`FGA_Id`, `MSA_Id`, `Antibiotics`, `BirthControl`, `Steriod_Drugs`, `Synthetic_Hormones`) VALUES
(10, 33, '', '', '', ''),
(11, 34, '', 'Rearly', '', 'Sometimes'),
(12, 35, 'Rearly', 'Sometimes', 'Never', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_hormone_assessment`
--

CREATE TABLE `f_hormone_assessment` (
  `MHA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Vaginal_Dryness` varchar(100) DEFAULT NULL,
  `Mood_Swings` varchar(100) DEFAULT NULL,
  `Sagging_Skin` varchar(100) DEFAULT NULL,
  `Poor_Sleep` varchar(100) DEFAULT NULL,
  `Memory_Problem` varchar(100) DEFAULT NULL,
  `Night_Sweats` varchar(100) DEFAULT NULL,
  `Hot_Flashes` varchar(100) DEFAULT NULL,
  `Painful_Intercourse` varchar(100) DEFAULT NULL,
  `Bladder_Infections` varchar(100) DEFAULT NULL,
  `Low_Blood_Sugar` varchar(100) DEFAULT NULL,
  `Migraine` varchar(100) DEFAULT NULL,
  `Heavy_Blood_Flow` varchar(100) DEFAULT NULL,
  `Puffiness` varchar(100) DEFAULT NULL,
  `Anxiety` varchar(100) DEFAULT NULL,
  `Insomnia` varchar(100) DEFAULT NULL,
  `Infertility` varchar(100) DEFAULT NULL,
  `Miscarriages` varchar(100) DEFAULT NULL,
  `PMS_Symptoms` varchar(100) DEFAULT NULL,
  `Painful_Lumpy_Breasts` varchar(100) DEFAULT NULL,
  `Endometriosis` varchar(100) DEFAULT NULL,
  `Osteoporosis` varchar(100) DEFAULT NULL,
  `Water_Retention` varchar(100) DEFAULT NULL,
  `Facial_Hair` varchar(100) DEFAULT NULL,
  `Acne_Breakouts` varchar(100) DEFAULT NULL,
  `Painful_Ovaries` varchar(100) DEFAULT NULL,
  `Brown_Age_Spots` varchar(100) DEFAULT NULL,
  `Inability_To_Exercise` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_hormone_assessment`
--

INSERT INTO `f_hormone_assessment` (`MHA_Id`, `MSA_Id`, `Vaginal_Dryness`, `Mood_Swings`, `Sagging_Skin`, `Poor_Sleep`, `Memory_Problem`, `Night_Sweats`, `Hot_Flashes`, `Painful_Intercourse`, `Bladder_Infections`, `Low_Blood_Sugar`, `Migraine`, `Heavy_Blood_Flow`, `Puffiness`, `Anxiety`, `Insomnia`, `Infertility`, `Miscarriages`, `PMS_Symptoms`, `Painful_Lumpy_Breasts`, `Endometriosis`, `Osteoporosis`, `Water_Retention`, `Facial_Hair`, `Acne_Breakouts`, `Painful_Ovaries`, `Brown_Age_Spots`, `Inability_To_Exercise`) VALUES
(15, 33, 'Rearly', '', '', 'Sometimes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 34, 'Never', 'Often', '', 'Sometimes', '', '', 'Rearly', '', 'Sometimes', '', '', 'Often', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 35, 'Rearly', 'Often', 'Sometimes', 'Sometimes', 'Sometimes', 'Sometimes', 'Rearly', 'Never', 'Rearly', 'Sometimes', 'Often', 'Sometimes', '', 'Rearly', 'Rearly', 'Never', 'Often', 'Often', '', 'Sometimes', 'Sometimes', 'Rearly', 'Sometimes', 'Sometimes', 'Rearly', 'Sometimes', 'Often');

-- --------------------------------------------------------

--
-- Table structure for table `f_stress_assessment`
--

CREATE TABLE `f_stress_assessment` (
  `FSTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Network` varchar(100) DEFAULT NULL,
  `Happy` varchar(100) DEFAULT NULL,
  `Exercise_Regularly` varchar(100) DEFAULT NULL,
  `Eat_3_Meals` varchar(100) DEFAULT NULL,
  `Consume_Carbohydrates` varchar(100) NOT NULL,
  `Recharge` varchar(100) NOT NULL,
  `Multivitamins` varchar(100) NOT NULL,
  `Finance` varchar(100) NOT NULL,
  `Satisfaction` varchar(100) NOT NULL,
  `Uninterrupted_Sleep` varchar(100) NOT NULL,
  `Anxiety` varchar(100) NOT NULL,
  `Stress` varchar(100) NOT NULL,
  `Allergies` varchar(100) NOT NULL,
  `Trouble_Sleep` varchar(100) NOT NULL,
  `Exhausted` varchar(100) NOT NULL,
  `Life_Stressors` varchar(100) NOT NULL,
  `Cold` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_stress_assessment`
--

INSERT INTO `f_stress_assessment` (`FSTA_Id`, `MSA_Id`, `Network`, `Happy`, `Exercise_Regularly`, `Eat_3_Meals`, `Consume_Carbohydrates`, `Recharge`, `Multivitamins`, `Finance`, `Satisfaction`, `Uninterrupted_Sleep`, `Anxiety`, `Stress`, `Allergies`, `Trouble_Sleep`, `Exhausted`, `Life_Stressors`, `Cold`) VALUES
(15, 33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Rearly', 'Sometimes'),
(16, 34, '', 'Never', '', '', '', 'Sometimes', '', '', '', '', 'Never', '', '', '', '', '', ''),
(17, 35, 'Often', 'Often', 'Rearly', 'Sometimes', 'Sometimes', 'Sometimes', 'Rearly', 'Sometimes', 'Sometimes', 'Often', 'Often', 'Rearly', 'Never', 'Never', 'Never', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_thyroid_assessment`
--

CREATE TABLE `f_thyroid_assessment` (
  `FTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Bed` varchar(100) DEFAULT NULL,
  `Caffeine` varchar(100) DEFAULT NULL,
  `Get_Weight` varchar(100) DEFAULT NULL,
  `Losing_Weight` varchar(100) DEFAULT NULL,
  `Dry_Skin` varchar(100) DEFAULT NULL,
  `Irregular_menstrual_cycles` varchar(100) DEFAULT NULL,
  `Mood_Swings` varchar(100) DEFAULT NULL,
  `Thinning_Hair` varchar(100) DEFAULT NULL,
  `Eyebrows_Missing` varchar(100) DEFAULT NULL,
  `Dry_Brittle_Hair` varchar(100) DEFAULT NULL,
  `High_Cholestrol` varchar(100) DEFAULT NULL,
  `Low_Blood_Pressure` varchar(100) DEFAULT NULL,
  `Depression` varchar(100) DEFAULT NULL,
  `Yellow_Skin` varchar(100) DEFAULT NULL,
  `Throid_In_Family` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_thyroid_assessment`
--

INSERT INTO `f_thyroid_assessment` (`FTA_Id`, `MSA_Id`, `Bed`, `Caffeine`, `Get_Weight`, `Losing_Weight`, `Dry_Skin`, `Irregular_menstrual_cycles`, `Mood_Swings`, `Thinning_Hair`, `Eyebrows_Missing`, `Dry_Brittle_Hair`, `High_Cholestrol`, `Low_Blood_Pressure`, `Depression`, `Yellow_Skin`, `Throid_In_Family`) VALUES
(15, 33, '', '', '', '', '', '', '', '', '', '', '', 'Sometimes', 'Rearly', 'Often', ''),
(16, 34, 'Rearly', 'Often', 'Sometimes', 'Rearly', 'Sometimes', 'Often', 'Never', 'Rearly', 'Sometimes', 'Rearly', '', '', 'Sometimes', '', 'No'),
(17, 35, 'Never', 'Rearly', 'Sometimes', 'Often', 'Sometimes', 'Rearly', 'Rearly', 'Sometimes', 'Sometimes', 'Sometimes', 'Rearly', '', 'Rearly', 'Rearly', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `f_toxic_assessment_1`
--

CREATE TABLE `f_toxic_assessment_1` (
  `FTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Organic_pesticides_free` varchar(100) DEFAULT NULL,
  `Fruits_Vegetables` varchar(100) DEFAULT NULL,
  `Salads` varchar(100) DEFAULT NULL,
  `Flaxseeds` varchar(100) DEFAULT NULL,
  `Green_juices` varchar(100) DEFAULT NULL,
  `Virgin_Oils` varchar(100) DEFAULT NULL,
  `Green_Herbs` varchar(100) DEFAULT NULL,
  `Coffee` varchar(100) DEFAULT NULL,
  `Tobacco` varchar(100) DEFAULT NULL,
  `Alcohol` varchar(100) DEFAULT NULL,
  `Soda` varchar(100) DEFAULT NULL,
  `Diet_Food` varchar(100) DEFAULT NULL,
  `Vegetable_Oil` varchar(100) DEFAULT NULL,
  `Food_Flavoured_MSG` varchar(100) DEFAULT NULL,
  `Food_Colored` varchar(100) DEFAULT NULL,
  `Food_Microwave` varchar(100) DEFAULT NULL,
  `Fast_Food` varchar(100) DEFAULT NULL,
  `Processed_Food` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_toxic_assessment_1`
--

INSERT INTO `f_toxic_assessment_1` (`FTA_Id`, `MSA_Id`, `Organic_pesticides_free`, `Fruits_Vegetables`, `Salads`, `Flaxseeds`, `Green_juices`, `Virgin_Oils`, `Green_Herbs`, `Coffee`, `Tobacco`, `Alcohol`, `Soda`, `Diet_Food`, `Vegetable_Oil`, `Food_Flavoured_MSG`, `Food_Colored`, `Food_Microwave`, `Fast_Food`, `Processed_Food`) VALUES
(15, 33, '', '', '', '', '', '', '', '', '', 'Sometimes', '', '', '', '', '', '', '', ''),
(16, 34, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 35, 'Never', 'Rearly', 'Sometimes', 'Often', 'Sometimes', 'Sometimes', 'Sometimes', 'Rearly', 'Rearly', 'Rearly', '', '', '', '', '', 'Rearly', 'Often', 'Sometimes');

-- --------------------------------------------------------

--
-- Table structure for table `f_toxic_assessment_2`
--

CREATE TABLE `f_toxic_assessment_2` (
  `FTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Hormones` varchar(100) DEFAULT NULL,
  `Probiotic` varchar(100) DEFAULT NULL,
  `Digestive_Enzymes` varchar(100) DEFAULT NULL,
  `Prescription_drugs` varchar(100) DEFAULT NULL,
  `Healthy_Oil_Supplements` varchar(100) DEFAULT NULL,
  `Pure_Supplements` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_toxic_assessment_2`
--

INSERT INTO `f_toxic_assessment_2` (`FTA_Id`, `MSA_Id`, `Hormones`, `Probiotic`, `Digestive_Enzymes`, `Prescription_drugs`, `Healthy_Oil_Supplements`, `Pure_Supplements`) VALUES
(15, 33, '', '', '', '', '', ''),
(16, 34, '', '', '', '', '', ''),
(17, 35, 'Never', 'Rearly', 'Sometimes', 'Often', '', 'Rearly');

-- --------------------------------------------------------

--
-- Table structure for table `f_toxic_assessment_3`
--

CREATE TABLE `f_toxic_assessment_3` (
  `FTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Overeat` varchar(100) DEFAULT NULL,
  `Chew_Food` varchar(100) DEFAULT NULL,
  `Lower_Bowel` varchar(100) DEFAULT NULL,
  `Hard_Sweat` varchar(100) DEFAULT NULL,
  `Sit_Sauna` varchar(100) DEFAULT NULL,
  `Cell_Phone` varchar(100) DEFAULT NULL,
  `Environment` varchar(100) DEFAULT NULL,
  `Use_Pesticides` varchar(100) DEFAULT NULL,
  `Travel_By_Plane` varchar(100) DEFAULT NULL,
  `Use_Computer` varchar(100) DEFAULT NULL,
  `Live_Smoke` varchar(100) DEFAULT NULL,
  `Use_Cleaners` varchar(100) DEFAULT NULL,
  `Green_Plants` varchar(100) DEFAULT NULL,
  `Filter_Water` varchar(100) DEFAULT NULL,
  `Air_Purifiers` varchar(100) DEFAULT NULL,
  `Drink_Water` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_toxic_assessment_3`
--

INSERT INTO `f_toxic_assessment_3` (`FTA_Id`, `MSA_Id`, `Overeat`, `Chew_Food`, `Lower_Bowel`, `Hard_Sweat`, `Sit_Sauna`, `Cell_Phone`, `Environment`, `Use_Pesticides`, `Travel_By_Plane`, `Use_Computer`, `Live_Smoke`, `Use_Cleaners`, `Green_Plants`, `Filter_Water`, `Air_Purifiers`, `Drink_Water`) VALUES
(11, 33, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 34, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 35, 'Sometimes', 'Rearly', 'Rearly', 'Rearly', 'Never', 'Sometimes', 'Sometimes', 'Often', 'Often', 'Often', 'Sometimes', 'Rearly', 'Rearly', 'Never', 'Rearly', 'Sometimes');

-- --------------------------------------------------------

--
-- Table structure for table `m_consumption_assessment`
--

CREATE TABLE `m_consumption_assessment` (
  `MCA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Soda` varchar(100) DEFAULT NULL,
  `Brewed_Coffee` varchar(100) DEFAULT NULL,
  `Specialty_Coffee` varchar(100) DEFAULT NULL,
  `Chips` varchar(100) DEFAULT NULL,
  `Candy` varchar(100) DEFAULT NULL,
  `Gum` varchar(100) DEFAULT NULL,
  `Alcoholic_Beverage` varchar(100) DEFAULT NULL,
  `Cigarettes` varchar(100) DEFAULT NULL,
  `Energy_Drinks` varchar(100) DEFAULT NULL,
  `Protein_Bar` varchar(100) DEFAULT NULL,
  `Bagels` varchar(100) DEFAULT NULL,
  `Fast_Food` varchar(100) DEFAULT NULL,
  `Ice_Cream` varchar(100) DEFAULT NULL,
  `Kombucha` varchar(100) DEFAULT NULL,
  `Tea` varchar(100) DEFAULT NULL,
  `Other_Drinks` varchar(100) DEFAULT NULL,
  `Restaurant` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_consumption_assessment`
--

INSERT INTO `m_consumption_assessment` (`MCA_Id`, `MSA_Id`, `Soda`, `Brewed_Coffee`, `Specialty_Coffee`, `Chips`, `Candy`, `Gum`, `Alcoholic_Beverage`, `Cigarettes`, `Energy_Drinks`, `Protein_Bar`, `Bagels`, `Fast_Food`, `Ice_Cream`, `Kombucha`, `Tea`, `Other_Drinks`, `Restaurant`) VALUES
(4, 32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_general_assessment_1`
--

CREATE TABLE `m_general_assessment_1` (
  `MGA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Tried` varchar(100) DEFAULT NULL,
  `Lifestyle` varchar(100) DEFAULT NULL,
  `Abdominal` varchar(100) DEFAULT NULL,
  `Sugar` varchar(100) DEFAULT NULL,
  `Bread` varchar(100) DEFAULT NULL,
  `Constipation` varchar(100) DEFAULT NULL,
  `Irritability` varchar(100) DEFAULT NULL,
  `Brain_Fog` varchar(100) DEFAULT NULL,
  `Feeling_Faint` varchar(100) DEFAULT NULL,
  `Muscles` varchar(100) DEFAULT NULL,
  `Itching` varchar(100) DEFAULT NULL,
  `Sexual` varchar(100) DEFAULT NULL,
  `White_Thrush` varchar(100) DEFAULT NULL,
  `Athelete_Foot` varchar(100) DEFAULT NULL,
  `FingerNail` varchar(100) DEFAULT NULL,
  `Sensitivity` varchar(100) DEFAULT NULL,
  `Weight_Gain` varchar(100) DEFAULT NULL,
  `Think_Weight` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_general_assessment_1`
--

INSERT INTO `m_general_assessment_1` (`MGA_Id`, `MSA_Id`, `Tried`, `Lifestyle`, `Abdominal`, `Sugar`, `Bread`, `Constipation`, `Irritability`, `Brain_Fog`, `Feeling_Faint`, `Muscles`, `Itching`, `Sexual`, `White_Thrush`, `Athelete_Foot`, `FingerNail`, `Sensitivity`, `Weight_Gain`, `Think_Weight`) VALUES
(4, 32, 'Never', 'Sometimes', 'Sometimes', 'Rearly', 'Often', '', 'Never', 'Often', '', '', '', 'Never', '', 'Rearly', '', 'Sometimes', 'Never', 'Sometimes');

-- --------------------------------------------------------

--
-- Table structure for table `m_general_assessment_2`
--

CREATE TABLE `m_general_assessment_2` (
  `MGA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Antibiotics` varchar(100) DEFAULT NULL,
  `Tetosterone` varchar(100) DEFAULT NULL,
  `Steriod_Drugs` varchar(100) DEFAULT NULL,
  `Synthetic_Hormones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_general_assessment_2`
--

INSERT INTO `m_general_assessment_2` (`MGA_Id`, `MSA_Id`, `Antibiotics`, `Tetosterone`, `Steriod_Drugs`, `Synthetic_Hormones`) VALUES
(2, 32, 'Never', '', 'Sometimes', 'Often');

-- --------------------------------------------------------

--
-- Table structure for table `m_hormone_assessment`
--

CREATE TABLE `m_hormone_assessment` (
  `MHA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Poor_Sleep` varchar(100) DEFAULT NULL,
  `Memory_Problem` varchar(100) DEFAULT NULL,
  `Puffiness` varchar(100) DEFAULT NULL,
  `Anxiety` varchar(100) DEFAULT NULL,
  `Insomnia` varchar(100) DEFAULT NULL,
  `Acne_Breakouts` varchar(100) DEFAULT NULL,
  `Brown_Age_Spots` varchar(100) DEFAULT NULL,
  `Inability_To_Exercise` varchar(100) DEFAULT NULL,
  `Fatty_Breast` varchar(100) DEFAULT NULL,
  `Soft_Erection` varchar(100) DEFAULT NULL,
  `Loss_Of_Muscle` varchar(100) DEFAULT NULL,
  `Loss_Of_Stamina` varchar(100) DEFAULT NULL,
  `Headaches` varchar(100) DEFAULT NULL,
  `Enlarged_Prostate` varchar(100) DEFAULT NULL,
  `Night_Urination` varchar(100) DEFAULT NULL,
  `Foggy_Thinking` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_hormone_assessment`
--

INSERT INTO `m_hormone_assessment` (`MHA_Id`, `MSA_Id`, `Poor_Sleep`, `Memory_Problem`, `Puffiness`, `Anxiety`, `Insomnia`, `Acne_Breakouts`, `Brown_Age_Spots`, `Inability_To_Exercise`, `Fatty_Breast`, `Soft_Erection`, `Loss_Of_Muscle`, `Loss_Of_Stamina`, `Headaches`, `Enlarged_Prostate`, `Night_Urination`, `Foggy_Thinking`) VALUES
(3, 32, 'Never', '', 'Sometimes', 'Rearly', 'Sometimes', 'Often', 'Often', 'Rearly', 'Never', '', 'Sometimes', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_stress_assessment`
--

CREATE TABLE `m_stress_assessment` (
  `MSTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Network` varchar(100) DEFAULT NULL,
  `Happy` varchar(100) DEFAULT NULL,
  `Exercise_Regularly` varchar(100) DEFAULT NULL,
  `Eat_3_Meals` varchar(100) DEFAULT NULL,
  `Consume_Carbohydrates` varchar(100) NOT NULL,
  `Recharge` varchar(100) NOT NULL,
  `Multivitamins` varchar(100) NOT NULL,
  `Finance` varchar(100) NOT NULL,
  `Satisfaction` varchar(100) NOT NULL,
  `Uninterrupted_Sleep` varchar(100) NOT NULL,
  `Anxiety` varchar(100) NOT NULL,
  `Stress` varchar(100) NOT NULL,
  `Allergies` varchar(100) NOT NULL,
  `Trouble_Sleep` varchar(100) NOT NULL,
  `Exhausted` varchar(100) NOT NULL,
  `Life_Stressors` varchar(100) NOT NULL,
  `Cold` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_stress_assessment`
--

INSERT INTO `m_stress_assessment` (`MSTA_Id`, `MSA_Id`, `Network`, `Happy`, `Exercise_Regularly`, `Eat_3_Meals`, `Consume_Carbohydrates`, `Recharge`, `Multivitamins`, `Finance`, `Satisfaction`, `Uninterrupted_Sleep`, `Anxiety`, `Stress`, `Allergies`, `Trouble_Sleep`, `Exhausted`, `Life_Stressors`, `Cold`) VALUES
(4, 33, 'Never', '', 'Rearly', '', 'Never', 'Sometimes', 'Often', '', 'Sometimes', 'Rearly', 'Sometimes', 'Rearly', 'Sometimes', 'Often', 'Often', 'Rearly', 'Never');

-- --------------------------------------------------------

--
-- Table structure for table `m_symptom_assessment`
--

CREATE TABLE `m_symptom_assessment` (
  `MSA_Id` int(11) NOT NULL,
  `P_Id` int(11) NOT NULL,
  `MSA_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_symptom_assessment`
--

INSERT INTO `m_symptom_assessment` (`MSA_Id`, `P_Id`, `MSA_Date`) VALUES
(32, 2, '2020-06-21'),
(33, 1, '2020-06-21'),
(34, 4, '2020-06-21'),
(35, 6, '2020-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `m_thyroid_assessment`
--

CREATE TABLE `m_thyroid_assessment` (
  `MTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Bed` varchar(100) DEFAULT NULL,
  `Caffeine` varchar(100) DEFAULT NULL,
  `Get_Weight` varchar(100) DEFAULT NULL,
  `Losing_Weight` varchar(100) DEFAULT NULL,
  `Dry_Skin` varchar(100) DEFAULT NULL,
  `Mood_Swings` varchar(100) DEFAULT NULL,
  `Thinning_Hair` varchar(100) DEFAULT NULL,
  `Eyebrows_Missing` varchar(100) DEFAULT NULL,
  `Dry_Brittle_Hair` varchar(100) DEFAULT NULL,
  `High_Cholestrol` varchar(100) DEFAULT NULL,
  `Low_Blood_Pressure` varchar(100) DEFAULT NULL,
  `Depression` varchar(100) DEFAULT NULL,
  `Yellow_Skin` varchar(100) DEFAULT NULL,
  `Throid_In_Family` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_thyroid_assessment`
--

INSERT INTO `m_thyroid_assessment` (`MTA_Id`, `MSA_Id`, `Bed`, `Caffeine`, `Get_Weight`, `Losing_Weight`, `Dry_Skin`, `Mood_Swings`, `Thinning_Hair`, `Eyebrows_Missing`, `Dry_Brittle_Hair`, `High_Cholestrol`, `Low_Blood_Pressure`, `Depression`, `Yellow_Skin`, `Throid_In_Family`) VALUES
(4, 32, 'Rearly', '', 'Sometimes', 'Rearly', 'Never', 'Sometimes', 'Rearly', 'Often', 'Sometimes', 'Rearly', 'Never', 'Sometimes', 'Rearly', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `m_toxic_assessment_1`
--

CREATE TABLE `m_toxic_assessment_1` (
  `MTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Organic_pesticides_free` varchar(100) DEFAULT NULL,
  `Fruits_Vegetables` varchar(100) DEFAULT NULL,
  `Salads` varchar(100) DEFAULT NULL,
  `Flaxseeds` varchar(100) DEFAULT NULL,
  `Green_juices` varchar(100) DEFAULT NULL,
  `Virgin_Oils` varchar(100) DEFAULT NULL,
  `Green_Herbs` varchar(100) DEFAULT NULL,
  `Coffee` varchar(100) DEFAULT NULL,
  `Tobacco` varchar(100) DEFAULT NULL,
  `Alcohol` varchar(100) DEFAULT NULL,
  `Soda` varchar(100) DEFAULT NULL,
  `Diet_Food` varchar(100) DEFAULT NULL,
  `Vegetable_Oil` varchar(100) DEFAULT NULL,
  `Food_Flavoured_MSG` varchar(100) DEFAULT NULL,
  `Food_Colored` varchar(100) DEFAULT NULL,
  `Food_Microwave` varchar(100) DEFAULT NULL,
  `Fast_Food` varchar(100) DEFAULT NULL,
  `Processed_Food` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_toxic_assessment_1`
--

INSERT INTO `m_toxic_assessment_1` (`MTA_Id`, `MSA_Id`, `Organic_pesticides_free`, `Fruits_Vegetables`, `Salads`, `Flaxseeds`, `Green_juices`, `Virgin_Oils`, `Green_Herbs`, `Coffee`, `Tobacco`, `Alcohol`, `Soda`, `Diet_Food`, `Vegetable_Oil`, `Food_Flavoured_MSG`, `Food_Colored`, `Food_Microwave`, `Fast_Food`, `Processed_Food`) VALUES
(4, 32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_toxic_assessment_2`
--

CREATE TABLE `m_toxic_assessment_2` (
  `MTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Hormones` varchar(100) DEFAULT NULL,
  `Probiotic` varchar(100) DEFAULT NULL,
  `Digestive_Enzymes` varchar(100) DEFAULT NULL,
  `Prescription_drugs` varchar(100) DEFAULT NULL,
  `Healthy_Oil_Supplements` varchar(100) DEFAULT NULL,
  `Pure_Supplements` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_toxic_assessment_2`
--

INSERT INTO `m_toxic_assessment_2` (`MTA_Id`, `MSA_Id`, `Hormones`, `Probiotic`, `Digestive_Enzymes`, `Prescription_drugs`, `Healthy_Oil_Supplements`, `Pure_Supplements`) VALUES
(4, 32, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `m_toxic_assessment_3`
--

CREATE TABLE `m_toxic_assessment_3` (
  `MTA_Id` int(11) NOT NULL,
  `MSA_Id` int(11) NOT NULL,
  `Overeat` varchar(100) DEFAULT NULL,
  `Chew_Food` varchar(100) DEFAULT NULL,
  `Lower_Bowel` varchar(100) DEFAULT NULL,
  `Hard_Sweat` varchar(100) DEFAULT NULL,
  `Sit_Sauna` varchar(100) DEFAULT NULL,
  `Cell_Phone` varchar(100) DEFAULT NULL,
  `Environment` varchar(100) DEFAULT NULL,
  `Use_Pesticides` varchar(100) DEFAULT NULL,
  `Travel_By_Plane` varchar(100) DEFAULT NULL,
  `Use_Computer` varchar(100) DEFAULT NULL,
  `Live_Smoke` varchar(100) DEFAULT NULL,
  `Use_Cleaners` varchar(100) DEFAULT NULL,
  `Green_Plants` varchar(100) DEFAULT NULL,
  `Filter_Water` varchar(100) DEFAULT NULL,
  `Air_Purifiers` varchar(100) DEFAULT NULL,
  `Drink_Water` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_toxic_assessment_3`
--

INSERT INTO `m_toxic_assessment_3` (`MTA_Id`, `MSA_Id`, `Overeat`, `Chew_Food`, `Lower_Bowel`, `Hard_Sweat`, `Sit_Sauna`, `Cell_Phone`, `Environment`, `Use_Pesticides`, `Travel_By_Plane`, `Use_Computer`, `Live_Smoke`, `Use_Cleaners`, `Green_Plants`, `Filter_Water`, `Air_Purifiers`, `Drink_Water`) VALUES
(4, 32, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_Id` int(11) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_BirthDate` date DEFAULT NULL,
  `P_Gender` varchar(25) DEFAULT NULL,
  `P_Email` varchar(255) DEFAULT NULL,
  `P_Password` varchar(20) NOT NULL,
  `P_Contact` varchar(20) DEFAULT NULL,
  `P_Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_Id`, `P_Name`, `P_BirthDate`, `P_Gender`, `P_Email`, `P_Password`, `P_Contact`, `P_Address`) VALUES
(1, 'Sara', '1996-10-10', 'Female', 'sara@gmail.com', '123', '03212112121', 'Karachi'),
(2, 'Haris', '2020-06-18', 'Male', '', '123', '', ''),
(3, 'Usman', '0000-00-00', 'Male', 'usman@gmail.com', 'usman', '', ''),
(4, 'Komal', '2020-06-16', 'Female', 'komal@gmail.com', 'komal', '03212112121', 'Karachi'),
(5, 'abc', '2005-06-20', 'Male', 'abc@gmail.com', '123', '03212112121', 'Karachi'),
(6, 'abc', '2005-06-20', 'Female', 'abc@gmail.com', '456', '03212112121', 'Karachi'),
(7, 'jamal', '0000-00-00', 'Male', 'jamal@gmail.com', '123', '', ''),
(8, 'jamal', '2020-06-20', 'Male', 'jamal@gmail.com', '456', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Pro_Id` int(11) NOT NULL,
  `Pro_Name` varchar(100) NOT NULL,
  `Pro_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Pro_Id`, `Pro_Name`, `Pro_Price`) VALUES
(1, 'Can of Soda', 1.19),
(2, 'Cup of Brewed Coffee', 2.1),
(3, 'Cup of Specialty Coffee', 4.75),
(4, 'Handful of Chips', 1.69),
(5, 'Bar of Candy', 1.84),
(6, 'Pack of Gum', 2.24),
(7, 'Glass of Alcoholic Beverage', 6.95),
(8, 'Single of Cigarettes', 0.45),
(9, 'Can of Energy Drinks', 2.49),
(10, 'Bar of Protein Bars', 1.99),
(11, 'One of Bagels / Muffins / Donuts / Twinkies', 2.95),
(12, 'Meal of Fast Food', 8),
(13, 'Scoop of Ice Cream', 2.79),
(14, '16 Oz of Kombucha', 3.5),
(15, 'Cup of Tea', 2.5),
(16, 'Bottle of Other Drinks', 2),
(17, 'Meal of Restaurant', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `f_consumption_assessment`
--
ALTER TABLE `f_consumption_assessment`
  ADD PRIMARY KEY (`FCA_Id`),
  ADD KEY `fk_MSA` (`MSA_Id`);

--
-- Indexes for table `f_general_assessment_1`
--
ALTER TABLE `f_general_assessment_1`
  ADD PRIMARY KEY (`FGA_Id`),
  ADD KEY `fk_GMSA` (`MSA_Id`);

--
-- Indexes for table `f_general_assessment_2`
--
ALTER TABLE `f_general_assessment_2`
  ADD PRIMARY KEY (`FGA_Id`),
  ADD KEY `fk_GGMSA` (`MSA_Id`);

--
-- Indexes for table `f_hormone_assessment`
--
ALTER TABLE `f_hormone_assessment`
  ADD PRIMARY KEY (`MHA_Id`),
  ADD KEY `fk_HMSA` (`MSA_Id`);

--
-- Indexes for table `f_stress_assessment`
--
ALTER TABLE `f_stress_assessment`
  ADD PRIMARY KEY (`FSTA_Id`),
  ADD KEY `fk_SA` (`MSA_Id`);

--
-- Indexes for table `f_thyroid_assessment`
--
ALTER TABLE `f_thyroid_assessment`
  ADD PRIMARY KEY (`FTA_Id`),
  ADD KEY `fk_TMSA` (`MSA_Id`);

--
-- Indexes for table `f_toxic_assessment_1`
--
ALTER TABLE `f_toxic_assessment_1`
  ADD PRIMARY KEY (`FTA_Id`),
  ADD KEY `fk_XMSA` (`MSA_Id`);

--
-- Indexes for table `f_toxic_assessment_2`
--
ALTER TABLE `f_toxic_assessment_2`
  ADD PRIMARY KEY (`FTA_Id`),
  ADD KEY `fk_XXMSA` (`MSA_Id`);

--
-- Indexes for table `f_toxic_assessment_3`
--
ALTER TABLE `f_toxic_assessment_3`
  ADD PRIMARY KEY (`FTA_Id`),
  ADD KEY `fk_XXXMSA` (`MSA_Id`);

--
-- Indexes for table `m_consumption_assessment`
--
ALTER TABLE `m_consumption_assessment`
  ADD PRIMARY KEY (`MCA_Id`),
  ADD KEY `fk_MSA` (`MSA_Id`);

--
-- Indexes for table `m_general_assessment_1`
--
ALTER TABLE `m_general_assessment_1`
  ADD PRIMARY KEY (`MGA_Id`),
  ADD KEY `fk_GMSA` (`MSA_Id`);

--
-- Indexes for table `m_general_assessment_2`
--
ALTER TABLE `m_general_assessment_2`
  ADD PRIMARY KEY (`MGA_Id`),
  ADD KEY `fk_GGMSA` (`MSA_Id`);

--
-- Indexes for table `m_hormone_assessment`
--
ALTER TABLE `m_hormone_assessment`
  ADD PRIMARY KEY (`MHA_Id`),
  ADD KEY `fk_HMSA` (`MSA_Id`);

--
-- Indexes for table `m_stress_assessment`
--
ALTER TABLE `m_stress_assessment`
  ADD PRIMARY KEY (`MSTA_Id`),
  ADD KEY `fk_SA` (`MSA_Id`);

--
-- Indexes for table `m_symptom_assessment`
--
ALTER TABLE `m_symptom_assessment`
  ADD PRIMARY KEY (`MSA_Id`),
  ADD KEY `fk_Patient` (`P_Id`);

--
-- Indexes for table `m_thyroid_assessment`
--
ALTER TABLE `m_thyroid_assessment`
  ADD PRIMARY KEY (`MTA_Id`),
  ADD KEY `fk_TMSA` (`MSA_Id`);

--
-- Indexes for table `m_toxic_assessment_1`
--
ALTER TABLE `m_toxic_assessment_1`
  ADD PRIMARY KEY (`MTA_Id`),
  ADD KEY `fk_XMSA` (`MSA_Id`);

--
-- Indexes for table `m_toxic_assessment_2`
--
ALTER TABLE `m_toxic_assessment_2`
  ADD PRIMARY KEY (`MTA_Id`),
  ADD KEY `fk_XXMSA` (`MSA_Id`);

--
-- Indexes for table `m_toxic_assessment_3`
--
ALTER TABLE `m_toxic_assessment_3`
  ADD PRIMARY KEY (`MTA_Id`),
  ADD KEY `fk_XXXMSA` (`MSA_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Pro_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `f_consumption_assessment`
--
ALTER TABLE `f_consumption_assessment`
  MODIFY `FCA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `f_general_assessment_1`
--
ALTER TABLE `f_general_assessment_1`
  MODIFY `FGA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_general_assessment_2`
--
ALTER TABLE `f_general_assessment_2`
  MODIFY `FGA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `f_hormone_assessment`
--
ALTER TABLE `f_hormone_assessment`
  MODIFY `MHA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_stress_assessment`
--
ALTER TABLE `f_stress_assessment`
  MODIFY `FSTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_thyroid_assessment`
--
ALTER TABLE `f_thyroid_assessment`
  MODIFY `FTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_toxic_assessment_1`
--
ALTER TABLE `f_toxic_assessment_1`
  MODIFY `FTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_toxic_assessment_2`
--
ALTER TABLE `f_toxic_assessment_2`
  MODIFY `FTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `f_toxic_assessment_3`
--
ALTER TABLE `f_toxic_assessment_3`
  MODIFY `FTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_consumption_assessment`
--
ALTER TABLE `m_consumption_assessment`
  MODIFY `MCA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_general_assessment_1`
--
ALTER TABLE `m_general_assessment_1`
  MODIFY `MGA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_general_assessment_2`
--
ALTER TABLE `m_general_assessment_2`
  MODIFY `MGA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_hormone_assessment`
--
ALTER TABLE `m_hormone_assessment`
  MODIFY `MHA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_stress_assessment`
--
ALTER TABLE `m_stress_assessment`
  MODIFY `MSTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_symptom_assessment`
--
ALTER TABLE `m_symptom_assessment`
  MODIFY `MSA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `m_thyroid_assessment`
--
ALTER TABLE `m_thyroid_assessment`
  MODIFY `MTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_toxic_assessment_1`
--
ALTER TABLE `m_toxic_assessment_1`
  MODIFY `MTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_toxic_assessment_2`
--
ALTER TABLE `m_toxic_assessment_2`
  MODIFY `MTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_toxic_assessment_3`
--
ALTER TABLE `m_toxic_assessment_3`
  MODIFY `MTA_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `P_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_consumption_assessment`
--
ALTER TABLE `m_consumption_assessment`
  ADD CONSTRAINT `fk_MSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_general_assessment_1`
--
ALTER TABLE `m_general_assessment_1`
  ADD CONSTRAINT `fk_GMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_general_assessment_2`
--
ALTER TABLE `m_general_assessment_2`
  ADD CONSTRAINT `fk_GGMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_hormone_assessment`
--
ALTER TABLE `m_hormone_assessment`
  ADD CONSTRAINT `fk_HMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_stress_assessment`
--
ALTER TABLE `m_stress_assessment`
  ADD CONSTRAINT `fk_SA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_symptom_assessment`
--
ALTER TABLE `m_symptom_assessment`
  ADD CONSTRAINT `fk_Patient` FOREIGN KEY (`P_Id`) REFERENCES `patient` (`P_Id`);

--
-- Constraints for table `m_thyroid_assessment`
--
ALTER TABLE `m_thyroid_assessment`
  ADD CONSTRAINT `fk_TMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_toxic_assessment_1`
--
ALTER TABLE `m_toxic_assessment_1`
  ADD CONSTRAINT `fk_XMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_toxic_assessment_2`
--
ALTER TABLE `m_toxic_assessment_2`
  ADD CONSTRAINT `fk_XXMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);

--
-- Constraints for table `m_toxic_assessment_3`
--
ALTER TABLE `m_toxic_assessment_3`
  ADD CONSTRAINT `fk_XXXMSA` FOREIGN KEY (`MSA_Id`) REFERENCES `m_symptom_assessment` (`MSA_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

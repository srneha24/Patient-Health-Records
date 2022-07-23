<?php

require_once("Database.php");

if (isset($_GET["id"])) {
    session_start();

    $id = $_GET['id'];

    $query = "SELECT rec_id, rec_date FROM records WHERE ptn_id='$id' ORDER BY rec_date DESC";
    $result = mysqli_query($dbCon, $query);
    $_SESSION["resultCount"] = mysqli_num_rows($result);

    if ($_SESSION["resultCount"] > 0) {
        $rec_id = array();
        $rec_date = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $rec_id[] = $row["rec_id"];
            $rec_date[] = date_format(date_create($row["rec_date"]),"d M Y");;
        }

        $_SESSION["rec_id"] = $rec_id;
        $_SESSION["rec_date"] = $rec_date;
    }

    if (isset($_GET['delete'])) {
        header('Location: ' . BASE . "?page=record&&delete=" . $_GET['delete']);
    }
    else {
        header('Location: ' . BASE . "?page=record");
    }
}

if (isset($_GET['record_no'])) {
    $record_no = $_GET['record_no'];

    $query = "SELECT * FROM records WHERE rec_id='$record_no'";
    $result = mysqli_query($dbCon, $query);
    $resultCount = mysqli_num_rows($result);
    $record = mysqli_fetch_object($result);
    
    $_SESSION['record'] = $record;
}

$bmiRes = array();

function calculateBMI($weight, $height) {
    global $bmiRes;

    $heightMetre = $height * 0.3048;
    $bmi = $weight / pow($heightMetre, 2);

    $category = "";

    if ($bmi < 18.5) {
        $category = "Underweight";
    }
    elseif ($bmi >= 18.5 && $bmi < 25) {
        $category = "Normal";
    }
    elseif ($bmi >= 25 && $bmi < 30) {
        $category = "Overweight";
    }
    elseif ($bmi >= 30 && $bmi < 35) {
        $category = "Class I Obesity";
    }
    elseif ($bmi >= 35 && $bmi < 40) {
        $category = "Class II Obesity";
    }
    elseif ($bmi >= 40) {
        $category = "Class III Obesity";
    }

    $bmiRes["bmi"] = number_format($bmi,2);
    $bmiRes["category"] = $category;
}

function pulseCategory($pulse) {
    if ($pulse <= 48) {
        return "Extremely Low";
    }
    elseif ($pulse >= 49 && $pulse <= 55) {
        return "Low";
    }
    elseif ($pulse >= 56 && $pulse <= 73) {
        return "Normal";
    }
    elseif ($pulse >= 74) {
        return "High";
    }
}

function tempCategory($temp) {
    if ($temp < 96) {
        return "Hypothermia";
    }
    elseif ($temp >= 96  && $temp <= 98.4) {
        return "Normal";
    }
    else {
         return "Fever";
    }
}

function bloodPressureCategory($top, $bottom) {
    if ($top < 120 && $bottom < 80) {
        return "Normal";
    }
    elseif (($top < 120 && ($bottom >= 80 && $bottom <= 89))
            || ($bottom < 80 && ($top >= 120 && $top <= 139))
            || (($bottom >= 80 && $bottom <= 89) && ($top >= 120 && $top <= 139))) {

        return "High BP Hypertension Stage-1";
    }
    elseif (($top < 120 && $bottom > 90)
            || ($bottom < 80 && $top > 140)
            || ($top > 140 && $bottom > 90)) {

        return "High BP Hypertension Stage-2";
    }
}

?>
<?php

require_once("Database.php");

if (isset($_POST["new-submit"]) == "new-record") {
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $heart_rate = $_POST["heart_rate"];
    $pulse_rate = $_POST["pulse_rate"];
    $temperature = $_POST["temperature"];
    $blood_group = $_POST["blood_group"];
    $sugar_level = $_POST["sugar_level"];
    $blood_pressure_top = $_POST["blood_pressure_top"];
    $blood_pressure_bottom = $_POST["blood_pressure_bottom"];

    $rec_date = date("Y-m-d");
    $rec_id = newRecID();

    if (isset($_POST["patientCheck"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $dob = date_format(date_create($_POST['dob']),"Y-m-d");
        $gender = $_POST["gender"];
        $address = $_POST["address"];

        if ($address == null) {
            $address = "";
        }

        $ptn_id = newPtnID();

        $query = "INSERT INTO `patient`(`ptn_id`, `name`, `dob`, `phone`, `gender`, `address`) VALUES ('$ptn_id','$name','$dob','$phone','$gender','$address')";
        $result = @mysqli_query($dbCon,$query) or die("Error in Insertion: ".mysqli_error($dbCon));

        if ($result) {
            $values = "$rec_id, '$ptn_id', '$rec_date', $height, $weight, $heart_rate, $pulse_rate, $temperature, '$blood_group', $sugar_level, $blood_pressure_top, $blood_pressure_bottom";
            $query = "INSERT INTO `records`(`rec_id`, `ptn_id`, `rec_date`, `height`, `weight`, `heart_rate`, `pulse_rate`, `temperature`, `blood_group`, `sugar_level`, `blood_pressure_top`, `blood_pressure_bottom`) VALUES ($values)";
            $result = @mysqli_query($dbCon,$query) or die("Error in Insertion: ".mysqli_error($dbCon));

            if ($result) {
                $_SESSION['msg'] = "Data Insertion Successful";
            }
            else {
                $_SESSION['msg'] = "Failed To Insert Data";
            }

            header("Refresh:0; url=". BASE . "?insert=$result");
        }
        else {
            $_SESSION['msg'] = "Failed To Insert Data";
            header("Refresh:0; url=". BASE . "?insert=$result");
        }

    }
    else {
        $ptn_id = $_POST['patient-list'];
        
        $values = "$rec_id, '$ptn_id', '$rec_date', $height, $weight, $heart_rate, $pulse_rate, $temperature, '$blood_group', $sugar_level, $blood_pressure_top, $blood_pressure_bottom";
        $query = "INSERT INTO `records`(`rec_id`, `ptn_id`, `rec_date`, `height`, `weight`, `heart_rate`, `pulse_rate`, `temperature`, `blood_group`, `sugar_level`, `blood_pressure_top`, `blood_pressure_bottom`) VALUES ($values)";
        $result = @mysqli_query($dbCon,$query) or die("Error in Insertion: ".mysqli_error($dbCon));

        if ($result) {
            $_SESSION['msg'] = "Data Insertion Successful";
        }
        else {
            $_SESSION['msg'] = "Failed To Insert Data";
        }

        header("Refresh:0; url=". BASE . "?insert=$result");
    }
}

function newRecID() {
    global $dbCon;

    $query = "SELECT MAX(rec_id) FROM records";
    $result = mysqli_query($dbCon, $query);
    $resultCount = mysqli_num_rows($result);

    if ($resultCount == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $max = $row['MAX(rec_id)'];
        }

        return $max + 1;
    }
    else {
        return 1;
    }
}

function newPtnID() {
    global $dbCon;

    $query = "SELECT MAX(ptn_id) FROM patient";
    $result = mysqli_query($dbCon, $query);
    $resultCount = mysqli_num_rows($result);

    if ($resultCount == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $max = (int) $row['MAX(ptn_id)'];
        }

        return strval($max + 1);
    }
    else {
        return strval(1001);
    }
}

?>
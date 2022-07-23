<?php

require_once("Database.php");

if (isset($_POST["record-update-submit"]) == "record-update") {
    $rec_id = $_POST["rec_id"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $heart_rate = $_POST["heart_rate"];
    $pulse_rate = $_POST["pulse_rate"];
    $temperature = $_POST["temperature"];
    $blood_group = $_POST["blood_group"];
    $sugar_level = $_POST["sugar_level"];
    $blood_pressure_top = $_POST["blood_pressure_top"];
    $blood_pressure_bottom = $_POST["blood_pressure_bottom"];

    $query = "UPDATE `records` SET `height`= $height,`weight`= $weight,`heart_rate`= $heart_rate,`pulse_rate`=$pulse_rate,`temperature`= $temperature,`blood_group`= '$blood_group',`sugar_level`= $sugar_level,`blood_pressure_top`= $blood_pressure_top,`blood_pressure_bottom`= $blood_pressure_bottom WHERE rec_id = $rec_id";
    $result = @mysqli_query($dbCon, $query) or die("Error in Update: ".mysqli_error($dbCon));

    if ($result) {
        $_SESSION['msg'] = "Record Updated";
    }
    else {
        $_SESSION['msg'] = "Record Updated";
    }

    header("Refresh:0; url=". BASE . "?page=record&&record_no=$rec_id&&update=$result");
}

if (isset($_POST["record-delete-submit"]) == "record-delete") {
    $rec_id = $_POST["rec_id"];

    $query = "DELETE FROM `records` WHERE rec_id=$rec_id";
    $result = @mysqli_query($dbCon, $query) or die("Error in Delete: ".mysqli_error($dbCon));

    if ($result) {
        $_SESSION['msg'] = "Record Deleted";
    }
    else {
        $_SESSION['msg'] = "Record Deleted";
    }

    header('Location: ./includes/actions/Patient Records.Action.php?id=' . $_SESSION['ptnInfo']->ptn_id . '&&delete=$result');
}

?>
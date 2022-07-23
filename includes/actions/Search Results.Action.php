<?php

require_once("Database.php");

if (isset($_POST["search-submit"]) == "search") {
    session_start();

    $nameSearch = $_POST["nameSearch"];

    $query = "SELECT name FROM patient WHERE name LIKE '%$nameSearch%'";
    $result = mysqli_query($dbCon, $query);
    $_SESSION["resultCount"] = mysqli_num_rows($result);

    if ($_SESSION["resultCount"] > 0) {
        $names = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $names[] = $row["name"];
        }

        $_SESSION["names"] = $names;
    }

    header('Location: ' . BASE . "?page=search");
}

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $query = "SELECT * FROM patient WHERE name='$name'";
    $result = mysqli_query($dbCon, $query);
    $resultCount = mysqli_num_rows($result);
    $ptnInfo = mysqli_fetch_object($result);
    
    $_SESSION['ptnInfo'] = $ptnInfo;
}

if (isset($_POST["update-ptn-submit"]) == "update-ptn") {
    $ptn_id = $_POST["ptn_id"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $dob = date_format(date_create($_POST['dob']),"Y-m-d");
    $gender = $_POST["gender"];
    $address = $_POST["address"];

    $query = "UPDATE `patient` SET `name`='$name',`dob`='$dob',`phone`='$phone',`gender`='$gender',`address`='$address' WHERE ptn_id='$id'";
    $result = @mysqli_query($dbCon, $query) or die("Error in Update: ".mysqli_error($dbCon));

    if ($result) {
        $_SESSION['msg'] = "Patient Info Updated";
    }
    else {
        $_SESSION['msg'] = "Patient Info Updated";
    }

    header("Refresh:0; url=". BASE . "?page=search&&name=$name&&update=$result");
}

?>
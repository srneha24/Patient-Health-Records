<?php

require_once("Database.php");

if (isset($_POST["search-submit"]) == "search" || isset($_POST["ptn-search-submit"]) == "ptn-search") {
    session_start();

    $nameSearch = $_POST["nameSearch"];

    $query = "SELECT name, ptn_id FROM patient WHERE name LIKE '%$nameSearch%'";
    $result = mysqli_query($dbCon, $query);
    $resultCount = mysqli_num_rows($result);

    if (isset($_POST["search-submit"])) {
        $_SESSION["resultCount"] = $resultCount;
    }
    else {
        $_SESSION["resultCountNew"] = $resultCount;
    }

    if ($resultCount > 0) {
        $names = array();
        $ptn_id = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $names[] = $row["name"];
            $ptn_id[] = $row["ptn_id"];
        }

        $_SESSION["names"] = $names;
        $_SESSION["ptn_id"] = $ptn_id;
    }

    if (isset($_POST["search-submit"])) {
        header('Location: ' . BASE . "?page=search");
    }
    else {
        header("Refresh:0; url=". BASE . "?page=new&&search=true");
    }
}

if (isset($_GET['ptn_id'])) {
    $ptn_id = $_GET['ptn_id'];

    $query = "SELECT * FROM patient WHERE ptn_id='$ptn_id'";
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

    if ($address == null) {
        $address = "";
    }

    $query = "UPDATE `patient` SET `name`='$name',`dob`='$dob',`phone`='$phone',`gender`='$gender',`address`='$address' WHERE ptn_id='$ptn_id'";
    $result = @mysqli_query($dbCon, $query) or die("Error in Update: ".mysqli_error($dbCon));

    if ($result) {
        $_SESSION['msg'] = "Patient Info Updated";
    }
    else {
        $_SESSION['msg'] = "Patient Info Not Updated";
    }

    header("Refresh:0; url=". BASE . "?page=search&&ptn_id=$ptn_id&&update=$result");
}

?>
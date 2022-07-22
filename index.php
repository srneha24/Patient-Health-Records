<!DOCTYPE html>

<html>

<head>

    <title> Patient Health Records </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body class="sys-colour-1">
    <?php
    
    require_once "includes/layouts/Navigation Bar.php";

    @$page = $_GET["page"];

    if (!isset($_GET["page"]) || $page === "") {
        require_once "includes/dynamics/Homepage.php";
    }

    elseif ($page === "about") {
        require_once "includes/layouts/Page Title.php";
        require_once "includes/dynamics/About.php";
    }

    elseif ($page === "new") {
        require_once "includes/layouts/Page Title.php";
        require_once "includes/dynamics/New Records.php";
    }

    elseif ($page === "search") {
        require_once "includes/layouts/Page Title.php";
        require_once "includes/dynamics/Search Results.php";
    }

    elseif ($page === "record") {
        require_once "includes/layouts/Page Title.php";
        require_once "includes/dynamics/Patient Records.php";
    }
    
    ?>
</body>
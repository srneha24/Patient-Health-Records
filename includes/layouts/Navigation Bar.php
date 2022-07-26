<?php

    session_start();

?>

<link rel="stylesheet" href="./style/Navigation Bar.css">

<nav class="navbar navbar-expand navbar-dark fixed-top">
    <div class="container">
        <div class="navbar-header mt-2 pt-5">
            <img id="logo-img" class="navbar-brand rounded-circle" src="./image/System/Logo.png" alt="Patient Health Records">
        </div>

        <div class="d-flex justify-content-center">
            <div class="nav navbar-nav">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href=".">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="?page=about">About</a></li>
                </ul>
            </div>
        </div>

        <ul class="nav navbar-nav navbar-right">                    
            <li class="nav-item">
                <a class="nav-link" href="?page=new" data-toggle="tooltip" data-placement="bottom" title="New Record">
                    <span class="material-icons">add_card</span>
                    New Record
                </a>
            </li>
        </ul>
    </div>
</nav>
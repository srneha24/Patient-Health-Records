<?php

require_once("./includes/actions/Patient Records.Action.php");

?>

<link rel="stylesheet" href="./style/Patient Records.css">

<div class="container text-white">
    <div class="row">
        <div class="col-3">
            <p class="title-header sys-colour-2 sub-title-font">Record List</p>
            <hr>

            <div class="box-dsgn">
                <?php
                    if (isset($_SESSION["resultCount"]) && $_SESSION["resultCount"] > 0) {
                ?>
                        <ul>
                <?php
                            for($i=0; $i<$_SESSION["resultCount"]; $i++) {                        
                ?>                            
                                <li><a href="?page=record&&record_no=<?php echo $_SESSION['rec_id'][$i];?>"><?php echo $_SESSION['rec_date'][$i];?></a></li>
                <?php
                        }
                ?>
                        </ul>
                <?php
                    }

                    elseif (isset($_SESSION["resultCount"]) && $_SESSION["resultCount"] <= 0) {
                        echo "<i>No Results Found</i>";
                    }
                ?>
            </div>
        </div>

        <div class="col-1 reduce-margin"></div>
        
        <div class="col-8">
            <p class="title-header sys-colour-2 sub-title-font">Record</p>
            <hr>

            <div class="row box-dsgn mb-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <b>Patient Name:</b>&nbsp;<i><?php echo $_SESSION['ptnInfo']->name; ?></i>
                        </div>
                        <div class="col-4">
                            <b>Age:</b>&nbsp;
                            <i>
                                <?php 
                                    $age = date_diff(date_create($_SESSION['ptnInfo']->dob), date_create(date("Y-m-d")));
                                    echo $age->format('%y');
                                ?>
                                years
                            </i>
                        </div>
                        <div class="col-4">
                            <b>Gender:</b>&nbsp;
                            <i>
                                <?php 
                                    if ($_SESSION['ptnInfo']->gender == 'F') {
                                        echo "Female";
                                    }
                                    else {
                                        echo "Male";
                                    }
                                ?>
                            </i>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <b>Phone Number:</b>&nbsp;<i><?php echo $_SESSION['ptnInfo']->phone; ?></i>
                        </div>
                        <div class="col-6">
                            <b>Address:</b>&nbsp;<i><?php echo $_SESSION['ptnInfo']->address; ?></i>
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                if (isset($_GET['delete'])) {
            ?>
                    <br>

                    <div class="row d-flex justify-content-center">
                        <div class="col-6 font-weight-bold font-italic text-success">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                    </div>
            <?php
                }
            ?>

            <?php 
                if(isset($_GET['record_no'])) {
            ?>
                    <div class="row box-dsgn mb-3">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <b>Date:</b>&nbsp;<?php echo date_format(date_create($record->rec_date),"d M Y"); ?>
                                </div>

                                <div class="col-4 font-italic">
                                    <a class="sys-colour-1 link" href="#">Download Record</a>
                                </div>

                                <div class="col-4 font-italic" style="float: right;">
                                    <a class="sys-colour-1 link" href="?page=recordUpdate">Update/Delete Record</a>
                                </div>
                            </div>

                            <?php 
                                if (isset($_GET['update'])) {
                            ?>
                                    <br>

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 font-weight-bold font-italic text-success">
                                            <?php echo $_SESSION['msg']; ?>
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>

                            <br><br>

                            <div class="row">
                                <div class="col-6">
                                    <b>Blood Group:</b>&nbsp;<?php echo $record->blood_group; ?>
                                </div>
                                <div class="col-6">
                                    <b>Height:</b>&nbsp;<?php echo $record->height; ?> <i>feet</i>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-4">
                                    <b>Weight:</b>&nbsp;<?php echo $record->weight; ?> <i>kg</i>
                                </div>
                                <div class="col-4">
                                    <b>BMI:</b>&nbsp;
                                    <?php
                                        calculateBMI($record->weight, $record->height);
                                        echo $bmiRes["bmi"];
                                    ?>
                                    <i>kg/m<sup>2</sup></i>
                                </div>
                                <div class="col-4 text-danger">
                                    <b>Category:</b>&nbsp;<i><?php echo $bmiRes["category"]; ?></i>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-4">
                                    <b>Heart Rate:</b>&nbsp;<?php echo $record->heart_rate; ?> <i>bpm</i>
                                </div>
                                <div class="col-4">
                                    <b>Pulse Rate:</b>&nbsp;<?php echo $record->pulse_rate; ?> <i>bpm</i>
                                </div>
                                <div class="col-4 text-danger">
                                    <b>Category:</b>&nbsp;<i><?php echo pulseCategory($record->pulse_rate); ?></i>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <b>Temparature:</b>&nbsp;<?php echo $record->temperature; ?> <i>℉</i>
                                </div>
                                <div class="col-6 text-danger">
                                    <b>Category:</b>&nbsp;<i><?php echo tempCategory($record->temperature); ?></i>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-12">
                                    <b>Sugar Level:</b>&nbsp;<?php echo $record->sugar_level; ?> <i>mg/dL</i>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-6">
                                    <b>Blood Pressure:</b>&nbsp;<?php echo $record->blood_pressure_top; ?> / <?php echo $record->blood_pressure_bottom; ?> <i>mmHg</i>
                                </div>
                                <div class="col-6 text-danger">
                                    <b>Category:</b>&nbsp;<i><?php echo bloodPressureCategory($record->blood_pressure_top, $record->blood_pressure_bottom); ?></i>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
            <?php        
                }
            ?>
        </div>
    </div>
</div>
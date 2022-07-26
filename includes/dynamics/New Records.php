<?php

require_once("./includes/actions/New Records.Action.php");

$init = 0;

?>

<link rel="stylesheet" href="./style/New Records.css">
<script type = "text/javascript" src = "./scripts/New Records.js"> </script>

<form id="search-patient-form" role="form" action="./includes/actions/Search Results.Action.php" method="post"> </form>

<div class="container rounded text-white box-dsgn mb-3">
    <form id="new-record" role="form" action="" method="post">
        <div class="row">
            <div class="col-4">
                <p class="title-header sys-colour-1 sub-title-font">Patient Information</p>

                <div class="form-group row">
                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="patientCheck" name="patientCheck" onclick="ShowHideDiv(this)">
                            <label class="custom-control-label" for="patientCheck">New Patient</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Name</label>
                    <div class="col-9">
                        <input type="text" class="form-control" id="nameSearch" name="nameSearch" form="search-patient-form" required>
                        <input type="text" class="form-control" id="name" name="name" form="new-record">
                    </div>
                </div>

                <div id="search-patient">
                    <div class="form-group row" id="ptn-search-submit">
                        <button class="btn sys-colour-1 text-white" type="submit" form="search-patient-form" name="ptn-search-submit" value="ptn-search">
                            Search Patient
                        </button>
                    </div>

                    <?php
                        if (isset($_GET['search']) == 'true') {
                            if (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] > 0) {
                    ?>
                                <div class="form-group" id="patient-search-result">
                                    <label class="row col-form-label font-weight-bold">Patient Results</label>
                                    <div class="row">
                                        <select name="patient-list" id="patient-list" class="custom-select" <?php if (isset($_GET['search'])) { echo "required"; } ?>>
                    <?php
                                    for($i=0; $i<$_SESSION["resultCountNew"]; $i++) {                        
                        ?>                            
                                            <option value="<?php echo $_SESSION['ptn_id'][$i];?>"><?php echo $_SESSION['names'][$i];?></option>
                    <?php
                                }
                    ?>
                                        </select>
                                    </div>
                                </div>
                    <?php
                                $init = 1;

                            }

                            elseif (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0) {
                                echo "<div class='row' id='no-res'><i>No Results Found</i></div>";

                                $init = 0;
                            }
                        }
                        else {
                            unset($_SESSION["resultCountNew"]);

                            $init = 0;
                        }
                    ?>
                </div>

                <div id="new-patient">
                    <br><br><br>
                    
                    <div class="form-group row">
                        <label class="col-3 col-form-label font-weight-bold">Date of Birth</label>
                        <div class="col-9">
                            <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label font-weight-bold">Gender</label>
                        <div class="col-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="gender1" name="gender" value="F">
                                <label class="custom-control-label" for="gender1">Female</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="gender2" name="gender" value="M">
                                <label class="custom-control-label" for="gender2">Male</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label font-weight-bold">Phone Number</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{11}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label font-weight-bold">Address</label>
                        <div class="col-9">
                            <textarea name="address" cols = "30" rows = "2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-1 reduce-margin"></div>

            <div class="col-7">
                <p class="title-header sys-colour-1 sub-title-font">Patient Record</p>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Height</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="height" id="height" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>feet</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Weight</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="weight" id="weight" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>kg</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Heart Rate</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="heart_rate" id="heart_rate" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>bpm</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Pulse Rate</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="pulse_rate" id="pulse_rate" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>bpm</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Temparature</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="temperature" id="temparature" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>℉</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Blood Group</label>
                    <div class="col-9">
                        <div class="row">
                            <select name="blood_group" id="blood_group" class="custom-select" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Sugar Level</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-11">
                                <input type="number" step="0.01" class="form-control" name="sugar_level" id="sugar_level" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>mM</i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label font-weight-bold">Blood Pressure</label>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-5">
                                <input type="number" step="0.01" class="form-control" name="blood_pressure_top" id="blood_pressure_top" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>
                            <div class="col-1 reduce-margin d-flex justify-content-center">/</div>
                            <div class="col-5">
                                <input type="number" step="0.01" class="form-control" name="blood_pressure_bottom" id="blood_pressure_bottom" required <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                            </div>

                            <div class="col-1">
                                <i>mmHg</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row" style="float: right;">
            <button class="btn sys-colour-1 text-white" type="submit" form="new-record" name="new-submit" id="new-submit" value="new-record" <?php if ($init == 0 || (isset($_SESSION["resultCountNew"]) && $_SESSION["resultCountNew"] <= 0)) { echo "disabled"; } ?>>
                Save Record
            </button>
        </div>

        <br>
    </form>
</div>
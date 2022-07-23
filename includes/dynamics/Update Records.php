<?php

require_once("./includes/actions/Update Records.Action.php");

?>

<div class="container text-white">
    <form role="form" action="" method="post">
        <div class="box-dsgn mb-3">
            <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Height</label>
                <div class="col-9">
                    <div class="row">
                        <div class="col-11">
                            <input type="number" step="0.01" class="form-control" name="height" value="<?php echo $_SESSION['record']->height; ?>" required>
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
                            <input type="number" step="0.01" class="form-control" name="weight" value="<?php echo $_SESSION['record']->weight; ?>" required>
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
                            <input type="number" step="0.01" class="form-control" name="heart_rate" value="<?php echo $_SESSION['record']->heart_rate; ?>" required>
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
                            <input type="number" step="0.01" class="form-control" name="pulse_rate" value="<?php echo $_SESSION['record']->pulse_rate; ?>" required>
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
                            <input type="number" step="0.01" class="form-control" name="temperature" value="<?php echo $_SESSION['record']->temperature; ?>" required>
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
                        <select name="blood_group" class="custom-select">
                            <option value="A+" <?php if($_SESSION['record']->blood_group == 'A+') { echo "selected"; } ?>>A+</option>
                            <option value="A-" <?php if($_SESSION['record']->blood_group == 'A-') { echo "selected"; } ?>>A-</option>
                            <option value="B+" <?php if($_SESSION['record']->blood_group == 'B+') { echo "selected"; } ?>>B+</option>
                            <option value="B-" <?php if($_SESSION['record']->blood_group == 'B-') { echo "selected"; } ?>>B-</option>
                            <option value="AB+" <?php if($_SESSION['record']->blood_group == 'AB+') { echo "selected"; } ?>>AB+</option>
                            <option value="AB-" <?php if($_SESSION['record']->blood_group == 'AB-') { echo "selected"; } ?>>AB-</option>
                            <option value="O+" <?php if($_SESSION['record']->blood_group == 'O+') { echo "selected"; } ?>>O+</option>
                            <option value="O-" <?php if($_SESSION['record']->blood_group == 'O-') { echo "selected"; } ?>>O-</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Sugar Level</label>
                <div class="col-9">
                    <div class="row">
                        <div class="col-11">
                            <input type="number" step="0.01" class="form-control" name="sugar_level" value="<?php echo $_SESSION['record']->sugar_level; ?>" required>
                        </div>

                        <div class="col-1">
                            <i>mg/dL</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Blood Pressure</label>
                <div class="col-9">
                    <div class="row">
                        <div class="col-5">
                            <input type="number" step="0.01" class="form-control" name="blood_pressure_top" value="<?php echo $_SESSION['record']->blood_pressure_top; ?>" required>
                        </div>
                        <div class="col-1 reduce-margin d-flex justify-content-center">/</div>
                        <div class="col-5">
                            <input type="number" step="0.01" class="form-control" name="blood_pressure_bottom" value="<?php echo $_SESSION['record']->blood_pressure_bottom; ?>" required>
                        </div>

                        <div class="col-1">
                            <i>mmHg</i>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <input type="hidden" name="rec_id" value="<?php echo $_SESSION['record']->rec_id; ?>">

            <div class="form-group row" style="float: right;">
                <button class="btn sys-colour-1 text-white ml-5" type="submit" name="record-update-submit" value="record-update">
                    Update Record
                </button>

                <span class="ml-2 mr-2"></span>

                <button class="btn sys-colour-1 text-white mr-5" type="submit" name="record-delete-submit" value="record-delete" onclick="return confirm('Are you sure?');">
                    Delete Record
                </button>
                
            </div>

            <br>
        </div>
    </form>
</div>
<link rel="stylesheet" href="./style/Patient Records.css">
<script type = "text/javascript" src = "./scripts/Patient Records.js"> </script>

<div class="container-fluid text-white">
    <div class="row">
        <div class="col-3">
            <p class="title-header sys-colour-2 sub-title-font">Record List</p>
            <hr>

            <div class="box-dsgn">
                <ul onclick="ShowHideDiv()">
                    <li><a href="#">Record 1</a></li>
                    <li><a href="#">Record 2</a></li>
                </ul>
            </div>
        </div>

        <div class="col-1 reduce-margin"></div>
        
        <div class="col-8">
            <p class="title-header sys-colour-2 sub-title-font">Record</p>
            <hr>

            <div id="record">
                <form role="form" action="." method="post">
                    <div class="box-dsgn mb-3">
                        <div class="row font-italic">
                            <a href="#">Download Record</a>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label class="col-3 col-form-label font-weight-bold">Height</label>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="number" step="0.01" class="form-control" name="height" required>
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
                                        <input type="number" step="0.01" class="form-control" name="weight" required>
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
                                        <input type="number" step="0.01" class="form-control" name="heart_rate" required>
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
                                        <input type="number" step="0.01" class="form-control" name="pulse_rate" required>
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
                                        <input type="number" step="0.01" class="form-control" name="temp" required>
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
                                    <select name="blood" class="custom-select">
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
                                        <input type="number" step="0.01" class="form-control" name="sugar" required>
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
                                        <input type="number" step="0.01" class="form-control" name="blood_pres_top" required>
                                    </div>
                                    <div class="col-1 reduce-margin">/</div>
                                    <div class="col-5">
                                        <input type="number" step="0.01" class="form-control" name="blood_pres_bottom" required>
                                    </div>

                                    <div class="col-1">
                                        <i>mmHg</i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="form-group row" style="float: right;">
                            <button class="btn sys-colour-1 text-white ml-5" type="submit" name="new-submit" id="save">
                                Update Record
                            </button>

                            <span class="ml-2 mr-2"></span>

                            <button class="btn sys-colour-1 text-white mr-5" type="submit" name="new-submit" id="save">
                                Delete Record
                            </button>
                        </div>

                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
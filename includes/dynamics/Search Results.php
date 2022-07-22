<link rel="stylesheet" href="./style/Search Results.css">
<script type = "text/javascript" src = "./scripts/Search Results.js"> </script>

<div class="container-fluid text-white">
    <div class="row">
        <div class="col-3">
            <p class="title-header sys-colour-2 sub-title-font">Patient List</p>
            <hr>

            <div class="box-dsgn">
                <ul onclick="ShowHideDiv()">
                    <li><a href="#">Name 1</a></li>
                    <li><a href="#">Name 2</a></li>
                </ul>
            </div>
        </div>

        <div class="col-1 reduce-margin"></div>
        
        <div class="col-8">
            <p class="title-header sys-colour-2 sub-title-font">Patient Information</p>
            <hr>

            <div id="ptn-info">
                <form role="form" action="." method="post">
                    <div class="box-dsgn mb-3">
                        <div class="row font-italic">
                            <a href="#">View Patient Records</a>
                        </div>

                        <br>

                        <div class="form-group row">
                            <label class="col-3 col-form-label font-weight-bold">Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label font-weight-bold">Date of Birth</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="dob" required>
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
                                <input type="text" class="form-control" name="phone" pattern="[0-9]{11}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label font-weight-bold">Address</label>
                            <div class="col-9">
                                <textarea name="address" cols = "30" rows = "2" class="form-control" required></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="form-group row" style="float: right;">
                            <button class="btn sys-colour-1 text-white" type="submit" name="new-submit" id="save">Update Information </button>
                        </div>

                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
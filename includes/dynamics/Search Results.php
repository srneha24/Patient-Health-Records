<?php

require_once("./includes/actions/Search Results.Action.php");

?>

<link rel="stylesheet" href="./style/Search Results.css">

<div class="container-fluid text-white">
    <div class="row">
        <div class="col-3">
            <p class="title-header sys-colour-2 sub-title-font">Patient List</p>
            <hr>

            <div class="box-dsgn">
                <?php
                    if (isset($_SESSION["resultCount"]) && $_SESSION["resultCount"] > 0) {
                ?>
                        <ul>
                <?php
                            for($i=0; $i<$_SESSION["resultCount"]; $i++) {                        
                ?>                            
                                <li><a href="?page=search&&name=<?php echo $_SESSION['names'][$i];?>"><?php echo $_SESSION['names'][$i];?></a></li>
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
            <p class="title-header sys-colour-2 sub-title-font">Patient Information</p>
            <hr>

            <?php
                if (isset($_GET['name']) && @$resultCount > 0) {
            ?>
                    <form role="form" action="" method="post">
                        <div class="box-dsgn mb-3">
                            <div class="row">
                                <div class="col-6 font-italic">
                                    <a href="./includes/actions/Patient Records.Action.php?id=<?php echo $ptnInfo->ptn_id; ?>">View Patient Records</a>
                                </div>

                                <?php 
                                    if (isset($_GET['update'])) {
                                ?>
                                        <div class="col-6 font-weight-bold font-italic text-success" style="float: right;">
                                            <?php echo $_SESSION['msg']; ?>
                                        </div>
                                <?php
                                    }
                                ?>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label class="col-3 col-form-label font-weight-bold">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="name" value="<?php echo $ptnInfo->name; ?>" required>
                                    <input type="hidden" name="ptn_id" value="<?php echo $ptnInfo->ptn_id; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label font-weight-bold">Date of Birth</label>
                                <div class="col-9">
                                    <input type="date" class="form-control" name="dob" value="<?php echo $ptnInfo->dob; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label font-weight-bold">Gender</label>
                                <div class="col-9">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="gender1" name="gender" value="F" <?php if($ptnInfo->gender == 'F') { echo "checked"; } ?>>
                                        <label class="custom-control-label" for="gender1">Female</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="gender2" name="gender" value="M" <?php if($ptnInfo->gender == 'M') { echo "checked"; } ?>>
                                        <label class="custom-control-label" for="gender2">Male</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label font-weight-bold">Phone Number</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="phone" pattern="[0-9]{11}" value="<?php echo $ptnInfo->phone; ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3 col-form-label font-weight-bold">Address</label>
                                <div class="col-9">
                                    <textarea name="address" cols = "30" rows = "2" class="form-control" required><?php echo $ptnInfo->address; ?></textarea>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row" style="float: right;">
                                <button class="btn sys-colour-1 text-white" type="submit" name="update-ptn-submit"  value="update-ptn">Update Information </button>
                            </div>

                            <br>
                        </div>
                    </form>
            <?php
                }
            ?>
        </div>
    </div>
</div>
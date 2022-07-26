<link rel="stylesheet" href="./style/Homepage.css">
 
<div class="containier-fluid top-margin" id="home-head-img">
    <?php 
        if (isset($_GET['insert'])) {
    ?>
            <div class="d-flex justify-content-center">
                <div id="insert" class="col-6 font-weight-bold font-italic text-success h3">
                    <?php echo $_SESSION['msg']; ?>
                </div>
            </div>
    <?php
        }
    ?>
    <div class="d-flex justify-content-around">
        <h1 id="page-title" class="vert-align-text"> PATIENT HEALTH RECORDS </h1>
    </div>
    <div class="d-flex justify-content-around">
        <div id="search-bar" class="vert-align-text">
            <form role="form" action="./includes/actions/Search Results.Action.php" method="post">
                <input id="search" type="text" name="nameSearch" size=100 placeholder="Search Patients" required>
                <button type="submit" name="search-submit" class="btn sys-colour-1" value="search">
                    <span class="material-icons" style="color=#1e2d94">search</span> 
                </button>
            </form>
        </div>            
    </div>
</div>
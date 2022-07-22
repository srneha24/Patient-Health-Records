<div class="container top-margin title-header sys-colour-2 page-title-margin">
    <?php

        @$page = $_GET["page"];

        if ($page === "about") {
            echo '<p class="display-3"> GROUP MEMBERS </p>';
        }

        elseif ($page === "new") {
            echo '<p class="title-header sys-colour-2 page-title-margin title-font">NEW RECORD</p>';
        }

        elseif ($page === "search") {
            echo '<p class="title-header sys-colour-2 page-title-margin title-font">SEARCH RESULTS</p>';
        }

        elseif ($page === "record") {
            echo '<p class="title-header sys-colour-2 page-title-margin title-font">PATIENT RECORDS</p>';
        }

    ?>
</div>

<hr>
<?php
    /*
        search.php
        Author(s): Jordan Hay
    */

    $title = "Search Trails"; // Set title for head.php

    require("res/head.php"); // Require template for top of page/metadata
    require("res/header.php");  // Header template
    require("res/connect.php"); // Connect to database

    // By setting these $_GET to be an int SQL injection is not possible
    $page = max((int) $_GET["page"], 0); // Page number, always rounded to zero or above
    $trails_to_load = (int) $_GET["load"]; // The amount of trails to load on one page

    // Keep $trails_to_load on one page in reasonable bounds
    if(($trails_to_load < 5) or ($trails_to_load > 100)) {
        $trails_to_load = 10;
    } 

    try {
        $sql = "SELECT * FROM `trails` LIMIT ".($page * $trails_to_load).", ".(($page + 1) * $trails_to_load).";";
        $results = $link->query($sql);
    } catch(\Exception $e) {
        
    }
?>

<main class="col-12" id="page-main">
    <section class="col-8">
        <?php
            while($result = $results->fetch_assoc()) {
                print("<section class=\"col-12 result\">");
                print("<h5>".$result["trail_name"]."</h5>");
                print("<p><i class=\"fa fa-map-marker\"></i>".$result["trail_area"]."</p>");
                print("</section>");
                $result_check = True; // Used to check that a result has been printed.
            }

            if($result_check == False) {
                print("<h4>No results.</h4>");
            }
        ?>
    </section>
</main>

<?php require("res/foot.php"); ?>
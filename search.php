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
    if(isset($_GET["page"])) {
        $page = max((int) $_GET["page"], 0); // Page number, always rounded to zero or above
    } else {
        $page = 0;
    }
    
    if(isset($_GET["load"])) {
        $trails_to_load = (int) $_GET["load"]; // The amount of trails to load on one page
    } else {
        $trails_to_load = 10;
    }

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
        <table class="col-12" id="search-results">
            <tr>
                <th>Trail</th>
                <th>Location</th>
            </tr>
            <?php
                while($result = $results->fetch_assoc()) {
                    print("<tr onclick=\"window.location='trail.php?trail=".$result["trail_id"]."'\">");
                    print("<td>".$result["trail_name"]."</td>");
                    print("<td>".$result["trail_area"]."</td>");
                    print("</tr>");
                    $result_check = True; // Used to check that a result has been printed.
                }

                if($result_check == False) {
                    print("<h4>No results.</h4>");
                }
            ?>
        </table>
    </section>
</main>

<?php require("res/foot.php"); ?>
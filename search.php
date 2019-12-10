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
        $trails_to_load = 20;
    } 

    // If search term is set then use it in the query
    if(isset($_GET["term"])) {
        try {
            $term = $_GET["term"]; // Handle with care
            $sanitised_term = "%".$term."%";
            $sql = "SELECT `trail_id`, `trail_name`, `trail_area` FROM `trails` WHERE ((`trail_name` LIKE ?) or (`trail_desc` LIKE ?)) LIMIT ".($page * $trails_to_load).", ".(($page + 1) * $trails_to_load).";";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("ss", $sanitised_term, $sanitised_term);
            $stmt->execute();
            $results = $stmt->get_result();
        } catch(\Exception $e) {
            
        }
    } else {
        // Else use default query
        try {
            // Get trail results
            $sql = "SELECT `trail_id`, `trail_name`, `trail_area` FROM `trails` LIMIT ".($page * $trails_to_load).", ".(($page + 1) * $trails_to_load).";";
            $results = $link->query($sql);
        } catch(\Exception $e) {

        }
    }
?>

<main class="col-12" id="page-main">
    <section class="col-8">
        <form class="col-12" action="search.php" method="GET">
            <input class="col-10" type="text" name="term" placeholder="Search..." />
            <input class="col-2" type="submit" value="Search" />
        </form>
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
                    $trails_loaded++;
                }
            ?>
        </table>
        <section class="col-12">
            <?php
                // No results notice
                if($trails_loaded == 0) {
                    print("<h4>No results.</h4>");
                }

                // Back button
                if($page != 0) {
                    print("<a href=\"search.php?page=".($page - 1)."&load=".$trails_to_load."&term=".$term."\">Previous Page</a>");
                }

                // Next page button
                // If the amount of trails loaded is not the same as the trails to load then do not offer another page
                if($trails_loaded == $trails_to_load) {
                    print("<a href=\"search.php?page=".($page + 1)."&load=".$trails_to_load."&term=".$term."\">Next Page</a>");
                }
            ?>
        </section>
    </section>
</main>

<?php require("res/foot.php"); ?>
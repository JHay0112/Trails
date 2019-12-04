<?php
    /*
        trail.php
        Author(s): Jordan Hay
    */

    require("res/connect.php"); // Connect to database

    $trail_id = max((int) $_GET["trail"], 0); // Will always be integer rounded to zero if less than 1 or string

    if($trail_id != 0) {
        try {
            // Querying the database for selected trail
            $sql = "SELECT * FROM `trails` WHERE `trail_id` = ".$trail_id.";";
            $trail = $link->query($sql);
            $trail = $trail->fetch_assoc();
            // Querying database for attributes
            $sql = "SELECT * FROM `attributes` WHERE `attribute_id` IN (SELECT `attribute_id` FROM `trail_attributes` WHERE `trail_id` = ".$trail_id.");";
            $attributes = $link->query($sql);
        } catch(\Exception $e) {
            // Still not really sure what to do, an error shouldn't occur
        }
            
    } else {
        $trail["trail_name"] = "Trail Not Found";
        $trail["trail_area"] = "Nowhere?";
        $trail["trail_desc"] = "Uh oh. This trail does not exist. We're sorry for any inconvenience. Click <a href=\"search.php\">here</a> to return to the the search page.";
        $trail["trail_distance"] = 0;
        $trail["trail_walk_time"] = 0;
        $trail["trail_elevation_change"] = 0;
    }

    $title = $trail["trail_name"];

    require("res/head.php"); // Require template for top of page/metadata
    require("res/header.php");  // Header template
?>

<main class="col-12" id="page-main">
    <section class="col-8" id="trail-main">
        <article class="col-7" id="trail-info">
            <h4><i class="fa fa-map-marker"></i> <?php print($trail["trail_area"]); ?></h4>
            <section class="col-12" id="attribute-container">
                <?php
                    if($trail_id != 0) {
                        // Only try to load attributes if applicable
                        while($attribute = $attributes->fetch_assoc()) {
                            print("<div class=\"attribute\">");
                            print("<img class=\"attribute-image\" src=\"img/attr/".$attribute["attribute_id"].".png\" alt=\"".$attribute["attribute_name"]."\" />");
                            print("<p class=\"attribute-text\">".$attribute["attribute_desc"]."</p>");
                            print("</div>");
                        }
                    }
                ?>
            </section>
            <h5>Distance: ~<?php 
                // Round distances
                if (strlen((string)$trail["trail_distance"]) == 5) {
                    print(round(($trail["trail_distance"] / 1000), 0)."km");
                } elseif(strlen((string)$trail["trail_distance"]) == 4) {
                    print(round(($trail["trail_distance"] / 1000), 1)."km");
                } else {
                    print(round($trail["trail_distance"], -1)."m");
                }
            ?></h5>
            <h5>Walk Time: ~<?php
                // Round times
                if($trail["trail_walk_time"] > 60) {
                    print(round(($trail["trail_walk_time"] / 60), 1)." hour(s)");
                } else {
                    print($trail["trail_walk_time"]." minute(s)");
                }
            ?></h5>
            <h5>Elevation Change: &plusmn<?php
                // Round elevations
                if (strlen((string)$trail["trail_elevation_change"]) == 5) {
                    print(round(($trail["trail_elevation_change"] / 1000), 0)."km");
                } elseif(strlen((string)$trail["trail_elevation_change"]) == 4) {
                    print(round(($trail["trail_elevation_change"] / 1000), 1)."km");
                } else {
                    print(round($trail["trail_elevation_change"], -1)."m");
                }
            ?></h5>
            <p><?php print($trail["trail_desc"]); ?></p>
            <?php
                // If GPS file can be found then offer a download option
                $gps = "gps/".$trail_id.".gpx";                

                if(file_exists($gps)){
                    print("<h5>Download GPS file <a href=\"".$gps."\" download=\"".$trail["trail_name"]."\">here</a>.</h5>");
                }
            ?>
        </article>
        <aside class="col-5 desktop-only" id="trail-img-container">
            <?php 
                // If Image is availiable then display
                $img = "img/trails/".$trail_id.".jpg";
            
                if(file_exists($img)) {
                    print("<aside id=\"trail-img\" class=\"col-12\" style=\"background-image: url(".$img.");\"></aside");
                } 
            ?>
        </aside>
    </section>
    <section class="col-8" id="trail-map-container">
        <?php
            // Make sure there is a trail map to offer before displaying one
            if($trail["trail_map"] != ""){
                print("<iframe id=\"trail-map\" class=\"col-12\" src=\"https://www.google.com/maps/d/u/0/embed?mid=1wgG0fulZ0oCkexfsMlz27TqQimbRGvbp".$trail["trail_map"]."\" height=\"360\"></iframe>");
            }
        ?>
    </section>
</main>

<?php require("res/foot.php"); ?>
<?php
    /*
        trail.php
        Author(s): Jordan Hay
    */

    require("res/connect.php"); // Connect to database

    try {
        // Querying the database for selected trail
        $query = "SELECT * FROM `trails` WHERE `trail_id` = ?;";
        $stmt = $link->prepare($query);
        $stmt->bind_param("s", $_GET["trail"]);
        $stmt->execute();
        $stmt->bind_result($trail_id, $trail_name, $trail_area, $trail_desc, $trail_map, $trail_dist, $trail_walk_time, $trail_elevation_change);
        $stmt->fetch();
    } catch(\Exception $e) {
        print("Failed to connect to Database");
    }

    // If trail does not exist fill with artificial values
    if($trail_name == ""){
        $trail_name = "Trail Not Found";
        $trail_area = "Nowhere?";
        $trail_desc = "Uh oh. This trail does not exist. We're sorry for any inconvenience. Click <a href=\"search.php\">here</a> to return to the the search page.";
        $trail_dist = 0;
        $trail_walk_time = 0;
        $trail_elevation_change = 0;
    }

    $title = $trail_name;

    require("res/head.php"); // Require template for top of page/metadata
    require("res/header.php");  // Header template
?>

<main class="col-12" id="page-main">
    <section class="col-8" id="trail-main">
        <article class="col-7" id="trail-info">
            <h4><i class="fa fa-map-marker"></i> <?php print($trail_area); ?></h4>
            <h5>Distance: ~<?php 
                // Round distances
                if (strlen((string)$trail_dist) == 5) {
                    print(round(($trail_dist / 1000), 0)."km");
                } elseif(strlen((string)$trail_dist) == 4) {
                    print(round(($trail_dist / 1000), 1)."km");
                } else {
                    print(round($trail_dist, -1)."m");
                }
            ?></h5>
            <h5>Walk Time: ~<?php
                // Round times
                if($trail_walk_time > 60) {
                    print(round(($trail_walk_time / 60), 1)." hour(s)");
                } else {
                    print($trail_walk_time." minute(s)");
                }
            ?></h5>
            <h5>Elevation Change: &plusmn<?php
                // Round elevations
                if (strlen((string)$trail_elevation_change) == 5) {
                    print(round(($trail_elevation_change / 1000), 0)."km");
                } elseif(strlen((string)$trail_elevation_change) == 4) {
                    print(round(($trail_elevation_change / 1000), 1)."km");
                } else {
                    print(round($trail_elevation_change, -1)."m");
                }
            ?></h5>
            <p><?php print($trail_desc); ?></p>
            <?php
                // If GPS file can be found then offer a download option
                $gps = "gps/".$trail_id.".gpx";                

                if(file_exists($gps)){
                    print("<h5>Download GPS file <a href=\"".$gps."\" download=\"".$trail_name."\">here</a>.</h5>");
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
            if($trail_map != ""){
                print("<iframe id=\"trail-map\" class=\"col-12\" src=\"https://www.google.com/maps/d/u/0/embed?mid=1wgG0fulZ0oCkexfsMlz27TqQimbRGvbp".$trail_map."\" height=\"360\"></iframe>");
            }
        ?>
    </section>
</main>

<?php require("res/foot.php"); ?>
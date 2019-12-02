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
        $stmt->bind_result($trail_id, $trail_name, $trail_area, $trail_desc, $trail_map, $trail_gps, $trail_dist, $trail_walk_time, $trail_elevation_change);
        $stmt->fetch();
    } catch(\Exception $e) {
        print("Failed to connect to Database");
    }

    $title = $trail_name;

    require("res/head.php"); // Require template for top of page/metadata
    require("res/header.php");  // Header template
?>

<main class="col-12" id="page-main">
    <section class="col-8">
        <h2><?php print($trail_name); ?></h2>
        <article class="col-6">
            <h4><i class="fa fa-map-marker"></i> <?php print($trail_area); ?></h4>
            <p><?php print($trail_desc); ?></p>
            <h5>Distance: ~<?php 
                // Round distances
                if (strlen((string)$trail_dist) == 5) {
                    print(substr($trail_dist, 0, 1).substr($trail_dist, 1, 1)."km");
                } elseif(strlen((string)$trail_dist) == 4) {
                    print(substr($trail_dist, 0, 1).".".substr($trail_dist, 1, 1)."km");
                } else {
                    print($trail_dist."m");
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
                    print(substr($trail_elevation_change, 0, 1).substr($trail_elevation_change, 1, 1)."km");
                } elseif(strlen((string)$trail_elevation_change) == 4) {
                    print(substr($trail_elevation_change, 0, 1).".".substr($trail_elevation_change, 1, 1)."km");
                } else {
                    print($trail_elevation_change."m");
                }
            ?></h5>
        </article>
        <aside class="col-6">
            <img class="col-12" src="img/trails/<?php print($trail_id); ?>.jpg" />
            <?php
                // Make sure there is a trail map to offer before displaying one
                if($trail_map != ""){
                    print("<iframe class=\"col-12\" src=\"https://www.google.com/maps/d/u/0/embed?mid=1wgG0fulZ0oCkexfsMlz27TqQimbRGvbp".$trail_map."\" height=\"360\"></iframe>");
                }
            ?>
            
        </aside>
    </section>
</main>

<?php require("res/foot.php"); ?>
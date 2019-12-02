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

<?php require("res/foot.php"); ?>
<?php
    /*
        head.php 
        Author(s): Jordan Hay
    */

    // Check if title is defined in file that requires this code.
    if($title == ""){
        // If not then make the title the file name of the current page.
        $title = basename($_SERVER["PHP_SELF"]);
    }

    require("connect.php");

    // Add all track names to keywords
    try {
        $sql = "SELECT `trail_name` FROM `trails`;";
        $results = $link->query($sql);
    } catch(\Exception $e) {

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8" />
        <meta name="description" content="A collection of the trails and tracks in Timaru and beyond." />
        <meta name="keywords" content="Timaru, Trails, New Zealand, Walking, Timaru Trails, Hiking, Strolling, South Canterbury, Canterbury, Walk, Bike, Run, Stroll, Hike, Jordan Hay, Geraldine, Temuka<?php while($result = $results->fetch_assoc()) {print(", ".$result["trail_name"]);} ?>" />
        <meta name="author" content="Jordan Hay" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Font Awesome Icon Library -->

        <!-- Tab Info -->
        <link rel="icon" href="img/favicon.ico" />
        <title><?php print($title) ?> - Timaru Trails</title>
    </head>
    <body>
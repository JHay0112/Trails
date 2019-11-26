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
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
        <meta charset="UTF-8" />
        <meta name="description" content="Trails and Tracks in Timaru." />
        <meta name="keywords" content="Timaru, Trails, New Zealand, Walking, Timaru Trails, Hiking, Strolling, South Canterbury, Canterbury" />
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
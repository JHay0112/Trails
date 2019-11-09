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
        <title><?php print($title) ?> - Trails</title>

        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
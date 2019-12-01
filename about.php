<?php
    /*
        about.php
        Author(s): Jordan Hay
    */

    $title = "About"; // Set title for head.php

    require("res/head.php"); // Require template for top of page
    require("res/header.php");  // Header template
?>

<main class="col-12" id="page-main">
    <section class="col-8">
        <h2>Timaru Trails</h2>
        <p>Timaru Trails was thought up by <a href="https://jordanhay.tk/" target="_blank">Jordan Hay</a> in early 2018. In late 2019 he actually bothered to make it.</p>
        <p>Timaru Trails is designed to document all the trails in Timaru and eventually South Canterbury to allow people who live in or are visting South Canterbury to easily find a wide selection of trails to enjoy.</p>
        <p>All trails have been documented, photographed, and mapped by <a href="https://jordanhay.tk/" target="_blank">Jordan Hay</a>.</p>
        <p>You can scrutinise the code that makes this website run <a href="https://github.com/JHay0112/Trails" target="_blank">here</a>.</p>
    </section>
    <section class="col-8">
        <h2>Jordan Hay</h2>
        <p>Jordan Hay is a student with interests in robotics, programming, web development, and stereotypically enough, maths.</p>
        <p>You can find his website <a href="https://jordanhay.tk/" target="_blank">here</a>.</p>
    </section>
</main>

<?php require("res/foot.php"); ?>
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
        <p>Timaru Trails is designed to document the trails in Timaru and South Canterbury to allow people who live in or are visting South Canterbury to easily find trails to enjoy.</p>
        <p>All trails have been documented, photographed, and mapped by <a href="https://jordanhay.tk/" target="_blank">Jordan Hay</a>.</p>
        <p>Trail descriptions were written with the help of Tanya Smith. You can find her Instagram account <a href="https://www.instagram.com/tanyadoesart_/" target="_blank">here</a>.</p>
        <p>You can scrutinise the code that makes this website run <a href="https://github.com/JHay0112/Trails" target="_blank">here</a>.</p>
    </section>
    <section class="col-8">
        <h2>Jordan Hay</h2>
        <p>Jordan Hay is a student with interests in robotics, programming, web development, and stereotypically enough, maths. Jordan Hay built Timaru Trails in his spare time on a budget of 10 cents he found in the pocket of his jeans.</p>
        <p>You can find his website <a href="https://jordanhay.tk/" target="_blank">here</a>.</p>
    </section>
</main>

<?php require("res/foot.php"); ?>
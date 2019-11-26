<?php
    /*
        index.php
        Author(s): Jordan Hay
    */

    $title = "Home"; // Set title for head.php

    require("res/head.php"); // Require template for top of page
?>

<main id="index-body">
    <div class="col-3 desktop-only"></div>
    <section id="content" class="col-6">
        <h1>Timaru Trails</h1>
        <hr />
        <?php require("res/nav.php"); ?>
        <hr />
        <p>Looking for walking tracks or hikes in Timaru and South Canterbury? Timaru Trails has a vast collection of trails for you to try. Just click on "Search Trails" to get started.</p>
    </section>
    <div class="col-3 desktop-only"></div>
</main>

<?php require("res/foot.php"); ?>
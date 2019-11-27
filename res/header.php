<?php

    /*
        header.php
        Author: Jordan Hay
    */

?>

<header>
    <div id="banner"></div>
    <div class="col-2"></div>
    <section class="col-8">
        <h2><?php print($title); ?></h2>
        <hr />
        <?php require("res/nav.php"); ?>
        <hr />
    </section>
</header>
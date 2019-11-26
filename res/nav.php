<?php
    /*
        nav.php
        Author(s): Jordan Hay
    */

    function checkIfActive($expected_title) {
        if($GLOBALS["title"] === $expected_title) {
            print("active");
        }
    }

?>
<nav>
    <a href="/" class="<?php checkIfActive("Home"); ?>">Home</a>
    <a href="search.php" class="<?php checkIfActive("Search Trails"); ?>" >Search Trails</a>
    <a href="about.php" class="<?php checkIfActive("About"); ?>" >About</a>
</nav>
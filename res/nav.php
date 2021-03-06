<?php
    /*
        nav.php
        Author(s): Jordan Hay
    */

    $found_active_page = false; // Flag if page is expected or not

    function checkIfActive($expected_title) {
        if($GLOBALS["title"] == $expected_title) {
            print("active");
            $GLOBALS["found_active_page"] = true;
        }
    }

?>
<nav id="page-nav">
    <a href="javascript:void(0)" id="nav-toggle" onclick="toggleNav()"><span class="fa fa-bars"></span></a>
    <a href="/" class="<?php checkIfActive("Home"); ?>">Home</a>
    <a href="/search" class="<?php checkIfActive("Search Trails"); ?>" >Search Trails</a>
    <a href="/about" class="<?php checkIfActive("About"); ?>" >About</a>
    <?php if($found_active_page == false){print("<a href=\".$title.\" class=\"active\">".$title."</a>");}  // Check if expected page is found, if not add to nav ?>
</nav>
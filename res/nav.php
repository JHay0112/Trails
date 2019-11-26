<?php
    /*
        nav.php
        Author(s): Jordan Hay
    */

    function console_log($data) {
        print '<script>';
        print 'console.log('. json_encode( $data ) .')';
        print '</script>';
    }

    function checkIfActive($expected_title) {
        console_log("Test");
        console_log($title);
        console_log($expected_title);
        if($title == $expected_title) {
            console_log("yes");
            print("active");
        }
    }

    console_log("Test");

?>
<nav>
    <a href="/" class="<?php checkIfActive("Home"); ?>">Home</a>
    <a href="search.php" class="<?php checkIfActive("Search Trails"); ?>" >Search Trails</a>
    <a href="about.php" class="<?php checkIfActive("About"); ?>" >About</a>
</nav>
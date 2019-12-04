<?php
    /*
        foot.php
        Author: Jordan Hay
    */

    // Used to print out the URL, allows this to not need changing if domain gets changed
    function getHost() {
        print($_SERVER["HTTP_HOST"]);
    }
?>
        <footer id="page-footer">
            <small>
                <?php print($title); ?> - Timaru Trails <p class="desktop-only">|</p><br class="mobile-only" />
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php getHost(); ?>" class="fa fa-facebook social" target="_blank"></a>
                <a href="https://twitter.com/intent/tweet?text=<?php getHost(); ?>" class="fa fa-twitter social" target="_blank"></a>
                <a href="https://www.reddit.com/submit?url=<?php getHost(); ?>" class="fa fa-reddit social" target="_blank"></a>
                | &copy; <a href="https://jordanhay.tk/" target="_blank">Jordan Hay</a> 2019
            </small>
        </footer>

        <!-- Scripts -->
        <!-- General Script -->
        <script src="js/main.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109227996-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-109227996-3');
        </script>
    </body>
</html>
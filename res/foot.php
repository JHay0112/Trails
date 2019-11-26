<?php
    /*
        foot.php
        Author: Jordan Hay
    */

    // Used to print out the URL, allows this to not need changing if domain gets changed
    function getHost() {
        print($_SERVER['HTTP_HOST']);
    }
?>
        <footer id="page-footer">
            <small>
                <?php print($title); ?> - Timaru Trails |
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php getHost(); ?>" class="fa fa-facebook" target="_blank"></a>
                <a href="https://twitter.com/intent/tweet?text=<?php getHost(); ?>" class="fa fa-twitter" target="_blank"></a>
                <a href="https://www.reddit.com/submit?url=<?php getHost(); ?>" class="fa fa-reddit" target="_blank"></a>
                | &copy; <a href="https://jordanhay.tk/" target="_blank">Jordan Hay</a>
            </small>
        </footer>

        <!-- Scripts -->
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
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Generic - Stellar by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <?php
                    date_default_timezone_set("Asia/Manila");
                    echo "The time is " . date("h:i:sa");

                    $elements = json_decode($_POST['str'], true);
                    //echo $elements;
                    
                    foreach ($elements as $items) {
                        echo $items;
                    }
                    
                ?>
            </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            
            <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
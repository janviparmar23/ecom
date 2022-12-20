<?php
session_start();
?>
<html>

<head>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />

    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</head>

<body class="container">
    <header>
        <?php include_once('header.php'); ?>
    </header>
    <aside>

    </aside>
    <main>
        <content>
            <?php include_once('routes.php') ?>

        </content>
    </main>
    <footer>
        <?php include_once('footer.php'); ?>
    </footer>
</body>

</html>
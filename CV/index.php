<!doctype html>
<html class="no-js" lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CV-Jorge Ferreira</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/vendor/modernizr.js"></script>
    </head>
    <body>

        <?php $page = (empty($_GET['page'])) ? 'home' : $_GET['page']; ?>

        <?php include 'src/templates/common/header.php'; ?>

        <main id="<?php echo $page; ?>">
            <?php include 'src/templates/pages/'.$page.'.php'; ?>
        </main>

        <?php include 'src/templates/common/footer.php'; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>

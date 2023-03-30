<?php
function publicFolder($path)
{
    return DIRECTORY_SEPARATOR ."assets/". $path;
}
function path($path)
{
    return dirname(__DIR__) . DIRECTORY_SEPARATOR .$path;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Title -->
        <title> pcl - <?= $title ?> </title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= publicFolder("images/fox.png") ?>" type="image/x-icon">

        <!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="<?= publicFolder("css/simple-line-icons.css") ?>">

         <!-- CSS FILES -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?= publicFolder("css/component.css") ?>">
        <?php echo $css_link ?? ""; ?>
        <link rel="stylesheet" href="<?= publicFolder("css/owl.carousel.min.css") ?>">
        <link rel="stylesheet" href="<?= publicFolder("css/style.css") ?>">

    </head>
    <body>

        <!-- Page Loader -->
        <div class="page-loader">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- Header -->
        <?php include(path("view/partials/header.php")) ?>

        <!-- Main -->
        <main>
            <?= $body ?>
        </main>


        <!-- Footer -->
        <?php include(path("view/partials/footer.php")) ?>


        <!-- JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <script src="<?= publicFolder("js/owl.carousel.min.js") ?>"></script>
        <?php echo $js_link ?? ""; ?>
        <script src="<?= publicFolder("js/scroll.js") ?>" defer></script>
        <script src="<?= publicFolder("js/app.js") ?>" defer></script>
        <script src="<?= publicFolder("js/main.js") ?>" defer></script>
    </body>
</html>





























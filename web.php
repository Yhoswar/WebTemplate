<?php
    include $_SERVER['DOCUMENT_ROOT'] . 'loadpage.php';
?>
<!DOCTYPE html>
<!--[if lt IE 8 ]><html lang="<?= $_Lang ?>" class="no-js oldie"><![endif]-->
<!--[if IE 8 ]><html lang="<?= $_Lang ?>" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="<?= $_Lang ?>" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="<?= $_Lang ?>" class="no-js"><!--<![endif]-->

<head>

    <title><?= $__['HomePageTitle'] ?></title>
    <meta name="keywords" content="<?= $__['HomePageKeyWords'] ?>">
    <meta name="description" content="<?= $__['HomePageDescription'] ?>">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/_header.php'; ?>

</head>


<body>

    <!-- load menu -->
    <?php $nosotros = "current-menu-item"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/_menu.php' ?>



    <div id="SkipLinkContent"></div>

    <!-- content area -->

    




    

    <!-- load footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/_footer.php' ?>

    <!-- load scripts footer -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/_scripts_footer.php' ?>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/_cookies.php'; ?>

</body>

</html>
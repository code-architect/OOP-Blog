<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A simple bootstrap theme">
    <meta name="author" content="Indranil Samanta">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome to your page name</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URL; ?>/templates/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URL; ?>/templates/css/custom.css" rel="stylesheet">

    <!-- CK Editor include -->
    <script src="<?php echo BASE_URL; ?>/templates/js/ckeditor/ckeditor.js"></script>

    <?php
        if(!isset($title)){
            $title = SITE_TITLE;
        }
    ?>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Your SiteName</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <?php if(!isLoggedIn()) : ?>
                <li><a href="register.php">Create an Account</a></li>
                <?php else : ?>
                <li><a href="create.php">Create Topic</a></li>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Main -->
        <div class="col-md-8">
            <div class="main-col">
                <div class="block">
                    <h1 class="pull-left"><?php echo $title; ?></h1>
                    <h4 class="pull-right">A Simple OOP PHP Forum</h4>
                    <div class="clearfix"></div>
                    <hr>
                    <?php displayMessage(); ?>
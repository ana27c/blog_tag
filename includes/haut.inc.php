<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <script type="text/javascript" src="jquery-1.8.3.min"></script>
        <meta name="description" content="Blog avec système de tag">
        <meta name="author" content="Anais Courrier">

        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/main.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include('varco.php');
        ?>
        <div class="container">
            <div class="content">
                <div class="page-header well">
                    <h1>Blog <small>Avec système de tag</small></h1>
                </div>
                <div class="row">
                    <div class="span8">
                        <!-- notifications -->
                        <?php
                        include('notifications.inc.php');
                        ?>

                        <!-- contenu -->



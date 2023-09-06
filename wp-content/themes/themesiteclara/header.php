<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clara Becker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300&display=swap" rel="stylesheet">
    <?php wp_head() ?>
</head>

    <header>
        <div class="logo">
            <?php
                $upload_dir = wp_upload_dir();
                $image_path = $upload_dir['baseurl'] . '/2023/08/IMG-1079-150x150.png';
            ?>
            <img src="<?php echo $image_path; ?>" alt="Illustration abstraite cercles de différentes couleurs en en-tête">
            <h1>Clara Becker</h1>
        </div>
    </header>

    <body> 
    <div class="container">
        <nav>
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => 'nav',
                    'container_class' => 'vertical-menu'
                    ]) ?>
        </nav>
    <div class="content">

   

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body>        

    <nav class="container-navigation navbar navbar-expand-lg navbar-light bg-light navbar-megamenu header-bootstrap" id="site-navigation">
        <a class="navbar-brand" href="#">
            <img class="logo-site" src="<?php echo get_template_directory_uri() . '/assets/images/dagin-white.png'; ?>" alt="logo du site">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <img class="hamburger" src="<?php echo get_template_directory_uri() . '/assets/images/bars-solid-white.svg'; ?>" alt="hamburger menu">
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'nav navbar-nav',
                        'walker' => new WalkerNav ()
                    ])
                ?>
            
            <div class="language-switcher" id="languageSwitcher">
                <a href="#" class="free">Free demo</a>
                <span class="current-language">FR
                    <i class="fa-solid fa-chevron-down"></i>
                    <ul class="language-menu">
                        <li><a href="#" onclick="changeLanguage('en')">EN</a></li>
                    </ul>
                </span>
                
            </div>
            </ul>            
        </div>
    </nav>
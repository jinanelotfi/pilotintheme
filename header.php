<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body>
    <!-- <nav class="container-navigation">     
        <
            if(function_exists('the_custom_logo')) {
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'large');
            }
        ?>
        <img class="logo-site" src="< echo $logo[0] ?>" alt="logo"> -->
        
        <!-- <div class="main-navigation mega-menu navbar navbar-default" id="site-navigation" >            
            <
                wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'nav navbar-nav',
                    'walker' => new WalkerNav (),
                ])
            ?>
        </div>    -->
        

        <nav class="container-navigation navbar navbar-expand-lg navbar-light bg-light navbar-megamenu" id="site-navigation">
            <?php
                if(function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'large');
                }
            ?>


            <a class="navbar-brand" href="#">
                <img class="logo-site" src="<?php echo $logo[0] ?>" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li> -->

                <?php 
                            wp_nav_menu([
                                'theme_location' => 'header',
                                'container' => false,
                                'menu_class' => 'nav navbar-nav',
                                'walker' => new WalkerNav (),
                            ])
                        ?>


                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->

                <a href="#">Discover our vision</a>
            </div>
        </nav>
        











    </nav>

    <nav class="container-burger" >
        <div class="nav-burger">            
            <?php 
                wp_nav_menu([
                    'theme_location' => 'toggle',
                    'container' => false,
                    'menu_class' => 'navbar-nav',
                ])
            ?>
        </div>     
        <div class="toggler-container">
            <img class="logo-site" src="<?php echo $logo[0] ?>" alt="logo">
            <button class="nav-toggler" aria-controls="burger-menu" aria-expanded="false">
                <span class="line l1"></span>
                <span class="line l2"></span>
                <span class="line l3"></span>
            </button>             
        </div>          
    </nav>

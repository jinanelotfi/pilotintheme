<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head() ?>
</head>
<body>
        

        <nav class="container-navigation navbar navbar-expand-lg navbar-light bg-light navbar-megamenu header-bootstrap" id="site-navigation">
            <!-- <
                if(function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'large');
                }
            ?> -->


            <a class="navbar-brand" href="#">
                <!-- <img class="logo-site" src="< echo $logo[0] ?>" alt="logo"> -->
                <img class="logo-site" src="<?php echo get_template_directory_uri() . '/assets/images/logo.svg'; ?>" alt="logo du site">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
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


                </ul>

                <a href="#">Free demo</a>
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

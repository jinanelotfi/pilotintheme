    <?php get_template_part('templates/modale'); ?>    
    
    <div class="top-footer-container">
        <div class="first-col col-footer">
            <h3>Get involved</h3>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>"><?php echo esc_html(get_the_title(get_page_by_path('about-us'))); ?>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('join-us'))); ?>"><?php echo esc_html(get_the_title(get_page_by_path('join-us'))); ?>
            </a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"><?php echo esc_html(get_the_title(get_page_by_path('contact-us'))); ?>
            </a>
        </div>
        <div class="second-col col-footer">
            <h3>Germany</h3>
            <p> Inge Beisheim Platz 63, Südergellersen, Germany</p>
            <a href="tel: 000000000"> +49 00000000</a>            
        </div>
        <div class="third-col col-footer">
            <h3>France</h3>
            <p>33 rue Pierre Motte, 75008 Paris, France</p>
            <a href="tel: 000000000"> +33 00000000</a> 
        </div>
        <div class="fourth-col col-footer">
            <h3>Suivez nous sur les réseau sociaux</h3>
            <div class="icones-reseaux">
                <a href="#"  target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="#"  target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>                   
        </div>
    </div>  
        
    <footer>
        <div class="footer-p">
            <p>Dagin 2023</p>
            <?php 
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-class',
            ])
            ?>
        </div>                     
        <div class="footer-flot">
            <p>Propulsé par</p>
            <a href="<?php echo esc_url(home_url('/')); ?>">jinanedigital.com</a>
        </div> 
    </footer>
    
    <?php wp_footer() ?>
</body>
</html>
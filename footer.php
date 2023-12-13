    <?php get_template_part('templates/modale'); ?>
    <footer>
        <div class="footer-p">
            <p>Pilot'in 2022</p>
            <?php 
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-class',
            ])
            ?>
        </div>        
        
        
        <div class="footer-flot">
            <p>Mis à flot par</p>
            <a href="<?php echo esc_url(home_url('/')); ?>">Pilot'in</a>
        </div> 
    </footer>
    
    <?php wp_footer() ?>
</body>
</html>
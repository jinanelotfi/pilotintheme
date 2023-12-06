    <footer>
        <?php 
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-class',
            ])
        ?>
        <div class="footer-p">
            <p>Pilot'in</p>
        </div>        
    </footer>
    <?php wp_footer() ?>
</body>
</html>
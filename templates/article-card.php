<div class="cards-right" >
    <div class="info-block">
        <p><?php the_category(); ?></p> 
        <h3><?php the_title(); ?></h3> 
        <p class="post__meta">
            <?php the_excerpt(); ?>                    
        </p>
    </div> 
    <div class="fleche-card">
        <div class="auteur">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
            <?php the_author(); ?>
        </div>
        <a href="<?php the_permalink(); ?>">
            <img class="fleche-more" src="<?php echo get_template_directory_uri() . '/assets/images/button-fleche.png'; ?>" alt="bouton flèche">
        </a>                           
    </div>
</div>
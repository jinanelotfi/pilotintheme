<?php
    // WP_Query pour afficher les éléments du CPT "articles"
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );

    $query = new WP_Query($args);
?>

<div class="title-article">
    <h2>Nos articles de blog</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est ridiculus velit interdum aliquam libero sit a in. Id nibh vitae, massa sed a vel ultricies pharetra auctor. Libero sed facilisi faucibus etiam aliquet amet, purus, tortor, cursus. Mauris malesuada morbi ultrices diam amet fringilla adipiscing faucibus quis.</p>


</div>
<div class="articles-container">
    <?php if ($query->have_posts()) : ?>
        <div class="cards-container" id="ajax_return">
            <?php while ($query->have_posts()) : $query->the_post(); ?>

                <p><?php the_category(); ?></p> 
                <h3><?php the_title(); ?></h3> 
                <p class="post__meta">
                    <?php the_excerpt(); ?>                    
                </p>

                <div class="fleche-card">
                    <?php the_author(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <img class="fleche-more" src="<?php echo get_template_directory_uri() . '/assets/images/button-fleche.png'; ?>" alt="bouton flèche">
                    </a>
                </div>  
            
            <?php endwhile ?>
        </div>
    <?php else : ?>
        <h2>Pas d'article</h2>    
    <?php endif; ?>
    <?php wp_reset_postdata() ?>

</div>
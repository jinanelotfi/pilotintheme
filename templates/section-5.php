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

    <?php if ($query->have_posts()) : ?>
        <div class="cards-container" id="ajax_return">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('templates/article-card'); ?>

            
            <?php endwhile ?>
        </div>
    <?php else : ?>
        <h2>Pas d'article</h2>    
    <?php endif; ?>
    <?php wp_reset_postdata() ?>

    <a href="<?php echo esc_url(get_permalink(get_page_by_path('actualite'))); ?>" class="bouton-page">Tous les articles</a>

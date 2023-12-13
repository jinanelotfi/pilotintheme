<?php get_header(); ?>
<main class="home-container">


    <!-- Section 1 -->
    <article class="hero">
        <?php get_template_part('templates/hero'); ?>
    </article>
    <div class="data-cloud">
        <img class="data-banner" src="<?php echo get_template_directory_uri() . '/assets/images/data-banner.png'; ?>" alt="texte data cloud">
    </div>
    <div class="shape-divider">
        <img class="shape-divider" src="<?php echo get_template_directory_uri() . '/assets/images/shape-divider.png'; ?>" alt="shape divider">
    </div>

    <!-- Section 2 -->
    <article class="section-two-container">
        <?php get_template_part('templates/section-2'); ?>
    </article>

    <!-- Section 3 -->
    <article class="section-three-container">
        <?php get_template_part('templates/section-3'); ?>
    </article>
    <div class="shape-divider">
        <img class="shape-divider" src="<?php echo get_template_directory_uri() . '/assets/images/shape-divider.png'; ?>" alt="shape divider">
    </div>


    <!-- Section 4 Carrousel-->
    <article class="section-four-container">
        <?php get_template_part('templates/section-4'); ?>
    </article>

    <!-- Section 5 Article-->
    <article class="section-five-container">
        <?php get_template_part('templates/section-5'); ?>
    </article>
    
    <!-- Section 6 Bottom-->
    <article class="section-six-container">
        <?php get_template_part('templates/section-6'); ?>
    </article>

</main>

<?php get_footer(); ?>

<?php get_header(); ?>
<main class="home-container">


    <!-- Section 1 -->
    <?php get_template_part('templates/hero'); ?>

    <!-- Section 2 -->
    <article class="section-two-container">
        <div class="text-container">
            <div class="left-title">
                <h2>Get out of the chaos</h2>
            </div>
            <div class="right-text">
                <p>
                   In today’s perpetual disruption and digital transformation era, volume of data managed expand exponentially and change the way organizations do business. This comes as little surprise and induces a rising demand for data-driven customer experiences, together with changing data volume/sources and quality requirements.
                    However, company runs their processes over hundreds of systems that don’t play nice together, leaving a lot of room for inefficiencies to hide that are silent killers to your business performance.
                    While many companies state they want to be data-driven, most have only begun to scratch the surface in terms of realizing the full potential of this rich resource.
                    Pilot'in recognizes the right for organizations to become truly data-driven, moving  from a fragmented view to a global vision and drive their strategy even further. 
                </p>
                <button>
                    Discover our vision
                </button>                
            </div>
        </div>
        <div class="image-between-sections">
            <img class="computer-screen" src="<?php echo get_template_directory_uri() . '/assets/images/computer-screen.png'; ?>" alt="écran mesures graphiques">
        </div>
        <div class="parallaxe-duo-color">
            <img class="parallaxe-duo-color-image" src="<?php echo get_template_directory_uri() . '/assets/images/parallaxe-shapes-duo-colors.svg'; ?>" alt="formes parallaxe">
        </div>
    </article>

    <!-- Section 3 -->
    <article class="section-three-container">
        <h2>
            How we help tackle these challenges?
        </h2>
        <div class="first-white-container">
            <div class="left-data-connexion-image">
                <img class="datafactory-image" src="<?php echo get_template_directory_uri() . '/assets/images/datafactory.png'; ?>" alt="image data connexions">
            </div>

            <div class="right-data-connexion">
                <div class="title-factory">
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h3>Datafactory</h3>
                    </span>
                    <span>
                        <p>Build your next generation data warehouse automation platform with its unique low-code/no-code approach. Accelerate your business today and generate untapped value from your organization's data.</p>
                    </span>
                </div>
                <div class="list-icones-factory">
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Manage and orchestrate</h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Dispatch powerd elements</h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Manage and orchestrats</h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Manage and orchestrats</h2>
                    </span>
                </div>
                <button>Découvrir la solution</button>              
                
            </div>
        </div>

        <div class="second-white-container">
            <div class="left-propilot-container">
                <div class="propilot">
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Propilot</h2>
                    </span>
                    <p>Plan, do, check and align all your strategic plans in one single platform designed and built for modern and efficient organizations. No more spreadsheets sent via emails or time wasted for reconciliation. Focus on what really matters, achieving your goals. </p>
                </div>
                <div class="list-icones-propilot">
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Connect strategic plans to execution</h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Know the status of plans </h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Adapt quickly to changes</h2>
                    </span>
                    <span>
                        <i class="fa-solid fa-chart-line"></i>
                        <h2>Reward real achiviers</h2>
                    </span>
                </div>
                <button>Learn more about ProPilot</button>
            </div>

            <div class="left-propilot-container">
                <img class="group-card-image" src="<?php echo get_template_directory_uri() . '/assets/images/group.png'; ?>" alt="image carte groupe">
                <img class="ellipse-image" src="<?php echo get_template_directory_uri() . '/assets/images/ellipse.png'; ?>" alt="image ellipse">
            </div>
        </div>
        <div class="shape-divider">
            <img class="shape-divider" src="<?php echo get_template_directory_uri() . '/assets/images/shape-divider.png'; ?>" alt="republique logo">
        </div>
    </article>







</main>

<?php get_footer(); ?>

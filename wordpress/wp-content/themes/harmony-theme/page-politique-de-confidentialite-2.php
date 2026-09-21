<?php get_header(); ?>

<main class="page-content">

    <div class="page-container">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <article class="page">

                    <header class="page-header">
                        <h1><?php the_title(); ?></h1>
                    </header>

                    <div class="page-content__body">
                        <?php the_content(); ?>
                    </div>

                </article>

            <?php endwhile; ?>

        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>

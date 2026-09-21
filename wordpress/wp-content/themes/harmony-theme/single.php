<?php get_header(); ?>

<main>

    <div class="single-post-display">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <article class="single-post__article">

                    <header class="single-post__header">

                        <div class="single-post__category">
                            <?php the_category(', '); ?>
                        </div>

                        <h1 class="single-post__title">
                            <?php the_title(); ?>
                        </h1>

                        <div class="single-post__meta">

                            <span>
                                Publié le <?php echo get_the_date(); ?>
                            </span>

                        </div>

                    </header>


                    <?php if (has_post_thumbnail()) : ?>

                        <figure class="single-post__featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </figure>

                    <?php endif; ?>


                    <div class="single-post__content">

                        <?php the_content(); ?>

                    </div>


                    <footer class="single-post__footer">

                        <a href="<?php echo esc_url(home_url('/blog/')); ?>">
                            ← Retour au blog
                        </a>

                    </footer>

                </article>

            <?php endwhile; ?>

        <?php endif; ?>
    
    </div>

</main>

<?php get_footer(); ?>

<?php get_header(); ?>

<main class="blog">

    <div class="blog__header">
        <h1>Notre blog</h1>
        <p>
            Conseils, astuces et informations pour prendre soin de votre bien-être au quotidien.
        </p>
    </div>

    <div class="blog-grid">

        <?php
        $blog_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 10,
            'post_status'    => 'publish',
        ]);
        ?>

        <?php if ($blog_query->have_posts()) : ?>

            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

                <article class="blog-card">

                    <?php if (has_post_thumbnail()) : ?>

                        <a
                            href="<?php the_permalink(); ?>"
                            class="blog-card__image"
                        >
                            <?php the_post_thumbnail('medium_large'); ?>
                        </a>

                    <?php endif; ?>


                    <div class="blog-card__body">

                        <div class="blog-card__category">
                            <?php the_category(', '); ?>
                        </div>

                        <h2 class="blog-card__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <p class="blog-card__excerpt">
                            <?php the_excerpt(); ?>
                        </p>

                        <a
                            href="<?php the_permalink(); ?>"
                            class="blog-card__link"
                        >
                            Lire l'article
                            <span aria-hidden="true">→</span>
                        </a>

                    </div>

                </article>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <p>Aucun article trouvé.</p>

        <?php endif; ?>

    </div>

</main>

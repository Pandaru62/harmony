<section class="default-section">
    <div class="div-32">
        <h2>Ils ont choisi Harmony.</h2>
        <p>Ils ont choisi l'équilibre.</p>
    </div>
    <div class="customer-feedback-carousel">
        <div class="customer-feedbacks-list">
            <?php
                $testimonials = get_posts([
                    'post_type'      => 'testimonials',
                    'posts_per_page' => 3,
                    'order'          => 'ASC'
                ]);

                foreach ($testimonials as $testimonial) {
                    get_template_part(
                        'template-parts/components/customer-feedback',
                        null,
                        [
                            'rating'    => $testimonial->_testimonials_rating,
                            'author'   => $testimonial->post_title,
                            'text' => $testimonial->post_content,
                        ]
                    );
                }
            ?>
        </div>
        <div class="carousel-dots">
            <button class="carousel-dot active" aria-label="Slide 1"></button>
            <button class="carousel-dot" aria-label="Slide 2"></button>
            <button class="carousel-dot" aria-label="Slide 3"></button>
        </div>
    </div>
</section>

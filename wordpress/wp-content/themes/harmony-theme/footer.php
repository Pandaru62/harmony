<?php
$facebook_url  = get_option('harmony_facebook_url');
$instagram_url = get_option('harmony_instagram_url');
$linkedin_url  = get_option('harmony_linkedin_url');
$youtube_url   = get_option('harmony_youtube_url');

wp_footer();
?>

<footer class="footer">

    <div class="footer-grid">

        <div class="footer-column">
            <h4 class="footer-category">
                Navigation
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'footer-navigation',
                'menu_class' => 'footer-menu',
                'container' => false
            ]); ?>
        </div>

        <div class="footer-column">
            <h4 class="footer-category">
                Support
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'footer-support',
                'menu_class' => 'footer-menu',
                'container' => false
            ]); ?>
        </div>

        <div class="footer-column">
            <h4 class="footer-category">
                Informations légales
            </h4>
            <?php wp_nav_menu([
                'theme_location' => 'footer-legal',
                'menu_class' => 'footer-menu',
                'container' => false
            ]); ?>
        </div>

    </div>

    <?php
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<h3>' . esc_html(get_bloginfo('name')) . '</h3>';
        }
    ?>
    <p>Une technologie au service de votre bien-être</p>
    <a href="/blog" target="_blank" rel="noopener noreferrer">
        Blog
    </a>
    <button
        type="button"
        aria-haspopup="dialog"
        aria-controls="buy-modal"
        class="buy-modal-trigger cta-secondary"
        style="color:white"
    >
        Où acheter ?
    </button>

    <div class="social-media">
        <?php if ($facebook_url): ?>
            <a href="<?= esc_url($facebook_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                <img src="/wp-content/themes/harmony-theme/assets/icons/gg_facebook.svg" alt="Facebook">
            </a>
        <?php endif; ?>
        <?php if ($instagram_url): ?>
            <a href="<?= esc_url($instagram_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_instagram.svg" alt="Instagram">
            </a>
        <?php endif; ?>
        <?php if ($linkedin_url): ?>
            <a href="<?= esc_url($linkedin_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_linkedin.svg" alt="LinkedIn">
            </a>
        <?php endif; ?>
        <?php if ($youtube_url): ?>
            <a href="<?= esc_url($youtube_url); ?>" target="_blank" rel="noopener noreferrer" class="social-button">
                <img src="/wp-content/themes/harmony-theme/assets/icons/mdi_youtube.svg" alt="YouTube">
            </a>
        <?php endif; ?>

    </div>

    <p>@ Harmony 2026</p>

</footer>
</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PNL37DNW');
        </script>
        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PNL37DNW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <header class="site-header">

        <div class="header__container">

            <div class="header__logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . esc_html(get_bloginfo('name')) . '</h1>';
                }
                ?>
            </div>

            <button
                class="menu-toggle"
                aria-label="Toggle navigation"
                aria-expanded="false"
            >

                <span></span>
                <span></span>
                <span></span>

            </button>

            <nav class="header__nav">

                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => false
                ]);
                ?>

                <div class="header__actions">

                    <button
                        type="button"
                        class="btn btn--header header-buy-button"
                        aria-haspopup="dialog"
                        aria-controls="buy-modal"
                    >
                        Où acheter ?
                    </button>

                    <?php
                    $is_logged_in = !empty($_SESSION['harmony_access_token']);
                    ?>

                    <div class="header-profile">

                        <button
                            type="button"
                            class="user-icon"
                            aria-label="Ouvrir le menu utilisateur"
                            aria-expanded="false"
                            aria-controls="profile-menu"
                        >
                            <img
                                src="<?php echo esc_url(
                                    get_template_directory_uri() .
                                    '/assets/icons/user-profile.svg'
                                ); ?>"
                                alt=""
                            >

                            <span>
                                <?php echo $is_logged_in ? 'Mon compte' : 'Connexion'; ?>
                            </span>
                        </button>


                        <div
                            id="profile-menu"
                            class="profile-menu"
                            hidden
                        >

                            <?php if ($is_logged_in): ?>

                                <a href="<?php echo esc_url(
                                    home_url('/my-dashboard/')
                                ); ?>">
                                    Dashboard
                                </a>

                                <a href="<?php echo esc_url(
                                    wp_nonce_url(
                                        home_url('/?harmony_logout=1'),
                                        'harmony_logout'
                                    )
                                ); ?>">
                                    Déconnexion
                                </a>

                            <?php else: ?>

                                <a href="<?php echo esc_url(
                                    get_permalink(get_page_by_path('login'))
                                ); ?>">
                                    Connexion
                                </a>

                                <a href="<?php echo esc_url(
                                    get_permalink(get_page_by_path('signup'))
                                ); ?>">
                                    Inscription
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </nav>

        </div>

    </header>

    <?php if (get_option('harmony_banner_enabled')): ?>

    <div class="site-banner">
        <div class="site-banner__container">

            <span class="site-banner__icon">ⓘ</span>

            <p>
                <?php echo esc_html(
                    get_option('harmony_banner_text')
                ); ?>
            </p>

        </div>
    </div>

    <?php endif; ?>

    <dialog
        id="buy-modal"
        class="buy-modal"
        aria-modal="true"
        aria-labelledby="buy-modal-title"
        hidden
    >

        <div class="buy-modal__overlay"></div>

        <div class="buy-modal__content">

            <button
                type="button"
                class="buy-modal__close"
                aria-label="Fermer"
            >
                &times;
            </button>

            <h2 id="buy-modal-title">
                Où acheter Harmony ?
            </h2>

            <p class="buy-modal__intro">
                Retrouvez Harmony auprès de nos partenaires.
            </p>

            <div class="buy-modal__shops">

                <!-- SHOP 1 -->

                <div class="buy-modal__shop">

                    <h3>
                        Boutique Harmony
                    </h3>

                    <p>
                        Découvrez tous nos produits directement
                        sur notre boutique.
                    </p>

                    <a
                        href="#"
                        class="btn btn--primary"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Visiter la boutique
                    </a>

                </div>


                <!-- SHOP 2 -->

                <div class="buy-modal__shop">

                    <h3>
                        Partenaire
                    </h3>

                    <p>
                        Retrouvez Harmony chez notre partenaire.
                    </p>

                    <a
                        href="#"
                        class="btn btn--primary"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Voir le produit
                    </a>

                </div>

            </div>

        </div>

    </dialog>

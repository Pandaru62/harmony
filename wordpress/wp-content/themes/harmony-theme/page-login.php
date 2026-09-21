<?php

/*
 * Template Name: Harmony Login
 */


$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    error_log('🔥 Harmony login form submitted');


    if (
        !isset($_POST['harmony_login_nonce']) ||
        !wp_verify_nonce(
            $_POST['harmony_login_nonce'],
            'harmony_login'
        )
    ) {
        $error = 'Requête invalide.';
    } else {

        $email = sanitize_email(
            $_POST['email'] ?? ''
        );

        $password = $_POST['password'] ?? '';

        error_log('🔥 Login email: ' . $email);

        if (!$email || !$password) {

            $error = 'Veuillez renseigner votre email et votre mot de passe.';

        } else {

            $result = harmony_api_login(
                $email,
                $password
            );
            error_log(
                '🔥 API login result: ' . print_r($result, true)
            );

            if (!$result['success']) {

                $error = $result['error'];

            } else {

                $_SESSION['harmony_access_token'] =
                    $result['data']['access_token'];

                $_SESSION['harmony_refresh_token'] =
                    $result['data']['refresh_token'] ?? null;

                error_log('🔥 Harmony authentication successful');

                wp_safe_redirect(
                    home_url('/my-dashboard/')
                );

                exit;
            }
        }
    }
}

get_header();

?>

<main class="login-page">

    <section class="default-section">
        <div class="login-container">
    
            <h1>Connexion</h1>

            <?php if (isset($_GET['registered']) && $_GET['registered'] === '1'): ?>

                <div class="login-success">
                    Votre compte a bien été créé !
                    Vous pouvez maintenant vous connecter.
                </div>

            <?php endif;
            if ($error): ?>
    
                <div class="login-error">
                    <?php echo esc_html($error); ?>
                </div>
    
            <?php endif; ?>
    
            <form method="POST">
    
                <?php
                wp_nonce_field(
                    'harmony_login',
                    'harmony_login_nonce'
                );
                ?>
    
                <div class="form-field">
    
                    <label for="email">
                        Email
                    </label>
    
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        autocomplete="email"
                        value="<?php echo esc_attr(
                            $_POST['email'] ?? ''
                        ); ?>"
                    >
    
                </div>
    
                <div class="form-field">
    
                    <label for="password">
                        Mot de passe
                    </label>
    
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    >
    
                </div>
    
                <button class="btn btn--primary" type="submit">
                    Se connecter
                </button>
                <p>Vous n'avez pas encore de compte ? <a href="/signup">Inscrivez-vous</a></p>
            </form>
    
        </div>
    </section>

</main>

<?php get_footer(); ?>

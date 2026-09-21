<?php

/*
 * Template Name: Harmony Signup
 */

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    error_log('🔥 Harmony signup form submitted');

    if (
        !isset($_POST['harmony_signup_nonce']) ||
        !wp_verify_nonce(
            $_POST['harmony_signup_nonce'],
            'harmony_signup'
        )
    ) {
        $error = 'Requête invalide.';

    } else {

        $email = sanitize_email(
            $_POST['email'] ?? ''
        );

        $password = $_POST['password'] ?? '';
        $password_confirmation = $_POST['password_confirmation'] ?? '';

        $display_name = sanitize_text_field(
            $_POST['display_name'] ?? ''
        );

        $firstname = sanitize_text_field(
            $_POST['firstname'] ?? ''
        );

        $lastname = sanitize_text_field(
            $_POST['lastname'] ?? ''
        );


        /*
         * Basic validation
         */

        if (!$email || !$password || !$password_confirmation || !$display_name) {

            $error = 'Veuillez renseigner tous les champs obligatoires.';

        } elseif (!is_email($email)) {

            $error = 'Veuillez renseigner une adresse email valide.';

        } elseif ($password !== $password_confirmation) {

            $error = 'Les mots de passe ne correspondent pas.';

        } else {

            /*
             * Send registration request to API
             */

            if (function_exists('harmony_api_register')) {
                $result = harmony_api_register(
                    $email,
                    $password,
                    $display_name,
                    $firstname,
                    $lastname
                );
            } else {
                $result = [
                    'success' => false,
                    'error' => 'Le service d’inscription est momentanément indisponible.',
                ];
            }

            error_log(
                '🔥 API registration result: ' .
                print_r($result, true)
            );


            if (!$result['success']) {

                $error = $result['error'];

            } else {

                wp_safe_redirect(
                    home_url('/login/?registered=1')
                );
                exit;

            }
        }
    }
}

get_header();

?>

<main class="signup-page">

    <section class="default-section">

        <div class="login-container">

            <h1>Créer votre compte</h1>

            <?php if ($error): ?>

                <div class="login-error">
                    <?php echo esc_html($error); ?>
                </div>

            <?php endif; ?>


            <form method="POST">

                <?php
                wp_nonce_field(
                    'harmony_signup',
                    'harmony_signup_nonce'
                );
                ?>


                <!-- EMAIL -->

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


                <!-- PSEUDO -->

                <div class="form-field">

                    <label for="display_name">
                        Pseudo
                    </label>

                    <input
                        type="text"
                        id="display_name"
                        name="display_name"
                        required
                        autocomplete="nickname"
                        value="<?php echo esc_attr(
                            $_POST['display_name'] ?? ''
                        ); ?>"
                    >

                </div>


                <!-- PRÉNOM -->

                <div class="form-field">

                    <label for="firstname">
                        Prénom
                    </label>

                    <input
                        type="text"
                        id="firstname"
                        name="firstname"
                        autocomplete="given-name"
                        value="<?php echo esc_attr(
                            $_POST['firstname'] ?? ''
                        ); ?>"
                    >

                </div>


                <!-- NOM -->

                <div class="form-field">

                    <label for="lastname">
                        Nom
                    </label>

                    <input
                        type="text"
                        id="lastname"
                        name="lastname"
                        autocomplete="family-name"
                        value="<?php echo esc_attr(
                            $_POST['lastname'] ?? ''
                        ); ?>"
                    >

                </div>


                <!-- PASSWORD -->

                <div class="form-field">

                    <label for="password">
                        Mot de passe
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <!-- PASSWORD CONFIRMATION -->

                <div class="form-field">

                    <label for="password_confirmation">
                        Confirmer le mot de passe
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <button
                    class="btn btn--primary"
                    type="submit"
                >
                    Créer mon compte
                </button>


                <p>
                    Vous avez déjà un compte ?
                    <a href="<?php echo esc_url(
                        home_url('/login/')
                    ); ?>">
                        Se connecter
                    </a>
                </p>

            </form>

        </div>

    </section>

</main>

<?php get_footer(); ?>

<?php
function harmony_settings_page() {
?>
    <div class="wrap">
        <h1>Paramètres généraux du site Harmony</h1>
        
        <form method="post" action="options.php">

            <h2>Bandeau d'information</h2>

            <label>
                <input
                    type="checkbox"
                    name="harmony_banner_enabled"
                    value="1"
                    <?php checked(
                        get_option('harmony_banner_enabled'),
                        '1'
                    ); ?>
                >

                Afficher le bandeau
            </label>

            <p>
                <label for="harmony_banner_text">
                    Message
                </label>
            </p>

            <textarea
                name="harmony_banner_text"
                id="harmony_banner_text"
                rows="3"
                style="width: 100%;"
            ><?php echo esc_textarea(
                get_option('harmony_banner_text')
            ); ?></textarea>
            
            <h2>Réseaux sociaux</h2>
            <p>Gérez les liens de vos réseaux sociaux. Laissez vide si la page n'est plus utilisée.</p>

            <?php settings_fields('harmony_settings_group'); ?>
            <?php do_settings_sections('harmony_settings_group'); ?>

            <table class="form-table">

                <tr>
                    <th scope="row">
                        <label for="harmony_facebook_url">URL Facebook</label>
                    </th>
                    <td>
                        <input 
                            id="harmony_facebook_url"
                            type="url"
                            name="harmony_facebook_url"
                            value="<?php echo esc_attr(get_option('harmony_facebook_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="harmony_instagram_url">URL Instagram</label>
                    </th>
                    <td>
                        <input
                            id="harmony_instagram_url"
                            type="url"
                            name="harmony_instagram_url"
                            value="<?php echo esc_attr(get_option('harmony_instagram_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

                <tr>
                   <th scope="row">
                        <label for="harmony_linkedin_url">URL LinkedIn</label>
                    </th>
                    <td>
                        <input
                            id="harmony_linkedin_url"
                            type="url"
                            name="harmony_linkedin_url"
                            value="<?php echo esc_attr(get_option('harmony_linkedin_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="harmony_youtube_url">URL Youtube</label>
                    </th>
                    <td>
                        <input 
                            id="harmony_youtube_url"
                            type="url"
                            name="harmony_youtube_url"
                            value="<?php echo esc_attr(get_option('harmony_youtube_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

            </table>

            <h2>Contact</h2>
            <p>Gérez les informations affichés sur la page de contact</p>

            <table class="form-table">

                <tr>
                    <th scope="row">
                        <label for="harmony_email_msg">Message e-mail</label>
                    </th>
                    <td>
                        <textarea
                            id="harmony_email_msg"
                            name="harmony_email_msg"
                            class="large-text"
                            rows="5"
                        ><?= esc_textarea(get_option('harmony_email_msg')); ?></textarea>
                    </td>
                </tr>


                <tr>
                    <th scope="row">
                        <label for="harmony_email">Adresse e-mail</label>
                    </th>
                    <td>
                        <input 
                            id="harmony_email"
                            type="email" name="harmony_email"
                            value="<?php echo esc_attr(get_option('harmony_email')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="harmony_address">Adresse postale</label>
                    </th>
                    <td>
                        <textarea
                            id="harmony_address"
                            name="harmony_address"
                            class="large-text"
                            rows="4"
                            class="large-text"
                            ><?= esc_textarea(get_option('harmony_address')); ?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row">
                        <label for="harmony_phone_msg">Message de téléphone</label>
                    </th>
                    <td>
                        <textarea
                            id="harmony_phone_msg"
                            name="harmony_phone_msg"
                            class="large-text"
                            rows="4"
                            class="large-text"
                            ><?= esc_textarea(get_option('harmony_phone_msg')); ?>
                        </textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="harmony_phone">Téléphone</label>
                    </th>
                    <td>
                        <input
                            id="harmony_phone"
                            type="phone" name="harmony_phone"
                            value="<?php echo esc_attr(get_option('harmony_phone')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

            </table>

            <h2>Application</h2>
            <p>Gérez les liens de téléchargement de l'application.</p>

            <table class="form-table">

                <tr>
                    <th scope="row">
                        <label for="harmony_android_url">Google Play</label>
                    </th>
                    <td>
                        <input
                            id="harmony_android_url"
                            type="url"
                            name="harmony_android_url"
                            value="<?php echo esc_attr(get_option('harmony_android_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="harmony_ios_url">App Store</label>
                    </th>
                    <td>
                        <input
                            id="harmony_ios_url"
                            type="url"
                            name="harmony_ios_url"
                            value="<?php echo esc_attr(get_option('harmony_ios_url')); ?>"
                            class="regular-text"
                        />
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>

        </form>
    </div>
    
<?php
}

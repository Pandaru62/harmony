<?php

    if (
        isset($_GET['status']) &&
        $_GET['status'] === 'success'
    ):
?>

    <div class="success-banner">
        Votre message a bien été envoyé.
    </div>

<?php endif; ?>

<form
    class="contact-form"
    method="post"
    action="<?= esc_url(admin_url('admin-post.php')); ?>"
>

    <input
        type="hidden"
        name="action"
        value="harmony_contact"
    >

    <?php wp_nonce_field(
        'harmony_contact',
        'harmony_nonce'
    ); ?>

    <div class="form-group">
        <label for="name">Nom</label>

        <input
            id="name"
            type="text"
            name="name"
            required
        >
    </div>

    <div class="form-group">
        <label for="email">Email</label>

        <input
            id="email"
            type="email"
            name="email"
            required
        >
    </div>

    <div class="form-group">
        <label for="subject">Sujet</label>

        <input
            id="subject"
            type="text"
            name="subject"
            required
        >
    </div>

    <div class="form-group">
        <label for="message">Message</label>

        <textarea
            id="message"
            name="message"
            rows="6"
            required
        ></textarea>
    </div>

    <button class="btn btn--primary">
        Envoyer le message
    </button>

</form>

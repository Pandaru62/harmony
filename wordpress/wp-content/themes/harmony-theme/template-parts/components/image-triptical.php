<?php
    $hasDescription = $args['hasDescription'] ?? false;
?>

<div class="img-triptical">
    <div>
        <img
            src="/wp-content/themes/harmony-theme/assets/images/component/triptical/meditation 1.png"
            alt="Femme méditant assise sur un tapis avec un bracelet connecté Harmony"
        />
        <?php if($hasDescription) {?>
            <div class="triptical-card">
                <h4>Gestion du stress</h4>
                <p>Téléchargez des exercices de respiration directement sur le bracelet et pratiquez-les à tout moment, même sans téléphone.</p>
            </div>
        <?php } ?>
    </div>
    <div>
        <img
            src="/wp-content/themes/harmony-theme/assets/images/component/triptical/dodo 2.png"
            alt="Homme dormant sur le côté avec un bracelet connecté Harmony"
        />
        <?php if($hasDescription) {?>
            <div class="triptical-card">
                <h4>Suivi du sommeil</h4>
                <p>Recevez chaque semaine des conseils personnalisés pour améliorer durablement votre récupération.</p>
            </div>
        <?php } ?>
    </div>
    <div>
        <img
            src="/wp-content/themes/harmony-theme/assets/images/component/triptical/vélo 3.png"
            alt="Femme courant avec un bracelet connecté Harmony"
        />
        <?php if($hasDescription) {?>
            <div class="triptical-card">
                <h4>Activité quotidienne</h4>
                <p>Consultez vos données essentielles en un coup d'œil sur le bracelet, et accédez à une analyse détaillée via l'application.</p>
            </div>
        <?php } ?>
    </div>
</div>

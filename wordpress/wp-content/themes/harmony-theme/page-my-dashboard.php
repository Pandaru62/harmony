<?php

/*
 * Template Name: My Dashboard
 */

if (!session_id()) {
    session_start();
}

$result = harmony_api_get('/dashboard');

get_header();

if (!$result['success']) {

    ?>

    <main class="dashboard-page">
        <div class="dashboard-container">
            <div class="dashboard-error">
                <?php echo esc_html($result['error']); ?>
            </div>
        </div>
    </main>

    <?php

    get_footer();
    return;
}

$dashboard = $result['data'];

$user   = $dashboard['user'] ?? [];
$health = $dashboard['health'] ?? [];
$stats  = $dashboard['stats'] ?? [];
$medals = $dashboard['medals'] ?? [];

$last_sync = $stats['last_sync'] ?? null;

if ($last_sync) {

    $sync_date = new DateTime($last_sync);
    $today = new DateTime('today');
    $yesterday = new DateTime('yesterday');

    if ($sync_date->format('Y-m-d') === $today->format('Y-m-d')) {
        $date_label = "AUJOURD'HUI";
    } elseif ($sync_date->format('Y-m-d') === $yesterday->format('Y-m-d')) {
        $date_label = "HIER";
    } else {
        $date_label = $sync_date->format('d/m/Y');
    }

} else {
    $date_label = "JAMAIS";
}

$steps = (int) ($health['steps'] ?? 0);
$step_goal = 10000;

$step_progress = min(
    100,
    ($steps / $step_goal) * 100
);

?>

<main class="dashboard-page">

    <div class="dashboard-container">

        <!-- HEADER -->

        <section class="dashboard-welcome">

            <h1>
                Bonjour,
                <?php echo esc_html($user['display_name']); ?> !
            </h1>

        </section>


        <!-- SYNC -->

        <section class="dashboard-sync">
            <img
                class="dashboard-sync-img"
                src="/wp-content/themes/harmony-theme/assets/images/bracelet/green_bracelet_harmony.png"
                alt="bracelet harmony vert"
            >
            <div class="sync-frame">
                <div class="sync-placeholder">
                    <img
                        class=""
                        src="/wp-content/themes/harmony-theme/assets/icons/battery.svg"
                        alt=""
                    >
                    65%
                </div>
    
                <div class="sync-content">
    
                    <button class="btn btn--primary">
                        <img
                            class=""
                            src="/wp-content/themes/harmony-theme/assets/icons/bluetooth.svg"
                            alt=""
                        >
                        Synchronisez
                    </button>
    
                    <p>
                        Dernière synchronisation :
                        <strong><?php echo esc_html($date_label); ?></strong>.
                    </p>
    
                </div>
            </div>

        </section>

        <!-- TODAY -->

        <section class="dashboard-section today-section">

            <h2>Aujourd'hui</h2>

            <div class="section-line"></div>

            <div class="today-grid">

                <!-- COLUMN 1 : STEPS -->

                <div class="today-steps">

                    <div
                        class="steps-progress"
                        style="--progress: <?php echo esc_attr($step_progress); ?>%;"
                    >

                        <div class="steps-progress-inner">

                            <img
                                src="/wp-content/themes/harmony-theme/assets/icons/steps.svg"
                                alt="Pas"
                            >

                        </div>

                    </div>

                    <div class="steps-value">

                        <strong>
                            <?php
                            echo esc_html(
                                number_format(
                                    $steps,
                                    0,
                                    ',',
                                    ' '
                                )
                            );
                            ?>
                        </strong>

                        <span>pas</span>

                    </div>

                </div>


                <!-- COLUMN 2 : ADVICE -->

                <div class="today-advice">

                    <div class="advice-frame">

                        <p>
                            Vous êtes sur la bonne voie.<br>
                            Pensez à faire des pauses<br>
                            et à vous aérer !
                        </p>

                    </div>

                    <button class="btn btn--primary advice-button">

                        <img
                            src="/wp-content/themes/harmony-theme/assets/icons/info.svg"
                            alt=""
                        >

                        Plus d'informations

                    </button>

                </div>

            </div>
            
        </section>

    <!-- HEALTH STATS -->

    <div class="today-health-stats">

        <div class="health-stat">

            <img
                src="/wp-content/themes/harmony-theme/assets/icons/heart.svg"
                alt=""
            >

            <span>
                <?php echo esc_html($health['average_heart_rate'] ?? '-'); ?>
                battements par minute
            </span>

        </div>

        <div class="health-stat">

            <img
                src="/wp-content/themes/harmony-theme/assets/icons/lungs.svg"
                alt=""
            >

            <span>
                <?php echo esc_html($health['spo2'] ?? '-'); ?>%
                d'oxygène dans le sang
            </span>

        </div>

    </div>

</section>


        <!-- WELLBEING -->

        <section class="dashboard-section wellbeing-section">

            <h2>Mon bien-être</h2>

            <div class="section-line"></div>

            <div class="wellbeing-card">

                <div class="wellbeing-message">

                    <p>
                        Prenez soin de vous aujourd'hui.
                    </p>

                    <button>
                        ℹ &nbsp; Plus d'informations
                    </button>

                </div>

                <div class="wellbeing-score">

                    <strong>
                        <?php echo esc_html(
                            $health['wellbeing_score'] ?? '-'
                        ); ?>
                    </strong>

                    <span>/100</span>

                </div>

            </div>

        </section>


        <!-- REWARDS -->

        <section class="dashboard-section rewards-section">

            <h2>Mes récompenses</h2>

            <div class="section-line"></div>

            <h3>Médailles</h3>

            <?php if (!empty($medals)): ?>

                <div class="medals-grid">

                    <?php foreach (
                        array_slice($medals, 0, 6)
                        as $medal
                    ): ?>

                        <div class="medal-card">

                            <div class="medal-placeholder">
                                <?php
                                echo esc_html(
                                    $medal['icon'] ?? '🏅'
                                );
                                ?>
                            </div>

                            <strong>
                                <?php echo esc_html(
                                    $medal['name']
                                ); ?>
                            </strong>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <p>
                    Vos premières récompenses apparaîtront ici.
                </p>

            <?php endif; ?>

            <button class="more-medals">
                Plus de médailles
            </button>

        </section>

    </div>

</main>

<?php get_footer(); ?>

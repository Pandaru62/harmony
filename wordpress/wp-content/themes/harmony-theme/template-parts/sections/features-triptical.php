<?php
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
?>

<section class="default-section">
    <div class="div-32">
        <h2><?= nl2br(esc_html($title)); ?></h2>
        <?php if($description):?>
        <p><?= nl2br(esc_html($description)); ?></p>
        <?php endif ?>
    </div>

    <div class="feature-triptical-container">
        <div class="feature-triptical-text-cards">
            <div class="feature-triptical-card" data-image="1">
                <h4>Simplicité</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70" fill="none" class="icon-path">
                    <path d="M12.5 0C9.18479 0 6.00537 1.31696 3.66117 3.66117C1.31696 6.00537 0 9.18479 0 12.5V32.5H32.5V0H12.5ZM32.5 37.5H0V57.5C0 60.8152 1.31696 63.9946 3.66117 66.3388C6.00537 68.683 9.18479 70 12.5 70H32.5V37.5ZM37.5 37.5H70V57.5C70 60.8152 68.683 63.9946 66.3388 66.3388C63.9946 68.683 60.8152 70 57.5 70H37.5V37.5ZM70 32.5V12.5C70 9.18479 68.683 6.00537 66.3388 3.66117C63.9946 1.31696 60.8152 0 57.5 0H37.5V32.5H70Z" class="icon-path"/>
                </svg>
                <p>
                    Une application claire,<br/> sans surcharge de données.
                </p>
            </div>
            <div class="feature-triptical-card triptical-card-active" data-image="2">
                <h4>Bien-être au quotidien</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                    <path d="M88.2003 33.3333C81.769 18.6166 67.0836 8.33331 50.0003 8.33331C32.917 8.33331 18.2295 18.6166 11.8003 33.3333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M50 29.1666C46.0366 33.0417 42.8889 37.6708 40.7421 42.7812C38.5953 47.8916 37.493 53.3799 37.5 58.9229C37.5 59.9645 37.5382 60.9979 37.6146 62.0229C41.5437 65.8943 44.6625 70.5094 46.789 75.599C48.9155 80.6886 50.007 86.1507 50 91.6666C49.9927 86.1503 51.0842 80.6878 53.2107 75.5979C55.3371 70.5079 58.4561 65.8924 62.3854 62.0208C62.4618 60.9986 62.5 59.9659 62.5 58.9229C62.5071 53.3799 61.4048 47.8916 59.258 42.7812C57.1112 37.6708 53.9634 33.0417 50 29.1666Z"  class="icon-path" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.3335 50C8.3335 73.0125 26.9877 91.6666 50.0002 91.6666C50.0074 86.1503 48.916 80.6878 46.7895 75.5979C44.663 70.5079 41.5441 65.8925 37.6147 62.0208C29.8232 54.3067 19.2978 49.9857 8.3335 50Z" class="icon-path" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M91.6667 50C91.6667 73.0125 73.0125 91.6666 50 91.6666C49.9928 86.1503 51.0842 80.6878 53.2107 75.5979C55.3372 70.5079 58.4561 65.8925 62.3855 62.0208C70.177 54.3067 80.7024 49.9857 91.6667 50Z" class="icon-path" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>
                    Des recommandations douces<br/> adaptées à votre rythme.
                </p>
            </div>
            <div class="feature-triptical-card" data-image="3">
                <h4>Fabrication responsable</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                    <path d="M50.0002 8.33331C27.0835 8.33331 8.3335 27.0833 8.3335 50C8.3335 72.9166 27.0835 91.6667 50.0002 91.6667C72.9168 91.6667 91.6668 72.9166 91.6668 50C91.6668 27.0833 72.9168 8.33331 50.0002 8.33331ZM40.0002 71.6667C39.0835 71.6667 37.8335 71.3333 36.6668 70.8333L34.2918 76.6666L29.5418 75L30.2085 73.375C35.2085 60.7917 40.9585 46.4583 62.5002 41.6666C62.5002 41.6666 37.5002 41.6666 29.3752 64.7917C29.3752 64.7917 25.0002 60.4167 25.0002 55.4166C25.0002 50.4166 30.0002 39.7916 42.5002 37.2916C46.0418 36.5833 50.0002 36.0416 53.9168 35.4166C63.7502 34.0833 73.2085 32.75 75.0002 29.1666C75.0002 29.1666 67.5002 71.6667 40.0002 71.6667Z" class="icon-path"/>
                </svg>
                <p>
                    Conçu et assemblé près de Lille<br/> dans une démarche durable.
                </p>
            </div>
        </div>
        <div class="feature-triptical-img swt-4">
            <img
                src="/wp-content/themes/harmony-theme/assets/images/component/triptical/triptical-2.png"
                alt="Bien-être"
            />
        </div>
    </div>

    <a class="btn btn--primary" href="/brand">
        Découvrez Notre Marque
    </a>

</section>

<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>

<section class="projects-page">
    <?php include(TEMPLATE_FRONT . DS . "navbar-alt.php") ?>
    <div class="projects-page__container">
        <h1 class="projects-page__title">my clients</h1>
        <h3 class="projects-page__subtitle">projects</h3>

        <div class="projects-page__wrapper">
            <?php display_projects() ?>
        </div>
    </div>
</section>

<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "social-media.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
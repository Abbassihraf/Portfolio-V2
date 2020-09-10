<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>
<?php include(TEMPLATE_FRONT . DS . "header-home.php") ?>
<?php include(TEMPLATE_FRONT . DS . "about-section.php") ?>
<?php include(TEMPLATE_FRONT . DS . "projects-section.php") ?>
<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "social-media.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

<script>

    var typed = new Typed(".left__role", {
      strings: [
        
        'Web developer',
        'Web designer',
        ],
        loop: true,
        loopCount: Infinity,
        smartBackspace: true,
        typeSpeed: 80,
        backSpeed: 100,
    });
    
    </script>
<section class="projects">
    <div class="projects__container">

        <h1 class="projects__title">my clients</h1>
        <h3 class="projects__subtitle">projects</h3>

    <div class="projects__wrapper thm__owl-carousel testimonials__carousel owl-carousel" data-options='{ 
        "smartSpeed": 700, "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": 6000, "loop": true, "nav": false, "responsive": {
            "0": {"items": 1, "margin": 40},
            "767": {"items": 1, "margin": 40},
            "991": {"items": 2, "margin": 40},
            "1449": {"items": 3, "margin": 24}
        } }'>

        <?php display_last_projects() ?>
    </div>
    <a href="projects.php" class="projects__more">see all</a>
    </div>
</section>
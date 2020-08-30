<?php require_once('../resources/config.php'); ?>

<?php include(TEMPLATE_FRONT . DS . "head.php") ?>

<header class="contact-header">
<?php include(TEMPLATE_FRONT . DS . "navbar-alt.php") ?>

<div class="contact-header__container">
<h1 class="contact-header__title">Get a contact</h1>
<h2 class="contact-header__subtitle">Fill out this simple form. we will contact you promptly to discuss
        next steps.</h2>
    </div>
</header>

<section class="contact">
    <div class="contact__container">
            <h1 class="contact__title">contact me</h1>
            <h3 class="contact__subtitle">let's chat</h3>
            <h4 class="contact__para">Fill this out so we can learn more about your needs.</h4>

            <form action="">
                <input type="text" id="fname" name="fullname" placeholder="Full name" required>
                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
                <input type="tel" id="phone" name="phone" placeholder="Phone number">
                <textarea id="message" name="message" placeholder="Message" required></textarea>
                <input id="send" type="submit" value="send">

            </form>
    </div>
    <div class="contact__informations">
        <div class="contact__informations--card">
                <i class="fas fa-envelope"></i>
                <h1>email:</h1>
                <a class="emailA" href="mailto:hraf.abbassi@gmail.com">hraf.abbassi@gmail.com</a>
                <a class="emailB" href="mailto:aabbassi@student.youcode.ma">aabbassi@student.youcode.ma</a>
        </div>
        <div class="contact__informations--card">
                <i class="fas fa-phone-alt"></i>
                <h1>phone:</h1>
                <a href="tel:+212 621969508">+212 621969508</a>
        </div>
        <div class="contact__informations--card">
                <i class="fas fa-street-view"></i>
                <h1>address:</h1>
                <p>Massira Rue 03 N15 YOUSSOUFIA, 46300</p>
        </div>
    </div>
</section>


<?php include(TEMPLATE_FRONT . DS . "testimonials.php") ?>
<?php include(TEMPLATE_FRONT . DS . "social-media.php") ?>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
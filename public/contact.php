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


<?php send_mail_php() ?>

<p class="contactForm__alertmsg alertMsg"><?php if(isset($send)) echo $send; ?></p>
<p class="contactForm__alertmsg alertMsg"><?php if(isset($notsent)) echo $notsent; ?></p>


<section class="contact">
    <div class="contact__container">
            <h1 class="contact__title">contact me</h1>
            <h3 class="contact__subtitle">let's chat</h3>
            <h4 class="contact__para">Fill this out so we can learn more about your needs.</h4>

            <form action="">
                <input type="text" id="fname" name="name" placeholder="Full name" required>
                <p class="contactForm__alertmsg"><?php if(isset($name_error)) echo $name_error; ?></p>

                <input type="text" id="subject" name="subject" placeholder="Subject" required>
                <p class="contactForm__alertmsg"><?php if(isset($subject_error)) echo $subject_error; ?></p>

                <input type="email" id="email" name="email" placeholder="Email Address" required>
                <p class="contactForm__alertmsg"><?php if(isset($email_error)) echo $email_error; ?></p>

 

                <textarea id="message" name="comments" placeholder="Message" required></textarea>
                <p class="contactForm__alertmsg"><?php if(isset($message_error)) echo $message_error; ?></p>
                <input name="submit" id="send" type="submit" value="send">

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
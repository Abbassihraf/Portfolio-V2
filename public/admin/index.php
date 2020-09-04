<?php 
require_once('../../resources/config.php');
include("user_auth.php");
include(TEMPLATE_BACK . DS . "head.php");
?>

<?php include(TEMPLATE_BACK . DS . "nav.php") ?>


<div class="app-main">
    <?php include(TEMPLATE_BACK . DS . "sidebar.php") ?>
    <div class="app-main__outer">

        <?php 
        $access_admin = 1;

        if($_SERVER['REQUEST_URI'] == "/admin/" || $_SERVER['REQUEST_URI'] == "/admin/index.php?loginSuccess" || $_SERVER['REQUEST_URI'] == "/admin/index.php"){
            include(TEMPLATE_BACK . DS . "dashboard.php") ;
        }

        // Testimonials requests
        
        if(isset($_GET['create_testimonials'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "testimonials/create_testimonials.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['manage_testimonials'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "testimonials/manage_testimonials.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['edit_testimonials'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "testimonials/edit_testimonials.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }

        // Projects requests
        
        if(isset($_GET['create_projects'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "projects/create_projects.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['manage_projects'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "projects/manage_projects.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['edit_projects'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "projects/edit_projects.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }

        // Curriculm requests
        
        if(isset($_GET['create_cv'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "curriculum/create_cv.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }
        if(isset($_GET['manage_cv'])){
            $_SESSION['access'] == $access_admin ?  include(TEMPLATE_BACK . DS . "curriculum/manage_cv.php"):  include(TEMPLATE_BACK . DS . "notAuth.php") ;
        }


?>

        <?php include( TEMPLATE_BACK . DS . "footer.php" )?>
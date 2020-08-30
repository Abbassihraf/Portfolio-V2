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
        if($_SERVER['REQUEST_URI'] == "/admin/" || $_SERVER['REQUEST_URI'] == "/admin/index.php?loginSuccess" || $_SERVER['REQUEST_URI'] == "/admin/index.php"){
            include(TEMPLATE_BACK . DS . "dashboard.php") ;
        }

        // 2ai News requests
        
        // if(isset($_GET['create_2AINewsC2'])){
        //     include(TEMPLATE_BACK . DS . "2aiNewsC2/create_2AINewsC2.php");
        // }




?>

        <?php include( TEMPLATE_BACK . DS . "footer.php" )?>
<?php
include_once("includes/config.php"); ?>

<?php get_header(); ?>

<?php

include_once(INC."controller.php");

$control = new Controller();

if(isset($_REQUEST['frmAction']))

	{

		$control->invoke($_REQUEST['frmAction']);		

	}

$view=$control->view;

$msg = $control->getMsg();

?>



<?php get_page($view,$msg);?>



<?php get_footer();?>




<?php
session_start();
define('ROOT', dirname(__FILE__) );
define("CLS", "classes/");
define("INC", "includes/");
define("VIEW", "view/");

include_once(CLS."cl_db.php");

function get_header()
{
	$page=($view!="")?$view:$_REQUEST['page'];
	if($page!="memorylane")
		include_once(INC."header.php");
}

function get_page($view,$msg)

{
	
	include_once(INC."pages.php");
}

function get_footer()
{
	include_once(INC."footer.php");
}

function get_sidebar()
{
	include_once(INC."sidebar.php");
	
}

function isLogedin()
{
		if(isset($_SESSION['imAdmin']))
		return true;
	else
		echo "<script>window.location='login.php'</script>";
	
}
function redirect($view,$msg)
{
	echo "<script>window.location='index.php?page=".$view."&msg=".$msg."'</script>";
}
?>
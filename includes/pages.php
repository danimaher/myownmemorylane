<?php
$page=($view!="")?$view:$_REQUEST['page'];
$msg=($msg!="")?$msg:$_REQUEST['msg'];
switch($page)
{	
	
	case "register":
	   include_once(VIEW."register.php");
	break;
	
	case "upload":
		if($_SESSION['imAdmin']!="imAdmin" )
		{
	   		isLogedin();
		}
		else
		include_once(VIEW."upload_image.php");
		
	break;
	
	
	case "manage_photos":
		if($_SESSION['imAdmin']!="imAdmin" )
		{
	   		isLogedin();
		}
		else
		{
		include_once(CLS."cl_users.php");
		$cl_user = new Users();
		$photos = $cl_user->getUserphotos($_SESSION['user_id']);
	    include_once(VIEW."manage_photos.php");
		}
	break;

	case "update_caption":
		if($_SESSION['imAdmin']!="imAdmin" )
		{
	   		isLogedin();
		}
		else
		{
		include_once(CLS."cl_images.php");
		$img = new Imgs();
		$caption = $img->getCaption($_REQUEST['id']);
	    include_once(VIEW."edit_caption.php");
		}
	break;

	case "memorylane":
		if($_SESSION['imAdmin']!="imAdmin" )
		{
	   		isLogedin();
		}
		else
		{
		include_once(CLS."cl_users.php");
		$cl_user = new Users();
		$photos = $cl_user->getUserphotos($_SESSION['user_id']);
	    include_once(VIEW."memory_lane.php");
		}
	break;
	
	case "change_password":
	   include_once(CLS."cl_users.php");
	   $cl_user = new Users();
	   $pass = $cl_user->getPassword($_SESSION['user_id']);
	   include_once(VIEW."change_password.php");
	break;
	
		
	case "confirm_delete":
	 
	   include_once(VIEW."confirm_delete.php");
	break;
	
	case "forgot":	  
	   include_once(VIEW."forgot.php");
	break;
	
	
	default:
		include_once(VIEW."home.php");
	break;
	
}
?>
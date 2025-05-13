<?php include_once("includes/config.php"); ?>
<?php include_once("includes/classes/cl_login.php"); ?>
<?php include_once("includes/classes/cl_images.php"); ?>
<?php
	$loger = new Login();
	$loger->createCustomer($_POST['username'], $_POST['pass']);
	
	if($loger->admin_login())
	{
		$img = new Imgs();
		
		$isuploaded=$img->isheUploaded($_SESSION['user_id']);
	
		if($isuploaded)
		echo "<script type='text/javascript'>window.location='index.php?page=memorylane'</script>";
		else
		echo "<script type='text/javascript'>window.location='index.php?page=manage_photos'</script>";
	}
	else
	{
		echo "<script>window.location='login.php?msg=That is not a registered email'</script>";
	}
?>
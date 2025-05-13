<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="keywords" content="My Own Memory Lane, memory, memory support, cognitive support, dementia, alzheimer's, alzheimer, alzheimers, alzheimer's disease, alzheimers disease, alzheimer disease, help alzheimer's, forget, foregetting, memory loss, memory impairment">
  
  <title>My Own Memory Lane</title><meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="css/responsiveslides.css">
  <link rel="stylesheet" href="css/demo.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="js/responsiveslides.min.js"></script>
  <script src="js/js.js"></script>
  <script src="js/jquery.placeholder.js"></script>
		<script>
  
    $(function () {

      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: false,
        speed: 300,      
      });

    });
  </script></head>
  
  
<body><br><div style="text-align: right;" id="wrapper"><?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="" && $_REQUEST['page']=="manage_photos") { ?>
<table style="text-align: left; width: 100%; margin-top:-50px" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="width: 146px;"><a href="index.php"><img src="images/400%20x%20400%20logo.png" alt="My Own Memory Lane" style="border: 0px solid ; width: 100px; height: 100px;"></a></td><td style="text-align: left; width: 648px;"><h1 style="margin-left: 18px; width: 663px; text-transform:capitalize"><?php echo $_SESSION['f_name']; if(substr($_SESSION['f_name'], -1)!="s"){echo "'s";} ?> Memory Lane</h1></td></tr></tbody></table><?php } else { ?>
<a href="index.php"><h1 style="margin-left: 18px; width:100%">My Own Memory Lane</h1></a><?php } ?> <span style="float:right; color:#FFF"><?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="" ) { ?>Welcome <?php echo $_SESSION['f_name']; ?>!<br /><?php  if(isset($_SESSION['user_id']) && $_SESSION['user_id']!="" && $_REQUEST['page']!="manage_photos" ) {
include_once("includes/classes/cl_images.php");
$img = new Imgs();
$isuploaded=$img->isheUploaded($_SESSION['user_id']);	
if($isuploaded)
	$memorylink="index.php?page=memorylane";
else
	$memorylink="index.php?page=manage_photos";
?>
<a href="<?php echo $memorylink; ?>">Go to My Own Memory Lane.</a><br />
<?php } ?><a href="index.php?page=change_password">Change your password.</a><br /><a href="logout.php">Logout.</a><br /><a href="index.php?page=confirm_delete&id=<?php echo $_SESSION['user_id']; ?>" onClick="">Delete Account.</a><?php } else {?><a href="index.php?page=register">Register here.</a><br><a href="login.php">Login here.</a><?php } ?> </span><div style="clear:both;"></div><br>

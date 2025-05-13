<?php include_once("includes/config.php"); ?>
<?php
$act=$_REQUEST['act'];
function getUserbyemail($email,$uid)
{
		 $db=new DB();
		 $db->open();
		 $q="select * from users where email='".addslashes($email)."'";
		 if($uid!=0)
		 	$q="select * from users where email='".addslashes($email)."' AND id!=$uid";
		 $user=$db->fetch_onerow($q);
		 $db->close();
		 if(is_array($user))
		 {
		 	return $user;							
		 }
		 else
		 	return false;	
}

switch($act)
{
	case "validate_email":
		$uid=0;
		if($_REQUEST['user_id']!="")
			$uid=$_REQUEST['user_id'];
		$user=getUserbyemail($_REQUEST['email'],$uid);
		if(is_array($user))
			echo "<span style='color:red'>Email already exists.</span>";
	break;
	
}
?>

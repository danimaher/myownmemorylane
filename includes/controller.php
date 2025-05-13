<?php

class Controller
{
	var $view;
	var $msg;
	function invoke($act)
	{
		switch($act)
		{
			case "login":
			break;
			
			case "add_user":
			   include_once(CLS."cl_users.php");
			   $cl_users = new Users();
			   $return = $cl_users->addUser($_POST['f_name'],$_POST['l_name'],$_POST['email'],$_POST['password']);
			   if($return=="true")
			   {
				   $this->msg="You have registered successfuly.";
				   echo "<script>window.location='login.php?msg=Thanks for registering. Please login now.'</script>";
				  
			   }
			   else
			   {
				   $this->msg="Whoops! Something went wrong. Please try again.";
				   redirect("register",$this->msg);
				  
			   }
			break;
			
			case "file_upload":
			
			 include_once(CLS."cl_upload.php");
			 include_once(CLS."cl_images.php");
			 $imgs = new Imgs();
			if( $imgs->validateUpload($_SESSION['user_id'])){
				
				
			 	$imguploader = new ImgUploader($_FILES["uploader"]);
				if($imguploader->getError()==0)
				{

					$filename=$imguploader->upload_unscaled("/memorylane/userfiles", pathinfo($_FILES['uploader']['name'], PATHINFO_FILENAME));
					
			   		$return = $imgs->addImage($_SESSION['user_id'],$filename,$_POST['caption']);
				   if($return=="true")
				   {
					 	 $this->msg="Photo uploaded successfully.";
				 		 $this->view="manage_photos"; 
				
			   		}
			 		else
			   		{
				  	 	$this->msg="Photo did not upload successfully.";
				   		$this->view="manage_photos"; 
				   }
					 
				}
				else
			   {
				  $this->msg="File type is not supported.";
				  $this->view="manage_photos"; 
			   }
			}
			   else
			   {
				    $this->msg="You can not upload more then 50 images.";
				  $this->view="manage_photos"; 
				}
			break;
			
			case "delete_photo":
			   include_once(CLS."cl_images.php");
			   $imgs = new Imgs();
			   $return = $imgs->deletePhoto($_REQUEST['id']);
			   if($return=="true")
			   {
				   $this->msg="Photo was deleted.";
				   $this->view="manage_photos"; 
				 
			   }
			   else
			   {
				   $this->msg="Photo was not deleted.";
				   $this->view="manage_photos"; 
				  
			   }
			break;
			
			
			case "delete_account":
			   include_once(CLS."cl_users.php");
			   $cl_users = new Users();
			   $return = $cl_users->deleteUser($_REQUEST['id']);
			   if($return=="true")
			   {
				   $this->msg="Account successfully deleted.";
				   $this->view="home"; 
				   session_destroy();
				   echo "<script>window.location='index.php'</script>";
				 
			   }
			   else
			   {
				   $this->msg="Account was not deleted. Please try again.";
				   $this->view="home"; 
				  
			   }
			break;
			
			
			
			case "update_password":
			     include_once(CLS."cl_users.php");
			   $cl_users = new Users();
			   $return = $cl_users->updatePassword($_SESSION['user_id'],$_POST['password']);

			   if($return=="true")
			   {
				   $this->msg="Password successfully updated.";
				   $this->view="manage_photos"; 
				 
			   }
			   else
			   {
				   $this->msg="Password was not updated. Please try again.";
				   $this->view="change_password"; 
				  
			   }
			break;
			
			
			
			case "update_caption":
			  include_once(CLS."cl_images.php");
			   $imgs = new Imgs();
			   $return = $imgs->updateCaption($_POST['id'],$_POST['caption']);

			   if($return=="true")
			   {
				   $this->msg="Caption was successfully updated.";
				   $this->view="manage_photos"; 
				 
			   }
			   else
			   {
				   $this->msg="Caption was not updated. Please try again.";
				   $this->view="manage_photos"; 
				  
			   }
			break;
			
			
			
			case "pass_email":
			   include_once(CLS."cl_users.php");
			   $cl_users = new Users();
			   $return = $cl_users->emailPassword($_REQUEST['email']);
			   if($return=="false")
			   {
				   echo "<script>window.location='index.php?page=forgot&msg=That email is not registered.'</script>";
				 
			   }
			   else
			   {
				  echo "<script>window.location='login.php?msg=Check your email for your password.'</script>";		   			   }
				  
			break;
			
			
			
			
			
			}
	}
	function getMsg()
	{
		return $this->msg;
	}
}
?>
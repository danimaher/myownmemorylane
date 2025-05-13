<?php
 include_once("includes/config.php"); ?>

<?php get_header(); ?>

<script>

function validateForm() {

	

var x=document.forms["loginform"]["username"].value;

if (x==null || x=="" || x=="Username")

  {

  alert("Please provide a username.");

  return false;

  }



var y=document.forms["loginform"]["pass"].value;



  

if (y==null || y=="" || y=="password")

  {

  alert("Please provide a password.");

  return false;

 }



 return true;

}

</script>





<div class="logoBox"><img style="max-width: 400px;" alt="My Own Memory Lane" src="images/400%20x%20400%20logo.png" width="100%"></div>



<div class="coontentBox">

<p style="text-align: right;">

<form action="verify_admin.php" method="post" name="loginform" onsubmit="return validateForm()">

	<div class="login">

		<div class="login-screen">

			<div class="app-title">

				<h3>Login</h3>

               <div class="red loginmsg"> <?php echo $_REQUEST['msg']; ?></div>

               <div class="clear"></div>

			</div>



			<div class="login-form">

				<div class="control-group">

					<span class="caption1">Email:</span>

					<input id="loginuser" type="email" name="username"  required="required"  class="login-field" />

				</div>



				<div class="control-group">

					<span class="caption1">Password:</span>

					<input id="loginpass" type="password" name="pass" required="required" class="login-field" id="login-pass"/>

				</div>

				<input type="submit" class="btn btn-primary btn-large btn-block"  value="Login"> 

				<a class="login-link" href="index.php?page=register">New users register here.</a>

                

                <a class="login-link" href="index.php?page=forgot">Forgot your password? Click here.</a>

			</div>

		</div>

	</div>

</form>

</p>

</div>

<div class="clr"></div>

<?php get_footer();?>


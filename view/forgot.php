<script type="text/javascript">
function validateEmail(str)
{

if(!validateEmailjs(str))
{
	document.getElementById("emailspan").innerHTML="Email is not valid.";
	return false;
}
else
		document.getElementById("emailspan").innerHTML="";

}


</script>
<div class="logoBox"><img style="max-width: 400px;" alt="My Own Memory Lane" src="images/400%20x%20400%20logo.png" width="100%"></div>
<div class="coontentBox">
<p style="text-align: right;">

<form name="register" method="post" onsubmit="return checkpass()" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h3>Reset Password</h3>
                <?php echo $_REQUEST['msg']; ?>
			</div>

			<div class="login-form">
				
                
				<div class="control-group">
                 <span class="caption1">Enter the email used to register and your password will be emailed to that address:</span>
				<input type="email" name="email" onblur="validateEmail(this.value)" id="email" required="required" class="login-field" placeholder=""  />	</div>
                <div id="emailspan"></div>
            
            	
<input type="submit" class="btn btn-primary btn-large btn-block"  value="Submit"> 
				<br />
                <a class="login-link" href="login.php">Back to login.</a>
			</div>
		</div>
	</div>



 <input type="hidden" name="frmAction" value="pass_email" />
                                   
</form>

</p></div>
<div class="clr"></div>
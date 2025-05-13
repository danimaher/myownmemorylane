<div class="logoBox"><img style="max-width: 400px;" alt="My Own Memory Lane" src="images/400%20x%20400%20logo.png" width="100%"></div>
<div class="coontentBox">
<p style="text-align: right;">
<form name="changepassword" method="post" onsubmit="return checkpass()" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h3>Update Password</h3>
                <span class="msg"><?php echo $msg; ?></span>
			</div>

			<div class="login-form">
			
            	<div class="control-group">
                <span class="caption1">Enter Password.</span>
				<input type="password" name="password" required="required" class="login-field"  id="login-pass" value="<?php echo $pass; ?>" />	</div>
                
                <div class="control-group">
                                <span class="caption1">Confirm Password.</span>
				<input type="password" name="confpass" required="required" class="login-field"  value="<?php echo $pass; ?>"  id="login-pass2" />
                <span style="color:red" id="error"></span>	</div>
                
               

<input type="submit" class="btn btn-primary btn-large btn-block"  value="continue" >
				<div style="clear:both"></div>
			</div>
		</div>
	</div>



 <input type="hidden" name="frmAction" value="update_password" />
                                   
</form>

</p></div>
<div class="clr"></div>
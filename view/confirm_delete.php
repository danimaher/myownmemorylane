<div class="logoBox"><img style="max-width: 400px;" alt="My Own Memory Lane" src="images/400%20x%20400%20logo.png" width="100%"></div>
<div class="coontentBox">
<p style="text-align: right;">
<form name="changepassword" method="post" onsubmit="return checkpass()" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h3>Delete Account</h3>
                <span class="msg"><?php echo $msg; ?></span>
			</div>

			<div class="login-form">
			
            	<div class="control-group">
                <span class="caption1">
                Are you sure? This will permanently delete your account and delete all images and captions.</span>
                </div>
                <input type="button" onclick="return gotophotos()" class="btn btn-primary btn-large btn-block"  value="Cancel" >
<br />
<input type="submit" class="btn btn-primary btn-large btn-block"  value="Delete" >
				<div style="clear:both"></div>
			</div>
		</div>
	</div>

<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>" />

 <input type="hidden" name="frmAction" value="delete_account" />
                                   
</form>

</p></div>
<div class="clr"></div>
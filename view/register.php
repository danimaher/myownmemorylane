<script type="text/javascript">
function checkpass()
{
	if(document.getElementById("email").value=="")
	{
		document.getElementById('error').innerHTML="Enter Email.";
		return false;
	}
		
	
	if(document.getElementById("login-pass").value!=document.getElementById("login-pass2").value)
	{
		document.getElementById('error').innerHTML="Passwords do not match.";
		return false;
	}
	else
	{
		document.getElementById('error').innerHTML="";
		return true;
	}
}

function validateEmail(str)
{

if(!validateEmailjs(str))
{
	document.getElementById("emailspan").innerHTML="Email is not valid.";
	return false;
}	
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("emailspan").innerHTML=xmlhttp.responseText;
    }
	if (xmlhttp.readyState<4 )
    {
    document.getElementById("emailspan").innerHTML="<img src='images/loading.gif' >";
    }
  }
xmlhttp.open("GET","ajax.php?act=validate_email&user_id=''&email="+str,true);
xmlhttp.send();
}


</script>
<div class="logoBox"><img style="max-width: 400px;" alt="My Own Memory Lane" src="images/400%20x%20400%20logo.png" width="100%"></div>
<div class="coontentBox">
<p style="text-align: right;">

<form name="register" method="post" onsubmit="return checkpass()" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h3>Register</h3>
                <?php echo $_REQUEST['msg']; ?>
			</div>

			<div class="login-form">
				<div class="control-group">
                 <span class="caption1">First name:</span>
				<input type="text" name="f_name"  class="login-field" placeholder=""/>
				</div>

				<div class="control-group">
                 <span class="caption1">Last name:</span>
				<input type="text" name="l_name" required="required" class="login-field" placeholder=""  />	</div>
                
                
				<div class="control-group">
                 <span class="caption1">Email:</span>
				<input type="email" name="email" onblur="validateEmail(this.value)" id="email" required="required" class="login-field" placeholder=""  />	</div>
                <div id="emailspan"></div>
            
            	<div class="control-group">
                 <span class="caption1">Password:</span>
				<input type="password" name="password" required="required" class="login-field" placeholder=""  id="login-pass" />	</div>
                
                <div class="control-group">
                 <span class="caption1">Confirm password:</span>
				<input type="password" name="confpass" required="required" class="login-field" placeholder=""  id="login-pass2" />
                <span style="color:red" id="error"></span>	</div>
                
               
<input type="submit" class="btn btn-primary btn-large btn-block"  value="Register"> 
				
			</div>
		</div>
	</div>



 <input type="hidden" name="frmAction" value="add_user" />
                                   
</form>

<script>
			$(function() {
				$('input, textarea').placeholder();
				var html;
				if ($.fn.placeholder.input && $.fn.placeholder.textarea) {
					html = '';
				} else if ($.fn.placeholder.input) {
					html = '';
				}
				if (html) {
					$('<p class="note">' + html + '</p>').insertAfter('form');
				}
			});
		</script>

</p>
</div>
<div class="clr"></div>
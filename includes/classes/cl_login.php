<?php

class Login extends DB {	
	private $email;
	private $password;

	function createCustomer($email, $password)
	{
		$this->email=$email;
		$this->password=$password;
		return true;
	}
	

	function saveCustomer()
	{
		DB::open();		
		$sav_usrqry="";				
		$result=DB::execute_non_query($sav_usrqry);
		if($result=="success")

		{				

			DB::close();			

			return true;

		}

		else

		{

			DB::close();

			return false;

		}

	}

	function isvaliduser()
	{
		DB::open();		
		$pass = $this->password;
		$get_cusqry="SELECT * FROM  `users` where email = '".DB::cleanQuery($this->email)."' and password = '".$pass."' ";
		
		
		$user=DB::fetch_onerow($get_cusqry);
		
			if(is_array($user))
			{
				$this->reg_session(DB::encode($user['id']),$user['email']);
			    return true;
		    }
		    else
				return false;
		DB::close();
	}
	

	private function reg_session($uid,$email)

	{

		session_register($uid);

		$_SESSION['usrid'] = $uid;

		$_SESSION['uemail'] = $email;

		
	}

	

	function destroy_logSession()

	{

		session_unregister("usrid");

		session_unregister('uemail');
        
		session_unregister('imAdmin'); 
         echo "<script>window.location='login.php'</script>";	

	}

	

	function admin_login()

	{

		DB::open();

		$pass = $this->password;
		$pass = DB::encode($pass); 
		$get_adminqry="SELECT * FROM  `users` where email = 'admin'";
		$admin=DB::fetch_onerow($get_adminqry);
		$adminpass=$admin['password'];
		if($pass==$adminpass)
			$get_cusqry="SELECT * FROM  `users` where email = '".DB::cleanQuery($this->email)."'";
		else
			$get_cusqry="SELECT * FROM  `users` where email = '".DB::cleanQuery($this->email)."' and password = '".$pass."'";
		$user=DB::fetch_onerow($get_cusqry);
        if(is_array($user))
           {
           	$this->reg_admin_ses($user['id'],$user['f_name'],$user['l_name'],$user['email']);
            return true;
           }
        else
        	return false;	
        DB::close();
	}

	private function reg_admin_ses($user_id,$user_first_name,$user_lname,$user_email)

	{

		$_SESSION['imAdmin']   = "imAdmin" ;
		$_SESSION['user_id']   = $user_id;
		$_SESSION['f_name']     = $user_first_name;
		$_SESSION['l_name']     = $user_lname;		
		$_SESSION['user_email']  = $user_email;

	}
   
    function subscriberidDecodes($id)
	{
		DB::open();
		$id = DB::decode($id);
        return $id;
		
	 }


} 

?>
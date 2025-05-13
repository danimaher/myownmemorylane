<?php
class Users extends DB {	

     function addUser($f_name,$l_name,$email,$password)
	 {
		 DB::open();
		 $return;
		 $pass = DB::encode($password);
		 $qry = "INSERT INTO users (f_name,l_name,email,password,reg_date)
		                   VALUES (
						             '".DB::cleanQuery($f_name)."',
									 '".DB::cleanQuery($l_name)."',
									 '".DB::cleanQuery($email)."',
									 '".DB::cleanQuery($pass)."',
									 Now()
									 
						          )";
								  
		$result=DB::execute_non_query($qry);
		if($result=="success")
		  {
			  $to  = "register@myownmemorylane.com";
			// subject
			$subject = 'New user registered.';
			$message = '<h2>New user details are below:</h2>';
			$message.= '<h4><table><tr><td>Date:</td><td>'.date("m/d/Y").'</td></tr><tr><td>First Name:</td><td>'.$f_name.'</td></tr>';
			$message.= '<tr><td>Last Name:</td><td>'.$l_name.'</td></tr>';
			$message.= '<tr><td>Email:</td><td>'.$email.'</td></tr>';
			$message.= '<tr><td>End Transmission</td><td></td></tr>';
			$message.='</table><h4>';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers
			
			$headers .= 'From: MyOwnMemoryLane <info@myownmemorylane.com>' . "\r\n";

			mail($to, $subject, $message, $headers);
						
			
			$return = "true";return $return;}
		else
		  {$return = "false";return $return;}
		DB::close();						  
	 }
	 
	 function allUsers()
	 {
		 DB::open();
		 $qry = "SELECT  * FROM user ORDER BY user_id DESC";
		 $result=DB::execute_reader($qry);
		
		if(is_array($result))
		  return $result;
		else
		  return false;
		DB::close();
	 }
	 
	 function updateUser($fname,$lname,$ref,$role,$id)
	 {
		 DB::open();
		 $return;
		 $qry = "UPDATE user SET 
		                          first_name = '".DB::cleanQuery($fname)."',
								  last_name  = '".DB::cleanQuery($lname)."',
								  role       = '".DB::cleanQuery($role)."',
								  ref        = '".DB::cleanQuery($ref)."'
				WHERE user_id = ".DB::cleanQuery($id);
				
		$result=DB::execute_non_query($qry);
		if($result=="success")
		  {$return = "true";return $return;}
		else
		  {$return = "false";return $return;}
		DB::close();		
	 }
	 
	 function updatePassword($id,$password)
	 {
		 DB::open();
		 $return;
		 $pass = DB::encode($password);
		 $qry = "UPDATE users SET 
		                          password = '$pass'
								 
				WHERE id = ".DB::cleanQuery($id);
				
		$result=DB::execute_non_query($qry);
		if($result=="success")
		  {$return = "true";return $return;}
		else
		  {$return = "false";return $return;}
		DB::close();		
	 }
	 
	  
	 function getPassword($id)
	 {
		 DB::open();
		 $qry = "SELECT password FROM users WHERE id = ".$id;
		 $result=DB::fetch_onerow($qry);
		 $pass=DB::decode($result['password']);
		 if($pass!="")
		    return $pass;
		  else
		    return false;
		 DB::close(); 
	 }
	 
	  
	 function getPasswordbymail($email)
	 {
		 DB::open();
		$qry = "SELECT password FROM users where email = '".$email."'";
		$result=DB::fetch_onerow($qry);
		
		  $pass=DB::decode($result['password']);
		  if(is_array($result))
		    return $pass;
		  else
		    return false;
		 DB::close(); 
	 }
	 
	 function getUserDetail($id)
	 {
		 DB::open();
		 $qry = "SELECT * FROM user WHERE user_id = ".$id;
		 $result=DB::fetch_onerow($qry);
		 
		  
		  if(is_array($result))
		    return $result;
		  else
		    return false;
		 DB::close(); 
	 }
	 
	 function getUserphotos($uid)
	 {
		 DB::open();
		 $qry = "SELECT  * FROM uploads where user_id=".$uid;
		 $result=DB::execute_reader($qry);
		
		if(is_array($result))
		  return $result;
		else
		  return false;
		DB::close();
	 }
	 
	 
	 
	 function emailPassword($email)
	 {
		 $return;
		 if($pass=$this->getPasswordbymail($email))
		 {	
			$to  = $email;
			// subject
			$subject = 'Your My Own Memory Lane password.';
			$message = 'We hope you are enjoying My Own Memory Lane. Your password is '.$pass.'<br />';
			$message.= '<a href="http://www.myownmemorylane.com">Login here.</a>';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers
			
			$headers .= 'From: MyOwnMemoryLane <support@myownmemorylane.com>' . "\r\n";

			mail($to, $subject, $message, $headers);
						
			$return="true";
		 }
		 else
		 {
		 $return="false";
		 }
		 return $return;
	 }
	 
function deleteUser($id)
	 {
		 DB::open();
		 $return;
		 $qry = "DELETE FROM users WHERE id =".$id;
		 $result=DB::execute_non_query($qry);
		 if($result=="success")
		  {
			 
			  $return = "true";
		  	  return $return;
		  }
		else
		  {$return = "false";return $return;}
		DB::close();
	 }
	 


}
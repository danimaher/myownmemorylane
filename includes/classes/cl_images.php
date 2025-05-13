<?php
class Imgs extends DB {	

     function addImage($user_id,$photo_name,$caption)
	 {
		 DB::open();
		 $return;
		 $pass = DB::encode($password);
		$qry = "INSERT INTO uploads (user_id,photo_name,photo_caption,upload_date)
		                   VALUES (
						             '".DB::cleanQuery($user_id)."',
									 '".DB::cleanQuery($photo_name)."',
									 '".DB::cleanQuery($caption)."',								
									 Now()
									 
						          )";
								  
		$result=DB::execute_non_query($qry);
		if($result=="success")
		  {$return = "true";return $return;}
		else
		  {$return = "false";return $return;}
		DB::close();						  
	 }
	  function updateCaption($id,$caption)
	 {
		 DB::open();
		 $return;
		 $qry = "UPDATE uploads SET 
                photo_caption = '".DB::cleanQuery($caption)."' WHERE id = ".DB::cleanQuery($id);
				
		$result=DB::execute_non_query($qry);
		if($result=="success")
		  {$return = "true";return $return;}
		else
		  {$return = "false";return $return;}
		DB::close();		
	 }
	 
	
	 function deletePhoto($id)
	 {
		 DB::open();
		 $return;
		 $qry = "SELECT * FROM uploads WHERE id = ".$id;
		 $photo_detail=DB::fetch_onerow($qry);
		 
		 $qry = "DELETE FROM uploads WHERE id =".$id;
		 $result=DB::execute_non_query($qry);
		 if($result=="success")
		  {
			  if(file_exists($photo_detail['photo_name']))
			 	 unlink($photo_detail['photo_name']);
			  $return = "true";
		  	  return $return;
		  }
		else
		  {$return = "false";return $return;}
		DB::close();
	 }
	 
	 function validateUpload($id)
	 {
		DB::open();
		$qry = "SELECT * FROM uploads WHERE id = ".$id;
     	$countRows= DB::countRows($qry);
		DB::close();
		if($countRows<=50)
			return true;
		else
			return false;	
	 }
	 
	  function isheUploaded($id)
	 {
		DB::open();
		$qry = "SELECT * FROM uploads WHERE user_id = ".$id;
     	$countRows= DB::countRows($qry);
		DB::close();
		if($countRows>0)
			return true;
		else
			return false;	
	 }
	 
	 function getCaption($id)
	 {
		 DB::open();
		 $qry = "SELECT photo_caption FROM uploads WHERE id = ".$id;
		 $result=DB::fetch_onerow($qry);
		 $caption=$result['photo_caption'];
		 if($caption!="")
		    return $caption;
		  else
		    return false;
		 DB::close(); 
	 }
	 
	 
}
<?php
	include_once("cl_dbconfig.php");
	class DB extends Config {
		var $db;
		function DB() 
		{
		}
		
		function open() {	
			$this->db = mysql_connect( parent::getHost(), parent::getUser(), parent::getPass(), true);			
			$this->_db_error();
			mysql_select_db(parent::getDb(), $this->db);
		}
		
		function close() {
			mysql_close($this->db);
		}
		
		function countRows($cmd)
		{
			$rows=mysql_num_rows(mysql_query($cmd, $this->db));
			$this->_db_error();
			return $rows;		
			
		}
		
		function _db_error() {
			if (mysql_errno()) {
				trigger_error("Database error: #" . mysql_errno() . " - " . mysql_error(), E_USER_ERROR);
			}
			else
			{
				return true;
			}
		}
		
		function execute_reader($cmd) {
			$result = array();
			
			$rs = mysql_query($cmd, $this->db);
			$this->_db_error();
			
			$i = 0;
			while ($row = mysql_fetch_array($rs, MYSQL_ASSOC))
			{
				$result[$i] = $row;
				$i++;
			}
			mysql_free_result($rs);
			
			return $result;
		}
		
		function execute_non_query($cmd) {
			$result=mysql_query($cmd, $this->db);
			if($result)
				return "success";
			$this->_db_error();
		}
		
		function getlastID($tbl)
		{			
			$qry=mysql_query("select MAX(id) from $tbl",$this->db);
			$result=mysql_fetch_row($qry);
			$this->_db_error();	
			return $result[0];
		}
				
		function execute_scalar($cmd) {
			$rs = mysql_query($cmd, $this->db);
			$this->_db_error();
			
			if ($row = mysql_fetch_array($rs))
			{
				$result = $row[0];
			}
			else
			{
				$result = null;
			}
			
			mysql_free_result($rs);
			
			return $result;
		}
		
			
		function check_record($cmd) {
			$rs = mysql_query($cmd, $this->db);
			$this->_db_error();
			
			if ($row = mysql_fetch_array($rs))
			{
				$result = 1;
			}
			else
			{
				$result = null;
			}
			
			mysql_free_result($rs);
			
			return $result;
		}		
		
		function cleanQuery($string)
		{
		  if(get_magic_quotes_gpc()) 
		  {
		    $string = stripslashes($string);
		  }
	  if (phpversion() >= '4.3.0')
	  {
	    $string = mysql_real_escape_string($string);
	  }
	  else
	  {
    	$string = mysql_escape_string($string);
	  }
	  return $string;
	}

		function fetch_onerow($cmd) {
			$rs = mysql_query($cmd, $this->db);
			$this->_db_error();
			
			if ($row = mysql_fetch_array($rs))
			{
				$result = $row;
			}
			else
			{
				$result = null;
			}
			
			mysql_free_result($rs);
			
			return $result;
		}
	
		function encode($name)
		{
			for( $a=0; $a<2; $a++ )
			{
				$name=base64_encode($name);
		
				for( $b=0; $b<3; $b++ )
				{
				$name=base64_encode($name);
				}
			}
		return $name;
		}
		function decode($name)
		{			
			for( $a=0; $a<2; $a++ )
			{
				$name=base64_decode($name);
		
				for( $b=0; $b<3; $b++ )
				{
				$name=base64_decode($name);
				}
			}
		return $name;
		}
	}
?>
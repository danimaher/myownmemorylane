<?php
class Config {
	private $host = '****';
	private $dbuser = '****';
	private $dbpassword = '***';
	private $database = '***';
	private $prefix = '';

function getHost()
{
	return $this->host;
}
function getUser()
{
	return $this->dbuser;
}
function getPass()
{
	return $this->dbpassword;
}
function getDb()
{
	return $this->database;
}
function getPrefix()
{
	return $this->prefix;
}


}

?>

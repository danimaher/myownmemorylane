<?php
class Config {
	private $host = 'mysql9001.site4now.net';
	private $dbuser = 'aaffb7_memory';
	private $dbpassword = 'Memory123!@#';
	private $database = 'db_aaffb7_memory';
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

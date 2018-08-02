<?php
class Admin
{
	function __construct()
	{
		$GLOBALS["db"]  = new _Connection;
		$GLOBALS["db"]->connect();
		$this->conn = $GLOBALS["db"]->getConnection();
	}
	
	public function __destruct()
	{
		if (!empty($GLOBALS["db"])){
			$GLOBALS["db"]->disconnect();
		}
	}
	
	function getAdmin($vars)
	{
		$GLOBALS["db"]->getConnection();
		
		$sql = "SELECT * FROM user Where id='". $GLOBALS["db"]->escape($vars["id"]) .
		"' AND pwd='". $GLOBALS["db"]->escape($vars["pwd"])."'";
		
		$GLOBALS["db"]->prepare($sql);
		
		$GLOBALS["db"]->query();
		
		$admin = $GLOBALS["db"]->fetch('');
		return $admin;
	}
}
?>
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
		
		$sql = "SELECT a.*,b.* from user a INNER JOIN dept b ON a.dept=b.deptName".
		" Where a.id='". $GLOBALS["db"]->escape($vars["id"]) .
		"' AND a.pwd='". $GLOBALS["db"]->escape($vars["pwd"])."'";
		
		$GLOBALS["db"]->prepare($sql);
		$GLOBALS["db"]->query();
		$admin = $GLOBALS["db"]->fetch('');
		return $admin;
	}
	

	

	public function getuser($vars)
	{
	    $this->sql = "SELECT * from user";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	}
	
	public function adduser($vars)
	{
	    $this->sql = "INSERT INTO user(id, userName, dept, pwd, types)VALUES (?,?,?,?,?)";
	    
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('sssss', $vars["userId"], $vars["userName"], $vars["dept"],$vars["pwd"],$vars["types"]);
	    $stmt->execute();
	    $stmt->close();
	}
	
	public function userdetail($vars)
	{
	    $this->sql = "SELECT * FROM user WHERE id='".$vars["id"]."'";
	    
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	}
	
	public function upuser($vars)
	{
	    $this->sql = "UPDATE user SET userName=?, pwd=?, types=? WHERE id=?";
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('ssss', $vars["userName"],$vars["pwd"],$vars["types"],$vars["id"]);
	    $stmt->execute();
	    $stmt->close();
	}
	
	public function UNIT($vars)
	{
	    $this->sql = "SELECT deptName FROM dept";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    return $list;
	}
	
	public function deluser($id)
	{
	    $this->sql = "delete from user WHERE id=?";
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('s', $id);
	    $stmt->execute();
	    $stmt->close();
	}
}
?>
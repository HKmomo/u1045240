<?php 
class Member
{
	private $sql;
	private $conn;
	
	function __construct()
	{
	    $GLOBALS["db"]  = new _Connection;
	    $GLOBALS["db"]->connect();
		$this->conn = $GLOBALS["db"]->getConnection();
	}
	
	public function __get($property)
	{
		return $this->$property;
	} 
 
	public function __set($property, $value)
	{
		$this->$property = $value;
	}
	
	
	public function addout($vars)
	{
		$this->sql = "INSERT INTO outsouring(STATUS,UNIT,COMPANY,EID,NAME,WCONTEXT,PTEL,EMERG) VALUES(?,?,?,?,?,?,?,?)";
		
		$stmt = $this->conn->prepare($this->sql);
		$stmt->bind_param('isssssss', $vars["STATUS"], $vars["UNIT"], $vars["COMPANY"],$vars["EID"],$vars["NAME"],$vars["WCONTEXT"],$vars["PTEL"],$vars["EMERG"]);
		$stmt->execute();
	}
	
	public function upout($EID)
	{
	    $this->sql = "update outsourcing set STATUS ='2'  WHERE EID=?";
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('s', $EID);
	    $stmt->execute();
	    $stmt->close();
	}
	
	public function delout($EID)
	{
	    $this->sql = "delete from outsourcing WHERE EID=?";
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('s', $EID);
	    $stmt->execute();
	    $stmt->close();
	}
	
/*	public function updateMember($vars)
	{
		$this->sql = "UPDATE XXX SET XXX=? WHERE id=?";
		$stmt = $this->conn->prepare($this->sql);
		$stmt->bind_param('si', $vars["XXXX"], $vars["userId"]);
		$stmt->execute();
		$stmt->close();
	}
*/		
	
	public function getList($vars)
	{
	    $this->sql = "SELECT STATUS,UNIT,COMPANY,EID,NAME,WCONTEXT,PTEL,EMERG from outsourcing";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	    
	    
	}
	public function detail($vars)
	{
	    $this->sql = "SELECT * FROM outsourcing WHERE EID='".$vars["eid"]."'";
	    
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	}
	

	
	
/*	public function getInfo($vars)
	{
		$this->sql = "SELECT * FROM XXX WHERE userId=".$vars["userId"];
	
		$GLOBALS["db"]->prepare($this->sql);
		$GLOBALS["db"]->query();
		$list = $GLOBALS["db"]->fetch('object');
		return $list;
	}
*/	
}
?>
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
	    $autoEID = "SELECT CONCAT('".$_SESSION["deptId"]."',LPAD(SUBSTR(IFNULL(MAX(d.EID),0),2)+1,4,0)),".
	    "?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,? FROM outsourcing d WHERE UNIT ='".$_SESSION["dept"]."'";
	    $this->sql = "INSERT INTO outsourcing(EID,PID,NAME,UNIT,WCONTEXT,WTIME,WBEGINDATE,WENDDATE,COMPANY,PADDRESS,PTEL,EMERG,TRAIN,MEMOA,STATUS,HEALTH,BDATE,SEX,LOCAL,BLOOD,DEFECT,ORIGIN,EDUCATION,EXAMNEW,EXAMNORMAL,XRAY,FLU,BLIVER,CLIVER,EXAMSPECIAL,LICENSE) ".$autoEID;
	    
		$stmt = $this->conn->prepare($this->sql);
		$stmt->bind_param('sssssssssssssissssssssssssssss',$vars["PID"],$vars["NAME"],$vars["UNIT"],
		    $vars["WCONTEXT"],$vars["WTIME"],$vars["WBEGINDATE"],$vars["WENDDATE"],
		    $vars["COMPANY"],$vars["PADDRESS"],$vars["PTEL"],$vars["EMERG"],$vars["TRAIN"],
		    $vars["MEMOA"],$vars["STATUS"],$vars["HEALTH"],$vars["BDATE"],$vars["SEX"],
		    $vars["LOCAL"],$vars["BLOOD"],$vars["DEFECT"],$vars["ORIGIN"],$vars["EDUCATION"],
		    $vars["EXAMNEW"],$vars["EXAMNORMAL"],$vars["XRAY"],$vars["FLU"],$vars["BLIVER"],
		    $vars["CLIVER"],$vars["EXAMSPECIAL"],$vars["LICENSE"]);
 		$stmt->execute();
 		$stmt->close();
	}
	

	public function upout($EID)
	{
	    $this->sql = "update outsourcing set STATUS ='1'  WHERE EID=?";
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
		
	
	public function getList($vars)
	{
	    $this->sql = "SELECT STATUS,UNIT,COMPANY,EID,NAME,WCONTEXT,PTEL,EMERG, PID".
	       " from outsourcing";
	    
	    if (!empty($vars["unit"]))
	    {
	       $this->sql .= " WHERE UNIT='".$vars["unit"]."'";
	    }
	    
	    $this->sql .= " order by STATUS,UNIT,COMPANY,EID";
	    
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
	
	public function updateInfo($vars)
	{
	    $this->sql = "UPDATE `outsourcing` SET `PID`=?,`NAME`=?,`UNIT`=?,`WCONTEXT`=?,`WTIME`=?,`WBEGINDATE`=?,`WENDDATE`=?,`COMPANY`=?,`PADDRESS`=?,`PTEL`=?,`EMERG`=?,`TRAIN`=?,`MEMOA`=?,`STATUS`=?,`HEALTH`=?,`BDATE`=?,`SEX`=?,`LOCAL`=?,`BLOOD`=?,`DEFECT`=?,`ORIGIN`=?,`EDUCATION`=?,`EXAMNEW`=?,`EXAMNORMAL`=?,`XRAY`=?,`FLU`=?,`BLIVER`=?,`CLIVER`=?,`EXAMSPECIAL`=?,`LICENSE`=? WHERE EID=?";
	    $stmt = $this->conn->prepare($this->sql);
	    $stmt->bind_param('ssssssssssssssissssssssssssssss', $vars["PID"], $vars["NAME"],$vars["UNIT"],$vars["WCONTEXT"],$vars["WTIME"],$vars["WBEGINDATE"],$vars["WENDDATE"],$vars["COMPANY"],$vars["PADDRESS"],$vars["PTEL"],$vars["EMERG"],$vars["TRAIN"],$vars["MEMOA"],$vars["STATUS"],$vars["HEALTH"],$vars["BDATE"],$vars["SEX"],$vars["LOCAL"],$vars["BLOOD"],$vars["DEFECT"],$vars["ORIGIN"],$vars["EDUCATION"],$vars["EXAMNEW"],$vars["EXAMNORMAL"],$vars["XRAY"],$vars["FLU"],$vars["BLIVER"],$vars["CLIVER"],$vars["EXAMSPECIAL"],$vars["LICENSE"],$vars["EID"]);
	    $stmt->execute();
	    $stmt->close();
	}

/*	public function dept($vars)
	{
	    $this->sql = "SELECT dept FROM user WHERE id='".$_SESSION["userId"]."'";
	    
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	}
*/
	public function deptlist($vars)
	{
	    $this->sql = "SELECT STATUS,UNIT,COMPANY,EID,NAME,WCONTEXT,PTEL,EMERG, PID from outsourcing where UNIT='".$vars["UNIT"]."'".
	    " order by STATUS,UNIT,COMPANY,EID";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    $GLOBALS["db"]->disconnect();
	    return $list;
	}

	public function UNIT($vars)
	{
	    $this->sql = "SELECT UNIT,COUNT(UNIT) AS total FROM outsourcing".
	   	    " where STATUS='0' GROUP BY UNIT";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    return $list;
	}
	
/*	public function count($vars)
	{
	    $this->sql = "SELECT UNIT,COUNT(UNIT) AS total FROM outsourcing".
	   	    "where UNIT='".$_SESSION["dept"]."' GROUP BY UNIT";
	    $GLOBALS["db"]->prepare($this->sql);
	    $GLOBALS["db"]->query();
	    $list = $GLOBALS["db"]->fetch('object');
	    return $list;
	}
*/

}
?>
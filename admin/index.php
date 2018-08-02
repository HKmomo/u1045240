<?php
new AdminController();

class AdminController
{
	// 程式名稱
	private $content;
	// 變數的集合
	private $vars;
	// 所取得的物件集合
	private $object;
	// 頁數
	private $page;
	private $path = "../view/admin/";
	/**
	 * 初始化
	/ * @param $vars 所有變數
	/ * @param $apName 程式名稱
	 */
	function __construct()
	{
		include_once ("../common/AutoLoad.php");
		$init = new _Init();
		$this->vars = $init->getVars();
		$vars = $this->vars;
		
		if (empty($vars["m"]))
		{
			$this->index($vars);
		} else{
			if (!method_exists($this, $vars["m"]))
			{
				header("Location: /");
				exit;
			}else{
				$this->$vars["m"]($vars);
			}
		}
	}
	
	
	public function __destruct()
	{
		if (!empty($GLOBALS["db"])){
			$GLOBALS["db"]->disconnect();
		}
	}
	
	function setContent($content)
	{
		$this->content = $content;
	}
	
	function getContent()
	{
		return $this->content;
	}
	
	/**
	 * 顯示網頁
	 /* @param $files 檔案
	 */
	function view($files)
	{
		include_once($files);
	}

	
	/**
	 * 登入
	 * @param $vars
	 */
	function index($vars)
	{
		$this->file = "../view/admin/index.php";
		$this->view($this->file);
	}
	
	
	/**
	 * 後台首頁
	 */ 
	function home($vars)
	{
		include_once ("../common/Session.php");
		$this->view($GLOBALS["adminContent"]);
	}
	
	function delout($vars)
	{
	    $this->member = new Member();
	    $status = "";
	    for ($i=0;$i<sizeof($_REQUEST["EID"]);$i++)
	    {
	        if ($_POST["STATUS"][$i]=="1")
	        {
	            $status = "2";
	        }else{
	            $status = "1";
	        }
	        $status = "1";
	        $this->member->delout($_POST["EID"][$i], $status);
	    }
	    //$this->member->delout($vars);
	    $this->setContent("../view/admin/doctor.php");
	    $this->view($GLOBALS["adminContent"]);
	}
	
	function add($vars)
	{
	    $this->member = new Member();
	    $this->member->add($vars);
	    $this->setContent("../view/admin/join.php");
	    $this->view($GLOBALS["admincontent"]);
	}
	
	/**
	 * 登出
	 */
	function logout($vars)
	{
		session_destroy();
		$this->index(null);
	}
	
		
	function get_basename($filename)
	{
		return preg_replace('/^.+[\\\\\\/]/', '', $filename);
	}
}
?>
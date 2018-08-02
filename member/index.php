<?php
new MemberController();

class MemberController
{
    
    private $Member;
    
    private $object;
    
    private $vars;
    
    private $page;
    
    private $path = "../view/admin/home.php";
    
    function __construct()
    {
        include_once ("../common/AutoLoad.php");
        $init = new _Init();
        $this->vars = $init->getVars();
        $vars = $this->vars;
        
        if (! empty($vars["s"])) {
            include_once ("../common/Session.php");
        }
        //$this->outsourcing = new MemberController();
        
        if (! method_exists($this, $vars["m"])) {
            header("Location: /");
            exit();
        } else {
            $this->$vars["m"]($vars);
        }
    }
    function view($files)
    {
        require_once ($files);
    }
    
    function setContent($content)
    {
        $this->content = $content;
    }
    
    function getContent()
    {
        return $this->content;
    }
    
    function setObject($object)
    {
        $this->object = $object;
    }
    
    function getObject()
    {
        return $this->object;
    }
    function outsourcing($vars)
    {       $this->member = new Member();
            $this->object = $this->member->getList($vars);
            $this->setContent("../view/member/outsourcing.php");
            $this->view($GLOBALS["adminContent"]);
            
            
    }
    
/*    function change($vars)
    {
        $this->member = new Member();
        
        for ($i=0;$i<sizeof($_REQUEST["EID"]);$i++)
        {
            $item = explode("_", $_REQUEST["EID"][$i]);
            
            if ($item[1]=="1")
            {
                $status = "2";
            }else{
                $status = "1";
            }
            
            $this->member->upout($item[0], $status);
        }
        
        header("Location: ./?outsourcing");
        exit;
    }
*/    
    
    function delete($vars)
    {   
        $this->member = new Member();
        
        for ($i=0;$i<sizeof($_REQUEST["EID"]);$i++)
        {
            if (!empty($vars["del"]))
            {
                $this->member->delout($_POST["EID"][$i]);
            }else{
                $this->member->upout($_REQUEST["EID"][$i]);
            }
        }
        header("Location: ./?outsourcing");
        exit;
        //$this->setContent("../view/member/outsourcing.php");
        //$this->view($GLOBALS["adminContent"]);
    }

    function edit($vars)
    {
        $this->member = new Member();
        $this->object = $this->member->detail($vars);
        $this->view("../view/member/edit.php");
    }
  
    function add($vars)
    {
        $this->member = new Member();
        $this->object = $this->member->addout($vars);
        $this->view("../view/member/add.php");
    }
  
}
 ?>
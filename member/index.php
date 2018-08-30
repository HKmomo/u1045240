<?php
new MemberController();

class MemberController
{
    
    private $Member;
    
    private $object;
    
    private $dept;
    
    private $vars;
    
    private $page;
    
    private $path = "../view/member/";
    
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
            if($vars["m"] != "login" && $vars["m"] != "index")
            {
                include_once ("../common/Session.php");
            }
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
    {       
        $this->member = new Member();
        $_SESSION["UNIT"] = $this->member->UNIT($vars);
        $this->object = $this->member->getList($vars);
        $this->setContent($this->path."outsourcing.php");
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
    }

    function edit($vars)
    {
        $this->member = new Member();
        $this->object = $this->member->detail($vars);
        $this->setContent($this->path."edit.php");
        $this->view($GLOBALS["adminContent"]);
    }
    
    function editInfo($vars)
    {
        $member = new Member();
        $member->updateInfo($vars);
        header("Location: ./?outsourcing");
        exit;
    }
  
    function add($vars)
    {
 
        $this->setContent($this->path."add.php");
        $this->view($GLOBALS["adminContent"]);
    }
    
    /*
    function addInfo($vars)
    {
        $this->member = new Member();
        
        //use vars to insert EID number
        $this->object = $this->member->addout($vars);
        $this->setContent($this->path."add.php");
        $this->view($GLOBALS["adminContent"]);
    
    }
    */
    
    function addInfo($vars)
    {
        $this->member = new Member();
        $this->object = $this->member->addout($vars);
        header("Location: ./?outsourcing");
        exit;
    }
    
    function nupdate($vars)
    {
        $this->member = new Member();
        $this->object = $this->member->updateInfo($vars);
        header("Location: ./?outsourcing");
        exit;
    }
    
 /*   function getdept($vars)
    {
        $this->member = new member();
        $this->object = $this->member->dept($vars);
        $this->view("../view/content.php");

      
    }
 */
 
    

  
}
 ?>
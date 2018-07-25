<?php
header("content-type:text/html;charset=utf-8");
new IndexController();

class IndexController
{
    // 傳入的參數
    private $vars;
    // 內容
    private $content;
    private $object;
    
    public function __destruct()
    {
        if (!empty($GLOBALS["db"])) $GLOBALS["db"]->disconnect();
    }
    
    
    function __construct()
    {
        include_once ("common/AutoLoad.php");
        
        $init = new _Init();
        $vars = $init->getVars();
        
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
    
    
    function setContent($content)
    {
        $this->content = $content;
    }
    
    function getContent()
    {
        return $this->content;
    }
    
    function view($files)
    {
        require_once($files);
    }
    
    
    function index($vars)
    {
        $this->file = "view/admin/index.php";
        $this->view($this->file);
    }
    
    
    /**
     * 帳號及密碼驗證
     * @param $vars
     */
    function login($vars)
    {
        $this->admin = new Admin();
        // 帳號及密碼驗證
        $this->object = $this->admin->getAdmin($vars);
        
        if (count($this->object)<=0){
            echo("N");
        }else{
            echo("Y");
            $_SESSION["userId"] = $vars["id"];
        }
    }
}
?>
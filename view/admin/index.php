<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>外包人員專屬資料系統</title>
<link href="../view/css/default.css" rel="stylesheet">
<link href="../view/css/bootstrap/bootstrap.css" rel="stylesheet">
<link href="../view/css/login.css" rel="stylesheet">
<link href='../view/css/icomoon/style.css' rel='stylesheet' />
<script type="text/javascript" src="../view/js/tools.js"></script>
<style>
#container { width: 100%; height: 50%; display: table; }
#position { 
	display: table-cell; vertical-align: middle;
	width: 100%; text-align: center;
}
</style>
<script type="text/javascript">

function init()
{
	document.getElementById("id").focus();
}

function keydown(e)
{
	var keycode;
	if (window.event)
	{
		 keycode = window.event.keyCode;
	} else if (e)
	{
		 keycode = e.which;
	} else
	{
		return true;
	}

	if (keycode == 13)
	{
		doLogin();
		return false;
	}else
	{
		return true;
	}
}


function doLogin()
{
	document.getElementById("msg").innerHTML = "";
	var id = document.getElementById("id");
	var pwd = document.getElementById("pwd");
	
	if (id.value=="" || id.value=="帳號"){
		alert("請輸入帳號");
		id.focus();
		return;
	}
	if (pwd.value=="" || pwd.value=="密碼"){
		alert("請輸入密碼");
		pwd.focus();
		return;
	}
	
	document.getElementById("bt1").disabled = true;
	showWait();
	
	var poststr = "./?login&id=" + encodeURIComponent(encodeURIComponent(id.value))
    + "&pwd=" + encodeURIComponent(encodeURIComponent(pwd.value));
	
	var url = "./";
   
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		try {
			req = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				req = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
   
	req.open("POST", url, false);
	req.onreadystatechange = function ()
	{
		var msg = req.responseText;
		
		if (req.readyState == 4) {
    		if (req.status == 200){
        		if (msg.trim()!="Y")
        		{
        			document.getElementById("msg").innerHTML = "<font style=\"font-size:12pt\">帳號或密碼錯誤</font>";
        		}else{
    				location.href= "admin/?home";
        		}
    			msg = "";
    	    } else {
              msg = "登入失敗";
            }
        }
    	document.getElementById("bt1").disabled = false;
    	hideWait();
        
	};
	req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	req.setRequestHeader("Content-length", poststr.length);
	req.setRequestHeader("Connection", "close");
	req.send(poststr);
}
</script>
</head>
<body onLoad="init()">
<div id="wrapper">
  <div id="container" class="full">
    <div id="main" class="container">
      <div id="loginform" class="shbox">
        <form method="post">
          <label class="data">帳號:<br>
            <input type="text" name="id" id="id" placeholder="Administrator" Autocomplete="off">
          </label>
          <label class="data">密碼:<br>
            <input id="pwd" type="password" name="pwd" placeholder="password" Autocomplete="off">
          </label>
          <label class="submit">
            <button id="bt1" class="btn btn-info right" type="button" onclick="doLogin()">
              <i class=" icon-enter icon-white"></i>Login
            </button>
            <br><span class="error" id="msg"></span>
          </label>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<html>
<head>
<script src="../view/js/jquery-1.3.1.js" type="text/javascript"></script>
<script src="../view/js/jquery.validate.js" type="text/javascript"></script>
<script src="../view/js/jquery.validate.messages.js" type="text/javascript"></script>
<script src="../view/js/sweetalert2.js"></script>
<link rel="stylesheet" href="../view/css/sweetalert2.min.css"/></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript">
function check(id){ 
	
  var url = "./?checkuser&id="+id;
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
    var poststr = "";
    req.open("POST", url, false);
    req.onreadystatechange = function ()
    {
      var msg = req.responseText.trim();
      if (req.readyState == 4)
      {
        if (req.status == 200)
        {
          if (msg=="error")
          {
             document.getElementById("userMsg").innerHTML = "<font color=\"#ff0000\">此帳號已存在</font>";
             document.getElementById("userId").focus();
          }else{
            document.getElementById("userMsg").innerHTML = "";
          }
        }
      }
    };
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.setRequestHeader("Content-length", poststr.length);
    req.setRequestHeader("Connection", "close");
    req.send(poststr);
}
</script>
<title>單位負責人新增</title>
</head>
<body>
<form name="list" method="post" id="user" action="./">
<input type="hidden" name="c" value="admin">
<input type="hidden" name="m" value="addinfo">
<table align="center" BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="40%" bgColor="#ffffff">
  <thead class="title">
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="20%">業管單位：</font></td>
      <TD><select name="dept">
			
						<option value="總務室"
							>總務室</option>
						
						<option value="護理部"
							>護理部</option>
						
						<option value="營養室"
							>營養室</option>
						
						<option value="工務室"
							 selected
							>工務室</option>
						
						<option value="補給室"
							>補給室</option>
						
						<option value="醫企室"
							>醫企室</option>
						
						<option value="社工室"
							>社工室</option>
						
						<option value="資訊室"
							>資訊室</option>
						
						<option value="核醫科"
							>核醫科</option>
						
		</select></TD>

    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">帳號：</font></td>
      <td width="50%"><input type="text" name="userId" id="userId"  maxlength="10" value="" onBlur="check(this.value)">
      <font color="#ff0000"></font><span id="userMsg"></span></td>

    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">姓名：</font></td>
      <td width="50%"><input type="text" name="userName" maxlength="10" value="" >
       <font color="#ff0000">*最多10個字</font></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">密碼：</td>
      <td width="50%"><input type="text" name="pwd" class="pwd" maxlength="10" value="" >
       <font color="#ff0000">*最多10個字</font></td>
    </tr>
     <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">權限：</td>
      <td width="90%"><INPUT TYPE="RADIO" NAME="types" VALUE="A">A:全功能
                      <INPUT TYPE="RADIO" NAME="types" VALUE="B">B:單位功能
                      <INPUT TYPE="RADIO" NAME="types" VALUE="C">C:全院查詢</td>
    </tr>
     <tr>
     <td colspan="2" align="center"> <button type="submit" value="確定">確定</button></td>
     </tr>
    
    </thead>
    </table>
</body>    
 </html>
<html>
<head>
<title>外包人員新增</title>
<script src="../view/js/jquery-1.3.1.js" type="text/javascript"></script>
<script src="../view/js/jquery.validate.js" type="text/javascript"></script>
<script src="../view/js/jquery.validate.messages.js" type="text/javascript"></script>
<script src="../view/js/sweetalert2.js"></script>
<link rel="stylesheet" href="../view/css/sweetalert2.min.css"/>
<script type="text/javascript">
  // 驗證資料是否輸入
  var $j = jQuery.noConflict();
  $j(document).ready(function(){
    $j("#sign-form").validate({
    errorElement: "em",
    submitHandler: function(form) {
      ajaxAdd();
      return;
    }
  });
  });

 

 function checkid(e) {

	  
	  
	   var id, tmp, cnt, chrpos;
	   var total=0;
	   // 每個字母對應一個數字, A->10 B->11....以此類推
	   var idarea = new String("ABCDEFGHJKLMNPQRSTUVXYWZIO");   
	   id = e.value.toUpperCase();

	   // 這裡可以加些檢查其長度等等功能

	   // 主要的驗證邏輯:
	   // 例A110112224  --> 10110112224
	   //  1011011222
	   //*1987654321   (每個數字固定乘上這個數字)
	   //-------------
	   //  1987054642  再將每一個數字相加  得 46 
	   // 取其餘數 46 % 10 = 6 (若為0 則0為其檢查碼)
	   // 若不為0 則檢查碼為 10 - 6 = 4
	   for(cnt=0; cnt < 9; cnt++) {
	      if (cnt == 0) {  // 為第一碼時
	chrpos = idarea.indexOf(id.substring(0,1))+10;  // 計算字母對應的數字
	total += Math.floor(chrpos / 10); // 取整數, 捨去小數部份
	total += ((chrpos % 10) * 9);
	      }
	      else {
	total += ( parseInt(id.substr(cnt,1)) * (9-cnt) );
	      }
	    }
	    tmp = ((total%10)==0)?0:(10-(total%10));   
	    if (tmp.toString() != id.substr(9,1)) {
	        window.alert('您輸入的身分證字號檢查碼有誤！');
	        e.select();
	        return false;
	    }
	   return true;
	}



		


 </script>
</head>
<body>



&emsp;<strong><font color="#990000">1.*</font></strong><font
	color="#990000">:</font><span class="style1">必填項</span><font
	color="#990000"> <strong><em><font color="#990000"><strong><em><font
	color="#990000"><strong><em><font color="#990000"><strong><font
	color="#990000"><strong><em><font color="#990000"><strong><em><font
	color="#990000"><strong><em><font color="#990000"><strong><em><font
	color="#990000">身分證號</font></em></strong></font></em></strong></font></em></strong></font></em></strong>.</font></strong></font></em></strong></font></em></strong>姓名<strong><em><font
	color="#990000"><strong><em><font color="#990000">.</font></em><font
	color="#990000">中榮契約期間_到職日</font></strong>,</font></em></strong></font></em></strong></font><span
	class="style1">且[身分證號]須正確,否則無法新增! </span></p>
&emsp;<em><strong><font color="#990000">2.</font></strong></em><span
	class="style1">若為外僑或其它,務必點選,否則無法新增! </span>


<form name="list" id="sign-form" method="post" action="./" >
<input type="hidden" name="m" value="addInfo">
<br>
<table style="float:right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="89%" bgColor="#ffffff">
  <thead class="title">
 <!--  
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*工作證號</strong></font></td>
      <td width="70%"><input type="text" name="EID"  value=""></td>
    </tr> --> 
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*姓名</strong></font></td>
      <td width="70%"><input type="text" name="NAME" value="" class="required" maxlength="10"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*身分證號</strong></font></td>
      <td width="70%"><input type="text" name="PID" id="PID" value="" class="required" maxlength="10" onchange="return checkid(this.form.PID);">
      <INPUT TYPE="CHECKBOX" NAME="xPID" onchange="checkId(this.value)" VALUE="">外僑或其他</td>
    </tr>
   
     <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>職稱</strong></td>
      <td width="70%"><input type="text" name="WCONTEXT" value="" ></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>工作時間</strong></td>
      <td width="70%"><input type="text" name="WTIME" value="" >*ex:0700-1700</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*中榮契約時間_到職日</strong></font></td>
      <td width="70%"><input type="" name="WBEGINDATE" value="" class="required" maxlength="7" onkeyup="this.value=this.value.replace(/\D/g,'')" >*ex:1070101限7位數字</td>
    </tr>

    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*承包廠商</strong></font></td>
      <td width="70%"><input type="text" name="COMPANY" value="" class="required" ></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>通訊地址</strong></td>
      <td width="70%"><input type="text" name="PADDRESS" value="" ></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>通訊電話</strong></td>
      <td width="70%"><input type="text" name="PTEL" value="" >*ex:04-226312xx或0900-123456</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>緊急聯絡人</strong></td>
      <td width="70%"><input type="text" name="EMERG" value="" >*ex:許xx 04-226312xx</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><font color="#ff0000"><strong>*出生年月日</strong></font></td>
      <td width="70%"><input type="text" name="BDATE"  class="required"  value="" onkeyup="this.value=this.value.replace(/\D/g,'')" >*ex:60年7月1號-->600701
      <font color="#FF0000">備註:格式錯將[無法匯入]使用中榮數位學習網--</font></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>籍貫</strong></td>
      <td width="70%"><input type="text" name="LOCAL" value=""></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3" ><font color="#ff0000"><strong>*性別</strong></font></td>
      <td width="70%"><INPUT TYPE="RADIO"  NAME="SEX" VALUE="1" class="required" >男
                      <INPUT TYPE="RADIO"  NAME="SEX" VALUE="2">女</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>血型</strong></td>
      <td width="70%"><INPUT TYPE="RADIO" NAME="BLOOD" VALUE="1" checked>O
                      <INPUT TYPE="RADIO" NAME="BLOOD" VALUE="2">A
                      <INPUT TYPE="RADIO" NAME="BLOOD" VALUE="3">B
                      <INPUT TYPE="RADIO" NAME="BLOOD" VALUE="4">AB</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>身心障礙手冊</strong></td>
      <td width="70%"><INPUT TYPE="RADIO" NAME="DEFECT" VALUE="0">無資料
                      <INPUT TYPE="RADIO" NAME="DEFECT" VALUE="1" checked>無
                      <INPUT TYPE="RADIO" NAME="DEFECT" VALUE="2">有</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>原住民</strong></td>
      <td width="70%"><INPUT TYPE="RADIO" NAME="ORIGIN" VALUE="0">無資料
                      <INPUT TYPE="RADIO" NAME="ORIGIN" VALUE="1" checked>否
                      <INPUT TYPE="RADIO" NAME="ORIGIN" VALUE="2">是</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>教育程度</strong></td>
      <td width="70%"><INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="0" checked>無資料
                      <INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="1">國小
                      <INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="2">國中
                      <INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="3">高中
                      <INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="4">大專(專科、大學)
                      <INPUT TYPE="RADIO" NAME="EDUCATION" VALUE="5">研究所(碩士、博士)</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>證照名稱及字號</strong></td>
      <td width="70%">*ex舉例:府社老字第0930xxx919號<BR>
      <TEXTAREA NAME="LICENSE" COLS="60" ROWS="3"></TEXTAREA>
      </td>
    </tr>
    <tr>
		<td bgcolor="#c3e1b4" width="9%" rowspan="7"><div align="center"><strong>健康管理</strong><BR>
	  （依健檢結果修正健檢統計）</div></td>
		<td colspan="2" bgcolor="#c3e1b4"><div align="center"><strong>健檢結果<br>
	  </strong>（手動輸入）</div></td>
		<td>
		  <textarea rows=8 cols=60 name=HEALTH>體檢項目       日期     結果    建議
新進健檢    
定期體檢
特殊健檢
X光
流感
B肝
          </textarea>
	  <br/>*限470字內</td>
	</tr>
	<tr>
		<td width="10%" rowspan="6" bgcolor="#c3e1b4"><div align="center"><strong>健檢統計</strong><BR>
（鍵打登錄）</div></td>
		<td bgcolor="#c3e1b4" ><div align="center"><strong>新進健檢</strong></div></td>
		<td><INPUT TYPE="RADIO" NAME="EXAMNEW" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="EXAMNEW" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="EXAMNEW" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="EXAMNEW" VALUE="3">拒做</td>
	 </tr>
	 <tr>
		<td bgcolor="#c3e1b4"><div align="center"><strong>定期健檢</strong>(近3年)</div></td>
		<td><INPUT TYPE="RADIO" NAME="EXAMNORMAL" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="EXAMNORMAL" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="EXAMNORMAL" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="EXAMNORMAL" VALUE="3">拒做</td>
	 </tr>
     <tr>
		<td bgcolor="#c3e1b4"><div align="center"><strong>特殊健檢</strong></div></td>
		<td><INPUT TYPE="RADIO" NAME="EXAMSPECIAL" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="EXAMSPECIAL" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="EXAMSPECIAL" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="EXAMSPECIAL" VALUE="3">拒做</td>
	 </tr>
	 <tr>
		<td bgcolor="#c3e1b4"><div align="center"><strong>B肝</strong></div></td>
		<td><INPUT TYPE="RADIO" NAME="BLIVER" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="BLIVER" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="BLIVER" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="BLIVER" VALUE="3">拒做</td>
	 </tr>
	 <tr>
		<td bgcolor="#c3e1b4"><div align="center"><strong>X光</strong>(近1年)</div></td>
		<td><INPUT TYPE="RADIO" NAME="XRAY" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="XRAY" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="XRAY" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="XRAY" VALUE="3">拒做</td>
	 </tr>
	 <tr>
		<td bgcolor="#c3e1b4"><div align="center"><strong>流感</strong>(近1年)</div></td>
		<td><INPUT TYPE="RADIO" NAME="FLU" VALUE="0" checked>無資料
            <INPUT TYPE="RADIO" NAME="FLU" VALUE="1">本院
            <INPUT TYPE="RADIO" NAME="FLU" VALUE="2">院外
            <INPUT TYPE="RADIO" NAME="FLU" VALUE="3">拒做</td>
	 </tr>
	
	 <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>訓練紀錄</strong></td>
      <td width="70%"><TEXTAREA NAME="TRAIN" COLS="60" ROWS="8"></TEXTAREA>
      *限256字內</td>
     </tr>

    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><strong>備註</strong></td>
      <td width="70%"><TEXTAREA NAME="MEMOA" COLS="60" ROWS="8"></TEXTAREA>
      *限256字內</td>
    </tr>     
    <tr>
    <td colspan="4" align="center"><button type="submit" id="submit" value="確定"  >確定</button></td>
    </tr>
  </thead>	
</table>

<INPUT type=hidden value="<?php if(!empty($_SESSION["userId"])){ echo $_SESSION["dept"];} ?>" name="UNIT"> 
<INPUT type=hidden value="0" name="STATUS"> 
<input type="hidden" name="WENDDATE" value=""> 


</form>
</body>
</html>
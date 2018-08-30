<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">" type="text/javascript"></script>
<script>

</script>
<title>單位負責人修改</title>
</head>
<body>
<form  name="list" method="post" action="./">
<input type="hidden" name="c" value="admin">
<input type="hidden" name="m" value="editinfo">
<table align="center" BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="40%" bgColor="#ffffff">
  <thead class="title">
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="20%">業管單位：</font></td>
      <td width="50%"><?php echo($this->object->dept);?></td>

    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">帳號：</font></td>
      <td width="50%"><input type="hidden" name="id" maxlength="10" value="<?php echo($this->object->id);?>">
      <?php echo($this->object->id);?></td>

    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">姓名：</font></td>
      <td width="50%"><input type="text" name="userName" maxlength="10" value="<?php echo($this->object->userName);?>" ></td>
       
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">密碼：</td>
      <td width="50%"><input type="text" name="pwd" maxlength="10" value="<?php echo($this->object->pwd);?>" >
    </tr>
     <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" width="10%">權限：</td>
      <td width="90%"><INPUT TYPE="RADIO" NAME="types" VALUE="A"<?php if($this->object->types =='A'){?>CHECKED<?php }?>>A:全功能
                      <INPUT TYPE="RADIO" NAME="types" VALUE="B"<?php if($this->object->types =='B'){?>CHECKED<?php }?>>B:單位功能
                      <INPUT TYPE="RADIO" NAME="types" VALUE="C"<?php if($this->object->types =='C'){?>CHECKED<?php }?>>C:全院查詢
                      </td>
    </tr>
     <tr>
     <td colspan="2" align="center"> <button type="submit" value="確定"  >確定</button><a href="./?editinfo">放棄修改</a></td>
     </tr>
    
    </thead>
    </table>
    </form>
</body>    
 </html>
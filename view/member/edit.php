<html>
<head>
</head>
<table border="1" cellpadding="5" style="float:left; border:3px #000000 solid;text-align:center;">
<tr><td colspan="2">單位</td></tr>
<tr><td colspan="2"><font color="red">資訊室</font></td></tr>
<tr><td colspan="2">外包人員</td></tr>
<tr><td>工務室</td><td>2</td></tr>
<tr><td>總務室</td><td>1</td></tr>
</table>

<form name="list" method="post" action="./">
<input type="hidden" name="m" value="editInfo">
<button type='submit'>修改</button>

<table style="float:Right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="90%" bgColor="#ffffff">
  <thead class="title">
    <tr>
      <td bgcolor="#c3e1b4" width="10%">業管單位</td>
      <td width="90%"><input type="text" name="UNIT" value="<?php echo($this->object->UNIT);?>"></td>
    </tr>
  </thead>
  
</table>
</form>
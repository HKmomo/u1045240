<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">" type="text/javascript"></script>
<script>
$(function() {
	$('#checkall').click(function(){
		$("input[name='EID[]'").prop("checked",$(this).prop("checked"));
		});
});
function doEdit(id)
{
	location.href="./?edit&eid=" + id;
}

function doAdd()
{
	location.href="./?add;
}


</script>
</head>
<table border="1" cellpadding="5" style="float:left; border:3px #000000 solid;text-align:center;">
<tr><td colspan="2">單位</td></tr>
<tr><td colspan="2"><font color="red">資訊室</font></td></tr>
<tr><td colspan="2">外包人員</td></tr>
<tr><td>工務室</td><td>2</td></tr>
<tr><td>總務室</td><td>1</td></tr>
</table>

<form name="list" method="post" action="./">
<input type="hidden" name="c" value="member">
<input type="hidden" name="m" value="delete">
&emsp;&emsp;請輸入查詢<br>&emsp;&emsp;[工作證號]或[身分證號]<br>&emsp;&emsp;<input type="text" name="EID" /><br><br>  
&emsp;&emsp;<button type="button" name="insert" onclick='doAdd()' >新增</button>
<button type='submit' id='delete' name="del" value='刪除'  >刪除</button>
<button type='submit' id='update' name="upd" value='離職'  >離職</button>

<table style="float:Right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="90%" bgColor="#ffffff">
  <thead class="title">
    <tr bgcolor="#c3e1b4">
        <th align="center" width="2%" style="text-align:center"><input type="checkbox" id="checkall"  onclick="checkall"></th>
      <th width="3%">狀態</th>
      <th width="5%">業管單位</th>
      <th width="10%">承包廠商</th>
      <th width="5%">工作證號</th>
      <th width="5%">姓名</th>
      <th width="8%">職稱</th>
      <th width="8%">通訊電話</th>
      <th width="7%">緊急聯絡人</th>
      <th width="5%">編輯</th>
    </tr>
  </thead>
  <tbody>
<?php 
if (count($this->object)>0){
    for ($i=0;$i<count($this->object);$i++)
    {   
    ?>
    <tr>
      <td align="center">
     <input type="checkbox" name="EID[]" value="<?php echo($this->object[$i]->EID);?>">
      </td>
      <td align="center"><?php echo($this->object[$i]->STATUS);?></td>
      <td align="center"><?php echo($this->object[$i]->UNIT);?></td>
      <td align="center"><?php echo($this->object[$i]->COMPANY);?></td>
      <td align="center"><?php echo($this->object[$i]->EID);?></td>
      <td align="center"><?php echo($this->object[$i]->NAME);?></td>
      <td align="center"><?php echo($this->object[$i]->WCONTEXT);?></td>
      <td align="center"><?php echo($this->object[$i]->PTEL);?></td>
      <td align="center"><?php echo($this->object[$i]->EMERG);?></td>
      <td align="center"><button type='button' class='btn_detial' onclick="doEdit('<?php echo($this->object[$i]->EID);?>')">修改</button></td>
    </tr>
    <?php }
     }else{?>
    <tr>
      <td colspan="10" align="center"><font color="#ff0000">查無資料</font>
    <?php }?>
  </tbody>
</table>
</form>
</html>
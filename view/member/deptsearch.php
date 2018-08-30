<html>
<head>
<title>外包人員專屬資料系統</title>
</head>
<form>
&emsp;&emsp;請輸入[工作證號]或[身分證號]：<input type="search" class="light-table-filter" data-table="tablesorter" placeholder="請輸入工作證號或身分證號"><br><br>
</form>


&emsp;<button type="button" name="insert" onclick='doAdd()' >新增</button>
<button type='submit' id='delete' name="del" value='刪除'  onclick="{if(confirm('確定要刪除嗎?')){this.document.formname.submit();return true;}return false;}" >刪除</button>
<button type='submit' id='update' name="upd" value='離職'  onclick="{if(confirm('確定要離職嗎?')){this.document.formname.submit();return true;}return false;}" >離職</button>

<table style="float:right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" class="tablesorter" display:inline; borderColor="#99cc00" cellPadding="3" width="90%" bgColor="#ffffff">
  <thead class="title">
    <tr bgcolor="#c3e1b4">
        <th data-sorter="false" align="center" width="1%" style="text-align:center"><input type="checkbox" id="checkall"  onclick="checkall"></th>
      <th width="3%">狀態</th>
      <th width="5%">業管單位</th>
      <th width="10%">承包廠商</th>
      <th width="5%">工作證號</th>
      <th width="5%" data-sorter="false" >姓名</th>
      <th width="8%" data-sorter="false" >職稱</th>
      <th width="8%" data-sorter="false" >通訊電話</th>
      <th width="7%" data-sorter="false" >緊急聯絡人</th>
      <th style="display:none" width="7%" data-sorter="false" ></th>
      <th width="5%" data-sorter="false" >編輯</th>
      
    </tr>
  </thead>
  <tbody id="data">
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
      <td style="display:none" align="center"><?php echo($this->object[$i]->PID);?></td>
      <td align="center"><button type='button' class='btn_detial' onclick="doEdit('<?php echo($this->object[$i]->EID);?>')">MORE/修改</button></td>
    </tr>
    <?php }
     }else{?>
    <tr>
      <td colspan="10" align="center"><font color="#ff0000">查無資料</font>
    <?php }?>
  </tbody>
</table>


<div id="nav" align="center"></div>
</form>
</html>
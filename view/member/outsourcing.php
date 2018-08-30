<html>
<head>
<title>外包人員專屬資料系統</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js'></script>
<link rel="stylesheet" href="../view/css/theme.default.css"></link>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.30.5/js/jquery.tablesorter.min.js"></script>
<script>

$(function () {

    $("#out").tablesorter({
    theme: "default",
    widgets: ['zebra']});
    
});

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
	location.href="./?add";
}



(function(document) {
	  'use strict';

	  // 建立 LightTableFilter
	  var LightTableFilter = (function(Arr) {
	    var _input;

	    // 資料輸入事件處理函數
	    function _onInputEvent(e) {
	      _input = e.target;
	      if (_input.value=="")
	      {
	        $('#data tr').hide();
	        $('#data tr').slice(0,rowsShown).show();
	        return;
	       }
	      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
	      Arr.forEach.call(tables, function(table) {
	        Arr.forEach.call(table.tBodies, function(tbody) {
	          Arr.forEach.call(tbody.rows, _filter);
	        });
	      });
	    }

	    // 資料篩選函數，顯示包含關鍵字的列，其餘隱藏
	    function _filter(row) {
	      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
	      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
	    }

	    return {
	      // 初始化函數
	      init: function() {
	        var inputs = document.getElementsByClassName('light-table-filter');
	        Arr.forEach.call(inputs, function(input) {
	          input.oninput = _onInputEvent;
	        });
	      }
	    };
	  })(Array.prototype);

	  // 網頁載入完成後，啟動 LightTableFilter
	  document.addEventListener('readystatechange', function() {
	    if (document.readyState === 'complete') {
	      LightTableFilter.init();
	    }
	  });

	})(document);

var rowsShown=5;       //每頁顯示的行
//分頁在頁面加載完成時執行
$(document).ready(function() {
	                            
	var rowsTotal=$('#data tr').length;          //獲取總共的行
  var numPages=Math.ceil(rowsTotal/rowsShown); //計算出有多少頁
  
   //顯示頁碼，將頁面加入#nav內
  for(var i=0;i<numPages;i++){
      var pageNum=i+1;
       $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a>&nbsp;');
   }
   
  /* 初次分頁操作
    * 先將全部行隱藏
    * 再顯示第一頁應該顯示的行數(本示例為3)
    * 為第一個頁碼加一個值為active的class屬性，方便加樣式
    * */
   $('#data tr').hide();
   $('#data tr').slice(0,rowsShown).show();
   $('#nav a:first').addClass('active');
   
   
   //頁碼點擊事件
   $('#nav a').bind('click',function(){
       $('#nav a').removeClass('active');    //移除所有頁碼的active類
       $(this).addClass('active');           //為當前頁碼加入active類
       var currPage=$(this).attr('rel');     //取出頁碼上的值
       var startItem=currPage*rowsShown;     //行數的開始=頁碼*每頁顯示的行
       var endItem=startItem+rowsShown;      //行數的結束=開始+每頁顯示的行
       $('#data tr').hide();                 //全部行都隱藏
       
       //顯示從開始到結束的行
       $('#data tr').slice(startItem,endItem).css('display','table-row');
   });
   
})


</script>
</head>

<form>
&emsp;&emsp;請輸入[工作證號]或[身分證號]：<input type="search" class="light-table-filter" data-table="tablesorter" placeholder="請輸入工作證號或身分證號"><br><br>
</form>
<?php if($_SESSION["types"]=="A" || $_SESSION["types"]=="B"){?>
<form name="list" method="post" action="./">
<input type="hidden" name="c" value="member">
<input type="hidden" name="m" value="delete">
&emsp;<button type="button" name="insert" onclick='doAdd()' >新增</button>
<button type='submit' id='delete' name="del" value='刪除'  onclick="{if(confirm('確定要刪除嗎?')){this.document.formname.submit();return true;}return false;}" >刪除</button>
<button type='submit' id='update' name="upd" value='離職'  onclick="{if(confirm('確定要離職嗎?')){this.document.formname.submit();return true;}return false;}" >離職</button>
<?php }?>
<table style="float:right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" class="tablesorter" display:inline; borderColor="#99cc00" cellPadding="3" width="90%" bgColor="#ffffff">
  <thead class="title">
    <tr bgcolor="#c3e1b4">
<?php if($_SESSION["types"]=="A" || $_SESSION["types"]=="B"){?>
        <th data-sorter="false" align="center" width="1%" style="text-align:center"><input type="checkbox" id="checkall"  onclick="checkall"></th>
  <?php }?>    
      <th width="3%">狀態</th>
      <th width="5%">業管單位</th>
      <th width="10%">承包廠商</th>
      <th width="5%">工作證號</th>
      <th width="5%" data-sorter="false" >姓名</th>
      <th width="8%" data-sorter="false" >職稱</th>
      <th width="8%" data-sorter="false" >通訊電話</th>
      <th width="7%" data-sorter="false" >緊急聯絡人</th>
      <th style="display:none" width="7%" data-sorter="false" ></th>
<?php if($_SESSION["types"]=="A" || $_SESSION["types"]=="B"){?>
      <th width="5%" data-sorter="false" >編輯</th>
 <?php }?>     
    </tr>
  </thead>
  <tbody id="data">
<?php 
if (count($this->object)>0){
    for ($i=0;$i<count($this->object);$i++)
    {   
    ?>
    <?php if($_SESSION["dept"] == $this->object[$i]->UNIT || ($_SESSION["dept"]=='資訊室'&& $_SESSION["types"]=='A')|| $_SESSION["types"]=="C"){?>
    <tr>
    <?php if($_SESSION["types"]=="A" || $_SESSION["types"]=="B"){?>
      <td align="center">
     <input type="checkbox" name="EID[]" value="<?php echo($this->object[$i]->EID);?>">
      </td>
      <?php }?>
     
      <td align="center"><?php if(($this->object[$i]->STATUS)==0){ echo "現職";}else{  ?>  <font color="#ff0000">離職</font> <?php }?></td>
      <td align="center"><?php echo($this->object[$i]->UNIT);?></td>
      <td align="center"><?php echo($this->object[$i]->COMPANY);?></td>
      <td align="center"><?php echo($this->object[$i]->EID);?></td>
      <td align="center"><?php echo($this->object[$i]->NAME);?></td>
      <td align="center"><?php echo($this->object[$i]->WCONTEXT);?></td>
      <td align="center"><?php echo($this->object[$i]->PTEL);?></td>
      <td align="center"><?php echo($this->object[$i]->EMERG);?></td>
      <td style="display:none" align="center"><?php echo($this->object[$i]->PID);?></td>
<?php if($_SESSION["types"]=="A" || $_SESSION["types"]=="B"){?>      
      <td align="center"><button type='button' class='btn_detial' onclick="doEdit('<?php echo($this->object[$i]->EID);?>')">MORE/修改</button></td>
      <?php }?> 
    </tr>
    <?php } } 
     }else{?>
    <tr>
      <td colspan="10" align="center"><font color="#ff0000">查無資料</font>
    <?php }?>
  </tbody>
</table>
<font face="微軟正黑體"><div id="nav" align="center"></div></font>
</form>
</html>
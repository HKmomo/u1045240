<html>


<title>單位負責人查詢</title>
<p><h1><center><b><font face="標楷體">單位負責人</font></b></center></h1></p>

<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">" type="text/javascript"></script>
<script type="text/javascript" src="../view/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../view/js/jquery-tablepage-1.0.js"></script>
<script>



function douserEdit(id)
{
	location.href="./?edituser&id=" + id;
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
	
var rowsShown=10; 
//分頁在頁面加載完成時執行
$(document).ready(function() {
	                            //每頁顯示的行
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
 });

</script>
</head>
<body>

<form>
&emsp;&emsp;請輸入[業管單位]或[帳號]：<input type="search" class="light-table-filter" data-table="tablesorter" placeholder="請輸入業管單位或帳號或姓名"><br><br>
</form>

<form name="list" method="post" action="./">
<input type="hidden" name="c" value="admin">
<input type="hidden" name="m" value="delete">

<label><b>備註*:權限</b>(A：全功能、B:單位功能、C:全院查詢)</label>
<table style="float:right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="user" class="tablesorter" display:inline; borderColor="#99cc00" cellPadding="3" width="90%" bgColor="#ffffff">
  <thead class="title">
    <tr bgcolor="#c3e1b4">
      <th width="2%"><button type='submit' id='delete' name="del" value='刪除'  onclick="{if(confirm('確定要刪除嗎?')){this.document.formname.submit();return true;}return false;}" >刪除</button></th>
      <th width="10%">業管單位</th>
      <th width="10%">姓名</th>
      <th width="10%">帳號</th>
      <th width="10%">密碼</th>
      <th width="10%">權限</th>
      <th width="5%">編輯</th>
    </tr>
  </thead>
  <tbody id="data">
<?php 
if (count($this->object)>0){
    for ($i=0;$i<count($this->object);$i++)
    {   
    ?>
    <tr>
      <td align="center"><input type="checkbox" name="id[]" value="<?php echo($this->object[$i]->id);?>"></td>
      <td align="center"><?php echo($this->object[$i]->dept);?></td>
      <td align="center"><?php echo($this->object[$i]->userName);?></td>
      <td align="center"><?php echo($this->object[$i]->id);?></td>
      <td align="center"><?php echo($this->object[$i]->pwd);?></td>
      <td align="center"><?php echo($this->object[$i]->types);?></td>
      <td align="center"><button type='button' class='btn_detial' onclick="douserEdit('<?php echo($this->object[$i]->id);?>')">MORE/修改</button></td>
    </tr>
    <?php }
     }else{?>
    <tr>
      <td colspan="10" align="center"><font color="#ff0000">查無資料</font>
    <?php }?>

  </tbody>

  </table>
<font face="微軟正黑體"><div id="nav" align="center"></div></font>
</form>
</body>

</html>



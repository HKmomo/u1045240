<html>
<head>
<title>外包人員修改</title>
</head>
<form name="list" method="post" action="./">
<input type="hidden" name="m" value="editInfo">

<table style="float:Right; BORDER-COLLAPSE: collapse" border="2" cellSpacing="1" id="out" display:inline; borderColor="#99cc00" cellPadding="3" width="89%" bgColor="#ffffff">
  <thead class="title">
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>姓名</b></td>
      <td width="70%"><input type="text" name="NAME" value="<?php echo($this->object->NAME);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>工作證號</b></td>
      <td width="70%"><input type="hidden" name="EID" value="<?php echo($this->object->EID);?>">
      <?php echo($this->object->EID);?></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>身分證號</b></td>
      <td width="70%"><input type="text" name="PID" value="<?php echo($this->object->PID);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>狀態</b></td>
      <td width="70%"><input type="radio" name="STATUS" value="0" <?php if($this->object->STATUS =='0'){?>CHECKED<?php }?>><font color="blue"><b>現職</b></font>
                      <input type="radio" name="STATUS" value="1" <?php if($this->object->STATUS =='1'){?>CHECKED<?php }?>><font color="red"><b>離職</b></font> <input type="text" name="WENDDATE" value="<?php echo($this->object->WENDDATE);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>職稱</b></td>
      <td width="70%"><input type="text" name="WCONTEXT" value="<?php echo($this->object->WCONTEXT);?>"></td>
    </tr>
 <tr>
      <td bgcolor="#c3e1b4" colspan="3" align="right"><b>業管單位</b></td>
      <TD><form><select name="UNIT">
   
      <option value="總務室"
      <?php if($this->object->UNIT =="總務室"){?>selected<?php }?>
       >總務室</option>
      
      <option value="護理部"
                        <?php if($this->object->UNIT =="護理部"){?>selected<?php }?>
       >護理部</option>
      
      <option value="營養室"
                       <?php if($this->object->UNIT =="營養室"){?>selected<?php }?>
       >營養室</option>
      
      <option value="工務室"
                       <?php if($this->object->UNIT =="工務室"){?>selected<?php }?>
       >工務室</option>
      
      <option value="補給室"
                      <?php if($this->object->UNIT =="補給室"){?>selected<?php }?> 
       >補給室</option>
      
      <option value="醫企室"
                      <?php if($this->object->UNIT =="醫企室"){?>selected<?php }?>
       >醫企室</option>
      
      <option value="社工室"
                       <?php if($this->object->UNIT =="社工室"){?>selected<?php }?>
       >社工室</option>
      
      <option value="資訊室"
                       <?php if($this->object->UNIT =="資訊室"){?>selected<?php }?>
       >資訊室</option>
      
      <option value="核醫科"
                       <?php if($this->object->UNIT =="核醫室"){?>selected<?php }?>
       >核醫科</option>
       
       <option value="緩和醫療中心"
                       <?php if($this->object->UNIT =="緩和醫療中心"){?>selected<?php }?>
       >緩和醫療中心</option>
       
       <option value="圖書館"
                       <?php if($this->object->UNIT =="圖書館"){?>selected<?php }?>
       >圖書館</option>
       
       <option value="中醫科"
                       <?php if($this->object->UNIT =="中醫科"){?>selected<?php }?>
       >中醫科</option>
       
       <option value="急診部"
                       <?php if($this->object->UNIT =="急診部"){?>selected<?php }?>
       >急診部</option>
       
       <option value="放射線部"
                       <?php if($this->object->UNIT =="放射線部"){?>selected<?php }?>
       >放射線部</option>
      
  </form>
  </select></TD>

    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>工作時間</b></td>
      <td width="70%"><input type="text" name="WTIME" value="<?php echo($this->object->WTIME);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>中榮契約期間_到職日</b></td>
      <td width="70%"><input type="text" name="WBEGINDATE" value="<?php echo($this->object->WBEGINDATE);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>承包廠商</b></td>
      <td width="70%"><input type="text" name="COMPANY" value="<?php echo($this->object->COMPANY);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>通訊地址</b></td>
      <td width="70%"><input type="text" name="PADDRESS" value="<?php echo($this->object->PADDRESS);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>通訊電話</b></td>
      <td width="70%"><input type="text" name="PTEL" value="<?php echo($this->object->PTEL);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>緊急聯絡人</b></td>
      <td width="70%"><input type="text" name="EMERG" value="<?php echo($this->object->EMERG);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>出生年月日</b></td>
      <td width="70%"><input type="text" name="BDATE" value="<?php echo($this->object->BDATE);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>籍貫</b></td>
      <td width="70%"><input type="text" name="LOCAL" value="<?php echo($this->object->LOCAL);?>"></td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>性別</b></td>
      <td width="70%"><input type="radio" name="SEX" value="1"<?php if($this->object->SEX =='1'){?>CHECKED<?php }?>>男
                      <input type="radio" name="SEX" value="2"<?php if($this->object->SEX =='2'){?>CHECKED<?php }?>>女</td>  
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>血型</b></td>
      <td width="70%"><input type="radio" name="BLOOD" value="0"<?php if($this->object->BLOOD =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="BLOOD" value="1"<?php if($this->object->BLOOD =='1'){?>CHECKED<?php }?>>O
                      <input type="radio" name="BLOOD" value="2"<?php if($this->object->BLOOD =='2'){?>CHECKED<?php }?>>A
                      <input type="radio" name="BLOOD" value="3"<?php if($this->object->BLOOD =='3'){?>CHECKED<?php }?>>B
                      <input type="radio" name="BLOOD" value="4"<?php if($this->object->BLOOD =='4'){?>CHECKED<?php }?>>AB</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>身心障礙手冊</b></td>
      <td width="70%"><input type="radio" name="DEFECT" value="0"<?php if($this->object->DEFECT =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="DEFECT" value="1"<?php if($this->object->DEFECT =='1'){?>CHECKED<?php }?>>無
                      <input type="radio" name="DEFECT" value="2"<?php if($this->object->DEFECT =='2'){?>CHECKED<?php }?>>有</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>原住民</b></td>
      <td width="70%"><input type="radio" name="ORIGIN" value="0"<?php if($this->object->ORIGIN =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="ORIGIN" value="1"<?php if($this->object->ORIGIN =='1'){?>CHECKED<?php }?>>無
                      <input type="radio" name="ORIGIN" value="2"<?php if($this->object->ORIGIN =='2'){?>CHECKED<?php }?>>有</td>
    </tr>
     <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>最高學歷</b></td>
      <td width="70%"><input type="radio" name="EDUCATION" value="0"<?php if($this->object->EDUCATION =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="EDUCATION" value="1"<?php if($this->object->EDUCATION =='1'){?>CHECKED<?php }?>>國小
                      <input type="radio" name="EDUCATION" value="2"<?php if($this->object->EDUCATION =='2'){?>CHECKED<?php }?>>國中
                      <input type="radio" name="EDUCATION" value="3"<?php if($this->object->EDUCATION =='3'){?>CHECKED<?php }?>>高中
                      <input type="radio" name="EDUCATION" value="4"<?php if($this->object->EDUCATION =='4'){?>CHECKED<?php }?>>大專(專科、大學)
                      <input type="radio" name="EDUCATION" value="5"<?php if($this->object->EDUCATION =='5'){?>CHECKED<?php }?>>研究所(碩士、博士)</td>
    </tr>
    <tr>
      <td style="text-align:right" bgcolor="#c3e1b4" colspan="3"><b>證照名稱及字號</b></td>
      <td width="70%">*ex舉例:府社老字第0930xxx919號<BR><input type="text" name="LICENSE" COLS="60" ROWS="3" value="<?php echo($this->object->LICENSE);?>"></td>
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
    
      <td bgcolor="#c3e1b4"><div align="center">新進健檢</div></td>
      <td width="70%"><input type="radio" name="EXAMNEW" value="0"<?php if($this->object->EXAMNEW =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="EXAMNEW" value="1"<?php if($this->object->EXAMNEW =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="EXAMNEW" value="2"<?php if($this->object->EXAMNEW =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="EXAMNEW" value="3"<?php if($this->object->EXAMNEW =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr>
    <tr>
      <td bgcolor="#c3e1b4">定期健檢</td>
      <td width="70%"><input type="radio" name="EXAMNORMAL" value="0"<?php if($this->object->EXAMNORMAL =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="EXAMNORMAL" value="1"<?php if($this->object->EXAMNORMAL =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="EXAMNORMAL" value="2"<?php if($this->object->EXAMNORMAL =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="EXAMNORMAL" value="3"<?php if($this->object->EXAMNORMAL =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr>
     <tr>
      <td bgcolor="#c3e1b4">特殊健檢</td>
      <td width="70%"><input type="radio" name="EXAMSPECIAL" value="0"<?php if($this->object->EXAMSPECIAL =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="EXAMSPECIAL" value="1"<?php if($this->object->EXAMSPECIAL =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="EXAMSPECIAL" value="2"<?php if($this->object->EXAMSPECIAL =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="EXAMSPECIAL" value="3"<?php if($this->object->EXAMSPECIAL =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr> 
     <tr>
      <td bgcolor="#c3e1b4" >B肝</td>
      <td width="70%"><input type="radio" name="BLIVER" value="0"<?php if($this->object->BLIVER =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="BLIVER" value="1"<?php if($this->object->BLIVER =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="BLIVER" value="2"<?php if($this->object->BLIVER =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="BLIVER" value="3"<?php if($this->object->BLIVER =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr>
    <tr>
      <td bgcolor="#c3e1b4" >X光</td>
      <td width="70%"><input type="radio" name="XRAY" value="0"<?php if($this->object->XRAY =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="XRAY" value="1"<?php if($this->object->XRAY =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="XRAY" value="2"<?php if($this->object->XRAY =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="XRAY" value="3"<?php if($this->object->XRAY =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr>
    <tr>
      <td bgcolor="#c3e1b4" >流感</td>
      <td width="70%"><input type="radio" name="FLU" value="0"<?php if($this->object->FLU =='0'){?>CHECKED<?php }?>>無資料
                      <input type="radio" name="FLU" value="1"<?php if($this->object->FLU =='1'){?>CHECKED<?php }?>>本院
                      <input type="radio" name="FLU" value="2"<?php if($this->object->FLU =='2'){?>CHECKED<?php }?>>院外
                      <input type="radio" name="FLU" value="3"<?php if($this->object->FLU =='3'){?>CHECKED<?php }?>>沒做</td>
    </tr>
    <tr>
      <td bgcolor="#c3e1b4" colspan="3"><center><b>訓練</b></center></td>
      <td width="70%"><input type="text" name="TRAIN" value="<?php echo($this->object->TRAIN);?>"></td>
    </tr>
    <tr>
      <td bgcolor="#c3e1b4" colspan="3"><center><b>備註</b></center></td>
      <td width="70%"><input type="text" name="MEMOA" value="<?php echo($this->object->MEMOA);?>"></td>
    </tr>
    <tr>
     <td colspan="4" align="center"> <button type="submit" value="修改" >修改</button><a href="./?nupdate">放棄修改</a></td>
     </tr>
    
  </thead>
  
</table>

</form>

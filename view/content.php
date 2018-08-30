<html>
<head>
<script>

</script>
</head>
<body>



<?php if(!empty($_SESSION["userId"])){
    if($_SESSION["types"]=="A"){

         ?>

<table border="1" cellpadding="6" style="float:left; border:3px #000000 solid;text-align:center;">
<tr><td colspan="2">單位</td></tr>
<tr><td colspan="2"><font color="red"><?php echo $_SESSION["dept"]; ?></font></td></tr>
<tr><td colspan="2">外包人員</td></tr>
<?php 
if (!empty($_SESSION["UNIT"]) && count($_SESSION["UNIT"])>0){
    $total = 0;
    for ($i=0;$i<count($_SESSION["UNIT"]);$i++){
        $total += $_SESSION["UNIT"][$i]->total;
    ?>
<tr><td><a href="../member/?outsourcing&unit=<?php echo($_SESSION["UNIT"][$i]->UNIT);?>"><?php echo($_SESSION["UNIT"][$i]->UNIT);?> </a></td><td><?php echo($_SESSION["UNIT"][$i]->total);?></td></tr>
<?php } } ?>
<tr><td>總計</td><td><?php echo(number_format($total));?></td></tr>
<tr><td colspan="2" align="center">[外包人員]</td></tr>
<tr><td colspan="2" align="center"><a href="../member/?outsourcing">查詢</a></td></tr>
<tr><td colspan="2" align="center"><a href="../member/?add">新增</a></td></tr>
<tr><td colspan="2" align="center">[單位負責人]</td></tr>
<tr><td colspan="2" align="center"><a href="../admin/?search">查詢</a></td></tr>
<tr><td colspan="2" align="center"><a href="../admin/?adduser">新增</a></td></tr>
<tr><td colspan="2" align="center"><a href="../admin/?logout">登出</a></td></tr>

</table>
</form>



<?php }    else if($_SESSION["types"]=="B"){?>
<table border="1" cellpadding="15" style="float:left; border:3px #000000 solid;text-align:center;">
<tr><td colspan="2">單位</td></tr>
<tr><td colspan="2"><font color="red"><?php echo $_SESSION["dept"]; ?></font></td></tr>
<tr><td colspan="2">外包人員</td></tr>

<?php 
if (!empty($_SESSION["UNIT"]) && count($_SESSION["UNIT"])>0){
    $total = 0;
    for ($i=0;$i<count($_SESSION["UNIT"]);$i++){
        if($_SESSION["UNIT"][$i]->UNIT != $_SESSION["dept"]) continue;
        $total += $_SESSION["UNIT"][$i]->total;
    ?>
<tr><td colspan="2"><?php echo($_SESSION["UNIT"][$i]->total);?></td></tr>
<?php }}?>
<tr><td colspan="2" align="center">[外包人員]</td></tr>
<tr><td colspan="2" align="center"><a href="../member/?outsourcing">查詢</a></td></tr>
<tr><td colspan="2" align="center"><a href="../member/?add">新增</a></td></tr>
<tr><td colspan="2" align="center"><a href="../admin/?logout">登出</a></td></tr>
</table>

<?php } else {?>
<table border="1" cellpadding="12" style="float:left; border:3px #000000 solid;text-align:center;">
<tr><td colspan="2">單位</td></tr>
<tr><td colspan="2"><font color="red"><?php echo $_SESSION["dept"];?></font></td></tr>
<tr><td colspan="2">外包人員</td></tr>
<?php 
if (!empty($_SESSION["UNIT"]) && count($_SESSION["UNIT"])>0){
    $total = 0;
    for ($i=0;$i<count($_SESSION["UNIT"]);$i++){
        $total += $_SESSION["UNIT"][$i]->total;
    ?>
<tr><td><a href="../member/?outsourcing&unit=<?php echo($_SESSION["UNIT"][$i]->UNIT);?>"><?php echo($_SESSION["UNIT"][$i]->UNIT);?> </a></td><td><?php echo($_SESSION["UNIT"][$i]->total);?></td></tr>
<?php } } ?>
<tr><td>總計</td><td><?php echo(number_format($total));?></td></tr>
<tr><td colspan="2" align="center">[外包人員]</td></tr>
<tr><td colspan="2" align="center"><a href="../member/?outsourcing">查詢</a></td></tr>
<tr><td colspan="2" align="center"><a href="../admin/?logout">登出</a></td></tr>
    
 </table>   
<?php } }?>
 

<div class="main">
     <div class="content">
       <?php $this->view($this->content);?>
      </div>
     </div>
</form>
</body>
</html>
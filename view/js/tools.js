var ProgressImage = null;	
// 將一個包含image的div寫入document
document.write("<div id='progress' style=\"position:absolute;display:none;top:200;left:200;border: 1px black solid;padding:3px 3px 3px 3px;background-color:#FFFFFF;font-family: sans-serif;font-size: 80%\"><NOBR><img id='progress_img' src='' align='texttop'>處理中...</NOBR></div>");

function showWait() {
	var iLeft = null;
	var iTop = null;
	try{
		iLeft = event.clientX;
		iTop = event.clientY+document.body.scrollTop;
	}catch(e){
	
	}
	
	try{
		  ProgressImage = new Image();
			ProgressImage.src = "/view/images/tool/wait.gif";
			document.all["progress_img"].src = ProgressImage.src;
		  var Progress = document.all["progress"];
		  Progress.style.top = (iTop)?iTop:(document.body.clientHeight-ProgressImage.height)/2;
		  Progress.style.left = (iLeft)?iLeft:(screen.width-ProgressImage.width)/2;
		
		  Progress.style.display = "block";
	}catch(e){
		hideWait();
		
	}
}

/**
 * 隱藏wait的圖示
 */
function hideWait() {
	try{
		document.all["progress"].style.display = "none";
	}catch(e){
		
	}
}
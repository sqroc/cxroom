window.onload = function ()
{
	var oBox = document.getElementById("box");
 	var oList = oBox.getElementsByTagName("ul")[0];
 	var aImg = oBox.getElementsByTagName("img");
 	var timer = playTimer = null;
 	var index = i = 0;
 	var bOrder = true;
 	var aTmp = [];
 	var aBtn = null;
 	
 	for (i = 0; i < aImg.length; i++) aTmp.push("<li>" + "" + "</li>");
 	
 	var oCount = document.createElement("ul");
 	oCount.className = "count";
 	oCount.innerHTML = aTmp.join("");
 	oBox.appendChild(oCount); 
 	aBtn = oBox.getElementsByTagName("ul")[1].getElementsByTagName("li");
 	
 	cutover();
 	
 	for (i = 0; i < aBtn.length; i++)
 	{
  		aBtn[i].index = i;
  		aBtn[i].onclick = function ()
  		{
   			index = this.index;
   			cutover()
  		}
 	}
 	function cutover()
 	{
  		for (i = 0; i < aBtn.length; i++) aBtn[i].className = "";
  		aBtn[index].className = "current";   
  		startMove(-(index * aImg[0].offsetHeight))
 	}
 
 	function next()
 	{
  		bOrder ? index++ : index--;
  		(index == 0 || index == aBtn.length - 1) && (bOrder = !bOrder);
  		cutover()
 	}
 	playTimer = setInterval(next, 3000);
 	
 	oBox.onmouseover = function ()
 	{
  		clearInterval(playTimer)
 	};
 	
 	oBox.onmouseout = function ()
 	{
  		playTimer = setInterval(next, 3000)
 	};
 	function startMove(iTarget)
 	{
  		clearInterval(timer);
  		timer = setInterval(function ()
  	{
   		doMove(iTarget)
  	}, 30) 
 	}
 	function doMove (iTarget)
 	{  
  		var iSpeed = (iTarget - oList.offsetTop) / 10;
  		iSpeed = iSpeed > 0 ? Math.ceil(iSpeed) : Math.floor(iSpeed);  
  		oList.offsetTop == iTarget ? clearInterval(timer) : oList.style.top = oList.offsetTop + iSpeed + "px"
 	}
};
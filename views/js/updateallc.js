/* view logic */
function update(data,data2,data3)
{
	//var feed = eval('('+data2+')');
	var feed = eval(data2);
	var color = eval(data);
	var chg = eval(data3);
	//note: this loop is temporary, need optmization
	for(var i= 1; i <= 1635; i++)
	{
		var table = document.getElementById("counter");
		var list = table.getElementsByTagName("tr")[i];
		if (typeof(list) != 'undefined' && list != null)
		{
  		// exists.
		if(list.getElementsByTagName("td")[0].innerHTML == feed.CODE )
		{
			//console.log(list.getElementsByTagName("td")[0].innerHTML);
			if(feed.LAST != undefined)
			{
				//list.getElementsByTagName("td")[3].innerHTML = feed.LAST.toFixed(3);
				list.getElementsByTagName("td")[3].innerHTML = feed.LAST;
				blinkColor3(i, 3, color.lsc);
				//list.getElementsByTagName("td")[4].innerHTML = chg.chg.toFixed(3);
				list.getElementsByTagName("td")[4].innerHTML = chg.chg;
				blinkColor3(i, 4, color.chgc);
			}
			if(feed.BCUM != undefined)
			{
				list.getElementsByTagName("td")[5].innerHTML = feed.BCUM;
				blinkColor2(i, 5);
			}
			if(feed.BUY != undefined)
			{
				//list.getElementsByTagName("td")[6].innerHTML = feed.BUY.toFixed(3);
				list.getElementsByTagName("td")[6].innerHTML = feed.BUY;
				blinkColor3(i, 6, color.byc);
			}
			if(feed.SELL != undefined)
			{
				//list.getElementsByTagName("td")[7].innerHTML = feed.SELL.toFixed(3);
				list.getElementsByTagName("td")[7].innerHTML = feed.SELL;
				blinkColor3(i, 7, color.slc);
			}
			if(feed.SCUM != undefined)
			{
				list.getElementsByTagName("td")[8].innerHTML = feed.SCUM;
				blinkColor2(i, 8);
			}
			if(feed.HIGH != undefined)
			{
				//list.getElementsByTagName("td")[9].innerHTML = feed.HIGH.toFixed(3);
				list.getElementsByTagName("td")[9].innerHTML = feed.HIGH;
				blinkColor3(i, 9, color.hc);
			}
			if(feed.LOW != undefined)
			{
				//list.getElementsByTagName("td")[10].innerHTML = feed.LOW.toFixed(3);
				list.getElementsByTagName("td")[10].innerHTML = feed.LOW;
				blinkColor3(i, 10, color.lwc);
			}
			if(feed.VOL != undefined)
			{
				list.getElementsByTagName("td")[11].innerHTML = feed.VOL;
				blinkColor2(i, 11);
				//if(pilihan == 11)
				//{
				//alert("sort by active");
				//sorting(i);
				//}//end sort
			}
			break;
		}
		}
		
	}
}
//blink
function blinkColor(name) {
    document.getElementById(name).style.color = "white";
    document.getElementById(name).style.background = "black";
    setTimeout(function () { setblinkColor(name) }, 800);
}
function setblinkColor(name) {
    document.getElementById(name).style.color = "black";
    document.getElementById(name).style.background = "white";
}
//
function blinkColor2(r, c) {
    //list = document.getElementById(r);
	//list = document.getElementsByTagName("tr")[r];
    
	var table = document.getElementById("example");
	var list = table.getElementsByTagName("tr")[r];
	list.getElementsByTagName("td")[c].style.color = "black";
    list.getElementsByTagName("td")[c].style.background = "Chocolate ";
    setTimeout(function () { setblinkColor2(r, c) }, 400);
}
function setblinkColor2(r, c) {
   // list = document.getElementById(r);
   //list = document.getElementsByTagName("tr")[r];
   	var table = document.getElementById("example");
	var list = table.getElementsByTagName("tr")[r];
    list.getElementsByTagName("td")[c].style.color = "white";
    list.getElementsByTagName("td")[c].style.background = "#000";
}
//
function blinkColor3(r, c,d) {
    //list = document.getElementById(r);
	//list = document.getElementsByTagName("tr")[r];
	var table = document.getElementById("example");
	var list = table.getElementsByTagName("tr")[r];
    list.getElementsByTagName("td")[c].style.color = "chocolate";
    list.getElementsByTagName("td")[c].style.background = d;
    setTimeout(function () { setblinkColor3(r, c,d) }, 400);
}
function setblinkColor3(r, c,d) {
    //list = document.getElementById(r);
	//list = document.getElementsByTagName("tr")[r];
	var table = document.getElementById("example");
	var list = table.getElementsByTagName("tr")[r];
    list.getElementsByTagName("td")[c].style.color = d;
    list.getElementsByTagName("td")[c].style.background = "#000";
}
//

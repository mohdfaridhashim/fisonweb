// JavaScript Document
function laddersort(i)
{

		var j = i -1;
		var listi=document.getElementById("counter").tBodies[0].rows[i].innerHTML;
		var listj=document.getElementById("counter").tBodies[0].rows[j].innerHTML;
		var list3=document.getElementById("counter").tBodies[0].rows[i];
		var list4=document.getElementById("counter").tBodies[0].rows[j];
		var voli = parseInt(list3.getElementsByTagName("td")[11].innerHTML);
		var volj = parseInt(list4.getElementsByTagName("td")[11].innerHTML);
		if(voli>volj)
		{
			document.getElementById("counter").tBodies[0].rows[j].innerHTML = listi;
			document.getElementById("counter").tBodies[0].rows[j].style.background = list3.style.background;
			document.getElementById("counter").tBodies[0].rows[i].innerHTML = listj;
			document.getElementById("counter").tBodies[0].rows[i].style.background = list4.style.background;
		}

}
/* view logic */
function sorting(value)
{
			var data = new Array();
			var color = new Array();
			var color2 = new Array();
			//var a = i;
			var a = parseInt(value);
			var b = a -1;
			//var b = 3;
			while(a > 0)
			{
			b= a-1;
			//var table = document.getElementById("example");
			var list3=document.getElementById("counter").tBodies[0].rows[a];

			var list4= document.getElementById("counter").tBodies[0].rows[b];
			//if(list3.getElementsByTagName("td")[4].innerHTML == 5)
			//{
			data[0] = list3.getElementsByTagName("td")[0].innerHTML;
			data[1] = list3.getElementsByTagName("td")[1].innerHTML;
			data[2] = list3.getElementsByTagName("td")[2].innerHTML;
			data[3] = list3.getElementsByTagName("td")[3].innerHTML;
			data[4] = list3.getElementsByTagName("td")[4].innerHTML;
			data[5] = list3.getElementsByTagName("td")[5].innerHTML;
			data[6] = list3.getElementsByTagName("td")[6].innerHTML;
			data[7] = list3.getElementsByTagName("td")[7].innerHTML;
			data[8] = list3.getElementsByTagName("td")[8].innerHTML;
			data[9] = list3.getElementsByTagName("td")[9].innerHTML;
			data[10] = list3.getElementsByTagName("td")[10].innerHTML;
			data[11] = list3.getElementsByTagName("td")[11].innerHTML;
			data[12] = list3.getElementsByTagName("td")[12].innerHTML;
			
			//color last,chg,buy,sell,high,low
			color[0] = list3.getElementsByTagName("td")[3].style.color;
			color[1] = list3.getElementsByTagName("td")[4].style.color;
			color[2] = list3.getElementsByTagName("td")[6].style.color;
			color[3] = list3.getElementsByTagName("td")[7].style.color;
			color[4] = list3.getElementsByTagName("td")[9].style.color;
			color[5] = list3.getElementsByTagName("td")[10].style.color;
			
			//color2 last,chg,buy,sell,high,low
			color2[0] = list4.getElementsByTagName("td")[3].style.color;
			color2[1] = list4.getElementsByTagName("td")[4].style.color;
			color2[2] = list4.getElementsByTagName("td")[6].style.color;
			color2[3] = list4.getElementsByTagName("td")[7].style.color;
			color2[4] = list4.getElementsByTagName("td")[9].style.color;
			color2[5] = list4.getElementsByTagName("td")[10].style.color;
			
			//sorting
			var c = parseInt(data[11]);
			var d = parseInt(list4.getElementsByTagName("td")[11].innerHTML);
			var e = c - d;
			if (e >= 0)
			{
			//replace
			list3.getElementsByTagName("td")[0].innerHTML=list4.getElementsByTagName("td")[0].innerHTML;
			list3.getElementsByTagName("td")[1].innerHTML=list4.getElementsByTagName("td")[1].innerHTML;
			list3.getElementsByTagName("td")[2].innerHTML=list4.getElementsByTagName("td")[2].innerHTML;
			list3.getElementsByTagName("td")[3].style.color = color2[0];
			list3.getElementsByTagName("td")[3].innerHTML=list4.getElementsByTagName("td")[3].innerHTML;
			list3.getElementsByTagName("td")[4].innerHTML=list4.getElementsByTagName("td")[4].innerHTML;
			list3.getElementsByTagName("td")[4].style.color = color2[1];
			list3.getElementsByTagName("td")[5].innerHTML=list4.getElementsByTagName("td")[5].innerHTML;
			list3.getElementsByTagName("td")[6].innerHTML=list4.getElementsByTagName("td")[6].innerHTML;
			list3.getElementsByTagName("td")[6].style.color = color2[2];
			list3.getElementsByTagName("td")[7].innerHTML=list4.getElementsByTagName("td")[7].innerHTML;
			list3.getElementsByTagName("td")[7].style.color = color2[3];
			list3.getElementsByTagName("td")[8].innerHTML=list4.getElementsByTagName("td")[8].innerHTML;
			list3.getElementsByTagName("td")[9].innerHTML=list4.getElementsByTagName("td")[9].innerHTML;
			list3.getElementsByTagName("td")[9].style.color = color2[4];
			list3.getElementsByTagName("td")[10].innerHTML=list4.getElementsByTagName("td")[10].innerHTML;
			list3.getElementsByTagName("td")[10].style.color = color2[5];
			list3.getElementsByTagName("td")[11].innerHTML=list4.getElementsByTagName("td")[11].innerHTML;
			list3.getElementsByTagName("td")[12].innerHTML=list4.getElementsByTagName("td")[12].innerHTML;
			//new value			
			//new value fix
			list4.getElementsByTagName("td")[0].innerHTML = data[0];  //code
			list4.getElementsByTagName("td")[1].innerHTML = data[1];  //symbol
			list4.getElementsByTagName("td")[2].innerHTML = data[2];  // last
			list4.getElementsByTagName("td")[3].style.color = color[0];
			list4.getElementsByTagName("td")[3].innerHTML = data[3];  //prev
			list4.getElementsByTagName("td")[4].innerHTML = data[4];  //chg
			list4.getElementsByTagName("td")[4].style.color = color[1];
			list4.getElementsByTagName("td")[5].innerHTML = data[5];  //bcum
			list4.getElementsByTagName("td")[6].innerHTML = data[6];  //buy
			list4.getElementsByTagName("td")[6].style.color = color[2];
			list4.getElementsByTagName("td")[7].innerHTML = data[7];  //sell
			list4.getElementsByTagName("td")[7].style.color = color[3];
			list4.getElementsByTagName("td")[8].innerHTML = data[8];  //scum
			list4.getElementsByTagName("td")[9].innerHTML = data[9];  //high
			list4.getElementsByTagName("td")[9].style.color = color[4];
			list4.getElementsByTagName("td")[10].innerHTML = data[10]; //low
			list4.getElementsByTagName("td")[10].style.color = color[5];
			list4.getElementsByTagName("td")[11].innerHTML = data[11];  //vol
			list4.getElementsByTagName("td")[12].innerHTML = data[12];  //link
			a--;
			}
			else
			{
				break;
			}
			

			
		}
}

		var cronometro=[];
		var hora=[];
		var initial_date=[];
		var final_date=[];
		var time=[];

		function mostrarhora(){
			var f=new Date();
			cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
			window.status =cad;
			setTimeout("mostrarhora()",1000);
		}
		function disable(id){
			document.getElementById("in"+id).style.visibility='hidden';
			document.getElementById("fi"+id).disabled=false;
			console.log("gg");
		}
		function detenerMesa(id){
			let date=new Date();
			date.setHours(date.getHours()-5);
			final_date[id]=date;
			document.getElementById("horaf"+id).innerHTML=date.toJSON().slice(0, 19).replace('T', ' ');
			clearInterval(cronometro[id]);
			window.alert("Tiempo Finalizado Mesa #"+id+": "+new Date(time[id]).toLocaleTimeString());
			document.getElementById("e"+id).disabled=true;
			document.getElementById("s"+id).disabled=false;
		}

		function cargaMesa(id){
			document.getElementById("s"+id).disabled=true;
			document.getElementById("e"+id).disabled=false;
			document.getElementById("in"+id).style.display='none';
			document.getElementById("fi"+id).style.display='block';
		//	var date=new Date();
		//	date.setHours(date.getHours()-5);
			initial_date[id]=document.getElementById('horai'+id).innerHTML;
			initial_date[id]=new Date(Date.parse(initial_date[id].replace('-','/','g')));
			initial_date[id].setHours(initial_date[id].getHours()-5);
			console.log(initial_date[id]);
			//initial_date[id]=date;
			//document.getElementById("horai"+id).innerHTML=initial_date[id].toJSON().slice(0, 19).replace('T', ' ');

			//var mySQLDate = '2015/04/29 10:29:08';
			//console.log(new Date(Date.parse(mySQLDate.replace('-','/','g'))));

			cronometro[id]=setInterval(function(){
				//console.log(new Date());
				//console.log(initial_date[id]);
				time[id]=Math.abs(new Date()-initial_date[id]);
				console.log(time[id]+"a");
				var seconds=parseInt(time[id]/1000-18000);
				console.log(seconds);
				var lucho=document.getElementById("total"+id).value;
				var pepe=Math.round(parseFloat(document.getElementById("price"+id).textContent)/120*100)/100;
				console.log(pepe);
				document.getElementById("horas"+id).innerHTML=new Date(time[id]).toLocaleTimeString();
				if (seconds%30==0){
					document.getElementById("total"+id).value=Math.round(seconds/30*pepe*100)/100;
				}
			},1000);
		}

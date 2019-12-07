		var cronometro=[];
		var hora=[];
		var initial_date=[];
		var final_date=[];
		var time=[];
		var link=[];

		(function guardarLinks(){
			var pepe=[];
			pepe=document.getElementsByClassName("linkFinal");
			for (var i = 0; i < pepe.length; i++) {
				var index=pepe[i].id.substring(4, pepe[i].id.length);
				link[index]=pepe[i].href;
			}
		})();



		function mostrarhora(){
			var f=new Date();
			cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds();
			window.status =cad;
			setTimeout("mostrarhora()",1000);
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
			document.getElementById("linkSt"+id).style.display='none';
			document.getElementById("link"+id).style.display='block';
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
				var pepe=Math.round(parseFloat(document.getElementById("price"+id).value)/120*100)/100;
				console.log(pepe);
				document.getElementById("horas"+id).innerHTML=new Date(time[id]).toLocaleTimeString();
				if (seconds%30==0){
					document.getElementById("total"+id).value=Math.round(seconds/30*pepe*100)/100;
				}
			},1000);


		}

		function checkStart(id){
			if(!(document.getElementById("horai"+id).innerHTML=='0/0/0 0:00:00')){
				document.links['linkSt'+id].href='javascript:';
				window.alert('Inicio doble ');
			}
		}

		function check(id){
			var price=document.getElementById("price"+id).value;
			if(price){
				if(document.getElementById("horai"+id).innerHTML=='0/0/0 0:00:00'){
					window.alert("Error");
					document.links['link'+id].href='javascript:';
				}else{
					document.links['link'+id].href=link[id]+"/"+document.getElementById("price"+id).value+"/"+document.getElementById("total"+id).value;
				}
			}else{
				document.links['link'+id].href='javascript:';
				if(document.getElementById("horai"+id).innerHTML=='0/0/0 0:00:00'){
					window.alert("Error");
				}else{
					window.alert("Ingresar numero de personas en la mesa");
				}
			}
		}

		function cargarPrecio(id){
			var seconds=parseInt(time[id]/1000-18000);
			var pepe=Math.round(parseFloat(document.getElementById("price"+id).value)/12*100)/100;
			document.getElementById("total"+id).value=Math.round(seconds/300*pepe*100)/100;
		}

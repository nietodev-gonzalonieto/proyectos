//Gonzalo Nieto

	var numeros = new Array(5); //Aqui guardo los numeros ganadores
	var estrellas = new Array(2);//Aqui guardo las estrellas ganadoras
	var numeros_usuarios;
	var estrellas_usuarios;

	function validarBolet(){
	
		recogerNumeros();
		recogerEstrellas();
		
		if(comprovarNumeros() && comprovarEstrellas()){
			alert("Has ganado el euromillon!!! :D")
		}else{alert("Has perdido sigue intentandolo!")}
			
	}


	function generarNumero(minimo,maximo){	//

		return Math.floor(Math.random()*(maximo-minimo))+minimo;//Esto genera un numero , MathRandom te da un numero random y el floor te lo deja sin decimales
  	} 


  	function comparar(a,b){		//aqui ordenaremos bien las Arrays
		return a-b;
	}


//NUMEROS ----

	function buscarNumeros(numero,tamanyo){//busca dentro de la Array Numeros 

		for (var i=0;i<tamanyo;i++){

			if(numero==numeros[i]){		//si el numero que buscamos esta en la Array Numeros
				return true;			//si se encuentre devuelbe un true
			}
		}
		return false;					//si no la encuentre devuelbe false
	}
	   
	function rellenarNumeros(){

	var provisional;
			
  		for (var i=0;i<numeros.length;i++){
  		 	
  		 	provisional=generarNumero(1,50);//Utilizamos la funcion generarNumero y especificamos el rango,este caso del 1 al 50
			
			while(buscarNumeros(provisional,i)){//mientras que encuentre el provisional se sigue generando numeros
				
				provisional=generarNumero(1,50);

			}
			numeros[i]=provisional;				//aqui se guarda el numero provisional que no se encontraba en la Array
		}
		numeros.sort(comparar);		  					//con el sort te ordena los numeros de la Array numeros :)
	}

	function mostrarNumeros(){
		
		var resultado=numeros[0];					

		for (var i=1;i<numeros.length;i++){	//menos uno porque he declarado resultado desde la posicion uno de la array

			resultado+=", "+numeros[i];		//añadimos el resto

		}
		return resultado;					//para que devuelba la string
	}

//ESTRELLAS	*********

	function buscarEstrellas(estrella,tamanyo){//busca dentro de la Array Numeros 

		for (var i=0;i<tamanyo;i++){

			if(estrella==estrellas[i]){		//si el numero que buscamos esta en la Array Numeros
				return true;			//si se encuentre devuelbe un true
			}
		}
		return false;					//si no la encuentre devuelbe false
	}


	function rellenarEstrellas(){

	var provisional;
			
  		for (var i=0;i<estrellas.length;i++){
  		 	
  		 	provisional=generarNumero(1,12);//Utilizamos la funcion generarNumero y especificamos el rango,este caso del 1 al 12
			
			while(buscarEstrellas(provisional,i)){//mientras que encuentre el provisional se sigue generando numeros
				
				provisional=generarNumero(1,12);

			}
			estrellas[i]=provisional;				//aqui se guarda el numero provisional que no se encontraba en la Array
		}
		estrellas.sort(comparar);		  					//con el sort te ordena los numeros de la Array numeros :)
	}


	function mostrarEstrellas(){
		
		var resultado=estrellas[0];					

		for (var i=1;i<estrellas.length;i++){	//menos uno porque he declarado resultado desde la posicion uno de la array

			resultado+=", "+estrellas[i];		//añadimos el resto

		}
		return resultado;					//para que devuelba la string
	}


	function recogerNumeros(){

		var numusuaris = document.getElementById("num_usuario").value;	//getElemntId es lo que hace enlazar con el html y dentro de esa variable esta el String
		numeros_usuarios=numusuaris.split(" ");		//Esto cojera todos los elementos que escribamos por separado y nos lo metera en una array


	}


	function recogerEstrellas(){

		var estrellasusuaris = document.getElementById("num_estrellas").value;	//getElemntId es lo que hace enlazar con el html y dentro de esa variable esta el String
		estrellas_usuarios=estrellasusuaris.split(" ");		//Esto cojera todos los elementos que escribamos por separado y nos lo metera en una array

	}

	function comprovarNumeros(){ //Comprovamos los numeros


		if(numeros.length != numeros_usuarios.length){
			alert("No has insertado los 5 numeros correspondientes!");
			return false;
		}
		for(var i=0;i<numeros_usuarios.length;i++){

			if(isNaN(numeros_usuarios[i])){
				alert("Debes insertar solo numeros!");
				return false;
			}
			if(numeros_usuarios[i]<1 || numeros_usuarios[i]>50){
				alert("Los numeros no pueden ser menor a 1 o superior a 50");
				return false;
			}
			if(!buscarNumeros(numeros_usuarios[i],numeros.length)){		//Esto te devuleve true si es ganador o false si no es ganador
				
				return false;
			}		

		}
		return true;
	}

	function comprovarEstrellas(){	//Comprovamos las Estrellas

		

		if(estrellas.length != estrellas_usuarios.length){
			alert("No has insertado las 2 estrellas correspondientes!");
			return false;
		}
		for(var i=0;i<estrellas_usuarios.length;i++){

			if(isNaN(estrellas_usuarios[i])){
				alert("Debes insertar solo numeros!");
				return false;
			}
			if(estrellas_usuarios[i]<1 || estrellas_usuarios[i]>12){
				alert("Las estrellas no pueden ser menor a 1 o superior a 12");
				return false;
			}
			if(!buscarEstrellas(estrellas_usuarios[i],estrellas.length)){		//Esto te devuleve true si es ganador o false si no es ganador
				
				return false;
			}
		}
		 return true;
	}

	var mesos = ["Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Setembre","Octubre","Novembre","Desembre"];
	window.onload = function mostrar(){		//Esta funcion se llama cuando se refresca la pagina

		//Fecha y hora

		var fecha=new Date();

		var dia=document.getElementById("dia");
		dia.innerHTML=fecha.getDate();

		var mes=document.getElementById("mes");
		mes.innerHTML=mesos[fecha.getMonth()];

		var any =document.getElementById("any");
		any.innerHTML=fecha.getFullYear();
		
		var hora =document.getElementById("hora");
		if(fecha.getHours()<10){
			hora.innerHTML="0"+fecha.getHours();	//Esto sirve para que salga un 0 delante de la hora
		}else{
			hora.innerHTML=fecha.getHours();
		}
		

		var minutos=document.getElementById("minutos");
		if(fecha.getHours()<10){
			minutos.innerHTML="0"+fecha.getMinutes();	//Esto sirve para que salga un 0 delante de los minutos
		}else{
			minutos.innerHTML=fecha.getMinutes();
		}



		rellenarNumeros();
		
		var numeros_guanyadors=document.getElementById("numeros");
		numeros_guanyadors.innerHTML=mostrarNumeros();
		
		rellenarEstrellas();
		
		var estrellas_guanyadores=document.getElementById("estrelles");
		estrellas_guanyadores.innerHTML=mostrarEstrellas();

		

	}
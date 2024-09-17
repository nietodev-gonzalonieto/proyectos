package Package;

import java.util.Scanner;
import java.util.ArrayList;
import java.util.Arrays;

public class Act1 {
	public static void main(String args[]){
		Scanner sc = new Scanner(System.in);
	
	//Separació QUANTS MODELS DE COCHES DISPOSEU
		System.out.println("Quants models de coches disposeu? ");
		int models = sc.nextInt();
		
		
		
	//Separació QUINA ES LA DISTANCIA MAXIMA	
		
		float distancia [] = new float [models];
		for(int i=0;i<models;i++){
			System.out.println("Quina es la distancia máxima diaria que voleu recorrer? (Kms) ");							
		    distancia[i]=sc.nextFloat();   
		  }
		
		
	//Separacio MOSTRAR LLISTA DE ARRAY	
		System.out.println(Arrays.toString(distancia));
	
	//Separacio MENU bucle
		 boolean seguir=false;
		 int opcio=0;
		
		
		 while(!seguir) {
			 System.out.println("0-Sortir del programa ");
			
			 for(int i =0; i < distancia.length; i++) {	
				System.out.println((i+1)+"-"+distancia[i]);	
				}
			 System.out.println("Quin vols escollir? ");
			 int seleccio= sc.nextInt();
			 
			 if(seleccio==0) {
				 seguir=true;
			 }else if(seleccio>models||seleccio<0) {
				 System.out.println("Has seleccionat un valor superior o inferior a 0: ");	 
			 }else {
				 System.out.println("Quants dies utilitzaras el vehicle? ");
				 int dies=sc.nextInt();
			 for(int i=0;i<dies;i++) {
				 System.out.println("Quina distancia has fet el dia"+(i+1)+"?");
				 int dd =sc.nextInt();
				 distancia[i]=dd;
				 if(distancia[seleccio-1]<dd) {
				 System.out.println("Has superat la distància permesa");
				 }
				
			 }
		//Separacio 	 
			 float sumdia = 0;
			 float menor= 9999;
			 float mayor= 0;
			 int diagran=0, diapetit=0;
			 
			 for(int i=0;i<dies;i++) {
				 sumdia = sumdia+distancia[i];
				 System.out.println("Dia"+(i+1)+":"+distancia[i]);
				 	if(distancia[i]<mayor) {
				 		mayor=distancia[i];
				 		diapetit=i+1;
				 	}
				 	if(distancia[i]<menor) {
				 		menor=distancia[i];
				 		diapetit=i+1;
				 	}
				 
			 }
			 
			 //Separacio Resultats 
			 System.out.println("Has recorregut:"+sumdia);
			 System.out.println("El dia amb més km ha sigut "+diagran+ " amb " +menor);
			 System.out.println("El dia amb més km ha sigut "+diapetit+ " amb " +mayor);
			 
		 	}
		 
			
		 
	}
}
}
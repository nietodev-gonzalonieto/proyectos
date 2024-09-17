package Act7;

import java.util.Scanner;

public class P1_Act7 {
	public static void main(String[] args) {
		 Scanner scanner = new Scanner(System.in);
	
		 //PRIMERA OPCIO DE DECLARAR ARRAYS
		 String[] pelis = new String[10];
		 pelis[0]="CLIMAX";
		 pelis[1]="LAPLACE'S WITCH";
		 pelis[2]="KEEPERS";
		 pelis[3]="KILLING";
		 pelis[4]="BURNING";
		 pelis[5]="JOURNAL 64";
		 pelis[6]="ANIMAL";
		 pelis[7]="GHOSTLAND";
		 pelis[8]="PENGUIN HIGHWAY";
		 pelis[9]="BAD PEOPLE'S GAME";
		
		 //SEGONA OPCIO DE DECLARAR ARRAYS
		 String[] directors = {"Gaspar Noé", "Takashi Miike", "Kristoffer Nyholm", "Shin'ya Tsukamoto"," Lee Chang-Dong", "Christoffer Boe"," Armando Bo", "Pascal Laugier", "Hiroyasu Ishida", "Takashi Miike"};
		 boolean seguir;
		 boolean trobat=false;
		 boolean continuar=true;
		 int opcio=0;
		 String nom;
		 
		 
	 while (continuar) {
		 				seguir=true;
		 while(seguir) {
			 
			 System.out.println("1-Buscar peli ");
			 System.out.println("2-Buscar director ");
			 System.out.println("0-Sortir del programa ");
			 System.out.println("Selecciona una opció: ");
			 opcio=scanner.nextInt();
			 scanner.nextLine();
			 if(opcio==1 || opcio==2 || opcio==0) {
				 seguir=false;
			 }else { System.out.println("Escriu una opcio valida!");}	 
		 }
		 switch(opcio) {
		 case 1 :
			 System.out.println("Digues el nom de la peli:");
			 nom=scanner.nextLine();
			 for(int i = 0; i < pelis.length; i++) {
				if (nom.equals(pelis[i])) {
					 System.out.println(directors[i]);
					 trobat=true;
				}  			
			 }
			 if(!trobat) {
				System.out.println("No s'ha trobat la peli!");
			}
			 break;
		 
		 case 2 :
			 System.out.println("Digues el nom del director:");				 
			 nom=scanner.nextLine();
			 for(int i = 0; i < directors.length; i++) {
				if (nom.equals(directors[i])) {
					 System.out.println(pelis[i]);
					 trobat=true;
				}		 	 
			 }
			 if(!trobat) {
				System.out.println("No s'ha trobat el director!");	
			 	}
			 	break;	
		 case 0 :
			 System.out.println("Gràcies per utilitzar el programa");
			 continuar=false;
		  }
		 }
	}
}	
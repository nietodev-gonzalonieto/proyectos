package Act7;

import java.util.Arrays;
import java.util.Scanner;

public class P2_Act7 {
	public static void main(String[] args) {
		 Scanner scanner = new Scanner(System.in);
		 
		 int posicio=0;
		 boolean seguir=true;
		 
		 String[] pelis = {"CLIMAX" ,"Laplace's Witch","KEEPERS","Killing","BURNING","JOURNAL 64","ANIMAL","GHOSTLAND","PENGUIN HIGHWAY","Bad People’s Game"};
			 
		 String[] directors = {"Gaspar Noé", "Takashi Miike", "Kristoffer Nyholm", "Shin'ya Tsukamoto"," Lee Chang-Dong", "Christoffer Boe"," Armando Bo", "Pascal Laugier", "Hiroyasu Ishida", "Takashi Miike"};
		 
		 String[] pelis_copia = new String[21]; //OPCION 1
		 for(int i =0; i < pelis.length; i++) {
			 pelis_copia[i]=pelis[i];
		 }
		 String[] directors_copia = Arrays.copyOf(directors, 21); //OPCION 2
		 
		 String[] estrenos = new String[21];
		 for(int i =0; i < estrenos.length; i++) {
			 estrenos[i]="2018";
		 }
		 
		 for(int i = pelis.length; i < pelis_copia.length ;i++) {
			 System.out.println("Introdueix el nom de la peli");
	         pelis_copia[i]=scanner.nextLine();    
		 }
		 System.out.println("Donam un nom de peli per a buscar: ");
		 String buscar= scanner.nextLine();
		 for(int i = 0; i < pelis_copia.length; i++) {
				if (buscar.equals(pelis_copia[i])) {
					 System.out.println("Diguem el nou director "); 
					 directors_copia[i]=scanner.nextLine();
					 System.out.println("Diguem per quin any modifico: "); 
					 estrenos[i]=scanner.nextLine();
				}		 	 
			 }
	
		while(seguir) {
			System.out.println("Diguem la posició de la taula que voleu borrar(de 0 a " + (pelis_copia.length -1) + ")");
		    posicio=scanner.nextInt();
		    scanner.nextLine();
		    if(posicio>=0 && posicio<=pelis_copia.length -1) {
		    	seguir=false;
		   }else { System.out.println("Escriu una opcio valida!");}	 
			}

		for(int i = posicio + 1; i < pelis_copia.length; i++) {
			pelis_copia[i - 1] = pelis_copia[i];
			directors_copia[i - 1] = directors_copia[i];
			estrenos[i - 1] = estrenos[i];
		}
		
		pelis_copia[pelis_copia.length - 1] = "";
		directors_copia[directors_copia.length - 1] = "";
		estrenos[estrenos.length - 1] = "";
		
		pelis_copia = Arrays.copyOfRange(pelis_copia, 0, pelis_copia.length - 2);
		directors_copia = Arrays.copyOfRange(directors_copia, 0, directors_copia.length - 2);
		estrenos = Arrays.copyOfRange(estrenos, 0, estrenos.length - 2);
		
		  System.out.println(Arrays.toString(pelis_copia));
		  System.out.println(Arrays.toString(directors_copia));
		  System.out.println(Arrays.toString(estrenos));
	}
}
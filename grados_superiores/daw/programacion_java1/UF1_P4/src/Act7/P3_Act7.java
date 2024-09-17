package Act7;

import java.util.Arrays;
import java.util.Scanner;

public class P3_Act7 {
	public static void main(String[] args) {
		 Scanner scanner = new Scanner(System.in);
		 
		 char[][] tauler = new char[10][10];
		 boolean seguir=true;
		 int blanques=0;
		 int negres=0;
		 int fila =0;
		 int columna=0;

//BLANCAS
		 while(seguir) {
				System.out.println("Diguem el numero de peçes Blanques: (de 1 a 20): ");
			    blanques=scanner.nextInt();
			    scanner.nextLine();
			    if(blanques>=1 && blanques<=20) {
			    	seguir=false;
			   }else { System.out.println("Escriu una opcio valida!");}	 
			}	
		 for(int i = 1 ; i <= blanques; i++) {
			 System.out.println("Diguem el numero de fila on esta (de 0 a 9): ");
			 fila = scanner.nextInt();
			 scanner.nextLine();
			 System.out.println("Diguem el numero de columna on esta (de 0 a 9): ");
			 columna = scanner.nextInt();
			 scanner.nextLine();
	
			 tauler[fila][columna] = 'B';
		 }
//NEGRES
		 seguir=true;
		 while(seguir) {
				System.out.println("Diguem el numero de peçes Negres: (de 1 a 20): ");
			    negres=scanner.nextInt();
			    scanner.nextLine();
			    if(negres>=1 && negres<=20) {
			    	seguir=false;
			   }else { System.out.println("Escriu una opcio valida!");}	 
			}	
		 for(int i = 1 ; i <= negres; i++) {
			 System.out.println("Diguem el numero de fila on esta (de 0 a 9): ");
			 fila = scanner.nextInt();
			 scanner.nextLine();
			 System.out.println("Diguem el numero de columna on esta (de 0 a 9): ");
			 columna = scanner.nextInt();
			 scanner.nextLine();
	
			 tauler[fila][columna] = 'N';
		 }
		 for(int i =0; i < tauler.length; i++) {
			System.out.println(Arrays.toString(tauler[i]));
		 }
		 
	}
}
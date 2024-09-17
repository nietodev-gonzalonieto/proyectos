/*Escriu un text per teclat i indica el número de vocals
 *  diferents que conté aquest text. Tingueu en compte 
 *  majúscules i minúscules. Feu servir bucles per recórrer
 *   l’String amb charAt(i) i compareu-ho per a cada vocal.
*/
package Activitat6;

import java.util.Scanner;

public class P3_Gonzalo {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
	
	
     int ContaE = 0;
     int ContaA = 0;
     int ContaI = 0;
     int ContaO = 0;
     int ContaU = 0;

	System.out.print("Introdueix un text: ");
	String text = scanner.nextLine();
    text = text.toLowerCase();

    for(int i=0; i<text.length(); i++)
    {
        if(text.charAt(i) == 'a') 
            ContaA++;
        if(text.charAt(i) == 'e' )
            ContaE++;
        if(text.charAt(i) == 'i') 
            ContaI++;
        if(text.charAt(i) == 'o' )
            ContaO++;
        if(text.charAt(i) == 'u') 
            ContaU++;

    }

    System.out.println("Numero de A: " + ContaA + " cops");
    System.out.println("Numero de E: " + ContaE + " cops");
    System.out.println("Numero de I: " + ContaI + " cops");
    System.out.println("Numero de O: " + ContaO + " cops");
    System.out.println("Numero de U: " + ContaU + " cops");
	}	
}

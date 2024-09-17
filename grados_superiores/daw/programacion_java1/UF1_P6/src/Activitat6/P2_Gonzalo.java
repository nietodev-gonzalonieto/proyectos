/*Escriu un programa que demani un text per teclat i mostri amb un
 *  missatge per pantalla el caràcter de la 3a lletra del missatge 
 *  indicant també si és o no un dígit.Indica amb SI o NO que el 
 *  missatge acaba amb el text “nt”.
 *	Finalment mostra el text del missatge entre la 4a lletra i la 10a.
 */


package Activitat6;

import java.util.Scanner;

public class P2_Gonzalo {
	public static void main(String[] args) {
		
		Scanner scanner = new Scanner(System.in);
		 
		 String text;
	    
	     
	     System.out.println("Introdueix un text: ");
         text = scanner.nextLine();
         System.out.println("La 3a lletra del missatge '' " + text + "'' es la '' " + text.charAt(2) + " ''. ");
         System.out.println("Es un digit: "+Character.isDigit('2'));
         System.out.println("El missatge acaba amb ''nt'': "+text.endsWith("nt"));
         System.out.println(text.substring(3,9));
	}
}

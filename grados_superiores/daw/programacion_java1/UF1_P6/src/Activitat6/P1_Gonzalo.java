/*Escriu un programa que demani un text per teclat i mostri amb un missatge per pantalla
 *  la seva longitud. Tamb� indicareu en quina posici� est� la primera lletra �a� del text
 *   i la darrera. Despr�s demanareu a l�usuari que introdueixi 5 paraules per teclat i indicareu 
 *   SI o NO apareix "el" en algun lloc del text. Useu m�todes de la classe String.
 */


package Activitat6;

import java.util.Scanner;

public class P1_Gonzalo {
	public static void main(String[] args) {
		 Scanner scanner = new Scanner(System.in);
	        
	        String text;
	        String paraula;
	        
	        System.out.println("Introdueix un text: ");
	            text = scanner.nextLine();
	        System.out.print("El tama�o de '' " + text + "'' es de " + text.length() + " caracteres i la primera posici� de ''a'' �s ");
	            System.out.print(text.indexOf("a"));
	        System.out.print(" i la ultima posici� de ''a'' �s ");
	            System.out.println(text.lastIndexOf("a"));
	         
	            for (int i = 0; i < 5; i++) {
	                System.out.println("Introdueix 1 paraula : ");
	                paraula = scanner.nextLine();
	                if (paraula.contains("el")){
	                System.out.println("Aquesta paraula SI cont� 'el'");
	                }else { System.out.println("Aquesta paraula NO cont� 'el'");
	            	}}
	            
	}
}

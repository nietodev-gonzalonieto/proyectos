/*Escriu un programa que et demani un text.
 *  Haureu d�indicar quantes paraules hi ha en el missatge 
 *  (useu l�espai en blanc de separador), posteriorment haureu
 *   de passar el missatge a maj�scules i substituir qualsevol 
 *   d�git que hi hagi posant pel s�mbol # en els eu lloc abans 
 *   de tornat a mostrar el missatge. Useu m�todes de la classe
 *    String.Ex: �Avui �s dia 15 de Novembre de 2018�
 * 
 */

package Activitat6;

import java.util.Scanner;

public class P5_Gonzalo {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		
		String text;
		 System.out.println("Introdueix un text: ");
         text = scanner.nextLine();
         System.out.println("N�mero de paraules: " + text.split("\\s+").length);
         String text2= text.toUpperCase();
         System.out.println(text2.replaceAll("[0-9]","#"));
         
         
	}
}
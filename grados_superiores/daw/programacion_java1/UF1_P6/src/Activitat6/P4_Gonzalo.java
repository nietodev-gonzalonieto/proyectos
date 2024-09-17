/*Escriu un programa que et demani una adreça d'email
 *  i comprovi amb matches si és formalment vàlida mitjançant
 *   l'expressió regular "[^@]+@[^@]+\\.[a-zA-Z]{2,}" .
 *    Si no és vàlida, ha de mostrar un missatge d’error i l’ha
 *     de tornar a demanar. Posteriorment, modifiqueu l'expressió
 *      regular i valideu si tenim una adreça acabada en @xtec.cat 
 *      o @gmail.com, sinó ho és, mostreu el missatge de que només
 *       accepteu adreces d’aquests 2 tipus.
 */

package Activitat6;

import java.util.Scanner;

public class P4_Gonzalo {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		
		String mail;
		boolean seguir = true;
		
			
		while (seguir) {	
		System.out.println("Introdueix un mail: ");
		mail = scanner.nextLine();
		
		if(mail.matches("[^@]+@[^@]+\\.[a-zA-Z]{2,}")==true && (mail.contains("@xtec.cat"))||(mail.contains("@gmail.com"))) {
		System.out.println("El teu mail esta escrit correctament" );
		seguir=false;
		}
		if(mail.matches("[^@]+@[^@]+\\.[a-zA-Z]{2,}")==false) {
			System.out.println("El teu mail és incorrecte" );
		}
		}
	}		
}
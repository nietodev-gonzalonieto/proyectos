/*Escriu un programa que et demani una adre�a d'email
 *  i comprovi amb matches si �s formalment v�lida mitjan�ant
 *   l'expressi� regular "[^@]+@[^@]+\\.[a-zA-Z]{2,}" .
 *    Si no �s v�lida, ha de mostrar un missatge d�error i l�ha
 *     de tornar a demanar. Posteriorment, modifiqueu l'expressi�
 *      regular i valideu si tenim una adre�a acabada en @xtec.cat 
 *      o @gmail.com, sin� ho �s, mostreu el missatge de que nom�s
 *       accepteu adreces d�aquests 2 tipus.
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
			System.out.println("El teu mail �s incorrecte" );
		}
		}
	}		
}
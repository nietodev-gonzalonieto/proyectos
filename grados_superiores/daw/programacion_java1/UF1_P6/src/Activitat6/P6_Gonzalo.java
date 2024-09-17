/*Escriu un programa que et demani un text que ha
 *  de contenir 3 o més vegades la paraula “temps”,
 *   en cas contrari ha de tornar a demanar el missatge 
 *   fins que es compleixi la condició. 
 */

package Activitat6;

import java.util.Scanner;

public class P6_Gonzalo {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		
		String text;
		boolean seguir=true;
		int temps=0;
    	
		System.out.println("Introdueix un text que ha de contenir mínim 3 vegades la paraula 'temps': ");
        text = scanner.nextLine();
    while(seguir) {

      
            if(text.contains("temps")) { //substring(12,string.lenght)
            	temps++;
            	text=text.substring(text.indexOf("temps")+5, text.length());
            
            } else {
            		if(temps<3) {
          			System.out.println("El text no conté la paraula 'temps' 3 vegades");
          			temps=0;
          			System.out.println("Introdueix un text que ha de contenir mínim 3 vegades la paraula 'temps': ");
          	        text = scanner.nextLine();
            		}else { 
            			seguir=false;
            	    }
           }

          
        } 
      if(temps>=3) { 
      	System.out.println("El text és correcte i surt: " +temps+" vegades"); 
      		} 
   	}
}

/**
* @author gonzaloNM
*/
package Generic;
import java.util.Scanner;

public class Generic {
		public static Scanner scanner=new Scanner(System.in);
	
	
		public static int buscar_array_float(float tabla[],float valor) {			//para encontrar un valor dentro de una Array	
			
			for(int i =0 ; i<tabla.length; i++ ) {
				if(tabla[i]==valor) {
					return i;
				}
			}
			return -1;
		}
		
		public static void ordenar_asc_array_float(float tabla[]) {   //de mas pequeño a mas grande
		
		float aux;			
		for(int i=1; i<tabla.length; i++) {						//metodo de la burbuja
			   for(int j=0; j<tabla.length-i; j++) {
			       if( tabla[j] > tabla[j+1]) {
			         aux = tabla[j];
			           tabla[j] = tabla[j+1];
			           tabla[j+1]= aux;
			       }
			   }
			}
	}
	
	public static void ordenar_desc_array_float(float tabla[]) {		//de mas grande a mas pequeño
		
		float aux;			
		for(int i=1; i<tabla.length; i++) {						//metodo de la burbuja
			   for(int j=0; j<tabla.length-i; j++) {
			       if( tabla[j] < tabla[j+1]) {
			         aux = tabla[j];
			           tabla[j] = tabla[j+1];
			           tabla[j+1]= aux;
			       }
			   }
			}
	}
	public static float mitjana_array_float(float tabla[]) {
		
		float aux=0;
		
		for(int i=0; i<tabla.length; i++) {						
			aux+=tabla[i];										//suma de toda la Array
		}
		return aux/tabla.length;								//suma dividido por numero de elementos
	}
	
	public static int demanar_int(String significat) {
		
		int numero = 0;
		boolean seguir=true;
		
		while(seguir) {
			System.out.print("Introdueix "+significat+": ");
			try {												
			numero=scanner.nextInt();							//esto es lo que puede fallar :(
			
			seguir=false;										//esto se ejecuta solo si va bien ;)
			}catch(Exception exc){								//esto se ejecuta solo si va mal 3:)
				System.out.println("Has de introduir un numero sencer");
			}finally{												//esto se ejecuta tanto si va bien como si va mal :)
				scanner.nextLine();
			}	
		}return numero;
	}
	
	public static float demanar_float(String significat) {
		
		float numero = 0;
		boolean seguir=true;
		
		while(seguir) {
			System.out.print("Introdueix "+significat+": ");
			try {												
			numero=scanner.nextFloat();							//esto es lo que puede fallar :(
			
			seguir=false;										//esto se ejecuta solo si va bien ;)
			}catch(Exception exc){								//esto se ejecuta solo si va mal 3:)
				System.out.println("Has de introduir un numero real");
			}finally{												//esto se ejecuta tanto si va bien como si va mal :)
				scanner.nextLine();
			}	
		}return numero;
	}
	
	public static String demanar_String(String significat) {			//Aqui no pongo el Try ni el catch ya que no puede fallar,siempre se leen texto 
		String text = "";											//desde teclado.
		System.out.print("Introdueix "+significat+": ");		
		text=scanner.nextLine();						
		return text;
	}
	
	
}

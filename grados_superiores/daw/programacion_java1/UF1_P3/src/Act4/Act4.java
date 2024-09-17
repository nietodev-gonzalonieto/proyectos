/**
* @author gonzaloNM
*/
package Act4;
import Generic.Generic;

public class Act4 {
		
	public static void main(String[] args) {
		
		int numero_participants = Generic.demanar_int("numero de participants");
		
		String participants[]= new String[numero_participants];
		guardar_participants(participants);
		float salts[][]= new float [numero_participants][3];
		guardar_salts(salts,participants);
		float millors_salts[]=new float[numero_participants];
		guardar_millors(salts,millors_salts);
		mostrar_resultats(salts,participants,millors_salts);
		
	}
	
	

	public static void guardar_participants(String participants[]) {
		
		for(int i=0; i<participants.length; i++) {
			participants[i]= Generic.demanar_String("nom del participant "+(i+1));
		}
	}
	
	private static void guardar_salts(float salts[][],String participants[]) {
		
		for(int fila=0; fila<salts.length; fila++) {								//cada fila es un participant   matriu.length=numero de filas
			for(int columna=0; columna<salts[fila].length; columna++) {				//cada columna es un salt		matriu[i].length=numero de columnas
																					
				salts[fila][columna]= Generic.demanar_float("longitud del salt "+(columna+1)+" de "+ participants[fila]);
			}
		}
	}
	
	private static void guardar_millors(float salts[][], float millors_salts[]) {
		
		for(int participant=0;participant<salts.length;participant++) {
			Generic.ordenar_desc_array_float(salts[participant]);
			millors_salts[participant]=salts[participant][0];
		}
		
	}
	
	private static void mostrar_resultats(float salts[][],String participants[],float millors_salts[]) {
		mostrar_mitjana(salts,participants);
		mostrar_podi(participants,millors_salts);
	}

	private static void mostrar_mitjana(float salts[][],String participants[]) {
		
		for(int participant=0;participant<salts.length;participant++) {
			
			System.out.println(participants[participant]+" ha saltat "+ Generic.mitjana_array_float(salts[participant]) + " de mitjana");
		
		}
	}
	
	private static void mostrar_podi(String participants[],float millors_salts[]) {
		
		float copias_millors[]=new float [millors_salts.length];
		
		for(int participant=0;participant<millors_salts.length;participant++) {							//este bucle sirve para copiar la Array 
			
			copias_millors[participant]= millors_salts[participant];	
		}
		Generic.ordenar_desc_array_float(millors_salts);												//ordeno de mas grande a mas pequeño 
		
		int index;
		
		for(int i=0 ; i<Math.min(participants.length,3) ; i++) {										//si hay menos de 3 participantes ese sera el limite del podio
			
		index = Generic.buscar_array_float(copias_millors, millors_salts[i]); 							//no hay que mirar que existan porque los dos son copias y tienen los mismos valores pero en distinto orden, lo encontrara siempre
		System.out.println((i+1) +" "+participants[index] + " ha fet: "+millors_salts[i]+ " metres.");
		}
	}
}


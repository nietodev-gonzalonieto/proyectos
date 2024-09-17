import java.util.ArrayList;
import java.util.Scanner;

public class Act3 {
	public static void main(String args[]){
		Scanner scanner = new Scanner(System.in);
		
		ArrayList<String> llocs = new ArrayList<String>();
		ArrayList<String> alumnes = new ArrayList<String>();
		boolean seguir=true;
		String lloc;
		String alumne;
		while(seguir) {	
			System.out.print("Dime el sitio donde quieres ir si no dejalo en blanco: ");
			 lloc = scanner.nextLine();
			 
			if (lloc.isEmpty()){
				seguir=false;
			}else {
				llocs.add(lloc);	//para no añadir el espacio en blanco 
			}	
		}
		
		System.out.println("Lista de los sitios: " + llocs);
		System.out.println("Numero de llocs:"+llocs.size());
	//Inicializo el boleano a true porque en el anterior bucle se ha quedado en false	
		seguir=true;
		while(seguir) {	
			System.out.print("Dime el nombre del alumno si no dejalo en blanco: ");
			 alumne = scanner.nextLine();
			 
			if (alumne.isEmpty()){
				seguir=false;
			}else {
				alumnes.add(alumne);	//para no añadir el espacio en blanco 
			}	
		}
		System.out.println("Numero de llocs:"+alumnes.size());
		System.out.println("Lista de alumnos"+alumnes);
		
	//Para saber si esta el alumno y en la posicion en la que se encuentra.	
		int posicio=alumnes.indexOf("Manel");
		
		if(posicio==-1) {	//-1 porque es el numero que te devuelve cuando no se encuentra.
			System.out.println("No esta el alumno Manel ");
		}else {
			System.out.println("El alumno Manel esta en la posicion:" +(posicio+1));
		}
	//Añadir alumno con .add	
		alumnes.add("Maria");
		System.out.println("Lista de alumnos"+alumnes);
	//Sustituir un alumno
		if(posicio!=-1) {
		alumnes.set(posicio, "Robert");
		}
		System.out.println("Lista de alumnos"+alumnes);
	//AÑADIR VALOR y CAMBIARLO por una posicion ESPECIFICA
		 posicio=llocs.indexOf("Camp Nou");
		
		if(posicio==-1) {	//-1 porque es el numero que te devuelve cuando no se encuentra.
			System.out.println("No esta el Camp Nou en la llista ");
			if(!llocs.isEmpty()) {
				llocs.add(1, "Camp Nou");
			}
		}
		System.out.println("Lista de los sitios: " + llocs);
	}
}	
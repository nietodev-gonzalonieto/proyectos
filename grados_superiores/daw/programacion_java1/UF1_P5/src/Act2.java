import java.util.Scanner;
import java.util.ArrayList;

public class Act2 {
	public static void main(String args[]){
		Scanner scanner = new Scanner(System.in);
		
		ArrayList<ArrayList> pacient = new ArrayList<ArrayList>();
		
		
		boolean seguir = false;
		int conta=0;
		
		while(!seguir) {
			
			pacient.add(new ArrayList());
			
			System.out.println("Dime tu nombre: ");
			String noma = scanner.nextLine();
			
			System.out.println("Dime tu edad: ");
			int edada = scanner.nextInt();
			
			System.out.println("Dime los dias que llevas sin beber: ");
			int diasa = scanner.nextInt();
			
			pacient.get(conta).add(noma);
			pacient.get(conta).add(edada);
			pacient.get(conta).add(diasa);
			scanner.nextLine();
			
			System.out.println("Van a venir mas alcholicos? ");
			String confirm = scanner.nextLine();
			
			if(confirm.equalsIgnoreCase("no")) {	
				seguir=true;
				
			}
			conta++;
		}
		System.out.println(pacient);
		
	if(pacient.size()>1) {
		pacient.get(1).set(0, "Jordi");//el primer es on agafarem el valor en la posicio de la ArrayList i el segon es per el valor que el cambiarem
		pacient.get(1).set(1, 25);//agafem la columna 1 (que es la edad) i la cambiem per el valor 25 en la segona posició
		pacient.get(1).set(2, 7);//agafem la columna 2 (que es el dia sense beure) i la cambiem per el valor 7 en la tercera posició
	}
	if(pacient.size()>=3) {
		pacient.remove(2);
	}
	System.out.println("El tercer pacient no pot assistir.");
	System.out.println(pacient);	
	}
}
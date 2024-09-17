import java.util.ArrayList;
import java.util.Scanner;

public class Act1 {
	public static void main(String args[]){
		Scanner scanner = new Scanner(System.in);
		 
		
		
	ArrayList<String> pacients = new ArrayList<String>();	
		
	for (int i =0;i<4;i++){
		System.out.println("Escriu el teu nom: ");
		String nomp = scanner.nextLine();
		
		
		
		System.out.println("Et vols colar? 3:) ");
		String colar = scanner.nextLine();
		
		if (colar.equalsIgnoreCase("si")){
			pacients.add(0,nomp);
		}else {
			pacients.add(nomp);
		}
	}
	for (int i =0;i<6;i++){
		System.out.println("El pacient "+pacients.remove(0)+" ha sigut ates");
		
		
		System.out.println("Escriu el teu nom: ");
		String nomp = scanner.nextLine();
		pacients.add(nomp);//para añadir el nom en la ultima posicion
		
		System.out.println("Et vols colar? 3:) ");
		String colar = scanner.nextLine();
		
		if (colar.equalsIgnoreCase("si")){
			pacients.add(0,nomp);
		}else {
			pacients.add(nomp);
	}
}
	for (int i =0;i<=4;i++){
		System.out.println("El pacient "+pacients.remove(0)+" ha sigut ates");
		
		
		System.out.println("Escriu el teu nom: ");
		String nomp = scanner.nextLine();
		pacients.add(nomp);//para añadir el nom en la ultima posicion
		
		System.out.println("Et vols colar? 3:) ");
		String colar = scanner.nextLine();
		
		if (colar.equalsIgnoreCase("si")){
			pacients.add(0,nomp);
		}else {
			pacients.add(nomp);
	}
}
	}
}

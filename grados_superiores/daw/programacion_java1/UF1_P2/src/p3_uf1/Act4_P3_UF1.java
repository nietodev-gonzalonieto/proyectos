/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p3_uf1;

import java.util.Scanner;

/**
 *
 * @author Gonzalo Nieto
 */
public class Act4_P3_UF1 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int numero1,numero2;
        boolean seguir=true;
        
        while(seguir) {
					        System.out.println("1-Suma de 2 números");
					        System.out.println("2-Resta de 2 números");
					        System.out.println("3-Multiplicació de 2 números");
					        System.out.println("4-Divisió de 2 números");
					        System.out.println("5-Acabar");
					        System.out.print("Selecciona el número de l'operació que vols fer: ");
					        int opcio = scanner.nextInt();
       
        	
	        if (opcio==1) {
	        	System.out.print("Diguem el primer valor: ");
	        	numero1 = scanner.nextInt();
	        	System.out.print("Diguem el segon valor: ");
	        	numero2 = scanner.nextInt();
	        	System.out.println("El valor: "+numero1+ " més valor: "+numero2+" és igual a valor: "+(numero1+numero2)+"." );
	       	}
	        else if (opcio==2) {
	        	System.out.print("Diguem el primer valor: ");
	        	numero1 = scanner.nextInt();
	        	System.out.print("Diguem el segon valor: ");
	        	numero2 = scanner.nextInt();
	        	System.out.println("El valor: "+numero1+ " menys valor: "+numero2+" és igual a valor: "+(numero1-numero2)+"." );
	       	}
	        else if (opcio==3) {
	        	System.out.print("Diguem el primer valor: ");
	        	numero1 = scanner.nextInt();
	        	System.out.print("Diguem el segon valor: ");
	        	numero2 = scanner.nextInt();
	        	System.out.println("El valor: "+numero1+ " multiplicat per el valor: "+numero2+" és igual a valor: "+(numero1*numero2)+"." );
	       	}	
	        else if (opcio==4) {
	        	System.out.print("Diguem el primer valor: ");
	        	numero1 = scanner.nextInt();
	        	System.out.print("Diguem el segon valor: ");
	        	numero2 = scanner.nextInt();
	        	System.out.println("El valor: "+numero1+ " dividit per el valor: "+numero2+" és igual a valor: "+(numero1/numero2)+"." );
	       	}	
	        else if (opcio==5) {
	        	System.out.print("Gràcies");
	        	seguir=false;
	       	}
	        else {
	        	System.out.println("Tria un número del 1 al 5 ");        
	        	
	        }
        } 
    }
  }
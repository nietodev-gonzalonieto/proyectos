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
public class Act5_P3_UF2 {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        int viatges=0,negatiu=0;
        float kilos=0,kilostotal=0,gran=0,petit=0;
        boolean seguir = true;
       
       
       while(kilostotal<=5000 && viatges<10) {
    	     seguir = true;
        //Bucle para número válido(no negativo)
        while(seguir) {
	        System.out.print("Quants kilos has transportat en aquest viatge: ");
	        kilos = scanner.nextFloat();
	      
	        if(kilos<0) {
	        	negatiu++;
	        	System.out.println("No pots introduir números negatius.");
	        }
	        else {
	        	seguir =false;
	        }	        
        }
        kilostotal+=kilos;viatges++;
        if (kilos>gran || gran==0) {
        	gran=kilos;
        }
        if (kilos<petit || petit==0) {
        	petit=kilos;
        }
       }  
        
        System.out.println("El transportista ha fet: "+viatges+" viatges.");
        System.out.println("La mitjana de kilos de cada viatge és "+(kilostotal/viatges)+" kilos.");
        System.out.println("El viatge amb més kilos ha sigut: "+gran+" kilos");
        System.out.println("El viatge amb menys kilos ha sigut: "+petit+" kilos");
        System.out.println("T'has equivocat "+negatiu+ " vegades");
    }      
}
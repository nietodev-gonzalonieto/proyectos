/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p2_uf1;

import java.util.Scanner;

/**
 *
 * @author Gonzalo
 */
public class ACT8_P2_UF1 {
    public static void main(String[] args) {
    Scanner teclado = new Scanner(System.in);
    
   System.out.print(" Introdueix el nom del alumne: ");
   String alumne = teclado.nextLine(); 
   
   System.out.print(" Introdueix l'edat: ");
   int edat = teclado.nextInt();
   teclado.nextLine();
           
   System.out.print(" És un alumne repetidor: ");
   boolean repetir = teclado.nextBoolean();
    
  
   
  
   if (edat <  12){
    System.out.print(alumne + " no té l'edat per cursar l'ESO" );
   }
   if (edat == 12){  
       if (repetir == true)
        System.out.print(alumne + " de " + edat + " anys és alumne de 1er de ESO. " );
   }
   if (edat == 13){  
       if (repetir == true)
        System.out.print(alumne + " de " + edat + " anys és alumne de 1er de ESO. " );
          if (repetir == false)
          System.out.print(alumne + " de " + edat + " anys és alumne de 2n de ESO. " ); 
   }
    if (edat == 14){  
       if (repetir == true)
        System.out.print(alumne + " de " + edat + " anys és alumne de 2n de ESO. " );
          if (repetir == false)
          System.out.print(alumne + " de " + edat + " anys és alumne de 3er de ESO. " ); 
    }
    
    if (edat == 15){  
       if (repetir == true)
        System.out.print(alumne + " de " + edat + " anys és alumne de 3er de ESO. " );
          if (repetir == false)
          System.out.print(alumne + " de " + edat + " anys és alumne de 4t de ESO. " ); 
    }
    if (edat == 16) { 
       if (repetir == true)
        System.out.print(alumne + " de " + edat + " anys és alumne de 4t de ESO. " );
          if (repetir == false)
          System.out.print(alumne + " de " + edat + " ja ha acabat la ESO. " );
    }
    if (edat > 16){
        System.out.print(alumne + " de " + edat + " ja no té edat per cursar la ESO " );
    }
    }
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p2_uf1;

import java.util.Scanner;

public class   Act9_P2_UF1 {
public static void main(String[] args) { 
        Scanner objecte = new Scanner(System.in);
        System.out.println("En aquest restaurant tenim tres pizzes : 1- Margarita(6€), 2-Bolonyesa(8€) i 3- 3 Formatges(9€).");
        System.out.print("Quin tipus de pizza vols; 1, 2 o 3? ");
        int pizza = objecte.nextInt();
        objecte.nextLine();   //importante porq despues de un int viene un string
        
        System.out.print("Vols extra de Formatge? ");
        String extras1 = objecte.nextLine();
        
        System.out.print("Vols extra de Xampinyons? ");
        String extras2 = objecte.nextLine();
        
        System.out.print("Vols extra de Salmó? ");
        String extras3 = objecte.nextLine();
        
        float preu = 0;
        boolean extra1 = false;
        boolean extra2 = false;
        boolean extra3 = false;
       
        if(extras1.equalsIgnoreCase("Si"))
            extra1 = true;
        else if(extras1.equalsIgnoreCase("No"))
            extra1 = false;
        else 
            System.out.println("Error, la resposta només pot ser Si o No.");
        
        if(extras2.equalsIgnoreCase("Si"))
            extra2 = true;
        else if(extras1.equalsIgnoreCase("No"))
            extra2 = false;
        else 
            System.out.println("Error, la resposta només pot ser Si o No.");
        
        if(extras3.equalsIgnoreCase("Si"))
            extra3 = true;
        else if(extras1.equalsIgnoreCase("No"))
            extra3 = false;
        
        System.out.println("");
        if(pizza == 1){
            preu = preu + 6;
            System.out.println("Heu demanat una pizza Margarita amb els següents extres:");
        }
        else if(pizza == 2){
                preu = preu + 8;
            System.out.println("Heu demanat una pizza Bolonyesa amb els següents extres:");
        }
        else if(pizza == 3){
                preu = preu + 9;
                System.out.println("Heu demanat una pizza 3 Formatges amb els següents extres:");
        }
        if(extra1){
            preu = (float) (preu + 0.5);
            System.out.println("Extra Formatge");
        }
        if(extra2){
            System.out.println("Extra Xampinyons");
            preu = (float) (preu + 0.5);
        }
        if(extra3){
            System.out.println("Extra Salmó");
            preu = preu + 1;
        }
       
        System.out.println("");
        System.out.println("Preu Total: " + preu + "€.");
}
    
}

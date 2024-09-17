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
public class Act11_P2_UF1 {
    public static void main(String[] args) {
        
        Scanner objecte = new Scanner(System.in);
        
        System.out.print("Quin dia de la semana vols fer la reserva? 1- Dilluns, 2- Dimarts, 3- Dimecres, 4- Dijous, 5- Divendres, 6- Dissabte, 7- Diumenge: ");
        int dia = objecte.nextInt();
        
        System.out.print("Quina edat tens? ");
        int edat = objecte.nextInt();
        objecte.nextLine();
        
        System.out.print("Tens targeta d'abonat? ");
        String tarja = objecte.nextLine();
        
        
        float preu = 0;
        float preu1 = 0;
        float preu2 = 0;
        
        if (dia == 1 || dia == 2 || dia == 3 || dia == 4 || dia == 5){
            preu = preu + 6;
            if(tarja.equalsIgnoreCase("si"))
                preu2 = (preu - 1);
        }
                        
        else if (dia == 6 || dia == 7){
            preu = preu + 8;
            if(tarja.equalsIgnoreCase("si"))
                preu2 = (preu - 2);
        }
            
        if(edat > 65 && edat < 8)
            preu1 = (float) (preu - 1.5);
            preu2 = (float) (preu - 1.5);
        
        if(preu1 > preu2)
        System.out.println("El client de " + edat + " anys " + tarja + " té abonament i l'entrada per al " + dia + " val " + preu1 + "€");
        else if(preu2 > preu1)
        System.out.println("El client de " + edat + " anys " + tarja + " té abonament i l'entrada per al " + dia + " val " + preu2 + "€");
        
        
        
    }    
}

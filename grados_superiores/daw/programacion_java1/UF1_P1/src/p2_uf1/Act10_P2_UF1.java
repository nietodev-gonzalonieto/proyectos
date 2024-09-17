/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package  p2_uf1;

import java.util.Scanner;

/**
 *
 * @author Gonzalo
 */
public class Act10_P2_UF1 {
    public static void main(String[] args) {
        
        String dia, animal, turno;
        
        Scanner objecte = new Scanner(System.in);
        
        System.out.print("Quin dia de la semana vols reservar? ");
        dia = objecte.nextLine();
        
        System.out.print("Quin tipus d'animal tens? ");
        animal = objecte.nextLine();
        
        System.out.print("Per la tarda o matí? ");
        turno = objecte.nextLine();
                 
        
        if(dia.equalsIgnoreCase("Dilluns") || dia.equalsIgnoreCase("Divendres")) 
            System.out.println("Visita concertada per a " + animal + " " + dia + " " + turno);
        
        else if (dia.equalsIgnoreCase("Dimarts") || dia.equalsIgnoreCase("Dijous"))
            if(turno.equalsIgnoreCase("tarda"))
                  System.out.println("No es pot reservar visita per a " + animal + " " + dia + " " + turno);
            else
                System.out.println("Visita concertada per a " + animal + " " + dia + " " + turno); 

        else if (dia.equalsIgnoreCase("dimecres"))
            if(animal.equalsIgnoreCase("Gos"))
                System.out.println("No es pot reservar visita per a " + animal + " " + dia + " " + turno);
            else
                System.out.println("Visita concertada per a " + animal + " " + dia + " " + turno); 
        else if (dia.equalsIgnoreCase("divendres") || dia.equalsIgnoreCase("diumenge"))
             System.out.println("No es pot reservar visita per a " + animal + " " + dia + " " + turno);   
    }
}

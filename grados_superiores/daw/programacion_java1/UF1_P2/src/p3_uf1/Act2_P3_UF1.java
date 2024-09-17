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
public class Act2_P3_UF1 {

    public static void main(String[] args) {
        Scanner objecte = new Scanner(System.in);

        int alumne = 0;
        int i;
        float gran = 0;
        float petit = 0;
        int aprovat = 0;
        int suspes = 0;

        System.out.print("Introdueix el nº de alumnes: ");
        alumne = objecte.nextInt();

        for (i = 1; alumne >= i; i++) {
            System.out.print("Introdueix la teva nota? ");
            float nota = objecte.nextFloat();
//GRAN I PETIT
            if (i == 1){ 
                petit = nota;
                gran = nota;
            			}
           
            else if (i > 1){ 
                if (nota > gran)
            
                    gran = nota;
            					} 	
            
            else if (nota < petit) {
                    petit = nota;
                
            							} 
            //Contador Aprovat suspes
                
                if (nota>=5) { 
                    aprovat++;
                    float mitjanaa = aprovat / nota;
                    
                    } 
                	else { 
                        suspes++;
                         float mitjanas = suspes / nota;
                         
                        }
        }
        
        System.out.println("Els valor més gran es " + gran);
        System.out.println("Els valor més petit es " + petit);
        System.out.println("Els alumnes aprobats son:  " + aprovat);
        System.out.println("Els alumnes suspesos son:  " + suspes);
        
    }
}

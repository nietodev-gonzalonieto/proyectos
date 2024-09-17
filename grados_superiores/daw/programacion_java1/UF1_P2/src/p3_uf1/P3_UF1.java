/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p3_uf1;

import java.util.Scanner;

/**
 *
 * @author Gonzalo
 */
public class P3_UF1 {

    
    public static void main(String[] args) {   
        Scanner objecte = new Scanner(System.in);   
    
    int participant = 0;
    float distancia = 0;
    int i;
    float gran = 0;
    float petit = 0;
    float resultat = 0;
    
    System.out.print("Introdueix el nº de participants: ");
    participant = objecte.nextInt();
    
    
    for (i=1; participant>=i; i++)
        {
          System.out.print("Quina distància a fet el participant? ");
          distancia = objecte.nextFloat();
          resultat = distancia + resultat;
          
          if (i==1){
              petit=distancia;
              gran=distancia;
          }
          else if (i>1){
              if (distancia>gran){
                 gran=distancia; 
              }
              else if (distancia<petit){
                 petit=distancia; 
              }        
         }
          
          }
      
      float mitjana = resultat/participant;
        System.out.println("La mitjana es "+mitjana);
        System.out.println("Els valor més gran es " +gran);    
        System.out.println("Els valor més petit es " +petit);
    } 
}

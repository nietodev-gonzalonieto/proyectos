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
public class Act3_P3_UF1 {
    public static void main(String[] args) {
        Scanner objecte = new Scanner(System.in);
        System.out.println("Quin saldo actual tens: ");
        float saldo = objecte.nextFloat();
        int i=0;
        float operacio=1;
        float positiu = 0,negatiu = 0,media= 0,acumulacio= 0;
        
        
        
        while (operacio != 0){
            System.out.println("Fes una operació: ");
            operacio = objecte.nextFloat();
            i++;
            saldo=saldo+operacio;
            if(operacio>0)
            positiu++;
            if(operacio<0)
            negatiu++;
            
        }
        if(saldo>0)
            System.out.println("El valor " +saldo+ " es positiu");
            else 
            System.out.println("El valor " +saldo+ " es negatiu");
        
        
       System.out.println("El saldo es "+saldo); 
       System.out.println("Numero de operacions " +i);
       System.out.println("Numero operacions positives " +positiu);
       System.out.println("Numero operacions negatiu " +negatiu );
       
       
    } 
}

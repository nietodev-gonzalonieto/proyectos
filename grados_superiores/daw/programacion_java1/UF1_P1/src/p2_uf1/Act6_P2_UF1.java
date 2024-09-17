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
public class Act6_P2_UF1 {
   public static void main(String[] args) {  
   //Aquí poso les entitats    
        float num1, num2, num3;
    //Ara demano el valor per teclat    
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix un primer valor enter ");
        num1= teclado.nextFloat();

        System.out.print(" Introdueix un segon valor enter ");
        num2 = teclado.nextFloat();

        System.out.print(" Introdueix un tercer valor enter ");
        num3 = teclado.nextFloat();
    //MItjana
    double suma = (num1+num2+num3);
    double mitjana = (suma / 3);
   
    
   if (num1 > mitjana && num2 > mitjana)
       System.out.print(" La mitjana de " +num1+ " " +num2+" "+num3+ " es " +mitjana+ " i els seus numeros superiors son: " +num1+ " i " +num2);   
   if (num1 > mitjana && num3 > mitjana)    
       System.out.print(" La mitjana de " +num1+ " " +num2+" "+num3+ " es " +mitjana+ " i els seus numeros superiors son: " +num1+ " i " +num3);
  
   if (num2 > mitjana && num3 > mitjana)    
       System.out.print(" La mitjana de " +num1+ " " +num2+" "+num3+ " es " +mitjana+ " i els seus numeros superiors son: " +num2+ " i " +num3); 
   if (num3 > mitjana && num1 > mitjana)
       System.out.print(" La mitjana de " +num1+ " " +num2+" "+num3+ " es " +mitjana+ " i els seus numeros superiors son: " +num3+ " i " +num1); 
  
       }
}
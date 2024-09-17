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
public class Act3_P2_UF1 {
    public static void main(String[] args) { 
   int num1, num2 , num3; 
   Scanner teclado = new Scanner(System.in);
   System.out.print(" Introdueix un valor: ");
   num1 = teclado.nextInt();
   System.out.print(" Introdueix un altre valor: ");
   num2 = teclado.nextInt();
   int suma = (num1 + num2); 
  
   if (suma == 0)
    System.out.print(" El número és 0 :  " + suma);
   
   else 
  {
   if  (suma > 0 )
    System.out.print(" El número " + suma + " és positiu ");
   
   if  (suma < 0)
    System.out.print(" El número " + suma + " és negatiu ");
   }
    }
}

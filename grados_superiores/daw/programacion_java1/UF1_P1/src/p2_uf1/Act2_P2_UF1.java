/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p2_uf1;

import java.util.Scanner;

public class Act2_P2_UF1 {
public static void main(String[] args) { 
   int num;
   Scanner teclado = new Scanner(System.in);
   System.out.print(" Introdueix un valor: ");
   num = teclado.nextInt();
   
   if (num%2 == 0 && num%3 == 0)
    System.out.print(" El número " + num + " és múltiple de 2 i 3");
   
   else 
  {
   if  (num%2 != 0 && num%3 == 0 )
    System.out.print(" El número " + num + " és múltiple de 3 ");
   
   if  (num%2 == 0 && num%3 != 0)
    System.out.print(" El número " + num + " és múltiple de 2 ");
   }
  }    
}


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p3_uf1;

import java.util.Scanner;
import java.util.Calendar;

/**
 *
 * @author Gonzalo
 */
public class P3_UF1_Act4 {
    public static void main(String[] args) {
    String nom; /*String per escriure text*/
    String tasca;
    Scanner teclado = new Scanner( System.in );   /*Scanner per introduir dades desde teclat*/ 
    System.out.print (" Introdueix el teu nom ");
    nom = teclado.nextLine();
    System.out.print (" Introdueix una tasca ");
    tasca = teclado.nextLine();
    Calendar dataHora = Calendar.getInstance();
    System.out.printf( "%tr\n", dataHora );
    
        
    System.out.printf( nom + " ha fet la tasca " + tasca + " a les " + "%tr\n", dataHora );
  
        }
    }

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p3_uf1;

import java.text.DecimalFormat;
import java.util.Scanner;

/**
 *
 * @author Gonzalo
 */
public class P3_UF1_Act3 {

    public static void main(String[] args) {
        /*Float per tenir decimals*/
        Scanner teclado = new Scanner(System.in);
        /*Scanner per introduir dades desde teclat*/
        System.out.print(" Introduzca la distància en Kilòmetres: ");
        float kilometres = teclado.nextInt();
        System.out.print(" Introduzca el tiempo en horas: ");
        int temps = teclado.nextInt();
        float operacio = (float) (kilometres / temps) * 1000;
        /*Aquestes 3 operacions és per simplificar el resultat */
        //operacio *= 100; // operacio = operacio * 100;
        //operacio = Math.round(operacio);
        //operacio /= 100; // operacio = operacio / 100;
        System.out.printf(" El cotxe ha fet " + kilometres + " Km en " + temps + " hores . En un hora a fet %.2f metres.\n",operacio);
    }
}

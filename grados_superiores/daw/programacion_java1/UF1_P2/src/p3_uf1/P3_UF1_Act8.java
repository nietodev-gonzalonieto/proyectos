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
public class P3_UF1_Act8 {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        /*Scanner per introduir dades desde teclat*/
        float base, alçada;
        System.out.print(" Introdueix la base del triangle: ");
        base = teclado.nextFloat();
        System.out.print(" Introdueix l'alçada del triangle: ");
        alçada = teclado.nextFloat();
        float area = (float) ((base * alçada) / 2);
        System.out.println("L'àrea d'un triangle de " + base + "cm base i " + alçada + " és " + area + " cm.");
    }
}

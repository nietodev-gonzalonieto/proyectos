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
public class P3_UF1_Act7 {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        /*Scanner per introduir dades desde teclat*/
        float radi;
        System.out.print(" Introdueix la longitud  en cm del radi: ");
        radi = teclado.nextFloat();
        float radi2 = radi * radi;
        float area = (float) (radi2 * 3.14);
        /*L'àrea equival a radi2*pi*/
        float longitud = (float) (2 * 3.14 * radi);
        /*La longitud equival a 2*pi*radi*/
        System.out.println("La longitud d'una circumferència de radi " + radi + "cm és" + longitud + "cm i l'àrea és " + area + "cm2.");
    }
}

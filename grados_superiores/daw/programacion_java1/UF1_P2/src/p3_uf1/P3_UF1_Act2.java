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
public class P3_UF1_Act2 {

    public static void main(String[] args) {
        int temperatura1;
        /*Int per tenir enters*/

        Scanner teclado = new Scanner(System.in);
        /*Scanner per introduir dades desde teclat*/
        System.out.print(" Introduzca la temperatura: ");
        temperatura1 = teclado.nextInt();
        float operacio = (float) (temperatura1 - 32) * 5 / 9;
        boolean temperatura = false;
        System.out.println(+temperatura1 + " graus Fahrenheit equival a " + operacio + " graus Celius ");

    }

    private static void printf(String _2f__operacio) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}

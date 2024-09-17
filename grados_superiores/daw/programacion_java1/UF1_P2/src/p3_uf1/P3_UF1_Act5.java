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
public class P3_UF1_Act5 {

    public static void main(String[] args) {
        int num;
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix un valor enter ");
        num = teclado.nextInt();

        System.out.printf(" El numero " + num + " és en octal: " + " %o, ", num );
        System.out.printf(" El numero " + num + " és en hexadecimal: " + " %x\n ", num);

    }
}

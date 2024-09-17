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
public class P3_UF1_Act6 {

    public static void main(String[] args) {
        Scanner teclado = new Scanner(System.in);
        /*Scanner per introduir dades desde teclat*/
        float base;
        System.out.print(" Introdueix un valor enter ");
        base = teclado.nextInt();
        int pot2 = (int) Math.pow(base, 2);
        int pot3 = (int) Math.pow(base, 3);
        int pot5 = (int) Math.pow(base, 5);
        int pot7 = (int) Math.pow(base, 7);
        float arrel = (float) Math.sqrt(base);
        System.out.println(base + " elevat a 2 és  " + pot2 + ",a la potència 3 és " + pot3 + " ,a la potència 5 és " + pot5 + ", a la potència 7 és " + pot7 + " i la seva arrel quadrada és " + arrel);

    }

}

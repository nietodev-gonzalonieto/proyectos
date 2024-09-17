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
public class P2_UF1 {

    public static void main(String[] args) {

        int numa, numb, numc;
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix un primer valor enter ");
        numa = teclado.nextInt();

        System.out.print(" Introdueix un segon valor enter ");
        numb = teclado.nextInt();

        System.out.print(" Introdueix un tercer valor enter ");
        numc = teclado.nextInt();

        if (numa > numb);
        if (numa > numc);
        System.out.print(" El número més gran és  " + numa);

        if (numb > numa) {
        if (numb > numc) {
        System.out.println("El número més gran és  " + numb);
            }
        }

        if (numc > numa) {
        if (numc > numb) {
        System.out.println("El número més gran és  " + numc);
            }
        }

    }

}

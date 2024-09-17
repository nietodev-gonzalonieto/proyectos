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
public class Act4_P2_UF1 {

    public static void main(String[] args) {
    int numa, numb, numc;
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix un primer valor enter ");
        numa = teclado.nextInt();

        System.out.print(" Introdueix un segon valor enter ");
        numb = teclado.nextInt();

        System.out.print(" Introdueix un tercer valor enter ");
        numc = teclado.nextInt();
    
//Aquí comença les sumes    
        int suma1 = (numa + numb);
        int suma2 = (numa + numc);
        int suma3 = (numb + numc);
        int sumat = (numa + numb + numc);
//Aquí comença les condicions       
        if ( suma1 == numc)
            System.out.print(" El valor " + suma1 + " és la suma del " + numa + " +  " + numb );
        
        if (suma2 == numc)
            System.out.print(" El valor " + suma2 + " és la suma del " + numa + " + " + numc );
        
        if (suma2 == numc)
            System.out.print(" El valor " + suma2 + " és la suma del " + numa + " + " + numc);
        
        if (suma3 == numa)
            System.out.print(" El valor " + suma3 + " és la suma del " +numb+ " + " + numc);   
        
        if (sumat > 0)
        System.out.print(" El resultat es " + sumat);    
    }
}

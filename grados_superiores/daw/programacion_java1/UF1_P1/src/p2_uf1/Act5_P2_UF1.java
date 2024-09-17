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
public class Act5_P2_UF1 {

    public static void main(String[] args) {
    //Aquí poso les entitats    
        int numa, numb, numc;
    //Ara demano el valor per teclat    
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix un primer valor enter ");
        numa = teclado.nextInt();

        System.out.print(" Introdueix un segon valor enter ");
        numb = teclado.nextInt();

        System.out.print(" Introdueix un tercer valor enter ");
        numc = teclado.nextInt();
    // Aquí començo la primera comparació
        if (numa > numb && numa > numc) {
          
        if (numb > numc) {
                System.out.print(" El valor més gran és " + numa+ "el valor mitjà és  " + numb + " i el valor petit és " + numc);
            }

             else if (numc > numb) {
                System.out.print(" El valor més gran és " + numa+ "el valor mitjà és  " + numc + " i el valor petit és " + numb);
            }
        
                                        }
    //Aquí comença la segona comparació
        if (numb > numa && numb > numc)
        if (numa > numc) {
                System.out.print(" El valor més gran és " + numb+ " el valor mitjà és  " + numa + " i el valor petit és " + numc);
            }

             else if (numc > numa) {
                System.out.print(" El valor més gran és " + numb+ " el valor mitjà és  " + numc + " i el valor petit és " + numa);
            }
    //Aquí comença la tercera comparació    
        if (numc > numa && numc > numb)
        if (numa > numb) {
                System.out.print(" El valor més gran és " + numc +  " el valor mitjà és  " + numa + " i el valor petit és " + numb);
            }

             else if (numb > numa) {
                System.out.print(" El valor més gran és " + numc+ " el valor mitjà és  " + numb + " i el valor petit és " + numa);
            }    
    }
}

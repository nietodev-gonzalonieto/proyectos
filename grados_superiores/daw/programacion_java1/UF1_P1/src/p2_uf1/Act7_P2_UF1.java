/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package p2_uf1;

import java.util.Scanner;

//NOTA: HAY QUE PONER CLAUDATORS 

public class Act7_P2_UF1 {
     public static void main(String[] args) { 
         int velocitat , senyal; 
     
//Ara demano el valor per teclat    
        Scanner teclado = new Scanner(System.in);
        System.out.print(" Introdueix a quina velocitat conduïes ");
        velocitat = teclado.nextInt();

        System.out.print(" Introdueix quina velocitat marcava la senyal ");
        senyal = teclado.nextInt();
    
    //Això és per el límit de 30    
       if (senyal == 30){
            if (velocitat >= 31 && velocitat <= 50 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 51 && velocitat <= 60 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 61 && velocitat <= 70 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 71 && velocitat <= 80 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 81)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros."); 
       }
    //Això és per el límit de 40    
       if (senyal == 40){
            if (velocitat >= 41 && velocitat <= 60 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 61 && velocitat <= 70 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 71 && velocitat <= 80 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 81 && velocitat <= 90 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 91)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");
       }
       //Això és per el límit de 50    
       if (senyal == 50){
            if (velocitat >= 51 && velocitat <= 70 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 71 && velocitat <= 80 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 81 && velocitat <= 90 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 91 && velocitat <= 100 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 101)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");            
       }
       //Això és per el límit de 60    
       if (senyal == 60){
            if (velocitat >= 61 && velocitat <= 90 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 91 && velocitat <= 110 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 111 && velocitat <= 120 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 121 && velocitat <= 130 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 131)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");
       }
    //Això és per el límit de 70    
       if (senyal == 70){
            if (velocitat >= 71 && velocitat <= 100 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 101 && velocitat <= 120 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 121 && velocitat <= 130 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 131 && velocitat <= 140 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 141)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros."); 
       }
       //Això és per el límit de 80    
       if (senyal == 80){
            if (velocitat >= 81 && velocitat <= 110 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 111 && velocitat <= 130 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 131 && velocitat <= 140 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 141 && velocitat <= 150 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 151)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");
       }
    //Això és per el límit de 90    
       if (senyal == 90){
            if (velocitat >= 91 && velocitat <= 120 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 121 && velocitat <= 140 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 141 && velocitat <= 150 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 151 && velocitat <= 160 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 161)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");
       }
    //Això és per el límit de 100    
       if (senyal == 100){
            if (velocitat >= 101 && velocitat <= 130 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 131 && velocitat <= 150 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 151 && velocitat <= 160 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 161 && velocitat <= 170 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 171)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");         
       }
    //Això és per el límit de 110    
       if (senyal == 110){
            if (velocitat >= 111 && velocitat <= 140 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 141 && velocitat <= 160 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 161 && velocitat <= 170 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 171 && velocitat <= 180 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 181)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");
       }
    //Això és per el límit de 120    
       if (senyal == 120){
            if (velocitat >= 121 && velocitat <= 150 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 0 punts i pagaràs una multa de 100 euros.");   
           if (velocitat >= 151 && velocitat <= 170 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 2 punts i pagaràs una multa de 300 euros.");     
            if (velocitat >= 171 && velocitat <= 180 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 4 punts i pagaràs una multa de 400 euros.");   
            if (velocitat >= 181 && velocitat <= 190 )
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 500 euros.");
            if (velocitat >= 191)
        System.out.print("Conduint a  "+velocitat+ " K/m amb una limitació de " +senyal+ " et descomptaran 6 punts i pagaràs una multa de 600 euros.");                 
       }
     }    
   }

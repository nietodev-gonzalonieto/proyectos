/*
 ============================================================================
 Name        : P10_Lab5_Repte1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab5 Repte3
 ============================================================================
 */
#include <stdio.h>
#include <stdlib.h>

float fahrenheitACelsius(float fahrenheit) {
    return (fahrenheit - 32) / 1.8;
}

int main(){
    FILE *fichero;
    fichero = fopen("temp1.txt", "r");

    FILE *fichero_respuestas;

    int contador=0 , defectuosos = 0;
    int longitud=50;
    float temp = 0.0;
    float temperaturas_fahrenheit[longitud];
    float temperaturas_celcius[longitud];
    if (fichero == NULL){
    	printf("Error no se ha podido abrir el fichero \n");
    }
    else {
        fscanf(fichero, "%f", &temp);
        while (!feof(fichero)){
            temperaturas_fahrenheit[contador] = temp;
            fscanf(fichero, "%f", &temp);
            contador += 1;
        }
        fclose(fichero);
    }
    for (int i =0; i<contador; i++){
    	if (temperaturas_fahrenheit[i] == -999.9f) {
    		temperaturas_celcius[i]=temperaturas_fahrenheit[i];
    		defectuosos+=1;
		}else{
			temperaturas_celcius[i] = fahrenheitACelsius(temperaturas_fahrenheit[i]);
		}
    }

    fichero_respuestas=fopen("fichero_respuestas.txt","w");
    for (int i =0; i<contador; i++){
    	fprintf(fichero_respuestas,"%.2f\t",temperaturas_celcius[i]);
    }
    return 0;
}


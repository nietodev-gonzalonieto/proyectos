/*
 ============================================================================
 Name        : P10_Lab5_Repte1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab5 Repte1
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

	int contador=0 , contador2=0 , defectuosos = 0;
	int longitud=50;
	float temp = 0.0;
	float temperaturas_fahrenheit[longitud];
	float temperaturas_celcius[longitud];
	int sensores_defectuosos[contador2];
	float suma=0;
	float media=0;

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
			sensores_defectuosos[contador2] = i+1;
			contador2 +=1;
			defectuosos+=1;
			temperaturas_celcius[i]=temperaturas_fahrenheit[i];
			//temperaturas_celcius[i]=0;
			suma+=0;
		}else{
			temperaturas_celcius[i] = fahrenheitACelsius(temperaturas_fahrenheit[i]);
			suma+=temperaturas_celcius[i];
		}
	}

//Printamos las temperaturas en Celcius
	printf("Valores en Celsius: \n");
	for (int i =0; i<contador; i++){
		if (temperaturas_fahrenheit[i] == -999.9f) {

		}
			printf("%.2f \n",temperaturas_celcius[i]);
	}

//Printamos la cantidad de sensores defectuosos
	printf("Hay un total de %d sensores defectuosos. \n", defectuosos);

//Printamos la posición de los sensores defectuosos
	for (int i =0; i<contador2; i++){
		printf("Sensor defectuoso en la posicion: %d \n",sensores_defectuosos[i]);
	}

//Calculamos y printamos la media
	media=suma/(contador-defectuosos);
	printf("La media es de: %.2f", media);
	return 0;
}



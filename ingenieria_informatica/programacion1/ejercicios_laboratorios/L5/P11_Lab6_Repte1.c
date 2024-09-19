/*
 ============================================================================
 Name        : P11_Lab6_Repte1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab6 Repte1
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
	int media_menor=0;
	int media_mayor=0;

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
			suma+=0;
		}else{
			temperaturas_celcius[i] = fahrenheitACelsius(temperaturas_fahrenheit[i]);
			suma+=temperaturas_celcius[i];
		}
	}
//Calculamos la media
	media=suma/(contador-defectuosos);

//Printamos las temperaturas en Celcius y comprobamos medias aprovechando el bucle
	printf("Valores en Celsius: \n");
	for (int i =0; i<contador; i++){
		printf("%.2f \n",temperaturas_celcius[i]);
		if (temperaturas_celcius[i] != -999.9f && temperaturas_celcius[i] > media) {
			media_menor+=1;
		}else if(temperaturas_celcius[i] != -999.9f && temperaturas_celcius[i] < media){
			media_mayor+=1;
		}
	}

//Printamos la cantidad de sensores defectuosos
	printf("Hay un total de %d sensores defectuosos. \n", defectuosos);

//Printamos la posición de los sensores defectuosos
	for (int i =0; i<contador2; i++){
		printf("Sensor defectuoso en la posicion: %d \n",sensores_defectuosos[i]);
	}

//Calculamos y printamos la media
	printf("La media es de: %.2f \n", media);


//Indicamos cuantos sensores estan por encima y por debajo de la media
	printf("Total de dispositivos que tienen menos temperatura media: %d \n", media_menor);
	printf("Total de dispositivos que tiene mas temperatura media: %d \n", media_mayor);
	return 0;
}

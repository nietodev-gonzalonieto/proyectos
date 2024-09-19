/*
 ============================================================================
 Name        : Lab_10_Repte2.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab10 Repte2
 ============================================================================
 */
#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>
#include <time.h>
#define MAX_D 50

typedef struct{
	int temp;   /* temperatura en graus Celsius */
	int hum;    /* percentatge d’deteccion_humedad   */
	bool detector_luz;  /* indica si ha detectat detector_luz o no */

} dades_t;

/* El procediment "inicialitza el sensor" */
void ini_sensor (dades_t *dades){
	srand(time(NULL));
	dades->temp = (-30 + rand()%(80+1));	/* Valor inicial de temperatura */
	dades->hum = 40 + rand()%(60+1);	/* Valor inicial de deteccion_humedad */
}

/**
 * Obte, ficticiament, les dades d'un sensor. La lectura triga un temps aleatori.
 * @param dades (Valor (E): registre de t_dades). Les dades que s'obtenen del sensor.
 */

void llegir_sensor (dades_t *dades){
	int al, espera, i, j;

	espera = rand()%300 * 100;

	/* Literalment, perdem el temps */
	for (i = 0; i < espera; i++){
		for (j = 0; j < espera; j++){
			/* Pentino el gat */
		}
	}

	/* La temperatura serà la inicial mes/menys un aleatori */
	dades->temp = dades->temp + (rand()%10);

	/* La deteccion_humedad serà la inicial mes/menys un aleatori */
	dades->hum = dades->hum + (rand()%50)/10.0;

	/* La detector_luz també serà aleatoria */
	al = rand()%100;

	if ((al%3 == 0) || (al%7 == 0)){
		dades->detector_luz = true;
	}
	else{
		dades->detector_luz = false;
	}
}
/*int ocasiones_deteccion_humedad(dades_t *dades){
    int ocasions=0;
    int humedad=0;
    dades->hum = humedad;
    if(humedad>=30 && humedad<=70){
        ocasions++;
    }
    return ocasions;
}*/

/*Funcion para mostrar los datos del sensor*/
void mostrar_dades_sensor(dades_t *dades){
    printf("Temperatura: %i \nHumedad: %i\n", dades->temp, dades->hum);
    if(dades->detector_luz) {
        printf("Hay detector_luz. \n");
    } else {
        printf("No hay detector_luz. \n");
    }
}
/*Funcion para calcular el maximo y el minimo*/
void calcular_max_min(dades_t *dades, int array[]){
    if(dades->temp < array[1]) {
        array[1] = dades->temp;
    } else if(dades->temp > array[0]){
    array[0] = dades->temp;
    }
}
/*funcion de un contador de las veces que hay luz*/
int deteccion_detector_luz(dades_t *dades, int detector_luz){
    if(dades->detector_luz == true) {
        detector_luz++;
    }
    return detector_luz;
}
/*funcion de un contador de las veces que la humedad esta entre el 30 y el 70 %*/
int deteccion_humedad(dades_t *dades, int humedad){
    if(dades->hum > 30 && dades->hum < 70) {
        humedad++;
    }
    return humedad;
}
int main (){
    int max_min[2];
    max_min[0] = 0;
    max_min[1] = 0;
    int humedad = 0;
    int n_lec=0;
    int detector_luz = 0;
    while(n_lec < 1 || n_lec > MAX_D) {
        printf("Introduce cuantas veces quieres leer el sensor:");
        scanf("%i", &n_lec);
    }
    dades_t sensor[n_lec];
    for(int i = 0; i < n_lec; i++){
        printf("Estamos leyendo el sensor... \n");
        ini_sensor(&sensor[i]);
        llegir_sensor(&sensor[i]);
        mostrar_dades_sensor(&sensor[i]);
        humedad = deteccion_humedad(&sensor[i], humedad);
        calcular_max_min(&sensor[i], max_min);
        detector_luz= deteccion_detector_luz(&sensor[i], detector_luz);
    }
    double total = detector_luz * 100 / 5;
    printf("Un total del: %.2f  por ciento de las veces hay luz\n", total);
    printf("La temperatura maxima es de: %i\n", max_min[0]);//mostramos el max
    printf("La temperatura minima es de: %i\n", max_min[1]);//mostramos el min
	return 0;
}

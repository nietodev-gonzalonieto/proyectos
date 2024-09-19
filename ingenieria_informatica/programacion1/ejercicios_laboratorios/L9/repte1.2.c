/*
 ============================================================================
 Name        : Lab10_Repte1.1.c
 Author      : GonzaloNieto
 Version     :
 Copyright   : Esto es obra de Gonzalo Nieto
 Description : Lab10 Repte1.1
 ============================================================================
 */
#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>
#include <time.h>
#define MAX_D 50

typedef struct{
	int temp;   /* temperatura en graus Celsius */
	int hum;    /* percentatge d’humitat   */
	bool llum;  /* indica si ha detectat llum o no */

} dades_t;

/* El procediment "inicialitza el sensor" */
void ini_sensor (dades_t *dades){
	srand(time(NULL));
	dades->temp = (-30 + rand()%(80+1));	/* Valor inicial de temperatura */
	dades->hum = 40 + rand()%(60+1);	/* Valor inicial de humitat */
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

	/* La humitat serà la inicial mes/menys un aleatori */
	dades->hum = dades->hum + (rand()%50)/10.0;

	/* La llum també serà aleatoria */
	al = rand()%100;

	if ((al%3 == 0) || (al%7 == 0)){
		dades->llum = true;
	}
	else{
		dades->llum = false;
	}
}

void mostrar_dades_sensor(dades_t *dades){
    printf("Temperatura: %i \nHumedad: %i\n", dades->temp, dades->hum);
    if(dades->llum) {
        printf("Hay luz. \n");
    } else {
        printf("No hay luz. \n");
    }
}

int main (){
    int n_lec = 0;
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
    }
    return 0;
}

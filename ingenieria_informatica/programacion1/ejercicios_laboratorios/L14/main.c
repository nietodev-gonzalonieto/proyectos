/**
 *  @file          main.c
 *  @brief         Juego de los edificios. Creación del tablero.
 *  @author        montse.garcia@urv.cat
 *  @version       1.0
 *  @date          15/12/23
 */

#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include "procs.h"

#define NOM_FICHERO "edifici.txt"

/* Prueba de los procedimientos */
int main(void)
{
     /* Define variables locales */
    punto_t puntos[PUNTS_MAX];
    int num_puntos;
    float perimetro;
    
	/* NO TOCAR */
	srand (1);		/* Inicialización de la semilla para pruebas */
	/* srand ((int)time(NULL));	Inicialización de la semilla para jugar */
	
	/* 1. Escribe el código */
    num_puntos = fp_lee_puntos(puntos, PUNTS_MAX);
     /* 2. Calcula perímetro */
    perimetro = calcula_perimetro(puntos, num_puntos);
    
    /* 3. Muestra el resultado */
    printf("Perímetro del polígono = %.2f\n", perimetro);
    
    /* 4. Devuelve el control al SO */
    return 0;
}

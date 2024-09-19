/**
 *  @file     	procs.c
 *  @brief     	Procedimientos laboratorio 14.
 *  @authors 	gonzalo.nieto@estudiants.urv.cat
 *  @version  	1.0
 *  @date
 */

/* Cabeceras de los procedimientos locales */
#include <stdio.h>
#include "procs.h"

/* Implementa los procedimientos */
int my_main()
{
    int tablero[MCOLS_MAX][MCOLS_MAX];
    int filas = MCOLS_MAX, columnas = MCOLS_MAX;

    char nombre_fichero[100];  // Ajusta según la longitud máxima esperada

    printf("Introduce el nombre del fichero: ");
    scanf("%s", nombre_fichero);

    int resultado_lectura = llegir_matriu_f(nombre_fichero, tablero, &filas, &columnas);

    if (resultado_lectura == CORRECTO)
    {
        printf("Tablero leído correctamente:\n");
        pinta_tauler(tablero, filas, columnas);
    }
    else
    {
        printf("Error al leer el tablero. Código de error: %d\n", resultado_lectura);
    }

    return 0;
}
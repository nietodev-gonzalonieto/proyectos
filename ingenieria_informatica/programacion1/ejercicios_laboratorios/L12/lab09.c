/**
 *  @file     	lab09.c
 *  @brief     	Implementación del laboratorio 09.
 *  @authors 	nom.cognoms@estudiants.urv.cat
 *  @version  	1.1
 *  @date       3/03/2023
 */

/* Cabeceras de las librerías */
/* ---------------------------*/
#include <stdio.h>
#include "procs.h"

/* Constantes */
#define DIM_MAX	 20

/* Declaraciones de procedimientos locales */
/* ----------------------------------------*/

/* Programa principal */
int main(void)
{
	/* Definición de variables locales */
	int res = 0;
    int t1[DIM_MAX] = {1,2,0,-1,5};
	int t2[DIM_MAX] = {3,3,3,3,3};

	/* 	Código
	 	Llamadas a los procedimientos */

	/* 1. Valles y montañas */
	printf ("\n1. Valles y montanyas \n");
	
    /* 2. Suma elementos */
    printf ("\n2. Suma elementos\n");
    
	/* 3. Ordena */
	printf ("\n3. Ordena vector:\n");
	
	/* 4. Busca */
	printf ("\n4. Busca valor vector:\n");

    /* 3. Mezcla tablas */
    printf ("\n5. Mezcla tabla\n");

	/* Devuelve la información al SO */
	return 0;
}

/* Implementación de procedimientos locales */
/* -----------------------------------------*/

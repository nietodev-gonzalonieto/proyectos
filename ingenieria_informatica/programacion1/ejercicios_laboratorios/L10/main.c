/**
 *  @file          main.c
 *  @brief         Laboratorio 04.
 *  @author        montse.garcia@urv.cat
 *  @version       1.0
 *  @date          17/4/19
 */

/* Bibliotecas estándar */
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

/* Definición de bibliotecas */

/** \def
 * SENTINELLA = 0
 * PI = 3,141597
 * NOM_FICHERO = "areas.txt"
 */

/*
 #define SENTINELLA 	________________
 #define PI              _________
 #define NOM_FICHERO     _________
 */

/** Busca el minimo de los datos de una secuencia.
 *
 * @return (enter) Devuelve el valor máximo o un código de error.
 */
int minimo_secuencia (void)
{
	
	/* Variables locales */
	int resultado = 0;      /* Variable con el resultado o código de error */
	
	/* Código */
	/* ____________________; */
	
	/* Devuelve el resultado */
	return (resultado);
}

/** Busca el mínimo de los datos de un fichero.
 *
 * @param nom_fichero (Ref (E): cadena) Nombre del fichero.
 * @return (enter) Devuelve el valor más pequeño
 *          o el código de error.
 */
int minimo_fichero (char nom_fichero[])
{
	/* Variables locales */
	int resultado = 0;      /* Número mínimo o código de error */
	
	/* Código */
	printf ("Minimo del fichero: %s\n", nom_fichero);
	/* ____________________; */
	
	/* Devuelve el resultado */
	return (resultado);
}

/** Calcula y guarda el área de las esferas.
 * Los radios se introducen por teclado.
 * Acaba cuando el radio es menor o igual a 0.
 *
 * @return (enter) Devuelve el número de áreas calculadas o
 *      un código de error si se ha producido algún problema.
 */
int guarda_areas (void)
{
	int total = 0;          /* Total de areas calculadas o error */
	float radi = 0, area;
	/* FILE *___________; 	Define una variable tipo fichero */
	
	/* Sustituye por el código adecuado */
	area = radi;
	total = area;
	
	/* !!Guarda el área con dos decimales
	 y con un espacio detrás !! */
	/* ___________; */
	
	/* Devuelve el resultado */
	return (total);
}

int main(void)
{
	/* Declaració de variables del programa */
	int op, numero, valle, monte;
	
	/* Codi */
	/* No cal fer res */
	do
	{
		printf ("\nLaboratorio 04 \n");
		printf ("\t0. Acabar\n");
		printf ("\t1. Busca el minimo\n\t2. Minimo del fichero\n");
		printf ("\t3. Guarda areas\n");
		printf ("Qué procedimiento quieres probar? ");
		scanf ("%d", &op);
		while (getchar()!='\n');
		switch (op) {
			case 0:
				printf ("Adios!\n");
				break;
			case 1:
				numero = minimo_secuencia();
				printf ("El valor mas pequenyo es = %d\n", numero);
				break;
			case 2:
				numero = minimo_fichero("test1.txt");
				printf ("El valor mas pequenyo es = %d\n", numero);
				break;
			case 3:
				numero = guarda_areas();
				printf ("Se han guardado %d areas\n", numero);
				break;
			default:
				printf ("Opción errónea!\n");
				break;
		}
	} while (op!=0);

    /* Devuelve la información al SO */
    return 0;
}

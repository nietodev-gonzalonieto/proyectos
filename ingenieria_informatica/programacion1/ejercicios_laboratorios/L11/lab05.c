/**
 *  @file     	lab05.c
 *  @brief     	Laboratorio 05.
 *  @authors 	NomCognom@estudiant.urv.cat
 *  @version  	1.1
 *  @date       3/03/2021
 */

/* Cabeceras de las librerías */
/* ---------------------------*/
#include <stdio.h>

/* Constantes */

/* TODO: Define el valor de la constante FACTORIAL_MAX */
/** \def FACTORIAL_MAX
 * Define el valor máximo que puede calcular el procedimiento factorial
 */
#define FACTORIAL_MAX   1

/* Cabeceras/definición de los procedimientos locales */

/** Algoritmo para generar un número entero aleatorio acotado [min..max].
 *  Siempre se cumple que min <= max.
 *
 * @param min (Valor (E): entero) Valor mínimo que puede tomar el número aleatorio.
 * @param max (Valor (E): entero) Valor máximo que puede tomar el aleatorio.
 * @return (entero) Devuelve un número entero aleatorio perteneciente a [min..max].
 */
int entero_aleatorio_acotado (int min, int max)
{
	/* TODO: Implementa el procedimiento */

	/* Variables locales */
	/*________ aleatorio;*/

	/* La semilla se ha generado en el principal!!!
	 *  NO llamar a srand()!
	 */

	/* Código */
	/* 1. Genera un número aleatorio */
	/*aleatorio = ____________      Número aleatorio entre 0 y RAND_MAX */

	/* 2. Ajusta el valor al rango [min, max]*/
	/* _______________ ;*/

	/* 3. Devolver el resultado */
	/* return ____________; */
}

/** Calcula el factorial del número que recibe por parámetro.
 *
 * @param n (Valor (E): natural) Número de entrada (n >= 0).
 * @return (entero) Devuelve el factorial del número de entrada (n!).
 */
int factorial (unsigned int n)
{
	/* TODO: Implementa el procedimiento */
	/* Definición de variables locales si las necesitas. */
	/* ________________ resultado, i; */

	/* Código */
	/* 1. Inicialización de variables. */


	/* 2. Completa el algoritmo. */


	/* 3. Devolver el resultado */
	/* return (_____________); */
}

/** Calcula las variaciones de m elementos cogidos de n en n (sin repeticiones).
 *
 *	TODO: Completa la documentación del procedimento.
 * -----------
 */
/* Diseña el procedimiento */
/* TODO: Diseña el procedimiento: cabecera e implementación */

/* Programa principal */
int main(void)
{
    /* Definición de variables locales */
    int op, min, max, res, m, n;

    /* Código */
	do
	{
    	/* 1. Mostrar menú y elegir opción */
		printf ("\n0. Salir\n1. Aleatorio.\n2. Factorial.\n3. Variaciones.");
		printf ("\nElige opcion: ");
		scanf ("%d", &op);

		switch (op)
		{
			case 0:
				printf ("Adios!\n");
				break;
			case 1:
				printf ("Aleatorio\n");
				/* 1. Leer datos */
				printf ("min y max? ");
				scanf ("%d %d", &min, &max);
				/* 2. Generar aleatorio */
				if (min <= max)
				{
					res = entero_aleatorio_acotado(min, max);
				}
				else
				{
					res = entero_aleatorio_acotado(max, min);
				}

				/* 3. Mostrar el resultado */
				printf ("Numero: %d\n", res);
				break;
			case 2:
				printf ("Factorial\n");
				/* 1. Leer datos */
				printf ("num? ");
				scanf ("%d", &m);
				/* 2. Calcular factorial */
				if ((m < FACTORIAL_MAX) && (m >= 0))
				{
					res = factorial(m);
					/* 3. Mostrar el resultado */
					printf ("%d! = %d\n", m, res);
				}
				else
				{
					printf ("No se puede calcular: %d!\n", m);
				}
				break;
			case 3:
				printf ("Variaciones\n");
				/* 1. Leer datos */
				printf ("m y n? ");
				/* Puedo reaprovechar variables */
				scanf ("%d %d", &m, &n);
				/* 2. Calcular factorial */
				if ((m >= n) && (n > 0))
				{
					/* TODO: Llama al procedimento que calcula las variaciones */
					/* res = _____________ */
					/* 3. Mostrar el resultado */
					printf ("Variaciones de %d elementos tomados de %d en %d = %d\n",
							m, n, n, res);
				}
				else
				{
					printf ("Error en los parámetros de entrada: %d %d!\n", n, m);
				}
				break;
		}
	} while (op != 0);

	/* Retorno al SO */
    return 0;
}

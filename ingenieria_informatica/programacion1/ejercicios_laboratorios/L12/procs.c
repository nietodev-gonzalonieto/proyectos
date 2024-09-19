/**
 *  @file     	procs.c
 *  @brief     	Implementación de la biblioteca de procedimientos.
 *  @author 	nom.cognom@estudiant.urv.cat
 *  @version  	1.1
 *  @date       3/03/2023
 */

/* Cabeceras de los procedimientos */
/* --------------------------------*/
#include "procs.h"

/*   Procedimientos generales          */
/* ------------------------------------*/

/** Intercambia dos valores enteros.
 *
 * @param num1 (Ref (E/S): enter) Primer número.
 * @param num2 (Ref (E/S): enter) Segundo número.
 */
void fp_intercambia (int *num1, int *num2)
{
	int tmp;
	
	tmp = *num1;
	*num1 = *num2;
	*num2 = tmp;
}

/** Ordena dos valores enteros de menor a mayor
 *
 * @param menor (Ref (E/S): enter) Primer número. Contendrá el valor más pequeño.
 * @param mayor (Ref (E/S): enter) Segundo número. Contendrá el valor más grande.
 */
void fp_ordena (int *menor, int *mayor)
{
	if (*menor > *mayor)
	{
		fp_intercambia(menor, mayor);
	}
}

/** Aleatorio acotado.
 *  Es indiferente el orden de los valores min y max.
 *
 * @param min (Valor (E): entero) Límite inferior.
 * @param max (Valor (E): entero) Límite superior.
 * @return (entero) Devuelve un número aleatorio entre
 *		el valor más pequeño y el más grande,
 *		ambos incluidos.
 */
int fp_entero_aleatorio (int min, int max)
{
	int tmp;
	
	/* 1. Ordena los valores min y max */
	fp_ordena(&min, &max);
	
	/* 2. Genera un número aleatorio */
	tmp = rand();
	
	/* 3. Ajustalo a los valores [min, max]*/
	/* Completa el algoritmo */
	
	/* 4. Devuelve el resultado */
	return (tmp);
}

/* Procedimientos con tablas */
/* ------------------------------------*/

/** Leer un vector de enteros de teclado.
 *
 * @param v (Ref (S): taula[] de enteros) Vector a rellenear.
 * @param dim (Valor (E): entero) Dimensión del vector (>=0).
 * @return (entero) Devuelve el número de elementos
 * 		guardados en el vector.
 */
int fp_lee_vector_entero (int v[], int dim)
{
	/* Completa el algortimo */
	printf ("Proc: fp_lee_vector_entero()\n");
	return (0);
}

/** Escribe un vector de enteros por pantalla.
 *
 * @param v (Ref (E): taula[] de enteros) Tabla a mostrar.
 * @param dim (Valor (E): entero) Dimensión del vector (>=0).
 */
void fp_escribe_tabla_entero (int v[], int dim)
{
	/* Completa el algoritmo */
	printf ("Proc: fp_escribe_vector_entero()\n");
}

/* Completa la cabecera, documentación e implementación */
/** Suma elementos de un vector
 *
 * @param v ....
 */

/** Ordena un vector de enteros descendente.
 *
 * @param v (Ref (E/S): taula[] de enteros) Vector donde se guardan los datos.
 Al finalizar estará ordenada.
 * @param dim (Valor (E): entero) Dimensión de la tabla (dim >= 0)
 */
void ordena_tabla_desc (int v[], int dim)
{
	/* Completa el algoritmo */
	printf ("Proc: ordena_vector_desc()\n");
}

/* Completa la cabecera, documentación e implementación */
/** Busca elemento en un vector.
 *
 * @param v ....
 */


/** Mezcla los elementos de una tabla
 *
 * @param t (Ref (E/S): taula[] de enter) Tabla con valores enteros.
 * @param dim (Valor (E): enter) Dimensión de la tabla (>=0).
 */
void mezcla_tabla (int t[], int dim)
{
	/* Completa el algoritmo */
	printf ("Proc: mezcla_tabla()\n");
}



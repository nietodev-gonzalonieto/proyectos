/**
 *  @file       procs.h
 *  @brief      Cabeceras de la biblioteca de procedimientos.
 *  @author     nom.cognom@estudiant.urv.cat
 *  @version    1.1
 *  @date       3/03/2023
 */

#ifndef PROCS_H_INCLUDED
#define PROCS_H_INCLUDED

/* Cabeceras de las librerías estándard */
/* -------------------------------------*/
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdbool.h>
#include <limits.h>

/*    Procedimientos generales         */
/* ------------------------------------*/

/** Intercambia dos valores enteros.
 *
 * @param num1 (Ref (E/S): enter) Primer número.
 * @param num2 (Ref (E/S): enter) Segundo número.
 */
void fp_intercambia (int *num1, int *num2);

/** Ordena dos valores enteros de menor a mayor
 *
 * @param menor (Ref (E/S): enter) Primer número. Contendrá el valor más pequeño.
 * @param mayor (Ref (E/S): enter) Segundo número. Contendrá el valor más grande.
 */
void fp_ordena (int *menor, int *mayor);

/** Aleatorio acotado.
 *  Es indiferente el orden de los valores min y max.
 *
 * @param min (Valor (E): entero) Límite inferior.
 * @param max (Valor (E): entero) Límite superior.
 * @return (entero) Devuelve un número aleatorio entre
 *		el valor más pequeño y el más grande,
 *		ambos incluidos.
 */
int fp_entero_aleatorio (int min, int max);

/*   Procedimientos con tablas         */
/* ------------------------------------*/

/** Leer un vector de enteros de teclado.
 *
 * @param v (Ref (S): taula[] de enteros) Vector a rellenear.
 * @param dim (Valor (E): entero) Dimensión del vector (>=0).
 * @return (entero) Devuelve el número de elementos
 * 		guardados en el vector.
 */
int fp_lee_vector_entero (int v[], int dim);

/** Escribe un vector de enteros por pantalla.
 *
 * @param v (Ref (E): taula[] de enteros) Tabla a mostrar.
 * @param dim (Valor (E): entero) Dimensión del vector (>=0).
 */
void fp_escribe_tabla_entero (int v[], int dim);

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
void ordena_tabla_desc (int v[], int dim);

/** Busca elemento en un vector.
 *
 * @param v ....
 */

/** Mezcla los elementos de una tabla
 *
 * @param t (Ref (E/S): taula[] de enter) Tabla con valores enteros.
 * @param dim (Valor (E): enter) Dimensión de la tabla (>=0).
 */
void mezcla_tabla (int t[], int dim);

#endif /* PROCS_H_INCLUDED */

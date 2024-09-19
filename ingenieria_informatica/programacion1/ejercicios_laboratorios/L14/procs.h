/**
 *  @file       procs.h
 *  @brief      Procedimientos laboratorio 13.
 *  @authors    nom.cognom@estudiants.urv.cat
 *  @version    1.0
 *  @date
 */

#ifndef PROCS_H
#define PROCS_H

#include <stdio.h>
#include <math.h>

/** def MCOLS_MAX
 *  Número máximo de columnas en los procedimientos
 *  que trabajan con matrices.
 */
#define MCOLS_MAX 	10

/**
 *  Constantes diversas.
 */
#define SALTO_LINEA '\n'
#define ER_FICHERO  -3
#define CORRECTO 	0

/** def PUNTS_MAX
 *  Número máximo de puntos
 */
#define PUNTS_MAX   50

/** def punto_t
 *  Estructura con los valores de x e y.
 */
typedef struct
{
    float x, y;
}punto_t;

/* Define más estructuras si lo necesitas */

/** Leer puntos de teclado y los guarda en una tabla.
 *
 * @param puntos (Ref (S): taula[] de punts_t) Puntos leídos por teclado.
 * @param dim (Valor (E): enter) Número máximo de puntos que caben en la tabla.
 * @return (int) Devuelve el número de puntos leídos.
*/
int fp_lee_puntos (punto_t puntos[], int dim);

/** Calcula la distancia.
 *
 * @param p1 (Valor (E): punto_t) Información del primer punto.
 * @param p2 (Valor (E): punto_t) Información del segundo punto.
 * @return (real) Devuelve la distancia entre p1 y p2.
*/
float fp_calcula_distancia (punto_t p1, punto_t p2);

/** Calcula el perímetro de un polígono irregular.
 *
 * @param p (Valor (E): poligon_t) Información del polígono: puntos y
 *      número de puntos.
 * @return (real) Devuelve el valor del perímetro calculado
 *          a partir de la secuencia ordenada de los puntos, (x, y),
 *          que forman el polígono.
*/
float calcula_perimetro (punto_t puntos[], int num_puntos);

/* Juego de los edificios
   ======================
 */

/** Crea un nuevo tablero de dimensions dim x dim.
 *
 * @param tauler (Ref (S): taula[][DIM_MAX] d’enter) Matriz para guardar el tablero.
 * @param dim (Valor (E): enter) Dimensión del tablero (1 <= dim <= DIM_MAX)
 */
void crea_tauler (int tauler[][MCOLS_MAX], int dim);

/** Guarda los datos de una matriz en un fichero de texto.
 *
 * @param nom_fitxer (Ref (E): taula[] de caràcter) Nombre del fichero.
 * @param m (Ref (E): taula[][DIM_MAX] d’enter) Matriz donde están los datos.
 * @param nfilas (Valor (E): enter) Número máximo de filas de la matriz.
 * @param mcols (Valor (E): enter) Número máximo de columnas de la matriz. (ncols <= DIM_MAX).
 * @return (enter) Retorna 0 si todo ha ido bien o
 *  		un codigo de error si ha habido algún problema.
 */
int escriu_matriu_f (char nom_fitxer[], int m[][MCOLS_MAX], int nfilas, int mcols);


#endif /* PROCS_H */

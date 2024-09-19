/**
 *  @file       procs.h
 *  @brief      Procedimientos laboratorio 14.
 *  @authors    gonzalo.nieto@estudiants.urv.cat
 *  @version    1.0
 *  @date
 */

#ifndef PROCS_H		/* Para evitar duplicar las definiciones y constantes */
#define PROCS_H

/* Cabecera de los procedimientos estándar */
#include <stdio.h>

/** def MCOLS_MAX
 *  Número máximo de columnas en los procedimientos
 *  que trabajan con matrices.
 */
#define MCOLS_MAX 	10

/** def
 *  Errores en el tratamiento de ficheros.
 */
enum
{
	ERROR_COMPROBACIO = -6,
	ERROR_NO_EXISTEIX = -3,
	ERROR_BUIT = -2,
	CORRECTO = 0
};

/** def CODI_AIGUA_VISIBLE
 *  Código para representar agua visible en el tablero.
 */
#define CODI_AIGUA_VISIBLE 1

/** def CODI_AIGUA_OCULTA
 *  Código para representar agua oculta en el tablero.
 */
#define CODI_AIGUA_OCULTA -1

/** def CODI_VAIXELL_VISIBLE
 *  Código para representar un barco visible en el tablero.
 */
#define CODI_VAIXELL_VISIBLE 2

/** def CODI_VAIXELL_OCULTO
 *  Código para representar un barco oculto en el tablero.
 */
#define CODI_VAIXELL_OCULTO -2

/** def VAIXELL
 *  Carácter que representa un barco en la salida visual del tablero.
 */
#define VAIXELL 'X'

/** def AIGUA
 *  Carácter que representa agua en la salida visual del tablero.
 */
#define AIGUA '-'

/** def OCULTO
 *  Carácter que representa una posición oculta en la salida visual del tablero.
 */
#define OCULTO ' '

/** def SALTO_LINEA
 *  Carácter de salto de línea para la salida visual del tablero.
 */
#define SALTO_LINEA '\n'

/**
 *  Define las constantes necesarias
 */


/* Batalla Naval
   ======================
 */

/**  Pinta los datos de un tablero por pantalla.
 *
 * @param m (Ref (S): taula[][MCOLS_MAX] d’enter) Matriz a mostrar.
 * @param nfilas (Valor (E): enter) Número máximo de filas de la matriz.
 * @param mcols (Valor (E): enter) Número máximo de columnas de la matriz. (ncols <= DIM_MAX).
 */
void pinta_tauler(int m[][MCOLS_MAX], int nfilas, int mcols);

/** Lee los datos de una matriz en un fichero de texto.
 *
 * @param nom_fitxer (Ref (E): taula[] de caràcter) Nombre del fichero.
 * @param m (Ref (S): taula[][MCOLS_MAX] d’enter) Matriz donde se guardan
 * 					los datos.
 * @param nfilas (Ref (E/S): enter) Como entrada, número máximo de filas de
 * 					la matriz. Como salida, el número real de filas leídas.
 * @param mcols (Ref (E/S): enter) Como entrada, número máximo de columnas
 * 					de la matriz (mcols <= MCOLS_MAX).
 *					Como salida, el número real de columnas leídas.
 * @return (enter) Retorna 0 si todo ha ido bien o
 *  		un codigo de error si ha habido algún problema.
 */
int llegir_matriu_f(char nom_fitxer[], int m[][MCOLS_MAX], int *nfilas, int *mcols);

#endif /* PROCS_H */

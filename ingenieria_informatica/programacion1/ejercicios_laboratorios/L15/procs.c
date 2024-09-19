/**
 *  @file     	procs.c
 *  @brief     	Procedimientos laboratorio 14.
 *  @authors 	gonzalo.nieto@estudiants.urv.cat
 *  @version  	1.0
 *  @date
 */

/* Cabeceras de los procedimientos locales */
#include "procs.h"

/* Implementa los procedimientos */
/* Implementación de la función llegir_matriu_f */
int llegir_matriu_f(char nom_fitxer[], int m[][MCOLS_MAX], int *nfilas, int *mcols)
{
    FILE *fitxer;
    int fila, columna, numFilasArchivo, numColsArchivo, valor, resultado;

    fitxer = fopen(nom_fitxer, "r");  // Abrir el fichero en modo lectura

    if (fitxer == NULL)
    {
        resultado = ERROR_NO_EXISTEIX; /* valor de error el fichero no existe */
    }
    else
    {
        // Verificar si el fichero está vacío
        if (feof(fitxer))
        {
            resultado = ERROR_BUIT; // El fichero está vacío
        }
        else
        {
            fscanf(fitxer, "%d", &numFilasArchivo); // Leer el número de filas
            fscanf(fitxer, "%d", &numColsArchivo); // Leer el número de columnas

            if (numFilasArchivo > *nfilas || numColsArchivo > *mcols)
            {
                resultado = ERROR_COMPROBACIO;
            }
            else
            {
                // Leer la matriz desde el archivo
                for (fila = 0; fila < numFilasArchivo; fila++)
                {
                    for (columna = 0; columna < numColsArchivo; columna++)
                    {
                        fscanf(fitxer, "%d", &valor);
                        m[fila][columna] = valor;
                    }
                }

                // Asignar los valores reales de filas y columnas
                *nfilas = numFilasArchivo;
                *mcols = numColsArchivo;

                // Cerrar el fichero
                fclose(fitxer);

                resultado = CORRECTO;
            }
        }
    }

    return resultado;
}

/* Implementación de la función pinta_tauler */
void pinta_tauler(int m[][MCOLS_MAX], int nfilas, int mcols)
{
    int fila, columna;

    // Recorrer cada fila del tablero
    for (fila = 0; fila < nfilas; fila++)
    {
        // Recorrer cada columna del tablero
        for (columna = 0; columna < mcols; columna++)
        {
            // Seleccionar el carácter a imprimir según el valor en la matriz
            switch (m[fila][columna])
            {
            case CODI_AIGUA_VISIBLE:
            case CODI_AIGUA_OCULTA:
                printf("%c ", AIGUA);
                break;
            case CODI_VAIXELL_VISIBLE:
            case CODI_VAIXELL_OCULTO:
                printf("%c ", VAIXELL);
                break;
            default:
                printf("Valor no reconocido ");
                break;
            }
        }

        // Imprimir un salto de línea después de cada fila
        printf("%c", SALTO_LINEA);
    }
}
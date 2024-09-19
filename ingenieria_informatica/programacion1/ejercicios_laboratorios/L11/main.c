/**
 *  @file     	main.c
 *  @brief     	Ejemplo del programa en C.
 *  @authors 	montse.garcia@urv.cat
 *  @version  	1.2
 *  @date       3/03/2021
 */

/* Cabeceras de las librerías */
/* ---------------------------*/
#include <stdio.h>

/* Definición de constantes */
/* ------------------------ */
#define	ERROR	-1

/* Cabeceras/definición de los procedimientos locales */
/* ---------------------------------------------------*/
/** Devuelve el valor más grande de dos valores enteros.
 *
 * @param a (Valor (E): enter) Contiene el primer valor de entrada.
 * @param b (Valor (E): enter) Contiene el segundo valor de entrada.
 * @return (enter) Devuelve el valor más grande de las entradas.
 */
int fp_maximo (int a, int b)
{
    /* Variables locales */
    int mayor;
    
    /* Código */
    mayor = a;
    if (b > a)
    {
        mayor = b;
    }
    
    /* Retorno del resultado */
    return (mayor);
}

/* Programa principal */
/* -------------------*/
int main(void)
{
    /* Definición de variables locales */
    int x, y, z, res;
    
    /* Código */
    /* 1. Leer datos */
    printf ("Dame tres valores: ");
    scanf ("%d %d %d", &x, &y, &z);
    
    /* 2. Buscar mayor de los tres */
    res = fp_maximo (x, y);
    res = fp_maximo (z, res);
    
    /* 3. Mostrar el resultado */
    printf ("El mas grande de: %d, %d, %d es %d\n", x, y, z, res);
    
    /* Retorno al SO */
    return 0;
}

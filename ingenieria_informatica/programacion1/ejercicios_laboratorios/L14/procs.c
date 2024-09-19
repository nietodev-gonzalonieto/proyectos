/**
 *  @file     	procs.c
 *  @brief     	Procedimientos laboratorio 13.
 *  @authors 	nom.cognom@estudiants.urv.cat
 *  @version  	1.0
 *  @date
 */

#include "procs.h"

/* Leer puntos de teclado y los guarda en una tabla.
 *
 * @param puntos (Ref (S): taula[] de punts_t) Puntos leídos por teclado.
 * @param dim (Valor (E): enter) Número máximo de puntos que caben en la tabla.
 * @return (int) Devuelve el número de puntos leídos.
 */
int fp_lee_puntos (punto_t puntos[], int dim)
{
    int i = 0;
    float x, y;

    printf("Ingrese los puntos del polígono (x y) o ingrese 'q' para terminar:\n");
    
    while (i < dim) {
        char ch;
        if (scanf(" %c", &ch) != 1 || ch == 'q' || ch == 'Q') {
            break;  // Salir si el usuario ingresa 'q' o 'Q'
        }

        if (scanf("%f %f", &x, &y) != 2) {
            printf("Entrada no válida. Intente nuevamente.\n");
            while (getchar() != '\n');  // Limpiar el buffer de entrada
            continue;
        }

        puntos[i].x = x;
        puntos[i].y = y;
        i++;
    }

    return i;  // Devuelve la cantidad de puntos ingresados
}

/* Calcula la distancia.
 *
 * @param p1 (Valor (E): punto_t) Información del primer punto.
 * @param p2 (Valor (E): punto_t) Información del segundo punto.
 * @return (real) Devuelve la distancia entre p1 y p2.
 */
float fp_calcula_distancia (punto_t p1, punto_t p2)
{
    float distancia = sqrt(pow(p2.x - p1.x, 2) + pow(p2.y - p1.y, 2));
    return distancia;
}

/* Calcula el perímetro de un polígono irregular.
 *
 * @param p (Valor (E): poligon_t) Información del polígono: puntos y
 *      número de puntos.
 * @return (real) Devuelve el valor del perímetro calculado
 *          a partir de la secuencia ordenada de los puntos, (x, y),
 *          que forman el polígono.
 */
float calcula_perimetro (punto_t puntos[], int num_puntos)
{
    /* Definición de variables addicionals, si necesitas */
    float perimetro = 0.0;    /* Variables reales */
    
    /* 1. Calcula el perímetro */
    for (int i = 0; i < num_puntos - 1; i++) {
        perimetro += fp_calcula_distancia(puntos[i], puntos[i + 1]);
    }
    perimetro += fp_calcula_distancia(puntos[num_puntos - 1], puntos[0]);

    /* 3. Devuelve el resultado */
    return perimetro;
}


/**
 *  @file     	lab12.c
 *  @brief     	Procedimientos laboratorio 12.
 *  @authors 	nom.cognom@estudiants.urv.cat
 *  @version  	1.0
 *  @date
 */

#include "lab12.h"

/** Lee una fecha introducida por teclado.
 *
 * @param fecha (Ref (S): data_t) Fecha leer.
 */
_________ lee_fecha (__________)
{
	____________;
}

/** Muestra por pantalla la fecha formateada: dd-mmm-aaaa
 *
 * @param fecha (Valor (E): data_t) Fecha a escribir por pantalla.
 */
void escribe_fecha (data_t fecha)
{
	______________;
}

/** Compara dos fechas, f1 y f2, y devuelve un valor entero según
 * la relación existente entre ellas:
 *
 * 1 - f1 > f2  La primera fecha es más reciente que la segunda.
 * 0 - f1 = f2  Ambas fechas son iguales.
 * -1 - f1 < f2  La segunda fecha es más antigua que la segunda.
 *
 * @param f1 (Valor (E): data_t) Primera fecha a evaluar.
 * @param f2 (Valor (E): data_t) Segunda fecha a evaluar.
 * @return (enter) Devuelve un valor según la relación existente entre las fechas:
 * - 1 si f1 es más reciente que f2.
 * - 0 si ambas son iguales.
 * - -1 si f1 es más antigua que f2.
 */
int compara_fechas (data_t f1, data_t f2)
{
	____________;
}

/** Determina si un año es bisiesto o no.
 *
 * @param any (Valor (E): enter) Año que se pasa.
 * @return (booleà) Devuelve cierto si el año es bisiesto
 *          o falso en caso contrario.
 */
bool fp_es_bisiesto (int any)
{
    return (((any % 4 == 0 ) && (any % 100 != 0)) || (any % 400 == 0));
}

/** Devuelve los días que tiene un mes o -1 si el mes es incorrecto.
 *
 * @param mes (Valor (E): enter) Mes en forma numérica.
 * @param any (Valor (E): enter) Año en forma numérica.
 * @return (enter) Devuelve el número de días que tiene el mes
 *          teniendo en cuenta si el año es o no bisiesto.
 */
int fp_dias_mes (int mes, int any)
{
    int dias;
    
    switch (mes) {
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            dias = 31;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            dias = 30;
            break;
        case 2:
            dias = 28;
            if (fp_es_bisiesto (any))
            {
                dias = 29;
            }
            break;
        default:
            dias = -1;
            break;
    }
    return (dias);
}

/** Dada una fecha (día, mes y año), nos indica si la fecha es correcta
 *
 * @param dia (Valor (E): entero) Día.
 * @param mes (Valor (E): entero) Mes.
 * @param anyo (Valor (E): entero) Año.
 * @return (boolano) Devuelve cierto si la fecha es correcta y
 *          falso es caso contrario.
 */
bool fp_fecha_correcta (int dia, int mes, int anyo)
{
    bool resultado;
    int dias_mes;
    
    dias_mes = fp_dias_mes (mes, anyo);
    
    resultado = true;
    if ((dias_mes < 1) || ((dia < 1) || (dia > dias_mes)))
    {
        resultado = false;
    }

    return resultado;
}

/** Dada una fecha (día, mes y año), nos indica el día de las semana
 (como número) que corresponde: L, M... D
 *
 * @param fecha (Valor (E): data_t) Fecha de la que buscamos el día.
 * @return (enter) Devuelve el día de la semana: 1 (lunes), 2 (martes)...
 */
int fp_dia_semana (data_t fecha)
{
    int tmp, A, B, C, D;
    int siglos[6] = {5, 3, 1, 0, -2, -4};
    int meses[12] = {6, 2, 2, 5, 0, 3, 5, 1, 4, 6, 2, 4};
    char dia_semana[] = {'D', 'L', 'M', 'X', 'J', 'V', 'S'};
    
    /* A = siglo */
    tmp = (fecha.anyo / 100) - 17;
    A = siglos[tmp];
    /* B = anyo */
    tmp = fecha.anyo % 100;
    B = tmp + tmp * 0.25;
    /* C = bisiesto */
    C = 0;
    if (fp_es_bisiesto(fecha.anyo) && (fecha.mes < 3))
    {
        C = -1;
    }
    /* meses */
    D = meses[fecha.mes - 1];
    /* dia */
    
    tmp = A + B + C + D + fecha.dia;
    tmp = tmp % 7;
    
    return (dia_semana[tmp]);
}

/** Dadas dos fechas, comprueba si son iguales.
 *
 * @param dia1 (Valor (E): enter) Día fecha 1.
 * @param mes1 (Valor (E): enter) Mes fecha 1.
 * @param anyo1 (Valor (E): enter) Año fecha 1.
 * @param dia2 (Valor (E): enter) Día fecha 2.
 * @param mes2 (Valor (E): enter) Mes fecha 2.
 * @param anyo2 (Valor (E): enter) Año fecha 2.
 * @return (booleano) Devuelve cierto si las fechas son iguales y
 *                  falso en caso contrario.
 */
bool fp_fechas_iguales (int dia1, int mes1, int anyo1, int dia2, int mes2, int anyo2)
{
    return ((dia1 == dia2) && (mes1 == mes2) && (anyo1 == anyo2));
}

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <time.h>

#include "funcions.h" // Funcions pròpies

#define MIN_FC 1
#define MAX_FC 10

// Passarem parametres al programa principal
int main(int argc, char *argv[])
{
    int nf, nc; // Nre. de files i columnes que passem com a parametres
    int *dades; // La taula de dades, encara sense mida

    bool hi_ha_errors; // Per saber si cal executar o no el programa

    // Mirar si els parametres son correctes
    hi_ha_errors = false;
    if (argc == 3)
    {
        nf = atoi(argv[1]);
        nc = atoi(argv[2]);

        if (nf < MIN_FC || nf > MAX_FC || nc < MIN_FC || nc > MAX_FC)//Los valores que ha introducido no son correctos
        {
            printf("Els valors han d'estar entre %d i %d\n", MIN_FC, MAX_FC);
            hi_ha_errors = true;
        }
    }
    else
    {
        printf("El nombre de parametres no és correcte!\n");
        hi_ha_errors = true;
    }

    // Crear la taula
    if (!hi_ha_errors)
    {
        // Reservem espai per la quantitat de bytes que ocupen els elements
        /* COMPLETA: Codi per reservar amb malloc() la quantitat de bytes correcta */
        dades = (int *)malloc(sizeof(int) * nf * nc);
        if (dades == NULL)
        {
            printf("Sense espai per la taula!\n");
            hi_ha_errors = true;
        }
    }

    // Emplenar la taula i mostrar-la
    if (!hi_ha_errors)
    {
        srand(time(0)); // Inicialitzem la llavor d'aleatoris

       /* COMPLETA: emplenar la taula, amb un doble bucle for */
      for (int i = 0; i < nf; i++)
        {
            for (int j = 0; j < nc; j++)
            {
                dades[i * nc + j] = generar_valor(-99999, 99999);
            }
        }
       
        mostrar_dades(dades, nf, nc);
    }

    // Desar la taula en un fitxer de text
    if (!hi_ha_errors)
    {
        if (desar_taula_fitxer_t(dades, nf, nc, "datos_texto.txt"))
        {
            printf("Dades desades correctament en text.\n");
        }
        else
        {
            printf("Error en desar les dades.\n");
        }
    }

    if (!hi_ha_errors)
    {
        // Desar la taula en un fitxer binari
        if (desar_taula_fitxer_b(dades, nf, nc, "datos_binario.bin"))
        {
            printf("Dades desades correctament en binari.\n");
        }
        else
        {
            printf("Error en desar les dades\n");
        }
    }

    // Alliberem la memòria reservada
    if (!hi_ha_errors)
        free(dades);

    printf("Adeu-siau!\n");

    return 0;
}



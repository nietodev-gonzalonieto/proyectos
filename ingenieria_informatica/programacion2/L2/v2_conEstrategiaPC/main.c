// Una solucio a la practiqueta del laboratori L2, que es desenvolupa en dues sessions

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
//#include <string.h>
#include <time.h>

#include "joc.h"


int main(int argc, char *argv[])
{
    joc_t joc;  // Per desar les dades de la partida

    // Si els parametres son correctes inicialitza el joc
    if (argc != 2)
    {
        printf("Has d'indicar el nom del jugador!\n");
    }
    else
    {
        iniciar_joc(&joc, argv);
        missatge_benvinguda(&joc);
        mostrar_joc(&joc);

        while (hi_ha_joc(&joc))
        {
            int pos = fer_jugada(&joc);
            actualitzar_joc(&joc, pos);
            mostrar_joc(&joc);
            // alternativament: actualitzar_joc(&joc, fer_jugada(&joc));
        }
        missatge_comiat(&joc);
    }

	return 0;
}

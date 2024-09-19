// Una solucio a la practiqueta del laboratori L2, que es desenvolupa en dues sessions

#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>

#include "joc.h"

// Inicialitza la partida
void iniciar_joc(joc_t *j, char *argv[])
{
    srand(time(NULL));
    j->guanyador = -1;  // El joc no ha acabat :-)
    j->torn = rand() % 2;      // Jugador inicial
    j->punts[0] = 0;    // Punts inicials de l'ordinador
    j->punts[1] = 0;    // Punts inicials de la persona
    strcpy(j->nom, argv[1]);    // Nom del jugador/a

    // Inicialitzar el tauler
    for (int i = 0; i < MIDA_TAULER; i++)
    {
        j->tauler[i] = '-';
    }
}

bool hi_ha_joc(joc_t *j)
{
    /* COMPLETAR: retornar un booleà cert si el joc segueix viu, fals si ja ha acabat */
    // Verificar si algún jugador ha alcanzado 15 puntos o más
    if (j->punts[0] >= 15 || j->punts[1] >= 15) {
        return false;  // El juego ha terminado
    } else {
        return true;   // El juego sigue en curso
    }
}


void missatge_benvinguda(joc_t *j)
{
    /* COMPLETAR: donar la benvinguda i indicar el nom del jugador humà */
    printf("Benvingut, %s! Comença el joc.\n", j->nom);

}


void missatge_comiat(joc_t *j)
{
    if (j->guanyador == 0)
    {
        printf("Ho sento %s! Ha guanyat l'ordinador!\n", j->nom);
    }
    else
    {
        printf("Enhorabona %s! Has guanyat a l'ordinador!\n", j->nom);
    }
    printf("Fins aviat!\n");
}


void mostrar_joc(joc_t *j)
{
    printf("\n");
    printf("Punts P (%s) %d - Punts O (ordinador) %d\n", j->nom, j->punts[1], j->punts[0]);

    for (int i = 0; i < MIDA_TAULER; i++)
    {
        printf("%d\t", i + 1);
    }

    printf("\n");
    for (int i = 0; i < MIDA_TAULER; i++)
    {
        printf("%c\t", j->tauler[i]);
    }
    printf("\n");
}

// Interaccio amb usuari partida
int fer_jugada(joc_t *j)
{
    int posicio;

    switch(j->torn)
    {
        // Juga l'ordinador
        case 0 :   printf("Toca jugar a l'ordinador. ");
          /* COMPLETAR */
            posicio = rand() % MIDA_TAULER;
            while (j->tauler[posicio] != '-') {
                posicio = rand() % MIDA_TAULER;
            }
            printf("Ha agafat la posicio %d\n", posicio);
        break;

        // Juga la persona
        case 1 :  printf("Toca jugar a %s. Quin numero agafes?\n", j->nom);
            /* COMPLETAR */
            printf("Elige una posición (1-10): ");
            scanf("%d", &posicio);
            posicio--;  // Ajustar posición para que esté entre 0 y 9 en el array
            while (posicio < 0 || posicio >= MIDA_TAULER || j->tauler[posicio] != '-') {
                printf("Posición inválida. Elige otra posición (1-10): ");
                scanf("%d", &posicio);
                posicio--;  // Ajustar posición para que esté entre 0 y 9 en el array
            }
            break;
    }
   return posicio;
}


// Actualitza la partida
void actualitzar_joc(joc_t *j, int posicio)
{
    // COMPLETAR: Sumem els punts al jugador
     switch (j->torn) {
        case 0:
            j->punts[0] += posicio + 1;  // Se suma la posición seleccionada más 1
            break;
        case 1:
            j->punts[1] += posicio + 1;  // Se suma la posición seleccionada más 1
            break;
    }
    // COMPLETAR: Actualitzem el tauler
    j->tauler[posicio] = j->torn == 0 ? 'O' : 'P';
    // COMPLETAR: Mirar si hi ha guanyador
    if (j->punts[0] == 15 || j->punts[1] > 15) {
        j->guanyador = 0;  // El ordenador ha ganado
    } else if (j->punts[1] == 15 || j->punts[0] > 15 ) {
        j->guanyador = 1;  // El jugador humano ha ganado
    }
    // COMPLETAR: Si no, actualitzem el torn
    j->torn = !j->torn;
}


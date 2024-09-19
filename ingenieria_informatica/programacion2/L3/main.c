#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <stdbool.h>

#define ALEAT 0
#define CREIX 1
#define DECREIX 2

/**
 * @brief Genera una taula amb n enters
 * @param n (E) El nombre d'enters
 * @param taula (S) La taula d'enters
 * @return boolea cert -> s'ha creat la taula, fals -> altrament
 */
bool genera(int **taula, int n)
{
    bool ok = true;
    *taula = malloc(n * sizeof(int));

    if (*taula != NULL)
    {
        for (int i = 0; i < n; i++)
        {
            (*taula)[i] = rand() % 10000;
        }
    }
    else
        ok = false;
    return ok;
}

/**
 * @brief Mostra per pantalla una taula amb n enters
 * @param taula (E) La taula d'enters
 * @param n (E) El nombre d'enters
 */
void mostra(int taula[], int n)
{
    for (int i = 0; i < n; i++)
        printf("%d ", taula[i]);
    printf("\n");
}

/**
 * @brief Ordena una taula amb n enters de forma creixent amb el mètode selecció
 * @param taula (E) La taula d'enters
 * @param n (E) El nombre d'enters
 * @return int El nombre d'iteracions que fa
 */
int ordena(int taula[], int n)
{
    long iteracions = 0;
    
    for (int i = 0; i < n - 1; i++)
    {
        int min_j = i;
        for (int j = i + 1; j < n; j++)
        {
            iteracions++; // Incrementamos el número de iteraciones
            if (taula[j] < taula[min_j])
                min_j = j;
        }
        int temp = taula[i];
        taula[i] = taula[min_j];
        taula[min_j] = temp;
    }
    
    return iteracions;
}

int main(int argc, char *argv[])
{
    int *dades;
    double tg_ini, tg_fi; // Per desar les mesures de temps de generar
    double to_ini, to_fi; // Per desar les mesures de temps d'ordenar
    long iteracions;      // Per desar el nombre d'iteracions

    if (argc == 2)
    {
        int mida = atoi(argv[1]);
        bool tot_ok;

        // COMPLETAR: afegiu aquí la mesura de temps tg_ini 
        tg_ini = clock(); // Medimos el tiempo de inicio de generación de datos
        tot_ok = genera(&dades, mida);
        tg_fi = clock();  // Medimos el tiempo de finalización de generación de datos


        if (tot_ok)
        {
            // COMPLETAR: afegiu aquí la mesura de temps tg_fi
            to_ini = clock(); // Medimos el tiempo de inicio de ordenación
            iteracions = ordena(dades, mida);
            to_fi = clock();  // Medimos el tiempo de finalización de ordenación
            // Descomenteu per comprovar que ordenar( ) funciona amb valors de n petits
            printf("Dades originals\n");
            mostra(dades, mida);

            // COMPLETAR: afegiu aquí la mesura de temps to_ini
            iteracions = ordena(dades, mida);
            // COMPLETAR: afegiu aquí la mesura de temps to_fi

            // Descomenteu per comprovar que ordenar( ) funciona amb valors de n petits
            //printf("Dades ordenades\n");
            //mostra(dades, mida);

            printf("\tTemps de generar %f\n", (tg_fi - tg_ini) / CLOCKS_PER_SEC);
            printf("\tTemps d'ordenar %f\n", (to_fi - to_ini) / CLOCKS_PER_SEC);
            printf("\tIteracions d'ordenar %ld\n", iteracions);

            free(dades); // Alliberem la memòria
        }
        else
        {
            printf("No s'ha pogut reservar l'espai per a les dades.\n");
        }
    }
    return 0;
}

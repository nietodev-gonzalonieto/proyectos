#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

/* Implementació de les funcions definides al fitxer de capcaleres */

int generar_valor(int min, int max)
{   
    return min + rand() % (max - min + 1);
}

/* Fixeu-vos com calculem la posició en la taula 1D */
void mostrar_dades(int *d, int n_files, int n_cols)
{
    for (int i = 0; i < n_files; i++)
    {
        for (int j = 0; j < n_cols; j++)
        {
            printf("%d\t", d[i * n_cols + j]);
        }
        printf("\n");
    }
}

bool desar_taula_fitxer_t(int *d, int n_files, int n_cols, char nom[])
{
    bool r = false;
    FILE *f;

    f = fopen(nom, "w");

    if (f != NULL)
    {
        r = true;
    
        for (int i = 0; i < n_files; i++)
        {
            for (int j = 0; j < n_cols; j++)
            {
                fprintf(f, "%d\t", d[i * n_cols + j]);
                // Noteu que necessitem un separador entre valors
            }
        }
    
    fclose(f);
    }

    return r;
}


bool desar_taula_fitxer_b(int *d, int n_files, int n_cols, char nom[])
{
    bool r = false;
    FILE *f;

    f = fopen(nom, "wb"); // Abrimos el archivo en modo binario para escribir
    if (f != NULL)
    {
        r = true;
    
       /* COMPLETA: Doble bucle for per escriure els valors al fitxer binari 
       for (int i = 0; i < nf; i++)
        {
            for (int j = 0; j < nc; j++)
            {
            fwrite(d, sizeof(int), n_files * n_cols, f);
            }
        }*/
        // Escribimos los datos en el archivo binario
        fwrite(d, sizeof(int), n_files * n_cols, f);

    fclose(f);
    }

    return r;
}
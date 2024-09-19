#include <stdio.h>
#include <stdlib.h>
#include "funcions.h"
#include <stdbool.h>

int main(int argc, char *argv[]){
    if (argc < 2) {
        printf("No se ha proporcionado el ID del usuario.\n");
        return 1;
    }

    int idUsuario = atoi(argv[1]);

    Usuario usuarios[MAX];
    int numUsuarios = 0;
    cargarUsuarios("usuaris.fpb.txt", usuarios, &numUsuarios);

    if (idUsuario < 0 || idUsuario >= numUsuarios || idUsuario > MAX) {
        printf("ID de usuario no válido. Debe estar entre 0 y %d.\n", numUsuarios-1);
        return 1;
    }

    int* matriz_propers;
    cargarPropers("propers.fpb.txt", &matriz_propers);

    Usuario usuarioActual = usuarios[idUsuario]; // Restar 1 para ajustar al índice del array

    mensajeBienvenida();
    bool seguir = true;
    while (seguir) {
        mostrarMenu();

        int eleccion;
        printf("Elige una Opción: ");
        scanf("%d", &eleccion);

        switch (eleccion) {
            case 1:
                mostrarPerfil(usuarioActual);
                break;
            case 2:
                mostrarAmistades(usuarios, &matriz_propers, numUsuarios, idUsuario);
                break;
            case 3:
                agregarAmistades(&matriz_propers, usuarios, numUsuarios, idUsuario);
                break;
            case 4:
                printf("Saliendo de FPBook...\n");
                seguir = false;
                break;
            default:
                printf("Opción no válida. Intenta de nuevo.\n");
                break;
        }
    }

    liberarUsuarios(usuarios, numUsuarios);
    liberarPropers(&matriz_propers);
    return 0;
}
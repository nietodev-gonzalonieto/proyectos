#include <stdio.h>
#include <stdlib.h>
#include "funcions.h"
#include <stdbool.h>

/*
*@brief Muestra un mensaje de bienvenida
*/
void mensajeBienvenida() {
    printf("******************************\n");
    printf("*   Bienvenidos a FPBOOK      *\n");
    printf("* Creado por Gonzalo y Aitor  *\n");
    printf("******************************\n");
}

/*
*@brief Muestra el menú principal
*/
void mostrarMenu() {
    printf("\n*** Menú ***\n");
    printf("1. Mi perfil\n");
    printf("2. Mis amistades\n");
    printf("3. Agregar amistades\n");
    printf("4. Salir\n");
}

/*
*@brief Cargamos los Usuarios desde el archivo
*@param filename Nombre del archivo de usuarios
*@param usuarios Array de usuarios
*@param numUsuarios Puntero al numero de usuarios
*/
void cargarUsuarios(const char *filename, Usuario *usuarios, int *numUsuarios) {
    FILE *file = fopen(filename, "r");//Abrimos el archivo en modo lectura
    if (file == NULL) {
        printf("Error, el archivo no se pudo abrir.\n");
        return;
    }

    fscanf(file, "%d", numUsuarios);//Lee el numero de usuarios
    for (int i = 0; i < *numUsuarios; i++) {
        fscanf(file, "%d", &usuarios[i].id);//Leemos le ID del usuario
        fscanf(file, "%s", usuarios[i].nombre);//Leemos el nombre del usuario
        fscanf(file, "%s", usuarios[i].genero);//Leemos el genero del usuario
        fscanf(file, "%s", usuarios[i].ciudad);//Leemos la ciudad del usuario
        fscanf(file, "%s", usuarios[i].fechaNacimiento);//Leemos la fecha de nacimiento del usuario
    }

    fclose(file);//Cerramos el archivo
}

/*
*@brief Muestra el perfil de un usuario
*@param usuario El usuario cuyo perfil se va a mostrar
*/
void mostrarPerfil(Usuario usuario) {
    printf("\n*** Mi perfil ***\n");
    printf("ID: %d\n", usuario.id);
    printf("Nombre: %s\n", usuario.nombre);
    printf("Género: %s\n", usuario.genero);
    printf("Ciudad: %s\n", usuario.ciudad);
    printf("Fecha de nacimiento: %s\n", usuario.fechaNacimiento);
}


/*
*@brief Muestra las amistades de un usuario
*@param usuarios Array de usuarios
*@param distancias Matriz de distancias de afinidad
*@param numUsuarios Número de usuarios
*@param idUsuario ID del usuario actual
*/
void mostrarAmistades(Usuario *usuarios, int **distancias, int numUsuarios, int idUusario) {
    printf("\n*** Mis amistades ***\n");
    for (int i = 0; i < numUsuarios; i++) {
        //Verificamos si la distancia es -1, indicando una amistad
        if ((*distancias)[idUusario * numUsuarios + i] == -1) {
            printf("ID: %d, Nombre: %s\n", usuarios[i].id, usuarios[i].nombre);
        }
    }
}

/*
*@brief Libera la memoria asignada a los usuarios
*@param usuarios Array de usuarios
*@param numUsuarios Número de usuarios
*/
void liberarUsuarios(Usuario *usuarios, int numUsuarios) {
    // Liberar memoria asignada a los campos de texto de los usuarios
    for (int i = 0; i < numUsuarios; i++) {
        free(usuarios[i].nombre);
        free(usuarios[i].genero);
        free(usuarios[i].ciudad);
        free(usuarios[i].fechaNacimiento);
    }
}

/*
*@brief Cargamos la matriz de afinidades desde el archivo
*@param filename Nombre del archivo de afinidades
*@param matriz_propers Matriz de afinidades
*/
void cargarPropers(const char *filename, int **matriz_propers) {
    FILE *file = fopen(filename, "r");
    int numColumnasFilas=0;
    if(file == NULL){
        printf("Error, el archivo  %s no se pudo abrir.\n", filename);
    }
    else {
        fscanf(file, "%d", &numColumnasFilas);

        *matriz_propers = (int* )malloc(sizeof(int) * numColumnasFilas * numColumnasFilas);// Asigna memoria para la matriz

        for (int i = 0; i < numColumnasFilas; i++){
            for (int j = 0; j < numColumnasFilas; j++) {
                fscanf(file, "%d", &(*matriz_propers)[i * numColumnasFilas + j]);// Lee los valores de la matriz
            }
        }
    }
    fclose(file);
}

/*
*@brief Libera la memoria asignada a la matriz de afinidades
*@param matriz_propers Matriz de afinidades
*/
void liberarPropers(int **matriz_propers) {
    free(matriz_propers);// Libera la memoria de la matriz
}

/*
*@brief Agrega amistades
*@param matriz_propers Matriz de afinidades
*@param usuarios Array de usuarios
*@param numUsuarios Número de usuarios
*@param idUsuario ID del usuario actual
*/
void agregarAmistades(int **matriz_propers, Usuario *usuarios, int numUsuarios, int idUsuario) {
    int min_proximidad = 1;// Nivel de afinidad mínimo para considerar una amistad potencial
    int lista_potenciales[numUsuarios];// Lista de usuarios potenciales para agregar como amigos
    int j = 0;// Contador para la lista de potenciales
    bool encontrado = false;// Flag para indicar si se encontraron usuarios potenciales
    bool cierto = false;// Flag para controlar el bucle de entrada del usuario
    int persona_a_agregar;
    
    /* 
    * En este while vemos cuales son los usuarios mas compatibles.
    * Utilizo min_proximidad para ver si hay algun usuario que pueda ser el mas cercano, si no encuentra
    * ninguno le sumara 1 y entonces volvera a hacer el bucle pero esta vez mirando si hay alguien con
    * cercania 2. Lo hara tantas veces como el maximo de distancia, que en nuestro caso es 5.
    */
    while (min_proximidad <= MAX_DISTANCIA && !encontrado) {
        for (int i = 0; i < numUsuarios; i++) {
            // Comprueba si el usuario tiene el nivel de proximidad actual
            if ((*matriz_propers)[idUsuario * numUsuarios + i] == min_proximidad) {
                lista_potenciales[j] = i;// Agrega el usuario a la lista de potenciales
            }
        }
        if (j > 0) {
            encontrado = true;// Si se encontraron usuarios, se marca como encontrado
        }
        else {
            min_proximidad++;// Si no se encontraron usuarios, aumenta el nivel de proximidad
        }
    }

    if (min_proximidad > MAX_DISTANCIA) {
        printf("Ya eres amigo de todos los usuarios\n");// Si no se encontraron usuarios, se marca como cierto
        cierto = true;
    }
    else {
        printf("La gente mas cercana a ti con una distancia de %d es/son:\n", min_proximidad);
        for (int i = 0; i < j; i++) {
            printf("ID: %d, Nombre: %s\n", usuarios[lista_potenciales[i]].id, usuarios[lista_potenciales[i]].nombre);
        }
    }

    while (!cierto) {
        printf("A quien desearia agregar? (Indica su ID): ");
        scanf("%d", &persona_a_agregar);
        if (persona_a_agregar == -1) {
                printf("No se agregara a nadie.\n");
                cierto = true;// Si el usuario elige cancelar, se marca como cierto
            }
        else if (persona_a_agregar < 0 || persona_a_agregar >= numUsuarios) {
            printf("Tiene que estar dentro del rango!\n");
        }
        else {
            if ((*matriz_propers)[idUsuario * numUsuarios + persona_a_agregar] == -1) {
                printf("Ya eres amigo de esta persona.\n");
            }
            else if ((*matriz_propers)[idUsuario * numUsuarios + persona_a_agregar] == 0) {
                printf("No puedes ser amigo de ti mismo.\n");
            }
            else {
                // Actualiza la matriz para reflejar la nueva amistad
                (*matriz_propers)[idUsuario * numUsuarios + persona_a_agregar] = -1;
                (*matriz_propers)[persona_a_agregar * numUsuarios + idUsuario] = -1;
                printf("Ahora eres amigo de %s!\n", usuarios[persona_a_agregar].nombre);
                cierto = true;// Marca como cierto después de agregar la amistad
                guardarPropers("propers.fpb.txt", matriz_propers, numUsuarios);// Guarda la matriz actualizada
            }
        }
    }
}

/*
*@brief Guarda la matriz de afinidades en un archivo
*@param filename Nombre del archivo de afinidades
*@param matriz_propers Matriz de afinidades
*@param numUsuarios Número de usuarios
*/
void guardarPropers (const char *filename, int **matriz_propers, int numUsuarios) {
    FILE *file = fopen(filename, "w");
    if(file == NULL){
        printf("Error, el archivo  %s no se pudo abrir.\n", filename);
    }
    else {
        fprintf(file,"%d\n",numUsuarios);
        for (int i = 0; i < numUsuarios; i++){
            for (int j = 0; j < numUsuarios; j++) {
                fprintf(file, "%d ", (*matriz_propers)[i * numUsuarios + j]);
            }
            fprintf(file,"\n");
        }
    }
    fclose(file);
}

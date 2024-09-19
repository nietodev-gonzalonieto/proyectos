#ifndef FUNCIONS_H
#define FUNCIONS_H

#define MAX 10000
#define MAX_DISTANCIA 5

//Estructura que representa un usuario
typedef struct {
    int id;
    char nombre[50];
    char genero[10];
    char ciudad[50];
    char fechaNacimiento[20];
} Usuario;

//FUNCIONES

/**
 * @brief Muestra un mensaje de bienvenida.
 */
void mensajeBienvenida();

/**
 * @brief Muestra el menú principal.
 */
void mostrarMenu();

/**
 * @brief Carga los usuarios desde un archivo.
 * @param filename Nombre del archivo de usuarios.
 * @param usuarios Array de usuarios.
 * @param numUsuarios Puntero al número de usuarios.
 */
void cargarUsuarios(const char *filename, Usuario *usuarios, int *numUsuarios);

/**
 * @brief Muestra el perfil de un usuario.
 * @param usuario El usuario cuyo perfil se va a mostrar.
 */
void mostrarPerfil(Usuario usuario);

/**
 * @brief Muestra las amistades de un usuario.
 * @param usuarios Array de usuarios.
 * @param distancias Matriz de distancias de afinidad.
 * @param numUsuarios Número de usuarios.
 * @param idUsuario ID del usuario actual.
 */
void mostrarAmistades(Usuario* usuarios, int **distancias, int numUsuarios, int idUsuario);

/**
 * @brief Libera la memoria asignada a los usuarios.
 * @param usuarios Array de usuarios.
 * @param numUsuarios Número de usuarios.
 */
void liberarUsuarios(Usuario *usuarios, int numUsuarios);


/**
 * @brief Carga la matriz de afinidades desde un archivo.
 * @param filename Nombre del archivo de afinidades.
 * @param matriz_propers Matriz de afinidades.
 */
void cargarPropers(const char *filename, int **matriz_propers);

/**
 * @brief Libera la memoria asignada a la matriz de afinidades.
 * @param matriz_propers Matriz de afinidades.
 */
void liberarPropers(int **matriz_propers);

/**
 * @brief Agrega amistades.
 * @param matriz_propers Matriz de afinidades.
 * @param usuarios Array de usuarios.
 * @param numUsuarios Número de usuarios.
 * @param idUsuario ID del usuario actual.
 */
void agregarAmistades(int **matriz_propers, Usuario* usuarios, int numUsuarios, int idUsuario);

/**
 * @brief Guarda la matriz de afinidades en un archivo.
 * @param filename Nombre del archivo de afinidades.
 * @param matriz_propers Matriz de afinidades.
 * @param numUsuarios Número de usuarios.
 */
void guardarPropers(const char *filename, int **matriz_propers, int numUsuarios);

#endif


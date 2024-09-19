#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <stdbool.h>

int main() {
    int numeroUsuario, numeroAleatorio, intentos = 0;
    bool seguir = true;
    // Inicializar la semilla para la generación de números aleatorios
    srand(time(NULL));
    
    // Generar un número aleatorio entre 1 y 100
    numeroAleatorio = rand() % 91 + 10; // Genera un número entre 10 y 100
    
    printf("¡Bienvenido al juego de adivinar un número!\n");
    /*printf("Introduce un número entero entre 10 y 100: ");
    scanf("%d", &numeroUsuario);*/
    
    //Verificar que el número esté dentro del rango
    /*if (numeroUsuario < 10 || numeroUsuario > 100) {
        printf("El número debe estar entre 10 y 100. Intenta de nuevo.\n");
        return 1; // Terminar el programa con error
    }*/
    
    // Comenzar el juego
    while (seguir) {
     
        intentos++;
        printf("Intento %d: Introduce tu apuesta entre 10 y 100:", intentos);
        scanf("%d", &numeroUsuario);
        
        while (numeroUsuario < 10 || numeroUsuario > 100){
        printf("El número debe estar entre 10 y 100. Intenta de nuevo.\n");
        printf("Intento %d: Introduce tu apuesta entre 10 y 100:", intentos);
        scanf("%d", &numeroUsuario);
        }

        // Verificar si el usuario ha adivinado el número
        if (numeroUsuario == numeroAleatorio) {
            printf("¡Felicidades! Has adivinado el numero en %d intentos.\n", intentos);
            seguir=false;
        }
        // Verificar si el usuario se ha quedado sin intentos
        else if (intentos == 10) {
            printf("Has agotado tus intentos. El numero era %d.\n", numeroAleatorio);
            seguir=false;
        }
        // Comparar el número introducido con el número aleatorio y dar una pista
        else if (numeroUsuario < numeroAleatorio) {
            printf("El numero que buscas es mayor.\n");
        } else {
            printf("El numero que buscas es menor.\n");
        }
    }
    return 0;
}

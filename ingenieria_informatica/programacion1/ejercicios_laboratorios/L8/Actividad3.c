#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <ctype.h>

/*Comprobamos num telefono y longitud de este*/
bool comprobarTlf(char string[]){
    int i;
    /*aseguramos que sean numeros */
    for (i=0; string[i] != '\0'; i++){
        if (string[i] < 48 || string[i] > 57)
            return false;
    }
    /* Comprobamos la longitud aprovechando el bucle anterior */
    return (i == 9 ? true : false);
}

int main(){
    char string[]="123456789";
    printf("Resultat: %s \n", comprobarTlf(string) ? "Correcto" : "Incorrecto");
    return 0;
}

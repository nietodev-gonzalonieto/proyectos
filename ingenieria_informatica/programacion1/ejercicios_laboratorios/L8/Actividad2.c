#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <ctype.h>

struct texto{
    bool correcto;
    int contador;
};

/*Modificamos a Mayuscualas la primera letra de cada palabra */
struct texto cambiarMayusculas(char string[]){
    struct texto conversion;
    conversion.correcto = false;
    conversion.contador = 0;

    string[0] = toupper(string[0]);
    for(int i=0; string[i] != '\0'; i++){
       if (string[i] == ' ' || string[i] == '.' || string[i] == ','){
            i++;
        if(string[i] >= 97 && string[i] <= 122){
            string[i] = toupper(string[i]);
            conversion.correcto = true;
            conversion.contador++;
        }
       }
    }
    return conversion;
}

int main(){
    char string[]="texto de ejemplo pepe \n";
    struct texto conversion = cambiarMayusculas(string);
    cambiarMayusculas(string);
    printf("%s", string);
    if(conversion.correcto==true){
        printf("El texto se ha modificado.\n");
    }else if(conversion.correcto==false){
        printf("El texto no se ha modificado.\n");
    }
    return 0;
}

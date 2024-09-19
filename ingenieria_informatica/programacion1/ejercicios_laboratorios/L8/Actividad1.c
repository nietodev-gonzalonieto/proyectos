#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

struct texto{
    bool correcto;
    int numero_letras;
};

/*Comprovamos si el texto lo forman solo letras*/
struct texto comprovarCaracteres(char string[]){
    struct texto respuesta;
    respuesta.correcto = true;
    respuesta.numero_letras = 0;

    for(int i=0; string[i] != '\0'; i++){
        if((string[i]>=65 && string[i] <=90) || (string[i]>=97 && string[i]<=122)|| string[i] == ' '){
            if( string[i] != ' '){
                respuesta.numero_letras+=1;
            }
        }else respuesta.correcto=false;
    }
    return respuesta;
}

int main(){
    char string[]="12314";
    struct texto respuesta = comprovarCaracteres(string);
    if(respuesta.correcto==true){
        printf("El texto es correcto.\n");
    }else if(respuesta.correcto==false){
        printf("El texto no es correcto.\n");
    }
    printf("%d",respuesta.numero_letras);
    return 0;
}

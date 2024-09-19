#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <ctype.h>

struct texto{
    bool correcto;
    int numero_letras;
    int contador;
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

/*Comprobamos num telefono y longitud de este*/
bool comprobarTlf(char telefono[]){
    int i;
    /*aseguramos que sean numeros */
    for (i=0; telefono[i] != '\0'; i++){
        if (telefono[i] < 48 || telefono[i] > 57)
            return false;
    }
    /* Comprobamos la longitud aprovechando el bucle anterior */
    return (i == 9 ? true : false);
}
int main(){
    char string[]="";
    char telefono[]="";
    bool seguir = true;
    struct texto conversion = cambiarMayusculas(string);
    struct texto respuesta = comprovarCaracteres(string);

    while(seguir){
        printf("Introduce tu nombre: \n");
        scanf("%s",&string);
        if(respuesta.correcto==true){
            cambiarMayusculas(string);
            printf("%s , " , &string);
            while(seguir){
                printf("Introduce tu numero de telefono.\n");
                scanf("%s" , &telefono);
                if(comprobarTlf(telefono)==true){
                    printf("Telefono introducido correctamente \n");
                    printf("Hasta la proxima! \n");
                    seguir=false;
                }else if(comprobarTlf(string)==false){
                    printf("Telefono incorrecto \n");
                }
            }
        }else if(respuesta.correcto==false){
                printf("El texto no es correcto. \n");
            }
        }
    return 0;
}

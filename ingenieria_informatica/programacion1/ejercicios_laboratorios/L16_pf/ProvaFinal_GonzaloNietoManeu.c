#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <stdbool.h>
#define MAX_MATRIU 7
#define MAX_ARRAY 80

void menu(){
	printf("¡Benvinguts!\n");
	printf("Selecciona una de les seguents opcions:\n");
	printf("1 - Encriptar un text que s'introdueix pel teclat. \n");
	printf("2 - Desencriptar un text que s'introdueix pel teclat.\n");
	printf("3 - Encriptar un text inclòs en un arxiu de text.\n");
	printf("4 - Desencriptar un text inclòs en un arxiu de text\n");
	printf("5- Sortir del programa\n");
}
void construir_matriu_xifrat(char** matriu_x){
    matriu_x[0][0]=' ';
    matriu_x[0][1]='X';
    matriu_x[0][2]='I';
    matriu_x[0][3]='F';
    matriu_x[0][4]='R';
    matriu_x[0][5]='A';
    matriu_x[0][6]='T';
    matriu_x[1][0]='N';
    matriu_x[1][1]='A';
    matriu_x[1][2]='B';
    matriu_x[1][3]='C';
    matriu_x[1][4]='D';
    matriu_x[1][5]='E';
    matriu_x[1][6]='F';
    matriu_x[2][0]='O';
    matriu_x[2][1]='G';
    matriu_x[2][2]='H';
    matriu_x[2][3]='I';
    matriu_x[2][4]='J';
    matriu_x[2][5]='K';
    matriu_x[2][6]='L';
    matriu_x[3][0]='R';
    matriu_x[3][1]='M';
    matriu_x[3][2]='N';
    matriu_x[3][3]='O';
    matriu_x[3][4]='P';
    matriu_x[3][5]='Q';
    matriu_x[3][6]='R';
    matriu_x[4][0]='M';
    matriu_x[4][1]='S';
    matriu_x[4][2]='T';
    matriu_x[4][3]='U';
    matriu_x[4][4]='V';
    matriu_x[4][5]='W';
    matriu_x[4][6]='X';
    matriu_x[5][0]='A';
    matriu_x[5][1]='Y';
    matriu_x[5][2]='Z';
    matriu_x[5][3]=' ';
    matriu_x[5][4]='1';
    matriu_x[5][5]='2';
    matriu_x[5][6]='3';
    matriu_x[6][0]='L';
    matriu_x[6][1]='4';
    matriu_x[6][2]='5';
    matriu_x[6][3]='6';
    matriu_x[6][4]='7';
    matriu_x[6][5]='8';
    matriu_x[6][6]='9';
}
void xifrar_frase(char* frase , char** matriu_x ,char* frase_xifrada){
    int index=0;
    free(frase_xifrada);
    frase_xifrada =(char*) calloc(2*MAX_ARRAY+1 , sizeof(char));
    while(frase[index]!='\0'){
        for(int fila = 1 ; fila < MAX_MATRIU ; fila++){ /*empezamos en el 1 ya que nos saltamos la primera fila*/
                for(int columna = 1 ; columna < MAX_MATRIU ; columna++){ /*empezamos en el 1 ya que nos saltamos la primera columna*/
                    if(toupper(frase[index])==matriu_x[fila][columna]){
                        frase_xifrada[2*index]=matriu_x[fila][0];
                        frase_xifrada[2*index+1]=matriu_x[0][columna];
                    }
                }
        }
        index++;
    }
    frase_xifrada[2*index]='\0';
}
void desxifrar_frase(char* frase , char** matriu_x ,char* frase_desxifrada){
    int index=0;
    int fila_posicion;
    int columna_posicion;
    free(frase_desxifrada);
    frase_desxifrada =(char*)  calloc(MAX_ARRAY+1 , sizeof(char));
    while(frase[index]!='\0'){
        fila_posicion=0;
        for(int fila = 1 ; fila < MAX_MATRIU ; fila++){
            if(toupper(frase[index])==matriu_x[fila][0]){
                fila_posicion=fila;
            }
        }
        columna_posicion=0;
        for(int columna = 1; columna < MAX_MATRIU ; columna++){
            if(toupper(frase[index+1])==matriu_x[0][columna]){
                columna_posicion=columna;
            }
        }
        if(fila_posicion!=0 && columna_posicion!=0){
            frase_desxifrada[index/2]= matriu_x[fila_posicion][columna_posicion];
        }
        index+=2;
    }
    frase_desxifrada[index/2]='\0';
}
int main(){
    char **matriu_x = (char**) calloc(MAX_MATRIU, sizeof(char*));
    for (int i = 0; i < MAX_MATRIU; i++ ){
        matriu_x[i] = (char*) calloc(MAX_MATRIU, sizeof(char));
    }
    construir_matriu_xifrat(matriu_x);
    bool seguir = true;
    int opcion;
    char* frase =(char*)  calloc(MAX_ARRAY+1 , sizeof(char));
    char* frase_xifrada =(char*) calloc(2*MAX_ARRAY+1 , sizeof(char));/*por cada caracter de la frase original se le añaden 2 caracters*/
    char* nomArxiu =(char*) calloc(MAX_ARRAY+1 , sizeof(char));
    char* nom_nouArxiu =(char*) calloc(MAX_ARRAY+1 , sizeof(char));
    FILE *fichero, *fitxer_nouArxiu;
    while(seguir){
		menu();
		scanf("%d", &opcion);
		if(opcion==1){
            printf("Introdueix un text per encriptar:");
            scanf("%s",frase);
            xifrar_frase(frase,matriu_x,frase_xifrada);
            printf("La frase xifrada es: %s \n", frase_xifrada);
		}
		else if(opcion==2){
            printf("Introdueix un text per desencriptar:");
            scanf("%s",frase_xifrada);
            desxifrar_frase(frase_xifrada,matriu_x,frase);
            printf("La frase desxifrada es: %s \n", frase);
		}
		else if(opcion==3){
            printf("Introdueix el nom del arxiu que vulguis encriptar:");
            scanf("%s",nomArxiu);
            fichero = fopen(nomArxiu, "r");
            if (fichero == NULL){
                printf("Error no se ha podido abrir el fichero \n");
            }
            else{
                printf("Introdueix el nom del nou arxiu per a guardar les dades:");
                scanf("%s",nom_nouArxiu);
                fitxer_nouArxiu = fopen(nom_nouArxiu, "w");
                fgets(frase,MAX_ARRAY,fichero);
                while (!feof(fichero)){
                    xifrar_frase(frase,matriu_x,frase_xifrada);
                    fprintf(fitxer_nouArxiu,frase_xifrada);
                    fprintf(fitxer_nouArxiu,"\n");
                    fgets(frase,MAX_ARRAY,fichero);
                }
                fclose(fitxer_nouArxiu);
                fclose(fichero);
            }
		}
		else if(opcion==4){
            printf("Introdueix el nom del arxiu que vulguis desencriptar:");
            scanf("%s",nomArxiu);
            fichero = fopen(nomArxiu, "r");
            if (fichero == NULL){
                printf("Error no se ha podido abrir el fichero \n");
            }
            else{
                printf("Introdueix el nom del nou arxiu per a guardar les dades:");
                scanf("%s",nom_nouArxiu);
                fitxer_nouArxiu = fopen(nom_nouArxiu, "w");
                fgets(frase_xifrada,MAX_ARRAY,fichero);
                while (!feof(fichero)){
                    desxifrar_frase(frase_xifrada,matriu_x,frase);
                    fprintf(fitxer_nouArxiu,frase);
                    fprintf(fitxer_nouArxiu,"\n");
                    fgets(frase_xifrada,MAX_ARRAY,fichero);
                }
                fclose(fitxer_nouArxiu);
                fclose(fichero);
            }
		}
		else if(opcion==5){
            printf("Hasta la proxima");
            seguir=false;
		}
		else{
			printf("¡Elige una opcion correcta!\n");
		}
	}
}

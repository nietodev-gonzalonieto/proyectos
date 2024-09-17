import threading  # Importo el módulo threading para trabajar con hilos en Python :)
import time  # Importo el módulo time para trabajar con el tiempo del sistema
import datetime  # Importo el módulo datetime para trabajar con fechas y horas

def BuscarLlave():  # Define BuscarLlave, simula la acción de buscar una llave
    time.sleep(0.9)  # Esperamos 0.9 segundos (simulando el tiempo que tarda en buscar la llave)
    print('1.Busco la llave.')  # Imprime un mensaje

def EncontrarLlave():  # Define la función EncontrarLlave, simula la acción de encontrar una llave
    time.sleep(0.7)  # Esperamos 0.7 segundos (simulando el tiempo que tarda en encontrar la llave)
    print('2.Ya he encontrado la llave.')  # Imprime el mensaje 

def AbrirPuerta():  # Define AbrirPuerta, simula la acción de abrir una puerta
    time.sleep(0.9)  # Espera 0.3 segundos (simula el tiempo que tarda en abrir la puerta)
    print('3.Abro la puerta.')  # Imprime el mensaje 

def CerrarPuerta():  # Define CerrarPuerta, simula la acción de cerrar una puerta
    time.sleep(0.5)  # Espera 0.5 segundos (simula el tiempo que tarda en cerrar la puerta)
    print('4.Cierro la puerta.')  # Imprime el mensaje

tiempo_ini = datetime.datetime.now()  # Registra el tiempo de inicio de ejecución del programa

# Ejecución secuencial de las funciones
BuscarLlave()  # Llama a la función BuscarLlave
EncontrarLlave()  # Llama a la función EncontrarLlave
AbrirPuerta()  # Llama a la función AbrirPuerta
CerrarPuerta()  # Llama a la función CerrarPuerta

tiempo_fin = datetime.datetime.now()  # Registra el tiempo de finalización del programa
print('Tiempo total de ejecución:', str(tiempo_fin.second - tiempo_ini.second))  # Imprime el tiempo total

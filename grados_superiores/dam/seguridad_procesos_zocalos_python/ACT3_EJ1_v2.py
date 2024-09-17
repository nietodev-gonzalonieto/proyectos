import time
import multiprocessing

def entrada(coches, lock):
    # Simulamos la entrada de 200 coches
    for i in range(200):
        time.sleep(0.01)  # Pausa de 0.01 segundos
        lock.acquire()    # Adquiere el bloqueo antes de modificar el valor compartido
        coches.value = coches.value + 1  # Incrementa el valor de coches en 1
        lock.release()    # Libera el bloqueo después de modificar el valor

def salida(coches, lock):
    # Simulamos la salida de 200 coches
    for i in range(200):
        time.sleep(0.01)  # Pausa de 0.01 segundos
        lock.acquire()    # Adquiere el bloqueo antes de modificar el valor compartido
        coches.value = coches.value - 1  # Decrementa el valor de coches en 1
        lock.release()    # Libera el bloqueo después de modificar el valor

if __name__ == '__main__':
    coches = multiprocessing.Value('i', 300)  # Valor compartido int inicializado a 300
    lock = multiprocessing.Lock()  # Creamos un objeto de bloqueo

    entrada_coche = multiprocessing.Process(target=entrada, args=(coches, lock))
    salida_coche = multiprocessing.Process(target=salida, args=(coches, lock))

    entrada_coche.start()  # Inicializa el proceso de entrada de los coches
    salida_coche.start()   # Inicializa el proceso de salida de los coches

    entrada_coche.join()   # Espera a que el proceso de entrada termine
    salida_coche.join()    # Espera a que el proceso de salida termine

    print("Total de cochecitos:", coches.value)  # Imprimimos por pantalla el total de coches

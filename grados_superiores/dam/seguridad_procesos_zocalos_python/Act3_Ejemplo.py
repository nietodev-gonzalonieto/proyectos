import threading
import time

# Definición de la función que representa la tarea del hilo
def worker():
    
    print("Iniciando el hilo...")   # Mensaje al iniciar el hilo
    time.sleep(2)                   # Esperamos de 2 segundos
    print("Finalizando hilo...")    # Mensaje al finalizar el hilo

# Creacion de un hilo demonio
daemon_thread = threading.Thread(target=worker)  # Creamos el hilo con la función worker
daemon_thread.setDaemon(True)                    # Marcado del hilo como demonio
daemon_thread.start()                            # Inicio del hilo

# Creación de un hilo no demonio
non_daemon_thread = threading.Thread(target=worker)  # Creamos el hilo con la función worker
non_daemon_thread.start()                            # Inicio del hilo

# Esperamos a que los hilos terminen
daemon_thread.join()                        # Espera a que el hilo demonio termine
non_daemon_thread.join()                    # Espera a que el hilo no demonio termine

# Mensaje final indicando que todos los hilos han finalizado
print("Todos los hilos han finalizado.")
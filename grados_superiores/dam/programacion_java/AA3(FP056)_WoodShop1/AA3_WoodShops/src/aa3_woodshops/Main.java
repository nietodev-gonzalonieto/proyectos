package aa3_woodshops;

public class Main {
	
    public static void main(String[] args) {
        // Crear la sede central y cargar datos iniciales
        SedeCentral sedeCentral = new SedeCentral();
        sedeCentral.cargarDatosIniciales();
        
        // Ejecutar opciones del menú
        SedeCentral.ejecutarMenu(sedeCentral);

    }
}

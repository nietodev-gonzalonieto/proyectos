import java.time.LocalDate;

public class AA1_AlquilerVehiculos {

    public static void main(String[] args) {
        AA1_AlquilerVehiculos aa1 = new AA1_AlquilerVehiculos();
        aa1.inicio();
    }

    void inicio() {
    	 Cliente[] clientes = {
    		        new Cliente("11111111A", "Gonzalo Nieto"),
    		        new Cliente("22222222B", "Lionel Messi")
    		    };

    		    Vehiculo[] vehiculos = {
    		        new Coche("1234ABC", "Ford", "Mustang", 4, 5),
    		        new Moto("5678XYZ", "Cupra", "Formentor", 1000),
    		        new Camion("9999DEF", "Seat", "Ibiza", 20000)
    		    };

    		    // Crear contratos de alquiler automáticamente
    		    ContratoAlquiler[] contratos = {
    		        new ContratoAlquiler(LocalDate.now(), LocalDate.now().plusDays(7), 50.0, vehiculos[0], clientes[0]),
    		        new ContratoAlquiler(LocalDate.now(), LocalDate.now().plusDays(5), 30.0, vehiculos[1], clientes[1]),
    		        new ContratoAlquiler(LocalDate.now(), LocalDate.now().plusDays(10), 100.0, vehiculos[2], clientes[1])
    		    };

    		    // Imprimir datos utilizando bucles
    		    for (Cliente cliente : clientes) {
    		        System.out.println("Datos del cliente:\n" + cliente);
    		    }

    		    for (Vehiculo vehiculo : vehiculos) {
    		        System.out.println("\nDatos del vehiculo:\n" + vehiculo);
    		    }

    		    for (ContratoAlquiler contrato : contratos) {
    		        System.out.println("\nDatos del contrato de alquiler:\n" + contrato);
    		    }
   }
}

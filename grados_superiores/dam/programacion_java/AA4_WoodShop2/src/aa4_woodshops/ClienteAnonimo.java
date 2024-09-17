package aa4_woodshops;
/**
 * Clase que representa un Cliente Anónimo en la tienda.
 * Extiende la clase abstracta Cliente y proporciona una implementación específica para clientes anónimos.
 */
public class ClienteAnonimo extends Cliente {
	/**
     * Constructor para un cliente anónimo.
     * Crea un cliente con nombre especificado y tipo de cliente anónimo.
     *
     * @param nombre Nombre del cliente anónimo.
     */
	public ClienteAnonimo(String nombre) {
    	super("", nombre, tipoCliente.anonimo); // NIF vacío para cliente anónimo
    }
}
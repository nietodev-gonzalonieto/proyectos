package aa4_woodshops;

/**
 * Clase que representa un Cliente WoodFriend en la tienda.
 * Extiende la clase abstracta Cliente y proporciona una implementación específica para clientes WoodFriend.
 */
public class ClienteWoodFriend extends Cliente {

 // Atributos de la clase WoodFriend.
	private String codigo;
	
	/**
     * Constructor para un cliente WoodFriend.
     *
     * @param nif    NIF del cliente WoodFriend.
     * @param nombre Nombre del cliente WoodFriend.
     * @param codigo Código asociado al cliente WoodFriend.
     */
    public ClienteWoodFriend(String nif, String nombre, String codigo) {
        super(nif, nombre, tipoCliente.woodFriend);
        this.codigo = codigo;
    }

 // Getters y Setters de la clase WoodFriend.

    // Getters y Setters de la clase ClienteWoodFriend.

    /**
     * Obtiene el código asociado al cliente WoodFriend.
     *
     * @return El código del cliente WoodFriend.
     */
	 public String getCodigo() {
	     return codigo;
	 }
	
	 /**
	     * Establece el código asociado al cliente WoodFriend.
	     *
	     * @param codigo El código a establecer.
	     */
	 public void setCodigo(String codigo) {
	     this.codigo = codigo;
	 }

}

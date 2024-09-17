package aa4_woodshops;

/**
 * Clase que representa a un proveedor de productos para la tienda WoodShops.
 */
public class Proveedor {
	private String nif;
    private String nombre;
    
    /**
     * Constructor de la clase Proveedor.
     * @param nif El NIF (Número de Identificación Fiscal) del proveedor.
     * @param nombre El nombre del proveedor.
     */
    public Proveedor(String nif, String nombre) {
        this.nif = nif;
        this.nombre = nombre;
    }
    
    /**
     * Método getter para obtener el NIF del proveedor.
     * @return El NIF del proveedor.
     */
    public String getNif() {
        return nif;
    }

    /**
     * Método setter para establecer el NIF del proveedor.
     * @param nif El nuevo NIF del proveedor.
     */
    public void setNif(String nif) {
        this.nif = nif;
    }

    /**
     * Método getter para obtener el nombre del proveedor.
     * @return El nombre del proveedor.
     */
    public String getNombre() {
        return nombre;
    }

    /**
     * Método setter para establecer el nombre del proveedor.
     * @param nombre El nuevo nombre del proveedor.
     */
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
}

package aa3_woodshops;

import java.util.HashMap;

public class Almacen {
    
    // Atributos
    private HashMap<String, Producto> productos;

    // Constructor
    public Almacen() {
        this.productos = new HashMap<>();
    }

    // Métodos

    /**
     * Añade un producto al almacén.
     * @param producto El producto a añadir.
     */
    public void añadirProducto(Producto producto) {
        productos.put(producto.getCodigo(), producto);
    }

    /**
     * Lista los productos del almacén.
     */
    public void listarProductos(TipoProducto tipoProducto) {
        for (Producto producto : productos.values()) {
            if (producto.getTipoProducto() == tipoProducto) {
                System.out.println(producto.getDescripcion());
            }
        }
    }

    /**
     * Obtiene el stock de un producto en el almacén.
     * @param codigo El código del producto.
     * @return 
     */
    public Almacen obtenerStock(String codigo) {
        Producto producto = productos.get(codigo);
        if (producto != null) {
            System.out.println("Stock del producto " + producto.getDescripcion() + ": " + producto.getStock());
        } else {
            System.out.println("El producto con código " + codigo + " no se encuentra en este almacén.");
        }
		return null;
    }
    /**
     * Busca un producto en el almacén por su código.
     * 
     * @param codigoProducto El código del producto a buscar.
     * @return El producto encontrado, o null si no se encuentra.
     */
    public Producto buscarProducto(String codigoProducto) {
        for (Producto producto : productos.values()) {
            if (producto.getCodigo().equals(codigoProducto)) {
                return producto;
            }
        }
        return null; // Si no se encuentra el producto en este almacén
    }
    /**
     * Añade un producto al almacén.
     * 
     * @param producto El producto a añadir al almacén.
     */
	public void anyadirProducto(Producto producto) {
	    productos.put(producto.getCodigo(), producto);
	}
}

package aa3_woodshops;

import java.util.ArrayList;

public class Tienda {
    
    // Atributos
    private String nombre;
    private ArrayList<Almacen> almacenes;

    // Constructor
    public Tienda(String nombre) {
        this.nombre = nombre;
        this.almacenes = new ArrayList<>();
    }

    // Métodos

    /**
     * Añade un almacén a la lista de almacenes de la tienda.
     * @param almacen El almacén a añadir.
     */
    public void añadirAlmacen(Almacen almacen) {
        almacenes.add(almacen);
    }

    /**
     * Obtiene la lista de almacenes asociados a la tienda.
     * @return La lista de almacenes.
     */
    public ArrayList<Almacen> getAlmacenes() {
        return almacenes;
    }

    /**
     * Lista los productos de la tienda.
     */
    public void listarProductos(TipoProducto tipoProducto) {
        for (Almacen almacen : almacenes) {
        	if(tipoProducto == TipoProducto.TABLERO) {
                almacen.listarProductos(TipoProducto.TABLERO);
        	}
        	else if(tipoProducto == TipoProducto.BARNIZ) {
                almacen.listarProductos(TipoProducto.BARNIZ);
        	}
        	else if(tipoProducto == TipoProducto.ARTICULO) {
        		almacen.listarProductos(TipoProducto.ARTICULO);
    
        	}
        }
    } 

    /**
     * Obtiene el stock de un producto en la tienda.
     * @param codigo El código del producto.
     */
    public void obtenerStock(String codigo) {
        for (Almacen almacen : almacenes) {
            almacen.obtenerStock(codigo);
        }
    }

    // Getters y setters
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    /**
     * Añade un nuevo producto a la tienda.
     * 
     * @param producto El producto a añadir a la tienda.
     */
    public void añadirNuevoProducto(Producto producto) {
        Almacen almacen = new Almacen();
        almacen.añadirProducto(producto);
        almacenes.add(almacen);
    }
}

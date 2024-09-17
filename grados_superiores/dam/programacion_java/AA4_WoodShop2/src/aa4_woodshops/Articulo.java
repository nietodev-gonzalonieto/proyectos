package aa4_woodshops;
/**
 * Clase que representa un artículo en la tienda.
 * Hereda de la clase Producto e implementa métodos específicos para artículos.
 */
public class Articulo extends Producto {
    private String tipoArticulo;
    /**
     * Constructor para la clase Articulo.
     * 
     * @param codigoProducto Código del producto.
     * @param descripcion Descripción del artículo.
     * @param proveedor Proveedor del artículo.
     * @param precioVenta Precio de venta del artículo.
     * @param cantidad Cantidad disponible en stock del artículo.
     * @param tipoArticulo Tipo específico del artículo.
     */
    public Articulo(String codigoProducto, String descripcion, Proveedor proveedor,
                    double precioVenta, int cantidad, String tipoArticulo) {
        super(codigoProducto, descripcion, proveedor, precioVenta, cantidad);
        this.tipoArticulo = tipoArticulo;
    }
    /**
     * Método para obtener el tipo específico del artículo.
     * 
     * @return El tipo específico del artículo.
     */
    public String getTipoArticulo() {
        return tipoArticulo;
    }
    /**
     * Método para establecer el tipo específico del artículo.
     * 
     * @param tipoArticulo El nuevo tipo específico del artículo.
     */
    public void setTipoArticulo(String tipoArticulo) {
        this.tipoArticulo = tipoArticulo;
    }
    /**
     * Método override que devuelve el tipo de producto como 'ARTICULO'.
     * 
     * @return El tipo de producto (ARTICULO).
     */
    @Override
    public TipoProducto getTipoProducto() {
        return TipoProducto.ARTICULO;
    }
}

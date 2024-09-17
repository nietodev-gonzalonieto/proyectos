package aa4_woodshops;
/**
 * Clase que representa un tipo de producto 'Barniz' en la tienda.
 * Hereda de la clase Producto e implementa métodos específicos para productos de tipo barniz.
 */
public class Barniz extends Producto {
    private ColorBarniz color;

    /**
     * Constructor para la clase Barniz.
     * 
     * @param codigoProducto Código del producto.
     * @param descripcion Descripción del barniz.
     * @param proveedor Proveedor del barniz.
     * @param precioVenta Precio de venta del barniz.
     * @param color Color del barniz.
     * @param cantidad Cantidad disponible en stock del barniz.
     */
    public Barniz(String codigoProducto, String descripcion, Proveedor proveedor, double precioVenta,
                  double mililitros, ColorBarniz color, int cantidad) {
        super(codigoProducto, descripcion, proveedor, precioVenta, cantidad);
        this.color = color;
    }
    
    /**
     * Método para obtener el color del barniz.
     * 
     * @return El color del barniz.
     */
    public ColorBarniz getColor() {
        return color;
    }
    /**
     * Método para establecer el color del barniz.
     * 
     * @param color El nuevo color del barniz.
     */
    public void setColor(ColorBarniz color) {
        this.color = color;
    }
    /**
     * Método override que devuelve el tipo de producto como 'BARNIZ'.
     * 
     * @return El tipo de producto (BARNIZ).
     */
    @Override
    public TipoProducto getTipoProducto() {
        return TipoProducto.BARNIZ;
    }
}

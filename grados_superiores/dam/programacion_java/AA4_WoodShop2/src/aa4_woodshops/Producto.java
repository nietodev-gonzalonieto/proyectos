package aa4_woodshops;
/**
 * Clase abstracta que representa un producto en la tienda WoodShops.
 * Esta clase sirve como base para la creación de productos específicos como Tablero, Barniz y Artículo.
 */
public abstract class Producto {
    private String codigoProducto;
    private String descripcion;
    private Proveedor proveedor;
    private double precioVenta;
    private int cantidad; // New property to track quantity
    
    /**
     * Constructor de la clase Producto.
     * @param codigoProducto El código único del producto.
     * @param descripcion La descripción del producto.
     * @param proveedor El proveedor del producto.
     * @param precioVenta El precio de venta del producto.
     * @param cantidad La cantidad disponible en stock del producto.
     */
    public Producto(String codigoProducto, String descripcion, Proveedor proveedor, double precioVenta, int cantidad) {
        this.codigoProducto = codigoProducto;
        this.descripcion = descripcion;
        this.proveedor = proveedor;
        this.precioVenta = precioVenta;
        this.cantidad = cantidad;
    }
    
    /**
     * Método getter para obtener el código del producto.
     * @return El código del producto.
     */
    public String getCodigoProducto() {
        return codigoProducto;
    }

    /**
     * Método setter para establecer el código del producto.
     * @param codigoProducto El nuevo código del producto.
     */
    public void setCodigoProducto(String codigoProducto) {
        this.codigoProducto = codigoProducto;
    }

    /**
     * Método getter para obtener la descripción del producto.
     * @return La descripción del producto.
     */
    public String getDescripcion() {
        return descripcion;
    }

    /**
     * Método setter para establecer la descripción del producto.
     * @param descripcion La nueva descripción del producto.
     */
    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    /**
     * Método getter para obtener el proveedor del producto.
     * @return El proveedor del producto.
     */
    public Proveedor getProveedor() {
        return proveedor;
    }


    /**
     * Método setter para establecer el proveedor del producto.
     * @param proveedor El nuevo proveedor del producto.
     */
    public void setProveedor(Proveedor proveedor) {
        this.proveedor = proveedor;
    }

    /**
     * Método getter para obtener el precio de venta del producto.
     * @return El precio de venta del producto.
     */
    public double getPrecioVenta() {
        return precioVenta;
    }

    /**
     * Método setter para establecer el precio de venta del producto.
     * @param precioVenta El nuevo precio de venta del producto.
     */
    public void setPrecioVenta(double precioVenta) {
        this.precioVenta = precioVenta;
    }

    /**
     * Método getter para obtener la cantidad disponible en stock del producto.
     * @return La cantidad disponible en stock del producto.
     */
    public int getCantidad() {
        return cantidad;
    }

    /**
     * Método setter para establecer la cantidad disponible en stock del producto.
     * @param cantidad La nueva cantidad disponible en stock del producto.
     */
    public void setCantidad(int cantidad) {
        this.cantidad = cantidad;
    }

    /**
     * Método abstracto para obtener el tipo de producto.
     * Debe ser implementado por las clases concretas que extiendan esta clase.
     * @return El tipo de producto.
     */
    public abstract TipoProducto getTipoProducto();
}

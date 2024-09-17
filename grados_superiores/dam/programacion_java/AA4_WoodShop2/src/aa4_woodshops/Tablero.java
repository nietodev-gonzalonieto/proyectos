package aa4_woodshops;

/**
 * Clase que representa un tablero de la tienda WoodShops.
 */
public class Tablero extends Producto {
    private double altura;
    private double anchura;
    private TipoTablero tipoTablero;

    /**
     * Constructor de la clase Tablero.
     * @param codigoProducto Código del tablero.
     * @param descripcion Descripción del tablero.
     * @param proveedor Proveedor del tablero.
     * @param precioVenta Precio de venta del tablero.
     * @param cantidad Cantidad disponible del tablero en la tienda.
     * @param altura Altura del tablero en centímetros.
     * @param anchura Anchura del tablero en centímetros.
     * @param tipoTablero Tipo específico de tablero (Aglomerado, Contrachapado, etc.).
     */
    public Tablero(String codigoProducto, String descripcion, Proveedor proveedor, double precioVenta,
            int cantidad, double altura, double anchura, TipoTablero tipoTablero) {
			super(codigoProducto, descripcion, proveedor, precioVenta, cantidad);
			this.altura = altura;
			this.anchura = anchura;
			this.tipoTablero = tipoTablero;
	}

    /**
     * Método getter para obtener la altura del tablero.
     * @return La altura del tablero en centímetros.
     */
    public double getAltura() {
        return altura;
    }

    /**
     * Método setter para establecer la altura del tablero.
     * @param altura La nueva altura del tablero en centímetros.
     */
    public void setAltura(double altura) {
        this.altura = altura;
    }

    /**
     * Método getter para obtener la anchura del tablero.
     * @return La anchura del tablero en centímetros.
     */
    public double getAnchura() {
        return anchura;
    }

    /**
     * Método setter para establecer la anchura del tablero.
     * @param anchura La nueva anchura del tablero en centímetros.
     */
    public void setAnchura(double anchura) {
        this.anchura = anchura;
    }

    /**
     * Método getter para obtener el tipo específico de tablero.
     * @return El tipo de tablero (Aglomerado, Contrachapado, etc.).
     */
    public TipoTablero getTipoTablero() {
        return tipoTablero;
    }

    /**
     * Método setter para establecer el tipo específico de tablero.
     * @param tipoTablero El nuevo tipo de tablero (Aglomerado, Contrachapado, etc.).
     */
    public void setTipoTablero(TipoTablero tipoTablero) {
        this.tipoTablero = tipoTablero;
    }

    /**
     * Método sobreescrito para obtener el tipo de producto como TipoProducto.TABLERO.
     * @return TipoProducto.TABLERO.
     */
    @Override
    public TipoProducto getTipoProducto() {
        return TipoProducto.TABLERO;
    }
}

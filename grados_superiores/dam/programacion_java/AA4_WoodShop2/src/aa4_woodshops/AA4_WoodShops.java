package aa4_woodshops;

/**
 * Clase principal que contiene el método main para iniciar la aplicación WoodShops.
 */
public class AA4_WoodShops {
	/**
     * Método principal que crea una tienda, carga datos iniciales y muestra un menú interactivo.
     * 
     * @param args Los argumentos de la línea de comandos (no utilizados en este contexto).
     */
    public static void main(String[] args) {
        Tienda tienda = new Tienda("Sede central Principal");
        
        cargarDatosIniciales(tienda);

        // Crear menú interactivo y ejecutar
        MenuInteractivo menu = new MenuInteractivo(tienda);
        menu.mostrarMenu();
    }
    /**
     * Carga datos iniciales en la tienda, como proveedores, productos y clientes de ejemplo.
     * 
     * @param tienda La tienda en la cual se cargarán los datos iniciales.
     */
    	public static void cargarDatosIniciales(Tienda tienda) {
    	    // Creamos algunos proveedores
    	    Proveedor proveedorMadera = new Proveedor("12345678A", "Proveedor Maderita S.A.");
    	    Proveedor proveedorPinturas = new Proveedor("87654321B", "Proveedor Pinturas Pinturosas S.L.");

    	    // Creamos algunos productos de ejemplo
    	    Producto tablero1 = new Tablero("T001", "Tablero Aglomerado", proveedorMadera, 25.0,
    	            120, 80, 50, TipoTablero.AGLOMERADO);

    	    Producto tablero2 = new Tablero("T002", "Tablero Roble", proveedorMadera, 40.0,
    	            100, 60, 30, TipoTablero.CONTRACHAPADO);

    	    Producto barniz1 = new Barniz("B001", "Barniz Incoloro", proveedorPinturas, 10.0,500, ColorBarniz.INCOLORO, 20);

    	    Producto barniz2 = new Barniz("B002", "Barniz Coloreado", proveedorPinturas, 15.0,750, ColorBarniz.CAOBA, 10);

    	    Producto articulo1 = new Articulo("A001", "Mesa de Madera", proveedorMadera, 75.0, 10, "Mesa");

    	    Producto articulo2 = new Articulo("A002", "Silla de Madera", proveedorMadera, 50.0, 20, "Silla");
    	    
    	    // Creamos algunos clientes
    	    Cliente c1 = new ClienteProfesional("12345678A", "Don Juan López", Cliente.tipoCliente.profesional, 10);
    	    Cliente c2 = new ClienteWoodFriend("12345678B", "Pedrito Pascual", "C001");

    	    Cliente c3 = new ClienteProfesional("87654321C", "Miriam García", Cliente.tipoCliente.profesional, 5);
    	    Cliente c4 = new ClienteWoodFriend("87654321D", "Ana Martínez", "C002");

    	    // Añadimos los productos a la tienda
    	    tienda.agregarProducto(tablero1);
    	    tienda.agregarProducto(tablero2);
    	    tienda.agregarProducto(barniz1);
    	    tienda.agregarProducto(barniz2);
    	    tienda.agregarProducto(articulo1);
    	    tienda.agregarProducto(articulo2);

    	    // Ejemplo de ventas
    	    tienda.registrarVenta(c1, tablero1, 5);
    	    tienda.registrarVenta(c1, barniz1, 3);
    	    tienda.registrarVenta(c2, articulo1, 2);
    	    tienda.registrarVenta(c3, tablero2, 4);
    	    tienda.registrarVenta(c4, barniz2, 1);
    	}
}

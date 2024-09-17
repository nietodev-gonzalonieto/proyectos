package aa3_woodshops;

import java.util.ArrayList;
import java.util.Scanner;

public class SedeCentral {
    
    // Atributos
    private ArrayList<Tienda> tiendas;
    private ArrayList<Proveedor> proveedores;

    // Constructor
    public SedeCentral() {
        tiendas = new ArrayList<>();
        proveedores = new ArrayList<>();
    }

    // Métodos

    /**
     * Añade una tienda a la lista de tiendas de la empresa.
     * @param tienda La tienda a añadir.
     */
    public void añadirTienda(Tienda tienda) {
        tiendas.add(tienda);
    }

    /**
     * Busca una tienda por su nombre.
     * @param nombreTienda El nombre de la tienda a buscar.
     * @return La tienda encontrada, o null si no se encuentra.
     */
    public Tienda buscarTienda(String nombreTienda) {
        for (Tienda tienda : tiendas) {
            if (tienda.getNombre().equals(nombreTienda)) {
                return tienda;
            }
        }
        return null; // Si no se encuentra la tienda
    }
    

    /**
     * Lista los productos de una tienda.
     * @param tienda La tienda de la que se listarán los productos.
     */
    public void listarProductos(Tienda tienda) {
        tienda.listarProductos(null);
    }

    /**
     * Muestra el stock de un producto en todas las tiendas en las que existe.
     * @param codigo El código del producto.
     */

    /**
     * Añade un proveedor a la lista de proveedores de la empresa.
     * @param proveedor El proveedor a añadir.
     */
    public void añadirProveedor(Proveedor proveedor) {
        proveedores.add(proveedor);
    }

    /**
     * Lista los proveedores de la empresa.
     */
    public void listarProveedores() {
        for (Proveedor proveedor : proveedores) {
            System.out.println(proveedor);
        }
    }
    
    /**
     * Método para cargar datos iniciales.
     */
    public void cargarDatosIniciales() {
        // Creamos algunos proveedores
        Proveedor proveedor1 = new Proveedor("001", "Proveedor1");
        Proveedor proveedor2 = new Proveedor("002", "Proveedor2");

        // Añadimos los proveedores a la sede central
        añadirProveedor(proveedor1);
        añadirProveedor(proveedor2);

        // Creamos algunas tiendas
        Tienda tienda1 = new Tienda("Tienda1");
        Tienda tienda2 = new Tienda("Tienda2");

        // Añadimos las tiendas a la sede central
        añadirTienda(tienda1);
        añadirTienda(tienda2);

        // Creamos algunos productos de ejemplo
        Producto producto1 = new Producto("001", "Tablero Aglomerado", proveedor1, 10.50, 50, TipoProducto.TABLERO);
        Producto producto2 = new Producto("002", "Barniz Incoloro", proveedor2, 5.20, 100, TipoProducto.BARNIZ);
        Producto producto3 = new Producto("003", "Mesa de Madera", proveedor1, 75.00, 20, TipoProducto.ARTICULO);

        Producto producto4 = new Producto("004", "Tablero Aglomerado2", proveedor1, 10.50, 50, TipoProducto.TABLERO);
        Producto producto5 = new Producto("005", "Barniz Incoloro2", proveedor2, 5.20, 100, TipoProducto.BARNIZ);
        Producto producto6 = new Producto("006", "Mesa de Madera2", proveedor1, 75.00, 20, TipoProducto.ARTICULO);

        
        // Creamos almacenes y añadimos productos a las tiendas
        Almacen almacen1 = new Almacen();
        almacen1.añadirProducto(producto1);
        almacen1.añadirProducto(producto2);
        almacen1.añadirProducto(producto4);
        almacen1.añadirProducto(producto5);
        almacen1.añadirProducto(producto6);
        tienda1.añadirAlmacen(almacen1);

        Almacen almacen2 = new Almacen();
        almacen2.añadirProducto(producto3);
        almacen1.añadirProducto(producto4);
        almacen1.añadirProducto(producto5);
        almacen1.añadirProducto(producto6);
        tienda2.añadirAlmacen(almacen2);
    }
   
    /**
     * Método que permite listar los productos de una tienda según el tipo seleccionado.
     * @param sedeCentral La sede central de la empresa.
     */
    public static void listarProductosDeTienda(SedeCentral sedeCentral) {
        Scanner scanner = new Scanner(System.in);
        Tienda tienda;
        String nombreTienda;
        do {
            System.out.print("Ingrese el nombre de la tienda: ");
            nombreTienda = scanner.nextLine();
            tienda = sedeCentral.buscarTienda(nombreTienda);
            if (tienda == null) {
                System.out.println("No se encontró la tienda " + nombreTienda + ". Intente de nuevo.");
            }
        } while (tienda == null);
        
        System.out.println("Seleccione el tipo de producto:");
        System.out.println("1. Tablero");
        System.out.println("2. Barniz");
        System.out.println("3. Artículo");
        System.out.print("Ingrese el número correspondiente al tipo de producto: ");
        int opcionTipoProducto = scanner.nextInt();
        scanner.nextLine(); 

        // Mostrar los productos según el tipo seleccionado
        switch (opcionTipoProducto) {
            case 1:
                System.out.println("Productos de tipo Tablero de la tienda " + nombreTienda + ":");
                tienda.listarProductos(TipoProducto.TABLERO);
                break;
            case 2:
                System.out.println("Productos de tipo Barniz de la tienda " + nombreTienda + ":");
                tienda.listarProductos(TipoProducto.BARNIZ);
                break;
            case 3:
                System.out.println("Productos de tipo Artículo de la tienda " + nombreTienda + ":");
                tienda.listarProductos(TipoProducto.ARTICULO);
                break;
            default:
                System.out.println("Opción no válida. Intente de nuevo.");
                break;
        }
        ejecutarMenu(sedeCentral);
        // Cerrar el scanner después de usarlo
        scanner.close();
    }


    
    public void mostrarStockDeProducto(String codigoProducto) {
        boolean encontrado = false;
        for (Tienda tienda : tiendas) {
            for (Almacen almacen : tienda.getAlmacenes()) {
                Producto producto = almacen.buscarProducto(codigoProducto);
                if (producto != null) {
                    encontrado = true;
                    System.out.println("En la tienda " + tienda.getNombre() + " hay " + producto.getStock() + " unidades del producto con código " + codigoProducto);
                }
            }
        }
        if (!encontrado) {
            System.out.println("El producto con código " + codigoProducto + " no se encuentra en ninguna tienda.");
        }
    }
   
    
    /**
     * Busca un proveedor por su NIF en la lista de proveedores de la sede central.
     * 
     * @param nif El NIF del proveedor a buscar.
     * @return El proveedor encontrado, o null si no se encuentra ninguno con el NIF especificado.
     */
    public Proveedor buscarProveedorPorNIF(String nif) {
        for (Proveedor proveedor : proveedores) {
            if (proveedor.getNif().equals(nif)) {
                return proveedor;
            }
        }
        
        return null; // Si no se encuentra el proveedor con el NIF especificado
    }
    /**
     * Añade un nuevo producto a todas las tiendas de la sede central.
     * 
     * @param producto El producto que se va a añadir a todas las tiendas.
     */
    public void añadirNuevoProductoEnTiendas(Producto producto) {
        for (Tienda tienda : tiendas) {
            tienda.añadirNuevoProducto(producto);
        }
    }
    /**
     * Ejecuta el menú principal de la sede central, permitiendo al usuario interactuar con las opciones disponibles.
     * 
     * @param sedeCentral La sede central sobre la cual se ejecutará el menú.
     */
    public static void ejecutarMenu(SedeCentral sedeCentral) {
        Scanner scannerM = new Scanner(System.in);
        int opcion;
        do {
            System.out.println("\nMenú:");
            System.out.println("1. Listar productos de una tienda");
            System.out.println("2. Mostrar stock de un producto");
            //System.out.println("3. Añadir un nuevo producto");
            System.out.println("0. Salir");
            System.out.print("Ingrese la opción: ");
            opcion = scannerM.nextInt();
            scannerM.nextLine(); // Limpiar el buffer del scanner
            
            switch (opcion) {
                case 1:
                    listarProductosDeTienda(sedeCentral);
                    break;
                case 2:
                    System.out.print("Ingrese el código del producto: ");
                    String codigoProducto = scannerM.nextLine();
                    sedeCentral.mostrarStockDeProducto(codigoProducto);
                    break;
                /*case 3:
                    añadirNuevoProducto(sedeCentral);
                    break;*/
                case 0:
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción no válida. Intente de nuevo.");
            }
        } while (opcion != 0);
        
        // Cerrar el scanner después de usarlo
        scannerM.close();
    }

}

/*public static void añadirNuevoProducto(SedeCentral sedeCentral) {
Scanner scanner = new Scanner(System.in);

System.out.print("Ingrese el código del nuevo producto: ");
String codigo = scanner.nextLine();

System.out.print("Ingrese la descripción del nuevo producto: ");
String descripcion = scanner.nextLine();

System.out.print("Ingrese Proveedor del nuevo producto: ");
String proveedor = scanner.nextLine();

System.out.print("Ingrese el precio del nuevo producto: ");
double precio = scanner.nextDouble();

System.out.print("Ingrese el stock del nuevo producto: ");
int stock = scanner.nextInt();

System.out.println("Seleccione el tipo de producto:");
System.out.println("1. Tablero");
System.out.println("2. Barniz");
System.out.println("3. Artículo");
int tipo = scanner.nextInt();

Producto nuevoProducto = null; // Creamos una variable para mantener la referencia al nuevo producto

// Creamos el producto según el tipo seleccionado
switch (tipo) {
    case 1:
        nuevoProducto = new Producto(codigo, descripcion, proveedor, precio, stock, TipoProducto.TABLERO);
        break;
    case 2:
        nuevoProducto = new Producto(codigo, descripcion, proveedor, precio, stock, TipoProducto.BARNIZ);
        break;
    case 3:
        nuevoProducto = new Producto(codigo, descripcion, proveedor, precio, stock, TipoProducto.ARTICULO);
        break;
    default:
        System.out.println("Opción de tipo de producto no válida.");
        return; // Salimos del método si el tipo de producto no es válido
}

sedeCentral.añadirNuevoProductoEnTiendas(nuevoProducto); // Agregamos el nuevo producto a todas las tiendas
System.out.println("Nuevo producto añadido a todas las tiendas.");
}*/
/*public static void anyadirNuevoProducto(SedeCentral sedeCentral) {
Scanner scanner = new Scanner(System.in);
Proveedor proveedorX = new Proveedor("111", "Proveedor111");

System.out.print("Ingrese el código del nuevo producto: ");
String codigo = scanner.nextLine();

System.out.print("Ingrese la descripción del nuevo producto: ");
String descripcion = scanner.nextLine();

System.out.print("Ingrese el precio del nuevo producto: ");
double precio = scanner.nextDouble();

System.out.print("Ingrese el stock del nuevo producto: ");
int stock = scanner.nextInt();

scanner.nextLine(); // Limpiar el buffer del scanner

System.out.println("Seleccione el tipo de producto:");
System.out.println("1. Tablero");
System.out.println("2. Barniz");
System.out.println("3. Artículo");
String tipo = scanner.nextLine();

Producto nuevoProducto = null;
TipoProducto tipoProducto = null;

// Creamos el producto según el tipo seleccionado
if (tipo.equals("1")) {
    tipoProducto = TipoProducto.TABLERO;
    nuevoProducto = new Producto(codigo, descripcion, proveedorX, precio, stock, tipoProducto);
    System.out.println("Nuevo producto de tipo TABLERO añadido");
} else if (tipo.equals("2")) {
    tipoProducto = TipoProducto.BARNIZ;
    nuevoProducto = new Producto(codigo, descripcion, proveedorX, precio, stock, tipoProducto);
    System.out.println("Nuevo producto de tipo BARNIZ añadido");
} else if (tipo.equals("3")) {
    tipoProducto = TipoProducto.ARTICULO;
    nuevoProducto = new Producto(codigo, descripcion, proveedorX, precio, stock, tipoProducto);
    System.out.println("Nuevo producto de tipo ARTICULO añadido");
} else {
    System.out.println("Opción de tipo de producto no válida.");
    scanner.close(); // Cerramos el scanner
    return;
}

// Añadimos el nuevo producto a todas las tiendas
sedeCentral.añadirNuevoProductoEnTiendas(nuevoProducto);

// Cerramos el scanner después de utilizarlo
scanner.close();
System.out.println("Nuevo producto añadido a todas las tiendas.");
}*/
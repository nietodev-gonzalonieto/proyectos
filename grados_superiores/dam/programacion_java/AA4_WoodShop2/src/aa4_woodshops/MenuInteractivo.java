package aa4_woodshops;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Scanner;
/**
 * Clase que representa un menú interactivo para la tienda WoodShops.
 * Permite realizar diversas operaciones como añadir productos, listar productos por tipo,
 * mostrar stock, añadir clientes, crear tickets de venta y mostrar resúmenes de tickets por fecha.
 */
public class MenuInteractivo {
    private Tienda tienda;
    /**
     * Constructor de la clase MenuInteractivo.
     * @param tienda La tienda asociada al menú interactivo.
     */
    public MenuInteractivo(Tienda tienda) {
        this.tienda = tienda;
    }
    /**
     * Método que muestra el menú interactivo y maneja las operaciones según la selección del usuario.
     */
    public void mostrarMenu() {
        Scanner scanner = new Scanner(System.in);

        int opcion;
        do {
            System.out.println("\n--- Menú de Interacción ---");
            System.out.println("1. Añadir nuevo Articulo en la tienda");
            System.out.println("2. Listar productos por tipo en la tienda");
            System.out.println("3. Mostrar stock de un producto en todas las tiendas");
            System.out.println("4. Añadir nuevo cliente en WoodShops");
            System.out.println("5. Mostrar listado de todos los clientes");
            System.out.println("6. Añadir ticket de venta");
            System.out.println("7. Mostrar resumen de tickets por fecha");
            System.out.println("0. Salir");

            System.out.print("Seleccione una opción: ");
            opcion = scanner.nextInt();

            switch (opcion) {
                case 1:
                    agregarNuevoProducto();
                    break;
                case 2:
                    listarProductosPorTipo();
                    break;
                case 3:
                    mostrarStockProductoEnTiendas();
                    break;
                case 4:
                    agregarNuevoCliente();
                    break;
                case 5:
                    mostrarListadoClientes();
                    break;
                case 6:
                    añadirTicketVenta();
                    break;
                case 7:
                    mostrarResumenTicketsPorFecha();
                    break;
                case 0:
                    System.out.println("Saliendo del menú...");
                    break;
                default:
                    System.out.println("Opción inválida. Inténtelo de nuevo.");
                    break;
            }
        } while (opcion != 0);

        scanner.close(); // Cerrar el scanner al finalizar
    }
    /**
     * Método privado para agregar un nuevo producto a la tienda.
     */
    private void agregarNuevoProducto() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Ingrese los datos del nuevo producto:");
        System.out.print("Código: ");
        String codigo = scanner.nextLine();
        System.out.print("Descripción: ");
        String descripcion = scanner.nextLine();
        System.out.print("Proveedor (NIF): ");
        String nifProveedor = scanner.nextLine();
        System.out.print("Precio de Venta: ");
        double precioVenta = scanner.nextDouble();
        System.out.print("Cantidad del producto: ");
        int cantidad = scanner.nextInt();

        Proveedor proveedor = new Proveedor(nifProveedor, "Proveedor Ejemplo");
        Producto nuevoProducto = new Articulo(codigo, descripcion, proveedor, precioVenta, cantidad, nifProveedor); // Ajusta el último argumento según el constructor de Articulo
        tienda.agregarProducto(nuevoProducto);

        System.out.println("Nuevo producto añadido correctamente.");
    }
    
    /**
     * Método privado para listar productos por tipo en la tienda.
     */
    private void listarProductosPorTipo() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Seleccione el tipo de producto:");
        System.out.println("1. Tablero");
        System.out.println("2. Barniz");
        System.out.println("3. Artículo");

        int tipo = scanner.nextInt();
        TipoProducto tipoProducto = null;

        switch (tipo) {
            case 1:
                tipoProducto = TipoProducto.TABLERO;
                break;
            case 2:
                tipoProducto = TipoProducto.BARNIZ;
                break;
            case 3:
                tipoProducto = TipoProducto.ARTICULO;
                break;
            default:
                System.out.println("Tipo de producto inválido.");
                return;
        }
        
        tienda.listarProductos(tipoProducto);
    }

    /**
     * Método privado para mostrar el stock de un producto en todas las tiendas.
     */
    private void mostrarStockProductoEnTiendas() {
        Scanner scanner = new Scanner(System.in);

        System.out.print("Ingrese el código del producto: ");
        String codigoProducto = scanner.nextLine();

        tienda.mostrarStockProducto(codigoProducto);
    }

    /**
     * Método privado para agregar un nuevo cliente a la tienda.
     */
    private void agregarNuevoCliente() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Ingrese los datos del nuevo cliente:");
        System.out.print("NIF: ");
        String nif = scanner.nextLine();

        // Comprobamos si el cliente ya existe en la tienda.
        if (tienda.buscarCliente(nif) != null) {
            System.out.println("El cliente ya existe en la tienda.");
            return; // Salimos del método si el cliente ya está registrado
        }

        System.out.print("Nombre: ");
        String nombre = scanner.nextLine();

        System.out.println("Seleccione el tipo de cliente:");
        System.out.println("1. Cliente Registrado (Profesional)");
        System.out.println("2. Cliente Registrado (WoodFriend)");

        int tipoCliente = scanner.nextInt();
        scanner.nextLine(); // Consume la nueva línea después de nextInt()

        switch (tipoCliente) {
            case 1:
                System.out.print("Ingrese el descuento para el cliente profesional (%): ");
                double descuentoProfesional = scanner.nextDouble();
                while (descuentoProfesional > 10 || descuentoProfesional < 0) {
                    System.out.println("El descuento no puede ser mayor que 10% ni menor que 0%");
                    System.out.print("Introduce nuevamente el descuento del cliente: ");
                    descuentoProfesional = scanner.nextDouble(); // Guardamos el descuento.
                }
                scanner.nextLine(); // Limpiamos el buffer
                Cliente nuevoClienteProfesional = new ClienteProfesional(nif, nombre, Cliente.tipoCliente.profesional, descuentoProfesional);
                //Cliente nuevoClienteProfesional = new ClienteProfesional(nif, nombre, descuentoProfesional);
                tienda.agregarCliente(nuevoClienteProfesional); // Agregar el cliente a la tienda
                System.out.println("Nuevo cliente profesional añadido correctamente.");
                break;
            case 2:
                System.out.print("Ingrese el código de socio para el cliente WoodFriend: ");
                String codigoSocio = scanner.nextLine();
                Cliente nuevoClienteWoodFriend = new ClienteWoodFriend(nif, nombre, codigoSocio);
                tienda.agregarCliente(nuevoClienteWoodFriend); // Agregar cliente WoodFriend a la tienda
                System.out.println("Nuevo cliente WoodFriend añadido correctamente.");
                break;
            default:
                System.out.println("Tipo de cliente inválido.");
                break;
        }
    }



    /**
     * Método privado para mostrar el listado de todos los clientes de la tienda.
     */
    private void mostrarListadoClientes() {
        // Assuming a method named obtenerClientes exists
        List<Cliente> clientes = tienda.obtenerClientes();

        if (clientes == null || clientes.isEmpty()) {
            System.out.println("No hay clientes registrados en WoodShops.");
            return;
        }

        System.out.println("\n**Listado de clientes de WoodShops**");

        for (Cliente cliente : clientes) {
            System.out.println("------------------------");
            System.out.println("NIF: " + cliente.getDni());
            System.out.println("Nombre: " + cliente.getNombre());
            System.out.println("Tipo de cliente: " + cliente.getTipoCliente());

            if (cliente instanceof ClienteProfesional) {
                ClienteProfesional clienteProfesional = (ClienteProfesional) cliente;
                System.out.println("Descuento profesional: " + clienteProfesional.getDescuento() + "%");
            } else if (cliente instanceof ClienteWoodFriend) {
                ClienteWoodFriend clienteWoodFriend = (ClienteWoodFriend) cliente;
                System.out.println("Código socio WoodFriend: " + clienteWoodFriend.getCodigo());
            }

            System.out.println("------------------------");
        }
    }
    /**
     * Método privado para añadir un nuevo ticket de venta a la tienda.
     */
    private void añadirTicketVenta() {
        Scanner scanner = new Scanner(System.in); 
        Date fecha = new Date();

        List<Cliente> clientes = tienda.obtenerClientes();

    	 if (clientes.isEmpty()) {
    	        System.out.println("No hay clientes registrados en WoodShops. No se puede crear un ticket de venta.");
    	        return;
    	 }

    	    System.out.println("Seleccione un cliente para el ticket de venta:");

    	    // Mostrar los clientes disponibles para selección
    	    for (int i = 0; i < clientes.size(); i++) {
    	        Cliente cliente = clientes.get(i);
    	        System.out.println((i + 1) + ". " + cliente.getNombre());
    	    }

    	    // Pedir al usuario que seleccione un cliente
    	    System.out.print("Seleccione un cliente: ");
    	    int clienteIndex = scanner.nextInt();

    	    // Verificar la selección del cliente
    	    if (clienteIndex < 1 || clienteIndex > clientes.size()) {
    	        System.out.println("Selección de cliente inválida.");
    	        return;
    	    }

    	    Cliente clienteSeleccionado = clientes.get(clienteIndex - 1);

    	    // Crear un nuevo ticket de venta con la fecha y cliente seleccionados
    	    TicketVenta nuevoTicket = new TicketVenta(fecha, clienteSeleccionado);

    	    // Agregar productos al ticket de venta
    	    boolean agregarMasProductos = true;
    	    while (agregarMasProductos) {
    	        System.out.println("\nAgregar producto al ticket:");
    	        System.out.print("Código del producto: ");
    	        String codigoProducto = scanner.next();

    	        // Buscar el producto en la tienda
    	        Producto producto = tienda.buscarProducto(codigoProducto);
    	        if (producto == null) {
    	            System.out.println("Producto no encontrado en la tienda.");
    	            continue;
    	        }

    	        System.out.print("Cantidad: ");
    	        int cantidad = scanner.nextInt();

    	        // Agregar la línea de detalle al ticket
    	        nuevoTicket.agregarLineaDetalle(producto, cantidad);

    	        // Preguntar al usuario si desea agregar más productos
    	        System.out.print("¿Desea agregar otro producto? (S/N): ");
    	        String continuar = scanner.next();
    	        agregarMasProductos = continuar.equalsIgnoreCase("S");
    	    }

    	    // Mostrar el ticket de venta creado
    	    System.out.println("\nTicket de Venta Creado:");
    	    nuevoTicket.mostrarTicket();
    }
    /**
     * Método privado para mostrar un resumen de tickets de venta por fecha.
     */
    private void mostrarResumenTicketsPorFecha() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Mostrar resumen de tickets por fecha:");

        // Solicitar fecha de inicio
        System.out.print("Ingrese la fecha de inicio (dd/MM/yyyy): ");
        String fechaInicioStr = scanner.next();
        Date fechaInicio = parseFecha(fechaInicioStr);

        // Solicitar fecha de fin
        System.out.print("Ingrese la fecha de fin (dd/MM/yyyy): ");
        String fechaFinStr = scanner.next();
        Date fechaFin = parseFecha(fechaFinStr);

        // Validar las fechas
        if (fechaInicio == null || fechaFin == null || fechaInicio.after(fechaFin)) {
            System.out.println("Fechas inválidas. Verifique e intente nuevamente.");
            return;
        }

        // Filtrar los tickets por fecha
        List<TicketVenta> ticketsFiltrados = filtrarTicketsPorFecha(fechaInicio, fechaFin);

        // Mostrar resumen de tickets
        System.out.println("\nResumen de Tickets del " + fechaInicioStr + " al " + fechaFinStr + ":");
        System.out.println("Número de Tickets: " + ticketsFiltrados.size());

        double totalImporte = 0.0;
        for (TicketVenta ticket : ticketsFiltrados) {
            totalImporte += ticket.getTotalImporte();
        }
        System.out.println("Total Importe: " + totalImporte);
    }

    /**
     * Método privado para convertir una cadena de fecha en un objeto Date.
     * @param fechaStr La cadena de fecha en formato dd/MM/yyyy.
     * @return El objeto Date parseado, o null si la cadena no es válida.
     */
    private Date parseFecha(String fechaStr) {
        try {
            SimpleDateFormat dateFormat = new SimpleDateFormat("dd/MM/yyyy");
            return dateFormat.parse(fechaStr);
        } catch (ParseException e) {
            System.out.println("Formato de fecha inválido. Utilice el formato dd/MM/yyyy.");
            return null;
        }
    }

    /**
     * Método privado para filtrar los tickets de venta por fecha dentro del rango especificado.
     * @param fechaInicio La fecha de inicio del rango.
     * @param fechaFin La fecha de fin del rango.
     * @return Una lista de tickets de venta filtrados por fecha.
     */
    private List<TicketVenta> filtrarTicketsPorFecha(Date fechaInicio, Date fechaFin) {
        List<TicketVenta> ticketsFiltrados = new ArrayList<>();

        // Obtener la lista de todos los tickets
        List<TicketVenta> todosLosTickets = tienda.obtenerTickets();

        if (todosLosTickets == null) {
            System.out.println("No hay tickets registrados en la tienda.");
            return ticketsFiltrados;
        }

        // Filtrar los tickets por fecha dentro del rango especificado
        for (TicketVenta ticket : todosLosTickets) {
            Date fechaTicket = ticket.getFecha();
            if (fechaTicket != null) {
                // Comparar la fecha del ticket con el rango especificado
                if (!fechaTicket.before(fechaInicio) && !fechaTicket.after(fechaFin)) {
                    ticketsFiltrados.add(ticket);
                }
            }
        }

        return ticketsFiltrados;
    }


}

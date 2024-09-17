package aa4_woodshops;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;


/**
 * Representa una tienda que gestiona un inventario de productos, clientes y tickets de venta.
 */
public class Tienda {
    private String nombre;
    private List<Producto> inventario;
    private List<Cliente> clientes;
    private List<TicketVenta> listaTickets;

    /**
     * Constructor de la clase Tienda.
     * @param nombre Nombre de la tienda.
     */
    public Tienda(String nombre) {
        this.nombre = nombre;
        this.clientes = new ArrayList<>();
        this.inventario = new ArrayList<>();
    }

    /**
     * Obtiene el nombre de la tienda.
     * @return Nombre de la tienda.
     */
    public String getNombre() {
        return nombre;
    }

    /**
     * Obtiene el inventario de productos de la tienda.
     * @return Lista de productos en el inventario.
     */
    public List<Producto> getInventario() {
        return inventario;
    }

    /**
     * Agrega un nuevo producto al inventario de la tienda.
     * @param producto Producto a agregar.
     */
    public void agregarProducto(Producto producto) {
        inventario.add(producto);
    }
    
    public Tienda(List<TicketVenta> listaTickets) {
        this.listaTickets = listaTickets;
    }

    /**
     * Obtiene la lista de todos los tickets de venta registrados en la tienda.
     * @return Lista de tickets de venta.
     */
    public List<TicketVenta> obtenerTickets() {
        return listaTickets;
    }
    
    /**
     * Lista los productos de un determinado tipo en la tienda.
     * @param tipoProducto Tipo de producto a listar.
     */
    public void listarProductos(TipoProducto tipoProducto) {
        System.out.println("Productos en la tienda '" + nombre + "' - Tipo: " + tipoProducto);
        for (Producto producto : inventario) {
            if (producto.getTipoProducto() == tipoProducto) {
                System.out.println("Código: " + producto.getCodigoProducto() +
                                   " - Descripción: " + producto.getDescripcion() +
                                   " - Precio Venta: " + producto.getPrecioVenta());
            }
        }
    }

    /**
     * Muestra el stock disponible de un producto en la tienda.
     * @param codigoProducto Código del producto.
     */
    public void mostrarStockProducto(String codigoProducto) {
        System.out.println("Stock del producto '" + codigoProducto + "' en la tienda '" + nombre + "':");
        int count = 0;

        for (Producto producto : inventario) {
            if (producto.getCodigoProducto().equals(codigoProducto)) {
                // Incrementar el contador con la cantidad del producto encontrado
                count += producto.getCantidad();
            }
        }

        // Imprimir la cantidad total del producto encontrado
        System.out.println("Cantidad: " + count);
    }
    
    /**
     * Genera un nuevo ticket de venta con los productos y cantidades especificados.
     * @param cliente Cliente asociado al ticket de venta.
     * @param productos Lista de productos en el ticket.
     * @param cantidades Lista de cantidades de cada producto en el ticket.
     * @return Nuevo ticket de venta generado.
     */
    public TicketVenta generarTicketVenta(Cliente cliente, List<Producto> productos, List<Integer> cantidades) {
        TicketVenta ticket = new TicketVenta(new Date(), cliente);

        for (int i = 0; i < productos.size(); i++) {
            ticket.agregarLineaDetalle(productos.get(i), cantidades.get(i));
        }

        return ticket;
    }

    /**
     * Registra una venta de un producto a un cliente.
     * @param cliente Cliente que realiza la compra.
     * @param producto Producto vendido.
     * @param cantidad Cantidad vendida.
     */
    public void registrarVenta(Cliente cliente, Producto producto, int cantidad) {
        // Verificar si el producto está en el inventario y hay suficiente cantidad
        if (inventario.contains(producto) && inventario.indexOf(producto) >= cantidad) {
            // Crear un nuevo ticket de venta
            TicketVenta ticketVenta = new TicketVenta(new Date(), cliente);
            ticketVenta.agregarLineaDetalle(producto, cantidad);
            // Mostrar el detalle del ticket
            System.out.println("Ticket de Venta:");
            System.out.println(ticketVenta);
            // Actualizar el inventario (reducir la cantidad del producto en stock)
            producto.setCantidad(producto.getCantidad() - cantidad); // Reducir la cantidad en el inventario
        } else {
            System.out.println("El producto no está disponible en suficiente cantidad en el inventario.");
        }
    }
    /**
     * Agrega un nuevo cliente a la lista de clientes de la tienda.
     * @param cliente Cliente a agregar.
     */
    public void agregarCliente(Cliente cliente) {
        clientes.add(cliente);
    }

    /**
     * Busca un cliente en la lista de clientes por su NIF.
     * @param nif NIF del cliente a buscar.
     * @return Cliente encontrado, o null si no existe.
     */
    public Cliente buscarCliente(String nif) {
        for (Cliente cliente : clientes) {
            if (cliente.getDni().equals(nif)) {
                return cliente;
            }
        }
        return null;
    }

    /**
     * Obtiene la lista de todos los clientes registrados en la tienda.
     * @return Lista de clientes.
     */
    public List<Cliente> obtenerClientes() {
        // Obtenemos la lista de clientes de la tienda
        List<Cliente> clientes = this.clientes;

        // Si la lista de clientes está vacía, devolvemos una lista vacía
        if (clientes == null || clientes.isEmpty()) {
            return new ArrayList<>();
        }

        // Devolvemos la lista de clientes
        return clientes;
    }
    
    /**
     * Busca un producto en el inventario de la tienda por su código.
     * @param codigoProducto Código del producto a buscar.
     * @return Producto encontrado, o null si no existe.
     */
    public Producto buscarProducto(String codigoProducto) {
        // Iterar sobre la lista de productos de la tienda y buscar el producto por código
        for (Producto producto : inventario) {
            if (producto.getCodigoProducto().equals(codigoProducto)) {
                return producto; // Devolver el producto si se encuentra
            }
        }
        return null; // Devolver null si el producto no se encuentra
    }
}

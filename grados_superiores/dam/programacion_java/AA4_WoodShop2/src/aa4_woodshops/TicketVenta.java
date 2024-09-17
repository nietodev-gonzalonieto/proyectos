package aa4_woodshops;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

/**
 * Clase que representa un ticket de venta en la tienda WoodShops.
 */
public class TicketVenta {
    private static int numeroTicketCounter = 1;

    private int numeroTicket;
    private Date fecha;
    private Cliente cliente;
    private List<Producto> lineasDetalle;
    private double totalImporte;

    /**
     * Constructor de la clase TicketVenta.
     * @param fecha Fecha de emisión del ticket.
     * @param cliente Cliente asociado al ticket.
     */
    public TicketVenta(Date fecha, Cliente cliente) {
        this.numeroTicket = numeroTicketCounter++;
        this.fecha = fecha;
        this.cliente = cliente;
        this.lineasDetalle = new ArrayList<>();
        this.totalImporte = 0.0;
    }


    /**
     * Método getter para obtener la fecha de emisión del ticket.
     * @return La fecha de emisión del ticket.
     */
	public int getNumeroTicket() {
        return numeroTicket;
    }

	/**
     * Método getter para obtener la fecha de emisión del ticket.
     * @return La fecha de emisión del ticket.
     */
    public Date getFecha() {
        return fecha;
    }

    /**
     * Método getter para obtener el cliente asociado al ticket.
     * @return El cliente asociado al ticket.
     */
    public Cliente getCliente() {
        return cliente;
    }

    /**
     * Método getter para obtener las líneas de detalle del ticket.
     * @return La lista de productos que conforman las líneas de detalle del ticket.
     */
    public List<Producto> getLineasDetalle() {
        return lineasDetalle;
    }

    /**
     * Método getter para obtener el importe total del ticket.
     * @return El importe total del ticket.
     */
    public double getTotalImporte() {
        return totalImporte;
    }

    /**
     * Método para agregar una línea de detalle al ticket.
     * @param producto Producto a agregar a la línea de detalle.
     * @param cantidad Cantidad del producto a agregar.
     */
    public void agregarLineaDetalle(Producto producto, int cantidad) {
        lineasDetalle.add(producto);
        totalImporte += producto.getPrecioVenta() * cantidad;
    }

    /**
     * Método para mostrar los detalles del ticket por consola.
     */
    public void mostrarTicket() {
        System.out.println("Número de Ticket: " + numeroTicket);
        System.out.println("Fecha: " + fecha);
        System.out.println("Cliente: " + (cliente != null ? cliente.getNombre() : "Anónimo"));

        for (Producto producto : lineasDetalle) {
            System.out.println("Producto: " + producto.getDescripcion() +
                               " - Cantidad: " + cantidadProducto(producto) +
                               " - Precio Unitario: " + producto.getPrecioVenta());
        }

        System.out.println("Total Importe: " + totalImporte);
    }

    /**
     * Método privado para obtener la cantidad de un producto en las líneas de detalle del ticket.
     * @param producto Producto del cual se desea obtener la cantidad.
     * @return La cantidad del producto en las líneas de detalle del ticket.
     */
    private int cantidadProducto(Producto producto) {
        int count = 0;
        for (Producto p : lineasDetalle) {
            if (p.equals(producto)) {
                count++;
            }
        }
        return count;
    }
}

package aa4_woodshops;

import static aa4_woodshops.Cliente.tipoCliente.anonimo;

import java.util.ArrayList;

/**
 * Clase abstracta que representa un Cliente en la tienda.
 * Contiene atributos y métodos comunes para diferentes tipos de clientes.
 */
public abstract class Cliente {

    // Atributos de la clase Cliente.
    protected String dni;
    protected String nombre;
    private tipoCliente tipoCliente;
    private double descuento = 0;

    // Enumerado de tipo cliente.
    public enum tipoCliente {
        profesional,
        woodFriend,
        anonimo;
    }

    /**
     * Constructor para un cliente registrado.
     *
     * @param dni DNI del cliente.
     * @param nombre Nombre del cliente.
     * @param tipoCliente Tipo de cliente (profesional, woodFriend, etc.).
     */
    public Cliente(String dni, String nombre, tipoCliente tipoCliente) {
        this.dni = dni;
        this.nombre = nombre;
        this.tipoCliente = tipoCliente;
    }

    /**
     * Constructor para un cliente registrado con descuento.
     *
     * @param dni DNI del cliente.
     * @param nombre Nombre del cliente.
     * @param tipoCliente Tipo de cliente (profesional, woodFriend, etc.).
     * @param descuento Descuento aplicable al cliente.
     */
    public Cliente(String dni, String nombre, tipoCliente tipoCliente, double descuento) {
        this(dni, nombre, tipoCliente); // Llamada al constructor base
        this.descuento = descuento;
    }

    /**
     * Constructor para un cliente anónimo.
     * Este constructor crea un cliente con valores predeterminados.
     */
    public Cliente() {
        this.dni = "null";
        this.nombre = "Sin registrar";
        this.tipoCliente = anonimo; // Acceso estático
    }

    // Getters y setters de los atributos de la clase Cliente.

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public tipoCliente getTipoCliente() {
        return tipoCliente;
    }

    public void setTipoCliente(tipoCliente tipoCliente) {
        this.tipoCliente = tipoCliente;
    }

    public double getDescuento() {
        return descuento;
    }

    public void setDescuento(double descuento) {
        this.descuento = descuento;
    }

    /**
     * Método toString para representar los datos del cliente.
     *
     * @return Cadena de representación del cliente.
     */
    @Override
    public String toString() {
        return "\nDNI: " + dni + "\nNombre: " + nombre + "\nTipo de cliente: " + tipoCliente;
    }

    /**
     * Método abstracto para mostrar los tickets del cliente.
     * Este método debe ser implementado por las subclases.
     */
    public void mostrarTickets() {
        // Este método necesita una implementación adecuada para mostrar los tickets del cliente.
        System.out.println("Mostrando tickets del cliente: " + nombre);
        // Lógica para obtener y mostrar los tickets del cliente
    }

    /**
     * Método abstracto para obtener la lista de tickets del cliente.
     * Este método debe ser implementado por las subclases para devolver la lista real de tickets.
     *
     * @return Lista de tickets del cliente.
     */
    public ArrayList<TicketVenta> getListaTickets() {
        // Este método debe implementarse para obtener la lista real de tickets del cliente.
        return new ArrayList<TicketVenta>(); // Devuelve una lista vacía por defecto
    }

    /**
     * Método abstracto para obtener el código del cliente WoodFriend.
     * Este método debe ser implementado por las subclases que representan clientes WoodFriend.
     *
     * @return Código del cliente WoodFriend.
     */
    public String getCodigo() {
        // Este método necesita implementación para obtener el código del cliente WoodFriend.
        return ""; // Devuelve una cadena vacía por defecto
    }
}

package aa4_woodshops;


/**
 * Clase que representa un Cliente Profesional en la tienda.
 * Extiende la clase abstracta Cliente y proporciona una implementación específica para clientes profesionales.
 */
public class ClienteProfesional extends Cliente {

    // Atributos de la clase Profesionales.
    private float descuento;

    /**
     * Constructor para un cliente profesional con descuento específico.
     *
     * @param dni              DNI del cliente profesional.
     * @param nombre           Nombre del cliente profesional.
     * @param tipoCliente      Tipo de cliente (profesional).
     * @param descuentoProfesional Descuento aplicado al cliente profesional.
     */
    public ClienteProfesional(String DNI, String nombre, tipoCliente tipoCliente, double descuentoProfesional) {
        super(DNI, nombre, tipoCliente);
        this.descuento = (float) descuentoProfesional;
    }

    /**
     * Constructor para un cliente profesional con descuento por defecto del 10%.
     *
     * @param dni    DNI del cliente profesional.
     * @param nombre Nombre del cliente profesional.
     */
    public ClienteProfesional(String dni, String nombre) {
        super(dni, nombre, tipoCliente.profesional, 10.0); // Descuento por defecto del 10%
        this.descuento = (float) 10.0; // Descuento por defecto del 10%
    }

    // Getters y Setters de la clase ClienteProfesional.

    /**
     * Obtiene el descuento aplicado al cliente profesional.
     *
     * @return El descuento aplicado.
     */
    public double getDescuento() {
        return descuento;
    }

    /**
     * Establece el descuento para el cliente profesional.
     *
     * @param descuento El descuento a establecer.
     */
    public void setDescuento(float descuento) {
        this.descuento = descuento;
    }

    /**
     * Calcula el importe descontado aplicando el descuento al importe base.
     *
     * @param importe Importe base al que aplicar el descuento.
     * @return El importe con el descuento aplicado.
     */
    public double calcularDescuento(double importe) {
        return importe - (importe * this.descuento);
    }

    /**
     * Representación en cadena de caracteres del cliente profesional.
     *
     * @return Representación en formato de cadena de caracteres.
     */
    @Override
    public String toString() {
        return "" + super.toString() + "\n";
    }

}

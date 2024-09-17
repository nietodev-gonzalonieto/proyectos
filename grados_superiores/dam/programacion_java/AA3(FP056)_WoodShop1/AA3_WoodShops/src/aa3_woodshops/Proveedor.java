package aa3_woodshops;

/**
 * Clase que representa un proveedor de la empresa WoodShops.
 */
public class Proveedor {
    // Atributos
    private String nif;
    private String nombre;

    // Constructor
    public Proveedor(String nif, String nombre) {
        this.nif = nif;
        this.nombre = nombre;
    }

    // Getters y Setters
    public String getNif() {
        return nif;
    }

    public void setNif(String nif) {
        this.nif = nif;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    // Método toString
    @Override
    public String toString() {
        return "Proveedor{" +
                "nif='" + nif + '\'' +
                ", nombre='" + nombre + '\'' +
                '}';
    }
}

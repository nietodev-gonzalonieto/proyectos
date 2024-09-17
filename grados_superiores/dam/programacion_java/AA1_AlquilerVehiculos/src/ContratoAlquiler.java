import java.time.LocalDate;

public class ContratoAlquiler{
    private LocalDate fechaInicio;
    private LocalDate fechaFinal;
    private double precioDia;
    private Vehiculo vehiculo;
    private Cliente cliente;

    ContratoAlquiler(LocalDate fechaInicio, LocalDate fechaFinal, double precioDia, Vehiculo vehiculo, Cliente cliente){
        this.fechaInicio = fechaInicio;
        this.fechaFinal = fechaFinal;
        this.precioDia = precioDia;
        this.vehiculo = vehiculo;
        this.cliente = cliente;
    }
    
    public int nDias(){
        return (int) (fechaFinal.toEpochDay() - fechaInicio.toEpochDay());
    }

    public double costeTotal(){
        return nDias() * precioDia;
    }
    
    @Override
    public String toString(){
        return "Fecha de inicio: " + fechaInicio + ", Fecha de finalizacion: " + fechaFinal +
               ", Precio por dia: " + precioDia + ", Vehiculo: " + vehiculo + ", Cliente: " + cliente;
    }
}


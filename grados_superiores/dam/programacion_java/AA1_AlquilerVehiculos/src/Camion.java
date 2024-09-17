
class Camion extends Vehiculo {
    private int capacidadCarga;

    public Camion(String matricula, String marca, String modelo, int capacidadCarga) {
        super(matricula, marca, modelo);
        this.capacidadCarga = capacidadCarga;
    }

    @Override
    public int getPuertas() {
        return 2; // Por ejemplo, camión tiene dos puertas
    }

    @Override
    public int getPlazas() {
        return 3; // Conductor + dos acompañantes
    }

    @Override
    public String toString() {
        return super.toString() + ", Capacidad de carga: " + capacidadCarga;
    }
}

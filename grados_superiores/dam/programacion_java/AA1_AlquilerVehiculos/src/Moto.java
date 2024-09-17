
class Moto extends Vehiculo {
    private int cilindrada;

    public Moto(String matricula, String marca, String modelo, int cilindrada) {
        super(matricula, marca, modelo);
        this.cilindrada = cilindrada;
    }

    @Override
    public int getPuertas() {
        return 0; // Las motos no tienen puertas
    }

    @Override
    public int getPlazas() {
        return 1; // Solo llevan al conductor
    }

    @Override
    public String toString() {
        return super.toString() + ", Cilindrada: " + cilindrada;
    }
}
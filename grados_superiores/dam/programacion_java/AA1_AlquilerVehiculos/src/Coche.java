
class Coche extends Vehiculo{
	private int puertas;
	private int plazas;
	
	public Coche(String matricula, String marca, String modelo, int puertas, int plazas) {
		super(matricula, marca, modelo);
	    this.puertas = puertas;
	    this.plazas = plazas;
	}

	public int getPuertas() {
		return puertas;
	}

	public int getPlazas() {
		return plazas;
	}
	
	@Override
    public String toString() {
        return super.toString() + ", Puertas: " + puertas + ", Plazas: " + plazas;
    }
}

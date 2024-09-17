package Entrega;

public class NIF {
	private int numero;
	private String letra;
	private final String LETRAS[] = {"T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"}; 
	
	
	public NIF(int numero, String letra) {

		this.numero = numero;
		this.letra = letra;
	}
	
	public int getNumero() {
		return numero;
	}
	public void setNumero(int numero) {
		this.numero = numero;
	}
	
	public String getLetra() {
		return letra;
	}
	
	public void setLetra(String letra) {
		this.letra = letra;
	}
	
	public boolean comprovarLetra() {
		
		String letraValida = LETRAS[numero/23];
		
		return letra == letraValida;
	}
	
	public String toString() {
		return numero+letra;
	}
	
}

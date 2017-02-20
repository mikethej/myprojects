package domain;

public class Motoristas {

	//M - motorista
	private String estadoM;
	private String nomeM;
	private int idM;
	
	public Motoristas (String estadoM, String nomeM, int idM) {
		this.estadoM = estadoM;
		this.nomeM = nomeM;
		this.idM = idM;
	}
	
	public String getEstado() {
		return estadoM;
	}
	
	public String getNome() {
		return nomeM;
	}
	
	public int getId() {
		return idM;
	}
}

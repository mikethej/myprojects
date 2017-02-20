package domain;

public class Viaturas {

	//V - viatura
	private String estadoV;
	private int matricula;
	
	public Viaturas (String estadoV, int matricula) {
		this.estadoV = estadoV;
		this.matricula = matricula;
	}
	
	public String getEstadoV() {
		return estadoV;
	}
	
	public int getMatricula() {
		return matricula;
	}
}

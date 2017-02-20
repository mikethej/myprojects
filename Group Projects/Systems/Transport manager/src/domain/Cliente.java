package domain;

public class Cliente {

	private String MoradaDestino;
	private String cliente;
	private int id;
	private String carga;
	private String MoradaOrigem;
	
	public Cliente (String MoradaDestino, String cliente, int id, String carga,String MoradaOrigem) {
		this.MoradaDestino = MoradaDestino;
		this.cliente = cliente;
		this.id = id;
		this.carga = carga;
		this.MoradaOrigem = MoradaOrigem;
	}
	
	public String getName() {
		return cliente;
	}
	
	public int getId() {
		return id;
	}
	
	public String getMoradaEntrega() {
		return MoradaDestino;
	}
	
	public String getencomenda(){
		return carga;
	}
	
	public String getMoradaInicio(){
		return MoradaOrigem;
	}
	

}

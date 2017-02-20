package domain;

public class Ordem {
	
	private Cliente info;
	private String carga;
	
	public Ordem (Cliente info, String carga) {
		this.info = info;
		this.carga = carga;
	}
	
	public Cliente getClienteInfo() {
		return info;
	}
	
	public String getEncomenda(){
		return carga;
	}

}

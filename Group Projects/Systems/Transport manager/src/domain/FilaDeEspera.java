package domain;


public class FilaDeEspera {

	// A - eh referente ah informacao por ordem da data, a partir do mais antigo
	private String cargaA;
	private String clienteA;
	private int dataA;
	private String estado;

	
	public FilaDeEspera (String cargaA, String clienteA, String estado, int dataA){
		this.cargaA = cargaA;
		this.clienteA = clienteA;
		this.dataA = dataA;
		this.estado = estado;
	}
	
	public String getCarga_a_enviar () {
		return cargaA;
	}

	public String getClientesEpedidos () {
		return clienteA;
	}
	
	public String getEstado () {
		return estado;
	}
	
	public int getDataPedido () {
		return dataA;
	}
	
}


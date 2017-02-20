package domain;

public class ListaDePedidos {
	
	// H - eh tipo historico
	private String cargaH;
	private String clienteH;
	private int idH;
	private int dataH;
	
	public ListaDePedidos (String cargaH, String clienteH, int idH, int dataH){
		this.cargaH = cargaH;
		this.clienteH = clienteH;
		this.idH = idH;
		this.dataH = dataH;

		
	}
	
	public String getTodasAsCargas () {
		return cargaH;
	}

	public String getClientesEpedidos () {
		return clienteH;
	}
	
	public int getIdCliente () {
		return idH;
	}
	
	public int getDataPedido () {
		return dataH;
	}
	
}

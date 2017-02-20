package domain;

public class Morada {


	private String Paihs;
	private String Cidade;
	private String Freguesia;
	private String Rua;
	private int Porta;
	private int Andar;
	private String CodigoPostal;
	
	public Morada (String Paihs,String Cidade,String Freguesia,String Rua,int Porta,int Andar,String CodigoPostal) {
		this.Paihs = Paihs;
		this.Cidade = Cidade;
		this.Freguesia = Freguesia;
		this.Rua = Rua;
		this.Porta = Porta;
		this.Andar = Andar;
		this.CodigoPostal = CodigoPostal;
	}
	
	public String getPaihs() {
		return Paihs;
	}
	
	public String getCidade() {
		return Cidade;
	}
	
	public String getFreguesia() {
		return Freguesia;
	}
	
	public String getRua() {
		return Rua;
	}
	
	public int getPorta(){
		return Porta;
	}
	
	public int getAndar(){
		return Andar;
	}
	
	public String getCodigoPostal() {
		return CodigoPostal;
	}

}

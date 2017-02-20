package domain;


public class LoginFuncionario {
	
	private String user;
	private String password;

	public LoginFuncionario (String user, String password) {
		this.user = user;
		this.password = password;
	}
	
	
	public String getLogin() {
		return user;		
	}
	
	public String getLoginConfirmation() {
		return password;
	}
	

}

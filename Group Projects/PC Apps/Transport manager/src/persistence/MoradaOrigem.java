package persistence;

import java.io.File;
import java.util.Scanner;

import domain.Morada;

public class MoradaOrigem {

	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("moradaOrigem.csv"));
		}
		catch (Exception e) {
			System.out.println("Ficheiro nao encontrado");
		}
		
	}
	
	public void readFile() {
		while(s.hasNext()) {
			String opcao = s.next();
			String Pais = s.next();
			String Cidade = s.next();
			String Freguesia = s.next();
			String Rua = s.next();
			String Porta = s.next();
			String Andar= s.next();
			String codigoPostal= s.next();
			
			System.out.printf("%s %s %s %s %s %s %s %s \n",opcao,Pais,Cidade,Freguesia,Rua,Porta,Andar,codigoPostal);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}
}

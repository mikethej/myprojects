package persistence;

import java.io.*;
import java.util.*;

import domain.Cliente;

public class ClienteInfo {
	
	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("clientes.csv"));
		}
		catch (Exception e) {
			System.out.println("Ficheiro nao encontrado");
		}
		
	}
	
	public void readFile() {
		while(s.hasNext()) {
			String nome = s.next();
			String id = s.next();
			String telefone = s.next();
			System.out.printf("%s %s %s\n", nome, id, telefone);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}

}

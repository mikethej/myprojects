package persistence;

import java.io.File;
import java.util.Scanner;

import domain.ListaDePedidos;

public class ListaDePedidosInfo {

	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("ListaDePedidos.csv"));
		}
		catch (Exception e) {
			System.out.println("Ficheiro nao encontrado");
		}
		
	}
	
	public void readFile() {
		while(s.hasNext()) {
			String id = s.next();
			String nome = s.next();
			String carga = s.next();
			String data = s.next();
			
			System.out.printf("%s %s %s %s\n", id, nome, carga, data);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}
}

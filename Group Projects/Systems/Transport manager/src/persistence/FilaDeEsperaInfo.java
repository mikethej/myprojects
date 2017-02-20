package persistence;

import java.io.File;
import java.util.Scanner;

import domain.FilaDeEspera;

public class FilaDeEsperaInfo {

	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("FilaDeEspera.csv"));
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
			String estado = s.next();
			
			System.out.printf("%s %s %s %s %s\n", id, nome, carga, data, estado);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}
}

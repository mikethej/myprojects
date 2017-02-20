package persistence;

import java.io.File;
import java.util.Scanner;

import domain.Motoristas;

public class MotoristasInfo {

	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("Motoristas.csv"));
		}
		catch (Exception e) {
			System.out.println("Ficheiro nao encontrado");
		}
		
	}
	
	public void readFile() {
		while(s.hasNext()) {
			String nome = s.next();
			String estado = s.next();
			String id = s.next();
		
			
			System.out.printf("%s %s %s\n", id,nome,estado);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}
}

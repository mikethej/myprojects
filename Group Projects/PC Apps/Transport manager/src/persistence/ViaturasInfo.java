package persistence;

import java.io.File;
import java.util.Scanner;

import domain.Viaturas;

public class ViaturasInfo {

	private Scanner s;
	
	public void openFile() {
		try{
			s = new Scanner (new File("Viaturas.csv"));
		}
		catch (Exception e) {
			System.out.println("Ficheiro nao encontrado");
		}
		
	}
	
	public void readFile() {
		while(s.hasNext()) {
			String matricula = s.next();
			String estado = s.next();
			
			System.out.printf("%s %s\n", matricula, estado);
			
		}
		
	}
	
	public void closeFile() {
		s.close();
	}
}

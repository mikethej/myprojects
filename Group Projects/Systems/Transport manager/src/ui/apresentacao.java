package ui;

import java.util.Scanner;

import domain.Cliente;
import domain.Morada;
import domain.LoginFuncionario;
import domain.FilaDeEspera;
import domain.ListaDePedidos;
import domain.Motoristas;
import domain.Ordem;
import domain.Viaturas;
import persistence.ClienteInfo;
import persistence.MoradaOrigem;
import persistence.MoradaDestino;
import persistence.ListaDePedidosInfo;
import persistence.FilaDeEsperaInfo;
import persistence.MotoristasInfo;
import persistence.ViaturasInfo;

public class apresentacao {

	public void Interface () {
		
		Scanner s = new Scanner(System.in);
		boolean programa = false;
		
		ClienteInfo CI = new ClienteInfo();	
		MoradaOrigem MO = new MoradaOrigem();
		MoradaDestino MD = new MoradaDestino();
		ListaDePedidosInfo LDP = new ListaDePedidosInfo();
		FilaDeEsperaInfo FDE = new FilaDeEsperaInfo();
		MotoristasInfo M = new MotoristasInfo();
		ViaturasInfo V = new ViaturasInfo();
		
		
		System.out.println("User: ");
		String user = s.nextLine();
		System.out.println("Password: ");
		String password = s.nextLine();
		System.out.println("Bem vindo " +user);
		
		while (programa == false){ 
			System.out.println("O que deseja fazer?");
			System.out.println("1 - Novo Pedido");
		
			int menu = s.nextLine().charAt(0);
				
			if (menu == '1') {
				programa = true;
				
			}else{
				System.out.println("Opcao nao disponivel escolha outra");			
			}
		}
		
		programa = false;
		
		while(programa == false) {
			System.out.println("Insira o id do cliente: ");
			
			int id = s.nextLine().charAt(0);
			
			if (id == '8') {
				programa = true;
				
			}else{
				System.out.println("Id nao existente escolha outro");			
			}
				
			
		}
		
		System.out.println("Name    ID Telefone");
		CI.openFile();
		CI.readFile();
		CI.closeFile();
		programa = false;
		
		while(programa == false) {
			System.out.println("Escolha a morada de origem: ");
			System.out.println("   Paihs    Cidade Freguesia Rua Porta Andar Codigo Postal");
			MO.openFile();
			MO.readFile();
			MO.closeFile();
			
			int mo = s.nextLine().charAt(0);
			
			if (mo == '1') {
				programa = true;
				
			}else if (mo == '2'){
				programa = true;
				
			}else{
				System.out.println("Opcao invalida, escolha outra");			
			}	
		}
		
		programa = false;
		
		while(programa == false) {
			System.out.println("Escolha a morada de destino: ");
			System.out.println("   Paihs    Cidade Freguesia Rua Porta Andar Codigo Postal");
			MD.openFile();
			MD.readFile();
			MD.closeFile();
			
			int md = s.nextLine().charAt(0);
			
			if (md == '1') {
				programa = true;
				
			}else if (md == '2'){
				programa = true;
				
			}else{
				System.out.println("Opcao invalida, escolha outra");			
			}	
		}
		
		programa = false;
		
		System.out.println("O que quer transportar?");
		String carga = s.nextLine();
		
		System.out.println("Insira a data de entrega (dd mm yy)");
		int date = s.nextInt();
		
		while(programa == false) {
			System.out.println("Escolha uma opcao");
			System.out.println("1 - Ver lista de pedidos");
			System.out.println("2 - Ver fila de espera");
			System.out.println("3 - Motoristas Disponiveis");
			System.out.println("4 - Viaturas disponiveis");
			System.out.println("5 - Associar ordem");
			System.out.println("6 - Sair");
			
			int opcao = s.nextLine().charAt(0);
			
			if (opcao == '1') {
				LDP.openFile();
				LDP.readFile();
				LDP.closeFile();
				
				
			}else if (opcao == '2'){
				FDE.openFile();
				FDE.readFile();
				FDE.closeFile();
				
			
				
			}else if (opcao == '3'){
				M.openFile();
				M.readFile();
				M.closeFile();
			
			
			}else if (opcao == '4'){
				V.openFile();
				V.readFile();
				V.closeFile();
			
			
			}else if (opcao == '5'){
				System.out.println("Done");
		
				
			}else if (opcao == '6'){
				programa = true;
				
			}else{
				System.out.println("Opcao invalida, escolha outra");			
			}	
		}
		
		System.out.println("Fim");
	}
}

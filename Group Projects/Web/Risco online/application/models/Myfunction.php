<?php
	
	class Myfunction extends CI_Model{




		public function insertplayer($name, $id) {

			$this->db->select('users.id');
			$this->db->from('users');
			$this->db->where('username', $id);
			$query = $this->db->get();

			$info11 = $query->result();

			foreach ($info11 as $key) {
				$some = $key->id;
			}

			$player = array(
				'id'      => $some,
				'name'    => $name,
				'score'   => 0,
				'vit'	  => 0,
				'lose'    => 0,
				);

			$this->db->insert('Jogador', $player);

		}

		public function creategame($info, $id) {
			
			$this->db->select('Criador.id');
			$this->db->from('Criador');
			$this->db->where('Criador.id', $id);
			
			$query2 = $this->db->get();
			$criadorid = $query2->num_rows();


			if ($criadorid == 0){

				$criador = array(
					'id' => $id,
					);
				$this->db->insert('Criador',$criador);
			}


			$jogo = array(
				'INFO' => $info,
				'DATA' => date('Y-m-d'),
				'ESTADO' =>'Pendente',
				'HORA' =>date('H:i:s')
				);
			$this->db->insert('Jogo',$jogo);

			$this->db->select('Jogo.id');
			$this->db->from('Jogo');
			$this->db->where('INFO', $info);
			$query = $this->db->get();

			$info11 = $query->result();

			foreach ($info11 as $key) {
				$some = $key->id;
			}


			$cria = array(
				'Criador' => $id,
				'Jogo' => $some,
				);
			$this->db->insert('Cria',$cria);

			$joga = array(
				'Jogador' => $id,
				'Jogo' => $some			
			);
			$this->db->insert('Joga', $joga);

			return $some;

		}

		public function getallgames(){

			$this->db->select('Jogo.id, Jogo.info, users.username, Jogo.estado');
			$this->db->from('Jogo, Cria, Criador, users');
			$this->db->where('Cria.criador = Criador.id');
			$this->db->where('users.id = Criador.id');
			$this->db->where('Cria.jogo = Jogo.id');
			$query = $this->db->get();

			return $query->result();
		}

		public function getallscores(){
			$this->db->select('users.username, Jogador.score');
			$this->db->from('users, Jogador');
			$this->db->where('users.id = Jogador.id');
			$this->db->order_by('Jogador.score', 'desc');
			$this->db->limit(10);

			$query = $this->db->get();
			return $query->result();
		}

		public function getperfil($id) {

			$this->db->select('users.username,users.email,Jogador.name');
			$this->db->from('users,Jogador');
			$this->db->where('users.id=Jogador.id');
			$this->db->where('users.id', $id);
			
			$query = $this->db->get();
			return $query->result();
		}


		public function playergame($game_id, $id){

			$this->db->select('Participante.id');
			$this->db->from('Participante');
			$this->db->where('Participante.id', $id);
			
			$query2 = $this->db->get();
			$partid = $query2->num_rows();

			
			if ($partid == 0){	
				$Partic = array(
					'id' => $id
				);
				$this->db->insert('Participante',$Partic);
			}
			


			$this->db->select('Jogo.id');
			$this->db->from('Jogo');
			$this->db->where('id', $game_id);
			$query = $this->db->get();

			$info11 = $query->result();

			foreach ($info11 as $key) {
				$some = $key->id;
			}

			$joga = array(
				'Jogador' => $id,
				'Jogo' => $some			
			);

			$this->db->select('Joga.Jogador, Joga.Jogo');
			$this->db->from('Joga');
			$this->db->where('Joga.Jogador', $id);
			$this->db->where('Joga.Jogo', $some);	

			$query5 = $this->db->get();
			$jog = $query5->num_rows();
					
			if($jog == 0) {
				$this->db->insert('Joga', $joga);
			}
		}
		
		public function playerinsidegame_creator($game_id){
			$this->db->select('users.username, Jogo.ID');
			$this->db->from('users, Joga, Jogo, Criador, Cria');
			$this->db->where('users.id = Joga.Jogador');
			$this->db->where('Joga.Jogo = Jogo.ID');
			$this->db->where('Jogo.ID', $game_id);
			$this->db->where('Criador.id = users.id');
			$this->db->where('Cria.Criador = Criador.id');
			$this->db->where('Cria.Jogo = Jogo.ID');
			$query = $this->db->get();

			return $query->result();	
		}
		
		public function playerinsidegame_parti($game_id){
			$this->db->select('users.username');
			$this->db->from('users, Joga, Jogo, Participante, Cria');
			$this->db->where('users.id = Joga.Jogador');
			$this->db->where('Joga.Jogo = Jogo.ID');
			$this->db->where('Jogo.ID', $game_id);
			$this->db->where('Participante.id = users.id');
			$this->db->where('Cria.Criador != Participante.id');
			$this->db->where('Cria.Jogo = Jogo.ID');
			$query = $this->db->get();

			return $query->result();	
		}

		public function gameout($game_id, $id) {
			$this->db->where('Jogador', $id);
			$this->db->where('Jogo', $game_id);
			$this->db->delete('Joga');
		}

		public function hist($id) {
			$this->db->select('users.username, Jogador.vit, Jogador.lose');
			$this->db->from('users, Jogador');
			$this->db->where('Jogador.id', $id);
			$this->db->where('users.id = Jogador.id');

			$query = $this->db->get();
			return $query->result();
		}
	}
?>

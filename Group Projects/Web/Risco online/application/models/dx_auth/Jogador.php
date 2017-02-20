<?php

class Jogador extends CI_Model 
{

	function cria_jogador($nick, $nome)
	{
		$insert_sql = "INSERT INTO Jogador(NICKNAME, NAME)" . " VALUES('$nick', '$nome')";

    		$query = $this->db->query($insert_sql);
	}
}

?>

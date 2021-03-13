<?php



class Conexao {

	private $host = 'sql312.epizy.com';
	private $dbname = 'epiz_28053525_voluntariese';
	private $user = 'epiz_28053525';
	private $pass = 'rctDbFUOTpkklc';

	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"				
			);

			return $conexao;


		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}


?>
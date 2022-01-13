<?php 
require "Model.php";
/*
* classe para buscar e tratar os dados referente aos movimentos
*/

class MMovimento extends Model
{
	/*
	* constroi a conexão com o banco de dados, utilizando o database tecnodb.
	*/
	function __construct()
	{
		parent::__construct('tecnodb');
	}
	/*
	* Busca os movimentos pelo id, caso o id seja 0, retorna todos os movimentos
	*/
	public function buscarMovimentos($idMovimento = 0)
	{
		$query = "
		SELECT 
			m.id as id_movimento,
		    m.name as nome_movimento	   
		FROM movement AS m		
		WHERE
			(m.id = :idMovimento
			OR
			0 = :idMovimento)
		";
		$statment = $this->prepare($query);
		$statment->bindParam(':idMovimento', $idMovimento);
		
		$statment->execute();
		return $statment->fetchAll(PDO::FETCH_CLASS);
	}
	/*
	* busca os recordes pessoais de um determinado movimento
	*/
	public function buscarRecordesMovimento($idMovimento = 0)
	{
		$query = "
			SELECT 
        	(RANK() OVER (PARTITION BY u.id ORDER BY p.value DESC)) as ranking_pessoal,
            (RANK() OVER (PARTITION BY p.movement_id ORDER BY p.value DESC)) as ranking,
		    u.name as nome_usuario,
		    u.id as id_usuario,
		    p.value as valor_recorde,
		    p.date as data_recorde
		FROM personal_record AS p
			INNER JOIN user AS u ON p.user_id = u.id
         WHERE
			p.movement_id = :idMovimento		
		";
		$statment = $this->prepare($query);
		$statment->bindParam(':idMovimento', $idMovimento);
		
		$statment->execute();
		return $statment->fetchAll(PDO::FETCH_CLASS);
	}

	/*
	* busca o id de um movimento a partir do nome
	*/

	public function buscarIdMovimento($nomeMovimento){
		$query = "
		SELECT 
			m.id 
		FROM 
			movement m
		WHERE
			m.name LIKE :nomeMovimento
		";
		$nomeMovimento = "%".$nomeMovimento."%";
		$statment = $this->prepare($query);
		$statment->bindParam(':nomeMovimento', $nomeMovimento);
		
		$statment->execute();
		return $statment->fetchColumn();
	}
}
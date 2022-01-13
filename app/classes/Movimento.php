<?php 
/*
* classe para tratar os dados referente aos movimentos
*/
class Movimento
{
	/*
	* Função para buscar os Recordes pessoais de um ou mais movimentos
	@param: $argumentos: array com os parametros do controller CMovimento
	@return: array de objetos
	*/
	public static function buscarRecordesMovimento($argumentos){
		try{
			$idMovimento = self::tratarParam($argumentos);
			$mM = new MMovimento();
			/*
			* pesquisa os movimentos no banco
			*/
			$mov = $mM->buscarMovimentos($idMovimento);
			$ret = array();
			foreach($mov as $movimento){
				/*
				* prepara o objeto de retorno
				*/
				$ret[$movimento->id_movimento] = array(
					'movimento' => $movimento->nome_movimento,
					'usuarios' => array()
				);

				$recordes = $mM->buscarRecordesMovimento($movimento->id_movimento);
				/*
				* Filtrar apenas as melhores marcas pessoais
				*/
				$filtro = array_filter($recordes, (fn ($r) => $r->ranking_pessoal === 1 ));
				/*
				* Reinicia o índice do array de usuários para ficar mais amigável
				*/
				foreach ($filtro as $f){
					$ret[$movimento->id_movimento]['usuarios'][] = $f;
				}

			}
			return $ret;
		}catch (Exception $e) {
			throw $e;
		}
	}
	
	/*
	* Função para tratar os argumentos
	@param: $param: array com os parametros do controller CMovimento
	@return: id do Movimento no banco de dados, ou 0 para trazer todos
	*/
	public static function tratarParam($param){
		$ret = 0;
		if (isset($param['nome']) && !empty($param['nome'])) {
			
			$model = new MMovimento();
			$ret = $model->buscarIdMovimento($param['nome']);
			if (!$ret) {
				throw new Exception("Nenhum Movimento encontrado", 1);	
			}
		}

		return $ret;
	}

}
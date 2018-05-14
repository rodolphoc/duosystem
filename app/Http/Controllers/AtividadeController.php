<?php

/**
 * Classe controladora dos recursos da Aplicação de atividades.
 *
 * @filesource  ./app/controllers/AtividadeController.php
 * @category    Controllers
 * @author      Rodolpho Carvakgi <rodolphoc@gmail.com>
 * @copyright   2018 Rodox
 */

class AtividadeController extends BaseController
{
    /**
     * O layout que deve ser usado nas respostas.
     */
    protected $layout = 'layouts.main';


	/**
	 * Exibe a lista de atividades cadastrados.
	 *
	 * @return Response
	 */
	public function index()
	{
         $this->layout->content = View::make('index', ['']);
	}
}
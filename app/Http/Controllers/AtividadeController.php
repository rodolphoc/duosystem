<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class AtividadeController extends Controller
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

		$sql = "select 
					atv.id,
					status.id_status,
					status.descricao status_descricao,
					atv.nome,
					atv.descricao,
					atv.data_inicio,
					atv.data_fim,
					atv.situacao		
				from
					atividades atv
				inner join status on 
					atv.id_status = status.id_status
				where 1=1
				order by 1 asc";

		$result = DB::select($sql);
		//print json_encode($result);
        return view('index', ['atividades'=>json_encode($result)]);

	}

	public function edit(Request $request)
	{
		$data = [];
		if(!empty($request->route('id'))){
			$sql_edit 	= "select 
						atv.id,
						status.id_status as id_status,
						status.descricao status_descricao,
						atv.nome,
						atv.descricao,
						atv.data_inicio,
						atv.data_fim,
						atv.situacao		
					from
						atividades atv
					inner join status on 
						atv.id_status = status.id_status
					where 1=1
					and atv.id = {$request->route('id')}
					order by 1 asc";
			$result_edit = DB::select($sql_edit);

			if(count($result_edit)>0){
				$result_edit[0]->data_inicio =  substr($result_edit[0]->data_inicio, 8, 10).'/'.substr($result_edit[0]->data_inicio, 5, 2).'/'.substr($result_edit[0]->data_inicio, 0, 4);
				$result_edit[0]->data_fim =  substr($result_edit[0]->data_fim, 8, 10).'/'.substr($result_edit[0]->data_fim, 5, 2).'/'.substr($result_edit[0]->data_fim, 0, 4);
			}

			$data = $result_edit[0];
		}

		$sql    	 = "select id_status, descricao from status order by 1 asc";
		$result 	 = DB::select($sql);

        return view('edit', ['status'=>$result, 'data'=>$data, 'id'=>$request->route('id')]);

	}

	public function save(Request $request){

		$dados 			= $request->all();
		$data_inicio	= substr($dados['data_inicio'], 6, 9).'-'.substr($dados['data_inicio'], 3, 2).'-'.substr($dados['data_inicio'], 0, 2);
		$data_fim		= substr($dados['data_fim'], 6, 9).'-'.substr($dados['data_fim'], 3, 2).'-'.substr($dados['data_fim'], 0, 2);
		$ativo 			= isset($dados['ativo']) ? 1 : 0;
		if($dados['id'] == ''){
			$sql = "insert into 
						atividades (
							id_status,
							nome,
							descricao,
							data_inicio,
							data_fim,
							situacao
						) values (
							'{$dados['status']}',
							'{$dados['nome']}',
							'{$dados['descricao']}',
							'{$data_inicio}',
							'{$data_fim}',
							'{$ativo}'
						)";

			DB::insert($sql);			
		}else{
			$sql = "update 
						atividades
					set
						id_status 	= '{$dados['status']}',
						nome 		= '{$dados['nome']}',
						descricao 	= '{$dados['descricao']}',
						data_inicio	= '{$data_inicio}',
						data_fim	= '{$data_fim}',
						situacao	= '{$ativo}'
					where
						id = '{$dados['id']}'";

			DB::update($sql);			
		}

		return redirect('/');

	}
}
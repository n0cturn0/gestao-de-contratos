<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoPeriodo;
use App\Models\ContratoSituacao;
use App\Models\Servico;
use App\Models\Vendedor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;


class HomeController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

//    public function produto()
//    {
//        $message = 'Produto cadastrados';
//        return view('produto', ['message' => $message]);
//    }

//    public function cadastro()
//    {
//
//        return view('produto.cadastro');
//    }
    public function servico()
    {
        return view('servico.index');
    }
    public function produto()
    {
        return view('produto.index');
    }

    public function cliente()
    {
        return view('cliente.index');
    }

    public function vendedor()
    {
        return view('vendedor.index');
    }

    public function grupo()
    {
        return view('grupo.index');
    }
    public function contrato()
    {
        $cliente = DB::table('clientes')->get();
        return view('contrato.index', ['data' => $cliente]);
    }

    public function cadastrocontrato(Request $request)
    {
        $contrato = new Contrato;
        $situacao = new ContratoSituacao;

       if ($this->validate($request, [
            'cliente' => 'required|integer|min:1',
            'produto'   => 'required|integer|min:1',
        ])){
            $contrato->idCliente = $request['cliente'];
            $contrato->idProduto = $request['produto'];
            $contrato->observacao = $request->input('observacao');
            $contrato->save();
       }
       $last = Contrato::latest()->limit(1)->get();
       foreach ($last as $key)
       {
          $situacao->idcontrato =  $key->id ;
          $situacao->situacao = 0;
           $situacao->controle = 0;
          $situacao->save();
           return redirect()->route('lista-contrato');

       }

    }

    public function listacontrato()
    {
//        $items = DB::table('contratos')
//            ->join('contrato_periodos','id', '=', 'idsituacao')
        return view('contrato.lista');
    }
    public function situacaocontrato($id="NULL")
    {

        $items = DB::table('contratos')
            ->join('clientes','idCliente', '=', 'clientes.id')
            ->join ('produtos', 'idProduto', '=', 'produtos.id')
            ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
            ->where('contratos.id', $id)
            ->where('controle', '=', 0)
            ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao')
            ->paginate(10);


        return view('contrato.situacao', ['students' => $items]);
    }

    public function atualizastatuscontrato(Request $request)
    {
        $atualiza = DB::table('contrato_situacaos')
            ->where('idcontrato', '=', $request->input('id'))
            ->where('controle', '=', 0)->get();
        foreach ($atualiza as $atual)
            {
                $affected = DB::table('contrato_situacaos')
                    ->where('id', '=',$atual->id )
                    ->update(['controle' => 1]);
            }

        $situacao = new ContratoSituacao;
        $situacao->idcontrato = $request->input('id');
        $situacao->controle =0;
        $situacao->situacao = $request->input('identificador');
        if ($situacao->save())
        {
            return redirect()->route('lista-contrato');
        }
    }

    public function configuracontrato($id="null")
    {



        //Diferente de 0 ja existe configurações feitas
        $contador = ContratoPeriodo::where('idsituacao', '=', $id)->count();
        $contrato = ContratoPeriodo::where('idsituacao', '=', $id)->get();

        $vendedores = DB::table('vendedors')->get();
        $data = array(
            'id'            => $id,
            'vendedores'    => $vendedores,
            'configura'     => $contador,
            'contrato'      => $contrato

        );
        return view('contrato.configura',['data' => $data]);
    }

    public function insereconfiguracao(Request $request)
    {

//        $this->validate($request,[
//            'vendedor' => 'required',
//
//        ]);

        $datas      = $request->master;
        $inicial    = substr($datas, 0,10);
        $final      = substr($datas, 12,19);
        $s_final = date('Y-m-d', strtotime($final));
        $s_inicial =date('Y-m-d', strtotime($inicial));
        $_reajuste = date('Y-m-d', strtotime($request->daterange));


        $save = ContratoPeriodo::insert([
            'idsituacao'    => $request->id,
            'idvendedor'       =>$request->vendedor,
            'datafinal'     => $s_final,
            'datainicial'   => $s_inicial,
            'datareajuste'  => $_reajuste,
            'valorreajuste'    => $request->valorreajuste,
//            'reajuste'      => $request->reajuste,
//            'qtdparcela'    => $request->parcela,
            'diavencimento' => $request->vencimento,
//            'valormensalidade'  => $request->valor
        ]);


    }

    public function atualizacontratoconfiguraca(Request $request)
    {


        $datas      = $request->master;
        $inicial    = substr($datas, 0,10);
        $final      = substr($datas, 12,19);
        $s_final = date('Y-m-d', strtotime($final));
        $s_inicial =date('Y-m-d', strtotime($inicial));
        $_reajuste = date('Y-m-d', strtotime($request->daterange));

       if  ($affected = DB::table('contrato_periodos')
            ->where('idsituacao',$request->id)
            ->update([
                'idvendedor'       =>$request->vendedor,
                'datafinal'     => $s_final,
                'datainicial'   => $s_inicial,
                'datareajuste'  => $_reajuste,
//                'reajuste'      => $request->reajuste,
                'valorreajuste'    => $request->valorreajuste,
                'diavencimento' => $request->vencimento,
//                'valormensalidade'  => $request->valor
            ])){
           return redirect('lista-contrato');
       }


    }

    public function adicionaservico($id='NULL')
    {
        $items = DB::table('contratos')
            ->join('clientes','idCliente', '=', 'clientes.id')
            ->join ('produtos', 'idProduto', '=', 'produtos.id')
            ->join('contrato_situacaos','idcontrato','=', 'contratos.id' )
            ->where('contratos.id', $id)
            ->where('controle', '=', 0)
            ->select('contratos.*', 'produtos.produto', 'clientes.cliente', 'contrato_situacaos.situacao')->get();

        $inseridos = DB::table('contrato_composicao_final')
            ->join('vendedors', 'vendedors.id', '=', 'vendedorid')
            ->join('servicos', 'servicos.id', '=', 'idativo')
//            ->join('contrato_ccontrole_valores', 'contrato_ccontrole_valores.idcomposicao', '=', 'contrato_composicao_final.idsituacao')
            ->where('contrato_composicao_final.idsituacao', '=', $id)

            ->select('vendedors.vendedor',
                            'servicos.servico',
                            'contrato_composicao_final.valorparcela',
                            'contrato_composicao_final.pagamento',
                            'contrato_composicao_final.mesvencimento',
                            'contrato_composicao_final.id')->get();


            $data = [
                'servicos'  =>  DB::table('servicos')->get(),
                'id'        => $id,
                'vendedores'    => DB::table('vendedors')->get(),
                'contrato'  => $items,
                'inseridos' => $inseridos,
            ];
            return view('contrato.insere-servico',['data' =>$data]);

    }

    public function adicionaativo(Request $request)
    {
        $validatedData = $request->validate([
            'qtdparcela' => 'required|integer|min:1',
//            'valorreajuste' => 'required|integer|min:1',
            'servico' => 'required',
            'vendedor' => 'required',
            'daterangeprimeira' => 'required',


        ],[
            'vendedor.required' => 'É preciso Selecionar um vendedor',
            'servico.required'  => 'É preciso selecionar um serviço',
            'daterangeprimeira.required' => 'Preciso adicionar uma data para a primeira cobrança',
//            'valorreajuste.required' => 'Entre com o valor para o reajuste'
        ]);

            $ValorServico = DB::table('servicos')
                ->where('id', '=', $request->input('servico'))
                ->get();
            foreach ($ValorServico as $key => $value)
            {
                $precounitario =  $value->precounitario;
            }
            $parcial = floatval($precounitario);
            $parcela = $request->input('qtdparcela');
            $ValParcela = ($parcial/$parcela);
            $ValParcelaFloat =floatval($ValParcela);
            //Form
            $id =   $request->input('id');
            $vendedor = $request->input('vendedor');
            $idservico = $request->input('servico');
            //Pegar Data final do contrato
            $DataFinalContrato = DB::table('contrato_periodos')
                ->where('idsituacao','=',$id)
                ->get();
            foreach ($DataFinalContrato as $key => $value)
            {
                $DataFinalContrato=$value->datafinal;
            }
            //Data da primeira cobrança
            $DataPrimeiraCobranca = $request->input('daterangeprimeira');

            $mes = substr($DataPrimeiraCobranca,0,2);
            $dia = substr($DataPrimeiraCobranca,3,2);
            $ano = substr($DataPrimeiraCobranca,6,4);
            $DataCompleta = $ano.'-'.$dia.'-'.$mes;

//            $DataPrimeiraCobrancaForm = Carbon::createFromFormat('Y-m-d H', $DataCompleta)->toDateTimeString();
            $DataPrimeiraCobrancaForm = Carbon::createFromFormat('Y-m-d', $DataCompleta)->format('Y-m-d');

            $AnoPrimeiraCobranca = Carbon::createFromFormat('Y-m-d', $DataPrimeiraCobrancaForm)->format('Y');

//            $AnoPrimeiraCobranca = Carbon::createFromFormat('m/d/Y', $DataPrimeiraCobranca)->format('Y');


            $Inicio = new Carbon($DataPrimeiraCobrancaForm);

            $Fim    = new Carbon($DataFinalContrato);


//            echo 'Data da primeira mensalidade ' . $Inicio . '<br>';
//            echo 'Data Final Contrato da base da dados' . $Fim . '<br>';
            $diff = $Fim->diff($Inicio);
            if($diff->y != 0)
            {
                $ContaMes = (($diff->y * 12)+ $diff->m);
            }

            for ($x =1; $x<=$parcela;$x++) {
            $createInsert[] = [
                'id' => $id,
                'diavencimento' => $dia,
                'mesvencimento' => $mes .'/' .$AnoPrimeiraCobranca,
                'valor' => $ValParcelaFloat
            ];
            $mes++;
            if($mes==13){
                $AnoPrimeiraCobranca = ($AnoPrimeiraCobranca+1);
                $mes = 1;
            }
            }
            $ContArray = count($createInsert);
            $ContTrue = ($ContArray - 1);

            for ($x =0; $x<=$ContTrue;$x++){
            if(DB::table('contrato_composicao_final')->insert([
            'idsituacao'    => $createInsert[$x]['id'],
            'vendedorid'    => $vendedor,
            'tipo'          => 1,
            'idativo'       => $idservico,
            'valorparcela' => $createInsert[$x]['valor'],
            'diavencimento'    => $createInsert[$x]['diavencimento'],
            'mesvencimento'     => $createInsert[$x]['mesvencimento'],
            'pagamento'     => 0,
            'stateview' => 1
            ]));
            }
            unset($createInsert);
            //Captura ultimo id
            $last = DB::table('contrato_composicao_final')->orderBy('id', 'DESC')->first();
            {
                if(DB::table('contrato_ccontrole_valores')->insert([
                    'idcomposicao'  => $id,
                    'ultimoidcomposicaofinal' => $last->id,
                    'valorpago'     => 0,
                    'valortotal'    =>  $precounitario,
                    'stateview'     => 1
                ])){
                    return back()->with('success', 'Serviço adicionado ao contrato com sucesso.');
                }

            }
    }

    public function apagaservico($id='NULL')
    {
        if(DB::table('contrato_composicao_final')->where('id', '=', $id)->delete())
        {
            if(DB::table('contrato_ccontrole_valores')->where('ultimoidcomposicaofinal', '=', $id)->delete())
            {
                return back()->with('success', 'Serviço excluído desse contrato.');
            } else {
                return back()->with('alert', 'Algo deu errado.');
            }
        } else {
            return back()->with('alert', 'Algo deu errado.');
        }


    }

    public function rmaster()
    {
        $data1 = '2023-01-07 00:00:00';
        $data2 ='2026-11-08 00:00:00';
        $inicio =  new Carbon($data1);
        $fim =  new Carbon($data2);
        $diff = $inicio->diff($fim);
        echo 'Anos' . $diff->y . '<br>';
        echo 'Meses' . $diff->m . '<br>';
        $diff->y ; //Ano
        $diff->m; //Mês

        if($diff->y != 0)
        {
            $ContaMes = (($diff->y * 12)+ $diff->m);
        }
        echo 'Total de meses :' . $ContaMes;
        $MesEntrada =4;

        $contador =0 ;
        while($contador <=  $diff->y){
            for ($x =1; $x<=12;$x++){
            echo $contador . '--' . $x .'<br>';
            }
            $contador++;
        }




    }


}

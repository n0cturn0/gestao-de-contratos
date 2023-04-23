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
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Database\Query\Builder;


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
//           return redirect()->route('lista-contrato');
           return redirect('insere'.$key->id);
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
        $contratoPeriodos = DB::table('contrato_periodos')
            ->where('idsituacao', '=', $id)->count();
        if ($contratoPeriodos == 0){
            return view('contrato.incompleto')->with('alert', 'Este Contrato precisa ser configurado, data inicial e final.');
        }

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
                            'contrato_composicao_final.idsituacao',
                            'contrato_composicao_final.pagamento',
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
    public function processcontratofull(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['diavencimento'] as $key => $value) {
                if (!empty($value)) {
                    foreach ($value as $k => $v) {
                        $affected = DB::table('contrato_composicao_final')
                            ->where('id', $k)
                            ->update(['diavencimento' => $v]);
                    }
                }
            }
            if (!empty($data['checkpagm'])) {
                $chbox = array();
                $chbox = $data['checkpagm'];
            }
            if (!empty($data['valorparcela'])) {
                $ValParcela = array();
                $ValParcela = $data['valorparcela'];
            }

            foreach ($chbox as $valor) {
                foreach ($valor as $chave => $valor2) {
                    $nchbox[$chave] = $valor2;
                }
            }
            foreach ($ValParcela as $valor) {
                foreach ($valor as $chave => $valor2) {
                    $nValParcela[$chave] = $valor2;
                }
            }

            $composto = array();
            $composto = (array_intersect_key($nValParcela, $nchbox));
            foreach ($composto as $key => $value) {
                // Obtém a coleção de registros correspondentes à chave $key
                DB::table('contrato_ccontrole_valores')
                    ->where('idstatus', $key)
                    ->update(['valorpago' => $value]);
            }
            if (!empty($data['checkpagm'])) {
                foreach ($data['checkpagm'] as $key => $value) {
                    if (!empty($value)) {
                        foreach ($value as $k => $v) {
                            $affected = DB::table('contrato_composicao_final')
                                ->where('id', $k)
                                ->update(['pagamento' => 1]);
                        }
                    }
                }
            }



            foreach ($data['pgtvendedor'] as $key => $value) {
                if (!empty($value)) {
                    foreach ($value as $k => $v) {
                        $affected = DB::table('contrato_composicao_final')
                            ->where('id', $k)
                            ->update(['ivalorcomissao' => $v]);
                    }
                }

            }

            if (!empty($data['checkboleto'])) {
                foreach ($data['checkboleto'] as $key => $value) {
                    if (!empty($value)) {
                        foreach ($value as $k => $v) {
                            $affected = DB::table('contrato_composicao_final')
                                ->where('id', $k)
                                ->update(['boleto' => 1]);
                        }
                    }
                }
            }

            if (!empty($data['vendedor'])) {
                foreach ($data['vendedor'] as $key => $value) {
                    if (!empty($value)) {
                        foreach ($value as $k => $v) {
                            $affected = DB::table('contrato_composicao_final')
                                ->where('id', $k)
                                ->update(['vendedorid' => $v]);
                        }
                    }
                }
            }

            return back()->with('success', 'Valor baixado com sucesso.');
        } else {
            dd('Algo deu errado');
        }
    }

    public function adicionaativo(Request $request)
    {
        $validatedData = $request->validate([
            'qtdparcela' => 'required|integer|min:1',
            'valservico' => 'required|integer|min:1',
            'servico' => 'required',
            'vendedor' => 'required',
            'daterangeprimeira' => 'required',
            'parcelavendedor' => 'required|integer|min:1',
            'valorvendedor' => 'required|min:1',


        ], [
            'vendedor.required' => 'É preciso Selecionar um vendedor',
            'servico.required' => 'É preciso selecionar um serviço',
            'valservico.required' => 'Verifique o valor desse serviço',
            'daterangeprimeira.required' => 'Preciso adicionar uma data para a primeira cobrança',
            'qtdparcela' => 'É necessário informar a  quantidade de parcela',
            'parcelavendedor' => 'É necessário informar a  quantidade de parcela para o vendedor',
            'valorvendedor' => 'É necessário entrar com um valor para calcular a comissão,'

        ]);

        $ValorServico = DB::table('servicos')
            ->where('id', '=', $request->input('servico'))
            ->get();

        $parcial = floatval($request->input('valservico'));
        $parcela = $request->input('qtdparcela');
        $ValParcela = ($parcial / $parcela);
        $ValParcelaFloat = floatval($ValParcela);
        $porcentagemComissao = floatval($request->input('valorvendedor'));
        //Form
        $vendedor = $request->input('vendedor');
        $idservico = $request->input('servico');
        //Pegar Data final do contrato
        $id = $request->input('id');
        if ($request->input('qtdparcela') < $request->input('parcelavendedor')) {
            return back()->with('alert', 'Quantidade da parcela é menor que a quantidade de parcela que o vendedor tem para receber.');
        } else {
            $diferencaMeses = ($request->input('qtdparcela') - $request->input('parcelavendedor'));
            $parcelaParaVendedor = $request->input('parcelavendedor');
        }


        $DataFinalContrato = DB::table('contrato_periodos')
            ->where('idsituacao', '=', $id)
            ->get();

        foreach ($DataFinalContrato as $key => $value) {
            $final = $value->datafinal;
        }
        //Data da primeira cobrança
        $DataPrimeiraCobranca = $request->input('daterangeprimeira');

        $dia = substr($DataPrimeiraCobranca, 0, 2);
        $mes = substr($DataPrimeiraCobranca, 3, 2);
        $ano = substr($DataPrimeiraCobranca, 6, 4);
        $DataCompleta = $dia.'/'.$mes.'/'.$ano;

        $DataPrimeiraCobrancaForm = Carbon::createFromFormat('d/m/Y', $DataCompleta);
        if($DataPrimeiraCobrancaForm->format('d/m/Y') !== $DataCompleta){
            echo 'Algo deu errado, contate o administrador do sistema';
            die();
        } else {
            $AnoPrimeiraCobranca = $DataPrimeiraCobrancaForm->year;
        }

        $inicio = new Carbon($DataPrimeiraCobrancaForm);
        $Fim = new Carbon($final);

        $diff = $Fim->diff($inicio);
        if ($diff->y != 0) {
            $ContaMes = (($diff->y * 12) + $diff->m);
        }
        //Calculando a comissão
        $comissao = ($ValParcelaFloat * $porcentagemComissao) / 100;
        $lucroReal = ($ValParcela - $comissao);

        $dt = Carbon::parse($DataPrimeiraCobrancaForm);

        if ($diferencaMeses==0) {
            for ($x = 1; $x <= $request->input('qtdparcela'); $x++) {
                $createInsert[] = [
                    'id' => $id,
                    'indicecomissao' => $porcentagemComissao,
                    'ivalorcomissao' => $comissao,
                    'diavencimento' => $dia,
                    'mesvencimento' => $mes . '/' . $AnoPrimeiraCobranca,
                    'valor' => $ValParcelaFloat,
                    'saldoreal' => $lucroReal,
                ];
                $mes++;
                if ($mes == 13) {
                    $AnoPrimeiraCobranca++;
                    $mes = 1;
                }
            }

            $ContArray = count($createInsert);
            $ContTrue = ($ContArray - 1);





            for ($x = 0; $x <= $ContTrue; $x++) {
            if($x === 0) {
                if (DB::table('contrato_composicao_final')->insert([
                    'idsituacao' => $createInsert[$x]['id'],
                    'vendedorid' => 1,
                    'tipo' => 1,
                    'idativo' => $idservico,
                    'indicecomissao' => $createInsert[$x]['indicecomissao'],
                    'ivalorcomissao' => $createInsert[$x]['ivalorcomissao'],
                    'valorparcela' => $createInsert[$x]['valor'],
                    'diavencimento' => $createInsert[$x]['diavencimento'],
                    'mesvencimento' => $createInsert[$x]['mesvencimento'],
                    'datacontrole' => $DataPrimeiraCobrancaForm,
                    'pagamento' => 0,
                    'stateview' => 1,
                    'saldoreal' => $lucroReal,
                ])) ;

            } else {
                if($x != 0) {
                    if (DB::table('contrato_composicao_final')->insert([
                        'idsituacao' => $createInsert[$x]['id'],
                        'vendedorid' => 1,
                        'tipo' => 1,
                        'idativo' => $idservico,
                        'indicecomissao' => $createInsert[$x]['indicecomissao'],
                        'ivalorcomissao' => $createInsert[$x]['ivalorcomissao'],
                        'valorparcela' => $createInsert[$x]['valor'],
                        'diavencimento' => $createInsert[$x]['diavencimento'],
                        'mesvencimento' => $createInsert[$x]['mesvencimento'],
                        'datacontrole' => $DataPrimeiraCobrancaForm->month($DataPrimeiraCobrancaForm->month + 1),
                        'pagamento' => 0,
                        'stateview' => 1,
                        'saldoreal' => $lucroReal,
                    ])) ;
                }
            }
            }
           unset($createInsert);
            $ValorServico = DB::table('contrato_composicao_final')
                ->where('idsituacao', '=', $id)
                ->get();
            foreach($ValorServico as $key => $value)
            {
                if (DB::table('contrato_ccontrole_valores')->insert([
                    'idcomposicao' => $id,
                    'idstatus' => $value->id,
                    'valorpago' => 0,
                    'valortotal' => $request->input('valservico'),
                    'stateview' => 1
                ])) ;
            }
            return back()->with('success', 'Serviço adicionado ao contrato com sucesso.');

        } else {

            for ($x = 1; $x <= $diferencaMeses; $x++) {
                $createInsert[] = [
                    'id' => $id,
                    'indicecomissao' => $porcentagemComissao,
                    'ivalorcomissao' => $comissao,
                    'diavencimento' => $dia,
                    'mesvencimento' => $mes . '/' . $AnoPrimeiraCobranca,
                    'valor' => $ValParcelaFloat,
                    'saldoreal' => $lucroReal,
                ];
                $mes++;
                if ($mes == 13) {
                    $AnoPrimeiraCobranca++;
                    $mes = 1;
                }
            }
            $ContArray = count($createInsert);
            $ContTrue = ($ContArray - 1);

            for ($x = 0; $x <= $ContTrue; $x++) {
                if($x == 0) {
                    if (DB::table('contrato_composicao_final')->insert([
                        'idsituacao' => $createInsert[$x]['id'],
                        'vendedorid' => 1,
                        'tipo' => 1,
                        'idativo' => $idservico,
                        'indicecomissao' => $createInsert[$x]['indicecomissao'],
                        'ivalorcomissao' => $createInsert[$x]['ivalorcomissao'],
                        'valorparcela' => $createInsert[$x]['valor'],
                        'diavencimento' => $createInsert[$x]['diavencimento'],
                        'mesvencimento' => $createInsert[$x]['mesvencimento'],
                        'datacontrole' => $DataPrimeiraCobrancaForm,
                        'pagamento' => 0,
                        'stateview' => 1,
                        'saldoreal' => $lucroReal,
                    ])) ;

                } else {
                    if($x != 0){
                        if (DB::table('contrato_composicao_final')->insert([
                            'idsituacao' => $createInsert[$x]['id'],
                            'vendedorid' => 1,
                            'tipo' => 1,
                            'idativo' => $idservico,
                            'indicecomissao' => $createInsert[$x]['indicecomissao'],
                            'ivalorcomissao' => $createInsert[$x]['ivalorcomissao'],
                            'valorparcela' => $createInsert[$x]['valor'],
                            'diavencimento' => $createInsert[$x]['diavencimento'],
                            'mesvencimento' => $createInsert[$x]['mesvencimento'],
                            'datacontrole' => $DataPrimeiraCobrancaForm->month($DataPrimeiraCobrancaForm->month + 1),
                            'pagamento' => 0,
                            'stateview' => 1,
                            'saldoreal' => $lucroReal,
                        ])) ;
                    }

                }

            }

            for ($x = 1; $x <= $parcelaParaVendedor; $x++) {
                $createInsertVend[] = [
                    'id' => $id,
                    'indicecomissao' => $porcentagemComissao,
                    'ivalorcomissao' => $comissao,
                    'diavencimento' => $dia,
                    'mesvencimento' => $mes . '/' . $AnoPrimeiraCobranca,
                    'mesvendedor'   => Carbon::parse($DataPrimeiraCobrancaForm)->addMonths($x),
                    'valor' => $ValParcelaFloat,
                    'saldoreal' => $lucroReal,
                ];
                $mes++;
                if ($mes == 13) {
                    $AnoPrimeiraCobranca++;
                    $mes = 1;
                }
            }

            $ContArrayVend = count($createInsertVend);
            $ContTrueVend = ($ContArrayVend - 1);
            for ($x = 0; $x <= $ContTrueVend; $x++) {

                    DB::table('contrato_composicao_final')->insert([
                        'idsituacao' => $createInsertVend[$x]['id'],
                        'vendedorid' => $vendedor,
                        'tipo' => 1,
                        'idativo' => $idservico,
                        'indicecomissao' => $createInsertVend[$x]['indicecomissao'],
                        'ivalorcomissao' => $createInsertVend[$x]['ivalorcomissao'],
                        'valorparcela' => $createInsertVend[$x]['valor'],
                        'diavencimento' => $createInsertVend[$x]['diavencimento'],
                        'mesvencimento' => $createInsertVend[$x]['mesvencimento'],
                        'datacontrole' => $createInsertVend[$x]['mesvendedor'],
                        'pagamento' => 0,
                        'stateview' => 1,
                        'saldoreal' => $lucroReal,
                    ]) ;


            }
            $ValorServico = DB::table('contrato_composicao_final')
                ->where('idsituacao', '=', $id)
                ->get();
            foreach($ValorServico as $key => $value) {
                if (DB::table('contrato_ccontrole_valores')->insert([
                    'idcomposicao' => $id,
                    'idstatus' => $value->id,
                    'valorpago' => 0,
                    'valortotal' => $request->input('valservico'),
                    'stateview' => 1
                ]));
            }
            return back()->with('success', 'Serviço adicionado ao contrato com sucesso.');
            }
        }


    public function editacontrato($id='NULL'){
        $inseridos = DB::table('contrato_composicao_final')
            ->join('vendedors', 'vendedors.id', '=', 'vendedorid')
            ->join('servicos', 'servicos.id', '=', 'idativo')
//            ->join('contrato_ccontrole_valores', 'contrato_ccontrole_valores.idcomposicao', '=', 'contrato_composicao_final.idsituacao')
            ->where('contrato_composicao_final.id', '=', $id)
            ->select('vendedors.vendedor',
            'servicos.servico',
            'vendedors.vendedor',
            'contrato_composicao_final.valorparcela',
            'contrato_composicao_final.pagamento',
            'contrato_composicao_final.mesvencimento',
            'contrato_composicao_final.ivalorcomissao',
            'contrato_composicao_final.id')->get();
        $vendedor = DB::table('vendedors')->get();



            return view('contrato.editacontrato', ['inserido' => $inseridos],['vendedores' => $vendedor]);
    }

    public function alteravendedor($id=null){
    return view('vendedor.alteravendedor', ['vendedor' => $vendedor = DB::table('vendedors')->get()], ['id' => $id]);
    }

    public function updatevendedor(Request $request)
    {
        if($affected = DB::table('contrato_composicao_final')
            ->where('id', $request->input('id'))
            ->update(
            [
            'vendedorid'        => $request->input('vendedor'),
            ])){
            $vendedor = DB::table('contrato_composicao_final')
            ->where('id', '=',  $request->input('id'))
            ->first();
            return redirect()->route('insere-servico', ['id' => $vendedor->idsituacao]);
                }
    }
    public function editacontratofull($id='Null'){
        $inseridos = DB::table('contrato_composicao_final')
            ->join('vendedors', 'vendedors.id', '=', 'vendedorid')
            ->join('servicos', 'servicos.id', '=', 'idativo')
//            ->join('contrato_ccontrole_valores', 'contrato_ccontrole_valores.idcomposicao', '=', 'contrato_composicao_final.idsituacao')
            ->where('contrato_composicao_final.idsituacao', '=', $id)
            ->select('vendedors.vendedor',
                'vendedors.id AS idvendedor',
                'servicos.servico',
                'contrato_composicao_final.diavencimento',
                'contrato_composicao_final.valorparcela',
                'contrato_composicao_final.pagamento',
                'contrato_composicao_final.saldoreal',
                'contrato_composicao_final.indicecomissao',
                'contrato_composicao_final.mesvencimento',
                'contrato_composicao_final.ivalorcomissao',
                'contrato_composicao_final.indicecomissao',
                'contrato_composicao_final.boleto',
                'contrato_composicao_final.id')->get();
        $vendedor = DB::table('vendedors')->get();

        return view('contrato.contratofull',['inserido' => $inseridos],['vendedores' => $vendedor]);



    }

    public function apagaservico($id='NULL')
    {
        if(DB::table('contrato_composicao_final')->where('id', '=', $id)->delete())
        {
            if(DB::table('contrato_ccontrole_valores')->where('idstatus', '=', $id)->delete())
            {
                return back()->with('success', 'Serviço excluído desse contrato.');
            } else {
                return back()->with('alert', 'Mensalidade apagada.');
            }
        } else {
            return back()->with('alert', 'Mensalidade apagada.');
        }


    }
    public function atualizaedicao(Request $request)
    {

       if  ($affected = DB::table('contrato_composicao_final')
            ->where('id', $request->input('id'))
            ->update(
                [
                'vendedorid'        => $request->input('vendedor'),
                'valorparcela'      => $request->input('valparcela'),
                'ivalorcomissao'    => $request->input('qtdparcela')
                ])){
           return redirect()->route('edita-contrato', ['id' => $request->input('id')])->with('success', 'Atualizado com sucesso.');

       }
    }

    public function impressaosimples($id='Null'){
        $contratoPeriodos = DB::table('contrato_periodos')
            ->where('idsituacao', '=', $id)->count();
        if ($contratoPeriodos == 0){
            return view('contrato.incompleto')->with('alert', 'Este Contrato precisa ser configurado, data inicial e final.');
        }

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
                'contrato_composicao_final.idsituacao',
                'contrato_composicao_final.pagamento',
                'contrato_composicao_final.id')->get();

                $vend = DB::table('vendedors')->get();
//        $data = [
//            'servicos'  =>  DB::table('servicos')->get(),
//            'vendedores'    => DB::table('vendedors')->get(),
//            'contrato'  => $items,
//            'inseridos' => $inseridos,
//        ];

//https://www.youtube.com/watch?v=u7PXHfzAqgA&ab_channel=CareerDevelopmentLab

        $pdf = PDF\Pdf::loadView( 'relatorio.impressaosimples', compact('vend','inseridos'));
        return $pdf->download('invloice.pdf');
    }

    public function relatorio()
    {
        $vendedores = DB::table('vendedors')->get();
        return view('relatorio.vendedor',['vendedor' => $vendedores]);
    }
    public function relvendedor(Request $request)
    {

        $vendedordata = $request->input('relatorio');


        $mes = substr($vendedordata, 0, 2);
        $dia = substr($vendedordata, 3, 2);
        $ano = substr($vendedordata, 6, 4);
        $dataInicialTemp = $ano . '-' . $dia . '-' . $mes;
        $DataInicial = Carbon::createFromFormat('Y-m-d', $dataInicialTemp)->format('Y-m-d');

        $mesf = substr($vendedordata,13,2);
        $diaf = substr($vendedordata,16,2);
        $anof = substr($vendedordata,19,4);
        $dataFinalTemp = $anof . '-' . $diaf . '-' . $mesf;
        $dataFinal   = Carbon::createFromFormat('Y-m-d', $dataFinalTemp)->format('Y-m-d');

        switch ($request->input('pagamemto')){
            case 0:

                $relvendedor = DB::table('contrato_composicao_final')
                ->whereBetween('datacontrole', [$DataInicial, $dataFinal])
                    ->where ([
                        ['vendedorid', '=', $request->input('vendedor')],
                        ['pagamento', '=', 0]
                    ])
                ->get();
            break;

            case 1:

                $relvendedor = DB::table('contrato_composicao_final')
                    ->where ([
                        ['vendedorid', '=', $request->input('vendedor')],
                        ['pagamento', '=', 1]
                    ])
                    ->get();
            break;
            case 2:
           $id =  $request->input('vendedor');

                $dataAtualFormatada = Carbon::now()->format('Y-m-d');
                        $relvendedor = DB::table('contrato_composicao_final')
//                            ->where('vendedorid', '=', $id)
                    ->where ('pagamento', '=', '0')

                            ->whereDate('datacontrole', '<', $dataAtualFormatada)
                            ->get();
                dd($relvendedor);
            break;


        }



//        $contador = count($relvendedor);
//        if($contador > 0){
//            dd($relvendedor);
//        } else {
//            dd('Não existe dados para exibir');
//        }


//        $AnoPrimeiraCobranca = Carbon::createFromFormat('Y-m-d', $DataPrimeiraCobrancaForm)->format('Y');

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

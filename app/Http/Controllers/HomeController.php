<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\ContratoPeriodo;
use App\Models\ContratoSituacao;
use App\Models\Vendedor;
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
          echo  'Decidir o redirect';

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
            'reajuste'      => $request->reajuste,
            'qtdparcela'    => $request->parcela,
            'diavencimento' => $request->vencimento,
            'valormensalidade'  => $request->valor
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

        $affected = DB::table('contrato_periodos')
            ->where('idsituacao',$request->id)
            ->update([
                'idvendedor'       =>$request->vendedor,
                'datafinal'     => $s_final,
                'datainicial'   => $s_inicial,
                'datareajuste'  => $_reajuste,
                'reajuste'      => $request->reajuste,
                'qtdparcela'    => $request->parcela,
                'diavencimento' => $request->vencimento,
                'valormensalidade'  => $request->valor
            ]);


    }

    public function adicionaservico($id='NULL')
    {

    }

    public function adicionaproduto($id='NULL')
    {

    }


}

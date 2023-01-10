<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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

       if ($this->validate($request, [
            'cliente' => 'required|integer|min:1',
            'produto'   => 'required|integer|min:1',
        ])){
            $contrato->idCliente = $request['cliente'];
            $contrato->idProduto = $request['produto'];
            $contrato->observacao = $request->input('observacao');
            $contrato->save();
       }

    }

    public function listacontrato()
    {
       dd('oi');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function produto()
    {
        $data = [
            'title' => 'Cadastrando um novo produto',
            'etiqueta' => 'Cadastro de produto'
        ];
        return view('produto', ['colection' => collect($data)]);
    }

   
}

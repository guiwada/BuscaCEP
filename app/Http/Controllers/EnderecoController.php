<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Endereco;


class EnderecoController extends Controller
{
    public function index()
    {
        //Pega toadas as linhas do bd e retorna uma collection
        $enderecos = Endereco::all();
        return view(view: 'listagem')->with(
        [
            'enderecos' => $enderecos,
        ]
        );
    }

    public function adicionar()
    {
        return view('busca');
    }
    

    public function buscar(Request $request)
    {
        $cep = $request->input('cep');
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/")->json();
    
        return view('adicionar')->with([
            'cep' => $cep,
            'logradouro' => $response['logradouro'] ?? null,
            'bairro' => $response['bairro'] ?? null,
            'cidade' => $response['localidade'] ?? null, 
            'estado' => $response['uf'] ?? null,
        ]);
    }
#Validar Request(Validar os dados do formulário)

public function salvar(SalvarRequest $request)
{
    // Cria um novo endereço com base nos dados da solicitação
    $endereco = Endereco::where('cep', $request->input('cep'))->first();

    if(!$endereco){
    $endereco = Endereco::create([
        'cep' => $request->input('cep'),
        'logradouro' => $request->input('logradouro'),
        'numero' => $request->input('numero'),
        'bairro' => $request->input('bairro'),
        'cidade' => $request->input('cidade'),
        'estado' => $request->input('estado'),
    ]);

    return redirect(to: '/')->withsucess('Endereço salvo com sucesso');
}

    return redirect(to: '/')->witherro('Endereço já existe, não é possível adicionar novamente');
}
}
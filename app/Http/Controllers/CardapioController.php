<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardapioController extends Controller
{

    private $cardapio;

    public function __construct(Cardapio $cardapio)
    {
        $this->cardapio = $cardapio;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all = $this->cardapio->all();

        return response()->json($all, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens', 'public');

        $item = $this->cardapio->create([
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'disponivel' => $request->disponivel,
       ]);

       return response()->json($item, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $search = $this->cardapio->find($id);

        if (!$search) {
            return response()->json(['mensagem' => 'produto não encontrado'], 404);
        }

        return response()->json($search,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = $this->cardapio->find($id);

        if (!$produto) {
            return response()->json(['mensagem' => 'produto não encontrado'], 404);
        }

        if ($request->file('imagem') != null) {
            Storage::disk('public')->delete($produto->imagem);
        }
            
        $imagem = $request->file('imagem');
        $imagem_urn = $imagem->store('imagens', 'public');

        $produto->nome = request()->nome;
        $produto->imagem = $imagem_urn;
        $produto->descricao = request()->descricao;
        $produto->preco = request()->preco;
        $produto->categoria = request()->categoria;
        $produto->disponivel = request()->disponivel;

        $produto->save();

        return response()->json(['mensagem' => 'atualizado com sucesso', $produto],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $destroy = $this->cardapio->find($id);

        if (!$destroy) {
            return response()->json(['mensagem' => 'produto não encontrado'], 404);
        }

        Storage::disk('public')->delete($destroy->imagem);
        $destroy->delete();

        return response()->json(['mensagem' => 'excluido com sucesso']);
    }
}

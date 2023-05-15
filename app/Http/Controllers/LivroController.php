<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (Livro::create($request->all())) {
            return response()->json([
                'mensage' => 'Livro cadastrado com sucesso.'
            ], 201);
        }
        return response()->json([
            'message' => 'Erro ao cadastrar o livro '
        ], 404);
        // return Livro::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $livro)
    {
        $livro = Livro::find($livro);

        if ($livro) {
            $response = [
                'livro' => $livro,
                'testamento' => $livro->testamento
            ];
            return $livro;
        }

        return response()->json([
            'mensage' => ' Erro ao pesquisar livro.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {
            $livro->update($request->all());

            return $livro;
        }

        return response()->json([
            'message' => 'Erro ao atualizar o livro.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $livro)
    {
        if (Livro::destroy($livro)) {
            return response()->json([
                'message' => 'Livro apagado com sucesso.'
            ]);
        }
        return response()->json([
            'message' => 'Falha ao deletar o livro'
        ], 404);
    }
}

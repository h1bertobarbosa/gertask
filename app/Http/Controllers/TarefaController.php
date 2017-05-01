<?php

namespace App\Http\Controllers;

use App\Tarefas;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tarefas = Tarefas::orderBy('ordem')->get();

        if($request->route()->getUri() == 'api/tarefa') {
            return response()->json($tarefas);
        }

        return view('tarefas.list', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefas.form', [
            'tarefa' => new Tarefas()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = Tarefas::create($request->all());

        return response()->json($result, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefa = Tarefas::find($id);

        if(!$tarefa) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        return response()->json($tarefa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarefas  $tarefas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefas $tarefas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarefa = Tarefas::find($id);

        if(!$tarefa) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        $tarefa->fill($request->all());
        $tarefa->save();

        return response()->json($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefas::find($id);

        if(!$tarefa) {
            return response()->json([
                'message'   => 'Registro não encontrado',
            ], 404);
        }

        if($tarefa->delete()) {
            return response()->json(['message' => 'Registro removido']);
        }
    }
}

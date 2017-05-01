<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{

    public function testCadastroDeTarefa()
    {
        $this->json('POST', '/api/tarefa', ['id' => 1,'titulo' => 'Test Case', 'descricao' => 'Descricao teste', 'ordem' => '1' ])
            ->seeJsonStructure([
                'id',
                'titulo',
                'descricao',
                'ordem',
                'created_at',
                'updated_at'
            ])->seeStatusCode(201);
    }

    public function testEdicaoDeTarefa()
    {
        $this->json('PUT', '/api/tarefa/1', ['titulo' => 'Test Case EDIT', 'descricao' => 'Descricao teste edit', 'ordem' => '2' ])
            ->seeJsonContains([
                'id' => 1,
                'titulo' => 'Test Case EDIT',
                'descricao' => 'Descricao teste edit',
                'ordem' => '2'
            ])->seeStatusCode(200);
    }

    public function testListagemApi()
    {
        $this->get('/api/tarefa')
            ->seeJsonStructure([
                '*' => [
                    'id',
                    'titulo',
                    'descricao',
                    'ordem',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function testDeleteTarefaApi()
    {
        $this->delete('/api/tarefa/1')
            ->seeJson([
                'message' => 'Registro removido',
            ])->seeStatusCode(200);
    }
}

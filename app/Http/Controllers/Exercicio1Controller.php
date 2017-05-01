<?php

namespace App\Http\Controllers;

use App\Exercicio1;
use Illuminate\Http\Request;

class Exercicio1Controller extends Controller
{
    public function index($numero)
    {
        if($numero < 1 || $numero > 100) {
            echo "Utilize um numero entre 1 e 100";
            exit;
        }

        $fizzBuzz = new Exercicio1($numero);
        $resultado = $fizzBuzz->gerarContagem();

        array_map(function($res) {
            echo $res.'<br/>';
        } ,$resultado);

    }
}

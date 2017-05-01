<?php

namespace App;

class Exercicio1
{
    private $contagem;

    public function __construct($contagem)
    {
        $this->contagem = $contagem;
    }

    public function gerarContagem()
    {
        $arr = $this->ajustaArrayComNumeros();

        $multiplos3e5 = $this->calculaMultiplosDe3e5($arr);
        $multiplos3 = $this->calculaMultiplosDe3($multiplos3e5);
        $multiplos5 = $this->calculaMultiplosDe5($multiplos3);
        return $multiplos5;
    }

    private function ajustaArrayComNumeros()
    {
        $arr = range(1, $this->contagem);
        shuffle($arr);
        sort($arr);

        return $arr;
    }

    private function calculaMultiplosDe3($arr)
    {
        return array_map(function ($numero) {
            return is_numeric($numero) && $numero % 3 == 0 ? 'Fizz' :$numero;
        }, $arr);
    }

    private function calculaMultiplosDe5($arr)
    {
        return array_map(function ($numero) {
            return is_numeric($numero) && $numero % 5 == 0 ? 'Buzz' :$numero;
        }, $arr);
    }

    private function calculaMultiplosDe3e5($arr)
    {
        return array_map(function ($numero) {
            return is_numeric($numero) && $numero % 3 == 0 && $numero % 5 == 0 ? 'FizzBuzz' :$numero;
        }, $arr);
    }

}

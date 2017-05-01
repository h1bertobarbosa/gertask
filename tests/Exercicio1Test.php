<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Exercicio1Test extends TestCase
{

    public function testImprimeNumeroNaoDivisivelPor3e5()
    {
        $fizzBuzz = new \App\Exercicio1(1);
        $contagem = $fizzBuzz->gerarContagem();

        $this->assertEquals(1,$contagem[0]);
    }

    public function testImprimeFizzQuandoNumeroForMultiplo3()
    {
        $fizzBuzz = new \App\Exercicio1(3);
        $contagem = $fizzBuzz->gerarContagem();

        $this->assertEquals('Fizz',$contagem[2]);
    }

    public function testImprimeBuzzQuandoNumeroForMultiplo5()
    {
        $fizzBuzz = new \App\Exercicio1(5);
        $contagem = $fizzBuzz->gerarContagem();

        $this->assertEquals('Buzz',$contagem[4]);
    }

    public function testImprimeFizzBuzzQuandoNumeroForMultiplo3e5()
    {
        $fizzBuzz = new \App\Exercicio1(15);
        $contagem = $fizzBuzz->gerarContagem();

        $this->assertEquals('FizzBuzz',$contagem[14]);
    }

}

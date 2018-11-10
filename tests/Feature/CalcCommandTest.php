<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalcCommandTest extends TestCase
{
    /**
     * @return void
     */
    public function testSum()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','4+6')
             ->expectsOutput('10');
    }

    /**
     * @return void
     */
    public function testSubtract()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','12-10')
             ->expectsOutput('2');
    }

    /**
     * @return void
     */
    public function testMultiplication()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','35*3')
             ->expectsOutput('105');
    }

    /**
     * @return void
     */
    public function testDivision()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','45/5')
             ->expectsOutput('9');
    }

    /**
     * @return void
     */
    public function testDivisionByZero()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','7/0')
             ->expectsOutput('Impossível realizar divisão por zero');
    }

    /**
     * @return void
     */
    public function testSumNegativeNumbers()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','-10+(-8)')
             ->expectsOutput('-18');
    }

    /**
     * @return void
     */
    public function testSumNegativeAndPositiveNumbers()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)','-12+3')
             ->expectsOutput('-9');
    }

    public function testInvalidChar()
    {
         $this->artisan('calc')
             ->expectsQuestion('Digite uma expressão matemática. (Ex: 2 + 3 / 5 * (2*5)',';')
             ->expectsOutput('Valor inválido');
    }
}

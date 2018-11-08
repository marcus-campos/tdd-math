<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalcCommandTest extends TestCase
{
    /**
     * @return void
     */
    public function testCT001()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','4+6')
             ->expectsOutput('10');
    }

    /**
     * @return void
     */
    public function testCT002()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','12-10')
             ->expectsOutput('2');
    }

    /**
     * @return void
     */
    public function testCT003()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','35*3')
             ->expectsOutput('105');
    }

    /**
     * @return void
     */
    public function testCT004()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','45/5')
             ->expectsOutput('9');
    }

    /**
     * @return void
     */
    public function testCT005()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','7/0')
             ->expectsOutput('Impossível realizar divisão por zero');
    }

    /**
     * @return void
     */
    public function testCT006()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','-10+(-8)')
             ->expectsOutput('-18');
    }

    /**
     * @return void
     */
    public function testCT007()
    {
        $this->artisan('calc')
             ->expectsQuestion('Digite sua operação matemática:','-12+3')
             ->expectsOutput('-9');
    }
}

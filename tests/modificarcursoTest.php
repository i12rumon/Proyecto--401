<?php
namespace Tests;


use App\coordinadorcursos;

use PHPUnit\Framework\TestCase;

class curso2Test extends TestCase{
    public function test_function()
    {
        // expected
        $expected = 1;

        // actual
        $c1 = new coordinadorcursos('b','b');
        $c1->modificar_curso(10,'huiuiu');
        $x=$c1->curso_existe('huiuiu');

        // assert
        $this->assertSame($expected, $x);
    }


}


?>
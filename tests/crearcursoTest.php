<?php
namespace Tests;

use App\coordinadorcursos;

use PHPUnit\Framework\TestCase;

class cursoTest extends TestCase{
    public function test_function()
    {
        // expected
        $expected = 1;


        // actual
        $c1 = new coordinadorcursos('b','b');
        $c1->crearcurso('Curso_prueba','2026-11-16','2026-11-16','Descripcion del curso','Juan','Ninguno','coordcursos@uco.es');
        $x=$c1->curso_existe('Curso_prueba');

        // assert

        $this->assertSame($expected, $x);
    }

}
?>
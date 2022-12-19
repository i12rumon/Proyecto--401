<?php
namespace Tests;

use App\sistema;

use PHPUnit\Framework\TestCase;

class sistemaTest extends TestCase{
    public function test_function()
    {
        // expected
        $expected = 1;

        // actual
        $c1 = new sistema();
        $x=$c1->ingresar_en_lista('10','3');

        // assert
        $this->assertSame($expected, $x);
    }


}


?>
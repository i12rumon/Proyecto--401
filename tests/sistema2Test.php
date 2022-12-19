<?php
namespace Tests;

use App\sistema;

use PHPUnit\Framework\TestCase;

class sistema2Test extends TestCase{
    public function test_function()
    {
        // expected
        $expected = 1;

        // actual
        $c1 = new sistema();
        $x=$c1->ingresar_en_curso('5','8');

        // assert
        $this->assertSame($expected, $x);
    }


}


?>
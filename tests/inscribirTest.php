<?php
namespace Tests;

use App\participante;
use PHPUnit\Framework\TestCase;

class inscribirTest extends TestCase{
    public function test_function()
    {
        // expected
        $expected = 1;

        // actual
        $c1 = new participante("i12qugaa@uco.es","i12qugaa","77777777G");
        $x = $c1->inscribir_curso("77777777G", "1");

        // assert
        $this->assertSame($expected, $x);
    }


}


?>
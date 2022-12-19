<?php
namespace Tests;

use App\usuario;

use PHPUnit\Framework\TestCase;

class iniciosesionTest extends TestCase{
    public function test_function()
    {
        // expected
        $expected = "<p class='form-control'style='color: red;'>No eres un usuario registrado..</p>";

        // actual
        $c1 = new usuario('usuarioinventado@uco.es','noexiste');
        $correo=$c1->getCorreo();
        $password=$c1->getPass();
        $x=$c1->iniciarsesion($correo, $password);


        // assert
        $this->assertSame($expected, $x);
    }


}


?>
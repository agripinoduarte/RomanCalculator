<?php
require("CalcRomano.php");
Class CalcRomanTest extends PHPUnit_Framework_TestCase
{
	
	public function test1Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('I', 'I');
		$expected = 'II';

		$this->assertEquals($expected, $resultado);
	}

	public function test2Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('II', 'I');
		$expected = 'III';

		$this->assertEquals($expected, $resultado);		
	}

	public function test3Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('III','I');
		$expected = 'IV';

		$this->assertEquals($expected, $resultado);
	}

	public function test4Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('IV','I');
		$expected = 'V';

		$this->assertEquals($expected, $resultado);
	}

	public function test8Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('VIII','I');
		$expected = 'IX';

		$this->assertEquals($expected, $resultado);
	}

	public function test3Mais3()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('III','III');
		$expected = 'VI';

		$this->assertEquals($expected, $resultado);
	}

	public function test6Mais9()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('VI','IX');
		$expected = 'XV';

		$this->assertEquals($expected, $resultado);
	}

	public function test44Mais44()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('XLIV','XLIV');
		$expected = 'LXXXVIII';

		$this->assertEquals($expected, $resultado);
	}

	public function test189Mais111()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('CLXXXIX','CXI');
		$expected = 'CCC';

		$this->assertEquals($expected, $resultado);
	}

	public function test999Mais1()
	{
		$obj = new CalcRomano();
		$resultado = $obj->add('CMXCIX','I');
		$expected = 'M';

		$this->assertEquals($expected, $resultado);
	}
}

<?php
class CalcRomano
{	
	public $dict = array(
		'I' => 1,
		'V' => 5,
		'X' => 10,
		'L' => 50,
		'C' => 100,
		'D' => 500,
		'M' => 1000
	);

	public $mcdu = array(
		0 => array(
			'0' => '',
			'1' => 'I',
			'2' => 'II',
			'3' => 'III',
			'5' => 'V',
			'9' => 'IX'
		),
		1 => array(
			'0' => '',
			'1' => 'X',
			'2' => 'XX',
			'3' => 'XXX',
			'5' => 'L',
			'9' => 'XC'
		),
		2 => array(
			'0' => '',
			'1' => 'C',
			'2' => 'CC',
			'3' => 'CCC',
			'5' => 'D',
			'9' => 'CM'
		),
		3 => array(
			'0' => '',
			'1' => 'M',
			'2' => 'MM',
			'3' => 'MMM',
		),
	);

	public function add($one, $two)
	{
		$one = $this->romanToDecimal($one);
		$two = $this->romanToDecimal($two);

		$sum = $one + $two;

		return  $this->decimalToRoman($sum . "");
	}

	public function romanToDecimal($number) 
	{
		$result = $current = 0;
		$before = 'none';
		$this->dict['none'] = 9999999;
		
		for($i = 0; $i < strlen($number); $i++)
		{
			$digit = $number[$i];

			if(in_array($digit, array('I', 'X', 'C', 'M')))
			{
				if($this->dict[$before] >= $this->dict[$digit])
				{
					$current = $this->dict[$digit];
				}	
				else
				{
					$result -= $this->dict[$before];
					$current = $this->dict[$digit] - $this->dict[$before];
				}
			}

			if(in_array($digit, array('V', 'L', 'D')))
			{
				if($this->dict[$before] < $this->dict[$digit])
				{
					$result -= $this->dict[$before];
					$current = $this->dict[$digit] - $this->dict[$before];
				}		
				else if($this->dict[$before] > $this->dict[$digit])
				{
					$current = $this->dict[$digit];
				}
				else
				{
					return false;
				}
			}

			$result += $current;
			$before = $digit;
		}

		return $result;
	}
	
	public function decimalToRoman($number)
	{
		$result = "";
		for($i = strlen($number)-1; $i >= 0; $i--)
		{
			$digit = $number[$i];
			$j = strlen($number)-1-$i;

			if($digit == '4')
			{
				$value = $this->mcdu[$j]['1'] . $this->mcdu[$j]['5'];
			}
			else if($digit > 5 && $digit < 9)
			{
				$value = $this->mcdu[$j]['5'] . $this->mcdu[$j][$digit - 5];
			}
			else
			{
				$value = $this->mcdu[$j][$digit];
			}

			$result = $value . $result;
		}

		return $result;
	}
}
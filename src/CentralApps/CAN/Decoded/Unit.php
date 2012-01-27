<?php
namespace CentralApps\CAN;
class Decoded_Unit {
	
	private $name;
	private $value;
	private $unit;
	
	public function __construct( $name, $value, $unit )
	{
		$this->name = $name;
		$this->value = $value;
		$this->unit = $unit;
	}
	
	public function __toString()
	{
		return $this->name . ': ' . $this->value . $this->unit . '<br />'; 
	}
	
}
<?php
namespace CentralApps\CAN;
abstract class Decoder_Keys_Core {
	
	protected $canID;
	
	protected $name;
	protected $unit;
	protected $multiplier;
	protected $offset;
	protected $dataLength;
	protected $dataType;
		
	abstract public function extractDataFromCAN( CAN_Message $message ); 
	
	// take a potentially nonesensical numeric value and convert it to meaningful engineering units
	// so that the value reflects the data it represents
	protected function transformToEngineeringUnit( $data )
	{
		// check the ordering of these
		$data = $this->applyTypeConversion( $data );
		$data = $this->applyMultiplier( $data );
		$data = $this->applyOffset( $data );
		return $data;
	}
	
	protected function applyOffset( $data )
	{
		return $data - $thisoffset;
	}
	
	protected function applyMultiplier( $data )
	{
		return $data * $this->multiplier;
	}
	
	protected function applyTypeConversion( $data )
	{
		// TODO add logic here!
		return $data;
	}
	
	protected function getUnit()
	{
		return $this->unit;
	}
	
	
}
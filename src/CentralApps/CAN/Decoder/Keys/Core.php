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
	
	protected function transformDataToEngineeringUnit( $data )
	{
		// check the ordering of these
		$data = $this->applyOffset( $data );
		$data = $this->applyMultiplier( $data );
		$data = $applyTypeConversion( $data );
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
		return $data;
	}
	
	protected function getUnit()
	{
		return $this->unit;
	}
	
	
}
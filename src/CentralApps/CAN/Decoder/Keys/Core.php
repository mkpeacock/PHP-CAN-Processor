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
	
	public function setCanID( $canID )
	{
		$this->canID = $canID;
	}
	
	public function setName( $name )
	{
		$this->name = $name;
	}
	
	public function setUnit( $unit )
	{
		$this->unit = $unit;
	}
	
	public function setMultiplier( $multiplier )
	{
		$this->multiplier = $multiplier;
	}
	
	public function setOffset( $offset )
	{
		$this->offset = $offset;
	}
	
	public function setDataLength( $dataLength )
	{
		$this->dataLength = $dataLength;
	}
	
	public function setDataType( $type )
	{
		$this->dataType = $type;
	}
		
	abstract public function extractDataFromCAN( Message $message ); 
	
	// take a potentially nonesensical numeric value and convert it to meaningful engineering units
	// so that the value reflects the data it represents
	// incoming data is in binary format
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
		return $data- $this->offset;
	}
	
	protected function applyMultiplier( $data )
	{
		if( $this->multiplier <> 0 )
		{
			return $data * $this->multiplier;
		}
		else
		{
			return $data;
		}		
	}
	
	protected function applyTypeConversion( $data )
	{
		// TODO add logic here!
		if( ! is_null( $this->dataType ) )
		{
			$convertorClass = "CentralApps\CAN\Decoder_DataTypes_" . ucfirst( strtolower( $this->dataType ) );
			$convertor = new $convertorClass();
			$data = $convertor->convertType( $data );
		}
		else
		{
			$data = bindec( $data );
		}
		return $data;
	}
	
	protected function getUnit()
	{
		return $this->unit;
	}
	
	
}
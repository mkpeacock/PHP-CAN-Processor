<?php
namespace CentralApps\CAN;
class Decoder_Multiplex extends Decoder {
	
	private $multiplexByte = 0;
	private $namePrefix = '';
	private $nameSuffix = '_P%1$d';
	private $multiplexNumber;
		
	protected function applyDecoding( Decoder_Keys_Core $decoderKey )
	{
		$this->multiplexNumber = ( ! is_null( $this->multiplexNumber ) ) ? $this->multiplexNumber : $this->getMultiplexNumber();
		$data = $decoderKey->extractDataFromCAN( $this->message );
		$name = $this->buildName( $decoderKey->getName(), $this->multiplexNumber );
		$unit = new Decoded_Unit( $name, $data, $decoderKey->getUnit() );
		return $unit;
	}
	
	private function getMultiplexNumber()
	{
		return hexdec( substr($this->message->getMessage(), $this->multiplexByte*2, 2 ) );
	}
	
	private function buildName( $name, $multiplexNumber )
	{
		return sprintf( $this->namePrefix . $name . $this->nameSuffix, $multiplexNumber );
	}
	
	public function setMultiplexByte( $byte )
	{
		$this->multiplexByte = $byte;
	}
	
	
	
	
}
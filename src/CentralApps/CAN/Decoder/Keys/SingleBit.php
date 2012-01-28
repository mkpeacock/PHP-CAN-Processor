<?php
namespace CentralApps\CAN;
class Decoder_Keys_SingleBit extends Decoder_Keys_Core {
	
	private $byte;
	private $bit;
	
	public function extractDataFromCAN( Message $message )
	{
		$BytesPositionInMessage = $this->calculateBytesPositionInMessage();
		$messageData = $message->getMessage();
		$byteData = substr( $messageData, $bytesPositionInMessage, 2 );
		$data = $this->extractBit( $byteData );
		return $this->transformToEngineeringUnit( $data );
	}
	
	public function calculateBytesPositionInMessage()
	{
		return $this->byte*2;
	}
	
	public function extractBit( $data )
	{
		$decimalRepresentation = hexdec( $data );
		$binaryRepresentation = decbin( $decimalRepresentation );
		// 8 bits in a byte, the first bit (0) starts on the right, so do 8 - the bit
		return $binaryRepresentation{ 8 - $this->bit };
		
	}
	
	public function setByte( $byte )
	{
		$this->byte = $byte;
	}
	
	public function setBit( $bit )
	{
		$this->bit = $bit;
	}
	
	
	
}
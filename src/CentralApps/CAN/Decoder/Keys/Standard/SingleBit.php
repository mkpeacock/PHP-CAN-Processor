<?php
namespace CentralApps\CAN;
class Decoder_Keys_SingleBit extends Decoder_Keys_Core {
	
	private $byte;
	private $bit;
	
	public function extractDataFromCAN( CAN_Message $message )
	{
		$BytesPositionInMessage = $this->calculateBytesPositionInMessage();
		$messageData = $message->getMessage();
		$byteData = $messageData{ $bytesPositionInMessage };
		$data = $this->extractBit( $byteData );
		return $this->transformToEngineeringUnit( $data );
	}
	
	public function calculateBytesPositionInMessage()
	{
		return $this->byte/8;
	}
	
	public function extractBit( $data )
	{
		$decimalRepresentation = hexdec( $data );
		$binaryRepresentation = decbin( $decimalRepresentation );
		// 8 bits in a byte, the first bit (0) starts on the right, so do 8 - the bit
		return $binaryRepresentation{ 8 - $this->bit };
		
	}
	
	
	
}
<?php
namespace CentralApps\CAN;
class Decoder_Keys_MultiBit extends Decoder_Keys_Core {
	
	private $byte;
	private $mostSignificantBit;
	private $leastSignificantBit;
	
	public function extractDataFromCAN( Message $message )
	{
		$BytesPositionInMessage = $this->calculateBytesPositionInMessage();
		$messageData = $message->getMessage();
		$byteData = substr( $messageData, $bytesPositionInMessage, 2 );
		$data = $this->extractBits( $byteData );
		return $this->transformToEngineeringUnit( $data );
	}
	
	public function calculateBytesPositionInMessage()
	{
		return $this->byte*2;
	}
	
	public function extractBits( $data )
	{
		$decimalRepresentation = hexdec( $data );
		$binaryRepresentation = decbin( $decimalRepresentation );
		// 8 bits in a byte, the first bit (0) starts on the right, so do 8 - the bit
		return $binaryRepresentation{ 8 - $this->mostSignificantBit } . $binaryRepresentation{ 8 - $this->leastSignificantBit };
		
	}
	
	
	
}
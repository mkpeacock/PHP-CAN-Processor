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
		return $binaryRepresentation{ $this->bit };
		
	}
	
	
	
}
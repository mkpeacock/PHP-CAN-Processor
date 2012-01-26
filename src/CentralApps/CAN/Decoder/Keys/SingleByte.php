<?php
namespace CentralApps\CAN;
// represents a variable which spans two bytes in a "CAN string"
class Decoder_Keys_SingleByte extends Decoder_Keys_Core {
	
	private $byte;
	
	public function extractDataFromCAN( Message $message )
	{
		$bytesPositionInMessage = $this->calculateBytesPositionInMessage();
		$messageData = $message->getMessage();
		$byteData = substr( $messageData, $bytesPositionInMessage, 2 );
		return $this->transformToEngineeringUnit( decbin( hexdec( $byteData ) ) );
	}
	
	public function calculateBytesPositionInMessage()
	{
		return $this->byte*2;
	}
		
	public function setByte( $byte )
	{
		$this->byte = $byte;
	}
	
}
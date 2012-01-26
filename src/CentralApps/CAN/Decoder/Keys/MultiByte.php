<?php
namespace CentralApps\CAN;
// represents a variable which spans two bytes in a "CAN string"
class Decoder_Keys_MultiByte extends Decoder_Keys_Core {
	
	private $mostSignificantByte;
	private $leastSignificantByte;
	
	public function extractDataFromCAN( Message $message )
	{
		$mostSignificantBytePositionInMessage = $this->calculateBytesPositionInMessage( $this->mostSignificantByte );
		$leastSignificantBytePositionInMessage = $this->calculateBytesPositionInMessage( $this->leastSignificantByte );
		$messageData = $message->getMessage();
		
		$mostSignificantByte = substr( $messageData, $mostSignificantBytePositionInMessage, 2 );
		$leastSignificantByte = substr( $messageData, $leastSignificantBytePositionInMessage, 2 );
		
		return $this->transformToEngineeringUnit( decbin( hexdec( $mostSignificantByte . $leastSignificantByte ) ) );
	}
	
	public function calculateBytesPositionInMessage( $byte )
	{
		return $byte*2;
	}
	
	
	public function setMostSignificantByte( $byte )
	{
		$this->mostSignificantByte = $byte;
	}
	
	public function setLeastSignificantByte( $byte )
	{
		$this->leastSignificantByte = $byte;
	}
	
	
}
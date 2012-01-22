<?php
namespace CentralApps\CAN;
class Decoder_Keys_SingleBit extends Decoder_Keys_Core {
	
	private $byte;
	private $bit;
	
	public function extractDataFromCAN( CAN_Message $message )
	{
		$BytesPositionInMessage = $this->calculateBytesPositionInMessage();
		$messageData = $message->getMessage();
		$data = $messageData{ $bytesPositionInMessage };
		return $this->transformDataToEngineeringUnit( $data );
	}
	
	public function calculateBytesPositionInMessage()
	{
		return $this->byte/8;
	}
	
	
	
}
<?php
namespace CentralApps\CAN;
class Decoder_Keys_Factory {
	
	
	public function __construct()
	{
		$size = null;
		$key = null;
		switch( $size )
		{
			case 16:
				$key = new Decoder_Keys_MultiByte();
				break;
			case 8:
				$key = new Decoder_Keys_SingleByte();
				break;
			case 1:
				$key = new Decoder_Keys_SingleBit();
			default:
				break;
				
		}
	}
	
	
}
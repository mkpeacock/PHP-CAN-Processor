<?php
namespace CentralApps\CAN;
class Decoder_Keys_Factory {
	
	
	public function __construct()
	{
		$size = null;
		
		switch( $size )
		{
			case 16:
				// two bytes
				break;
			case 8:
				// single byte
				break;
			case 1:
				// singlebit;
			default:
				break;
				
		}
	}
	
	
}
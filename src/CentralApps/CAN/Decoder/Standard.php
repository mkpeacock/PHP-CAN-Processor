<?php
namespace CentralApps\CAN;
class Decoder_Standard extends Decoder {
	
	protected function applyDecoding( Decoder_Keys_Core $decoderKey )
	{
		$data = $decoderKey->extractDataFromCAN( $this->message );
		$unit = new Decoded_Unit( $decoderKey->getName(), $data, $decoderKey->getUnit() );
		return $unit;
		
	}
	
}
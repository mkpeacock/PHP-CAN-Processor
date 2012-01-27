<?php
namespace CentralApps\CAN;
abstract class Decoder {
	
	protected $message;
	protected $canID;
	protected $decoderKeysCollection;
	
	public function __construct( Decoder_Keys_Collection $decoderKeysCollection )
	{
		$this->decoderKeysCollection = $decoderKeysCollection;
	}

	public function decode( Message $message )
	{
		$collection = new Decoded_Collection();
		$this->message = $message;
		foreach( $this->decoderKeysCollection as $decoderKey )
		{
			$decodedUnit = $this->applyDecoding( $decoderKey );
			$collection->add( $decodedUnit );
		}
		return $collection;
	}
	
	abstract protected function applyDecoding( Decoder_Keys_Core $key ); 
	
}
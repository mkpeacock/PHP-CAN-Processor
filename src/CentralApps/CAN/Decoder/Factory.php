<?php
namespace CentralApps\CAN;
// class to build the decoder collection
class Decoder_Factory {
	
	
	public function __construct()
	{
	
	}
	
	// take a particular CAN Message and lookup the decoding keys for variables held within
	// push these keys into a collection and return
	public function makeDecoderFromCan( Message $message )
	{
		$canID = $message->getCanID();

		return new Decoder_Collection();
	}
	
	public function makeAllDecoders()
	{
		return new Decoder_Collection();
	}
	
	private function makeFrom( $sqlStatement )
	{
		try {
			// querying for the information
			
		}
		catch ( Exception $e ){
			//
		}
		return new Decoder_Collection();
	}
	
}
<?php
namespace CentralApps\CAN;
// class to build the decoder collection
class Decoder_Factory {
	
	
	public function __construct()
	{
	
	}
	
	public function makeDecoderFromXMLFile( $xmlFileName )
	{
		$canSpecification = new \SimpleXMLElement( file_get_contents( $xmlFileName ) );
		$collection = new Decoder_Collection();
		foreach( $canSpecification->canID as $canID )
		{
			if( $canID['type'] == 'multiplex' )
			{
				$decoder = new Decoder_Multiplex();
				$decoder->setMultiplexByte( $canID['multiplexByte'] );
				$decoder->setNamePrefix($canID['namePrefix']);
				$decoder->setNameSuffix($canID['nameSuffix']);
			}
			else
			{
				$decoder = new Decoder_Standard();
			}
			$decoder->setCanID( $canID );
			foreach( $canID->engineeringUnit as $engineeringUnit )
			{
				$key = $this->buildDecoderKeyFromObject( $engineeringUnit );
				$decoder->add( $key );
			}
			$collection->add( $decoder );
		}
		return $collection;
	}
	
	private function buildDecoderKeyFromObject( $object )
	{
		switch( $object['type'] )
		{
			case 'single-bit';
				$key = new Decoder_Keys_SingleBit();
				$key->setByte( $object->byte );
				$key->setBit( $object->bit );
				break;
			case 'multi-bit':
				$key = new Decoder_Keys_SingleBit();
				$key->setByte( $object->byte );
				$key->setMostSignificantBit( $object->mostSignificantBit );
				$key->setLeastSignificantBit( $object->leastSignificantBit );
				break;
			case 'single-byte':
				$key = new Decoder_Keys_SingleByte();
				$key->setByte( $object->byte );
				break;
			case 'multi-byte':
				$key = new Decoder_Keys_MultiByte();
				$key->setMostSignificantByte( $object->mostSignificantByte );
				$key->setLeastSignificantByte( $object->leastSignificantByte );
				break;
		}
		$key->setUnit( $object->unit );
		$key->setName( $object->name );
		
		return $key;
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
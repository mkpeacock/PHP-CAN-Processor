<?php
namespace CentralApps\CAN;
abstract class Decoder implements \IteratorAggregate, \Countable{
	
	protected $message;
	protected $canID;
	protected $decoderKeysCollection;
	
	public function __construct(){}

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
	
	public function setCanID( $canID )
	{
		$this->canID = $canID;
	}
	
	public function getCanID()
	{
		return $this->canID;
	}
	
	public function getIterator()
	{
		return new \ArrayIterator( $this->decoderKeysCollection );
	}
	
	public function add( $object )
	{
		$this->decoderKeysCollection[] = $object;
	}
	
	public function count()
	{
		return count( $this->decoderKeysCollection );
	}
	
}
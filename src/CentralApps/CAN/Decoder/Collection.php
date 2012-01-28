<?php
namespace CentralApps\CAN;
class Decoder_Collection implements \IteratorAggregate, \Countable {
	
	private $collection;
	
	public function getIterator()
	{
		return new \ArrayIterator( array_values( $this->collection ) );
	}
	
	public function add( $object )
	{
		$this->collection[ (String) $object->getCanID() ] = $object;
	}
	
	public function count()
	{
		return count( $this->collection );
	}
	
	public function decode( Message $message )
	{
		if( array_key_exists( $message->getCanID(), $this->collection ) )
		{
			return $this->collection[ $message->getCanID() ]->decode( $message );
		}
		else
		{
			throw new \Exception('No decoder found for that CAN ID');
		}
	}
	
	
}
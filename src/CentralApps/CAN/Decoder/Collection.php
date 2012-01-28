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
		$this->collection[ $object->getCanID() ] = $object;
	}
	
	public function count()
	{
		return count( $this->collection );
	}
	
	
}
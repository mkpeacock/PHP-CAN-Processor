<?php
namespace CentralApps\CAN;
class Decoder_Collection implements \IteratorAggregate, \Countable {
	
	private $collection;
	
	public function getIterator()
	{
		return new \ArrayIterator( $this->collection );
	}
	
	public function add( $object )
	{
		$this->collection[] = $object;
	}
	
	public function count()
	{
		return count( $this->collection );
	}
	
	
}
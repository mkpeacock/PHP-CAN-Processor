<?php
namespace CentralApps\CAN;

class Message {
	
	private $canID = '';
	private $message = '';
	
	public function __construct( $canID=null, $message=null )
	{
		$this->canID = ( ! is_null( $canID ) ) ? $canID : $this->canID;
		$this->message = ( ! is_null( $message ) ) ? $message : $this->message;
	}
	
	public function getCanID()
	{
		return $this->canID;
	}
	
	public function decode()
	{
		foreach( $this->decoder as $key )
		{
			$data = $key->extractDataFromCAN( $this );
		}
	}
	
	public function getMessage()
	{
		return $this->message;
	}
	

}
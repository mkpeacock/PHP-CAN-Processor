<?php
namespace CentralApps\CAN;
// represents a variable which spans two bytes in a "CAN string"
class Decoder_Keys_MultiByte extends Decoder_Keys_Core {
	
	private $byteHigh;
	private $byteLow;
	
	
}
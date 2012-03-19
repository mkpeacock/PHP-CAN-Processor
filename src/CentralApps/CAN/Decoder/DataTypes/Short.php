<?php
namespace CentralApps\CAN;
/**
 * Convert the data to a Short
 * @author Michael
 *
 */
class Decoder_DataTypes_Short implements Decoder_DataTypes_Interface {
	
	private $numberOfBitsInData = 16;
	
	public function setNumberOfBitsInData( $numberOfBits )
	{
		$this->numberOfBitsInData = $numberOfBits;
	}
	
	public function convertType( $dataAsBinary )
	{
		// TODO this decbin line is repeated, in Core.php (transformToEngineeringUnit), can we abstract
		$data = bindec($dataAsBinary);
		// provided the value is 16 bits long, check to see if the most significant bit (msb) is bit 16
		if( strlen( $dataAsBinary ) == $this->numberOfBitsInData && $dataAsBinary{0} == "1" )
		{
			// perform a two's compliment on the data to get the negative value
			// -(pow(2, n) - N) where n is the number of bits and N is the number for which to find out its 2's complement
			// see: http://www.binaryconvert.com/result_signed_short.html?
			// see: http://php.net/manual/en/function.sprintf.php#92157
			return -(pow(2, $this->numberOfBitsInData ) - $data);
		}
		else
		{
			return $data;
		}
	}
	
	
	
}
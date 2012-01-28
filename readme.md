# PHP CAN Message Processor

This application will process and decode CAN messages into their human readable pieces of information.  CAN (Controller Area Network) is used extensively within the automotive industry to send messages around the vehicle.

## How it works

For each type of CAN message you need to create a decoder.  This decoder can either be Standard or Multiplex.

The decoder has a number of keys associated with it.  Each key is a set of instructions to extract a specific piece of information from the message.  There are different types of key for a piece of information which uses a whole byte, two bytes, a single bit, and two bits.  The core decoder key applies standard logic, if applicable to the resulting data, including take into account offset values, multipliers and data type conversion (e.g. convert a short data type into the two's compliment of itself).

If the decoder is multiplex, it will decode all pieces of information as standard, however it will rename the piece of information, as the multiplex byte indicates that while the information is of the same type, it represents something else.  E.g. All pistons of an engine could be broadcast in the same bit on the same CAN ID.  The multiplex byte would be used to detail _which_ piston the CAN message refers to.

## Usage

### Providing a specification

The easiest way to use this system is to provide an XML based "specification" of the different CAN message types you wish to decode, and the pieces of information from within.

	<?xml version="1.0" encoding="UTF-8"?>
	<canspec>
		<canID id="ABC" type="multiplex" multiplexByte="0" namePrefix="" nameSuffix="_Piston%1$d">
			<engineeringUnit type="multi-byte">
				<name>Piston_position</name>
				<unit>mm</unit>
				<mostSignificantByte>2</mostSignificantByte>
				<leastSignificantByte>3</leastSignificantByte>
				<dataType>null</dataType>
				<multiplier>0.01</multiplier>
				<offset>0</offset>
			</engineeringUnit>
		</canID>
	</canspec>  

You can then use a factory to build the keys, the decoders and turn that into a collection of decoders.

	$factory = new CentralApps\CAN\Decoder_Factory();
	$spec = $factory->makeDecoderFromXMLFile('sample_can_specification.xml');

Passing a message to the collection of decoders will find the decoder for that can message type, and perform the decoding logic from within.

	$message = new CentralApps\CAN\Message( 'ABC', '0000000000000000' );
	$units = $spec->decode( $message );
	foreach( $units as $unit )
	{
		echo $unit;
	}


### Manual

	$message = new CentralApps\CAN\Message( 'ABC', '0000000000000000' );
	
	
	$multiByteKey = new CentralApps\CAN\Decoder_Keys_MultiByte();
	$multiByteKey->setCanID( 'ABC' );
	$multiByteKey->setName( 'Piston_position' );
	$multiByteKey->setUnit( "mm" );
	$multiByteKey->setMultiplier( 0.01 );
	$multiByteKey->setOffset( 0 );
	$multiByteKey->setMostSignificantByte( 2 );
	$multiByteKey->setLeastSignificantByte( 3 );
	$multiByteKey->setDataLength( 16 );
	$multiByteKey->setDataType( 'short' );
	
	$decoder = new CentralApps\CAN\Decoder_Multiplex();
	$decoder->setMultiplexByte(0);
	$decoder->setNameSuffix('_Pison%1$d');
	$decoder->add( $multiByteKey );
	$units = $decoder->decode( $message );
	foreach( $units as $unit )
	{
		echo $unit;
	}


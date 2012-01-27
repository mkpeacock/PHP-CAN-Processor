<?php

define( "FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );

require_once( 'splClassLoader.php' );
$classLoader = new SplClassLoader('CentralApps\CAN', FRAMEWORK_PATH );
$classLoader->register();


$message = new CentralApps\CAN\Message( '0C0', '2C01000000180000' );

$decoderKeysCollection = new CentralApps\CAN\Decoder_Keys_Collection();
$singleByteKey = new CentralApps\CAN\Decoder_Keys_SingleByte();
$singleByteKey->setCanID( '0C0' );
$singleByteKey->setName( 'SOC P1' );
$singleByteKey->setUnit( "%" );
$singleByteKey->setMultiplier( 0 );
$singleByteKey->setOffset( 0 );
$singleByteKey->setByte( 0 );
$singleByteKey->setDataLength( 8 );
$singleByteKey->setDataType( null );

$decoderKeysCollection->add( $singleByteKey );
$decoder = new CentralApps\CAN\Decoder_Standard( $decoderKeysCollection );
$decoder->decode( $message );

$decoderKeysCollection = new CentralApps\CAN\Decoder_Keys_Collection();
$singleByteKey = new CentralApps\CAN\Decoder_Keys_MultiByte();
$singleByteKey->setCanID( '0C0' );
$singleByteKey->setName( 'SOC P1' );
$singleByteKey->setUnit( "%" );
$singleByteKey->setMultiplier( 0 );
$singleByteKey->setOffset( 0 );
$singleByteKey->setMostSignificantByte( 1 );
$singleByteKey->setLeastSignificantByte( 0 );
$singleByteKey->setDataLength( 16 );
$singleByteKey->setDataType( null );

$decoderKeysCollection->add( $singleByteKey );
$decoder = new CentralApps\CAN\Decoder_Standard( $decoderKeysCollection );
$decoder->decode( $message );

$message = new CentralApps\CAN\Message( '0C0', '83E7000000180000' );

$decoderKeysCollection = new CentralApps\CAN\Decoder_Keys_Collection();
$singleByteKey = new CentralApps\CAN\Decoder_Keys_MultiByte();
$singleByteKey->setCanID( '0C0' );
$singleByteKey->setName( 'SOC P1' );
$singleByteKey->setUnit( "%" );
$singleByteKey->setMultiplier( 0 );
$singleByteKey->setOffset( 0 );
$singleByteKey->setMostSignificantByte( 0 );
$singleByteKey->setLeastSignificantByte( 1 );
$singleByteKey->setDataLength( 16 );
$singleByteKey->setDataType( 'short' );

$decoderKeysCollection->add( $singleByteKey );
$decoder = new CentralApps\CAN\Decoder_Standard( $decoderKeysCollection );
$units = $decoder->decode( $message );
foreach( $units as $unit )
{
	echo $unit;
}

$message = new CentralApps\CAN\Message( '0C0', '0183E70000180000' );

$decoderKeysCollection = new CentralApps\CAN\Decoder_Keys_Collection();
$singleByteKey = new CentralApps\CAN\Decoder_Keys_MultiByte();
$singleByteKey->setCanID( '0C0' );
$singleByteKey->setName( 'SOC' );
$singleByteKey->setUnit( "%" );
$singleByteKey->setMultiplier( 0 );
$singleByteKey->setOffset( 0 );
$singleByteKey->setMostSignificantByte( 1 );
$singleByteKey->setLeastSignificantByte( 2 );
$singleByteKey->setDataLength( 16 );
$singleByteKey->setDataType( 'short' );

$decoderKeysCollection->add( $singleByteKey );
$decoder = new CentralApps\CAN\Decoder_Multiplex( $decoderKeysCollection );
$decoder->setMultiplexByte(0);
$units = $decoder->decode( $message );
foreach( $units as $unit )
{
	echo $unit;
}

/**
 * To create a CAN message decoder we need to create a message object, and lookup the type of message this is (multiplex or standard)
 * with the message type, we need to lookup the 
 * 
 * 
 * 
 * 
 */



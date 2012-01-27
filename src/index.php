<?php

define( "FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );

require_once( 'splClassLoader.php' );
$classLoader = new SplClassLoader('CentralApps\CAN', FRAMEWORK_PATH );
$classLoader->register();


$message = new CentralApps\CAN\Message( 'canID', '0000000000000000' );

$decoderKeysCollection = new CentralApps\CAN\Decoder_Keys_Collection();
$singleByteKey = new CentralApps\CAN\Decoder_Keys_MultiByte();
$singleByteKey->setCanID( 'canID' );
$singleByteKey->setName( 'Some Data' );
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




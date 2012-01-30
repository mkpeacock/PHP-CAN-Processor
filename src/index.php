<?php

define( "FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );

require_once( 'splClassLoader.php' );
$classLoader = new SplClassLoader('CentralApps\CAN', FRAMEWORK_PATH );
$classLoader->register();


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



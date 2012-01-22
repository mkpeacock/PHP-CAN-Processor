<?php

define( "FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );

require_once( 'splClassLoader.php' );
$classLoader = new SplClassLoader('CentralApps\CAN', FRAMEWORK_PATH );
$classLoader->register();

$message = new CentralApps\CAN\Message( '01C', 'AA000000' );

/**
 * To create a CAN message decoder we need to create a message object, and lookup the type of message this is (multiplex or standard)
 * with the message type, we need to lookup the 
 * 
 * 
 * 
 * 
 */


$b = 25534;
echo decbin($b) . '<br />';
$binary = decbin($b);
if( strlen( $binary) == 16 && $binary{0} == "1" )
{
	echo -(pow(2, 16) - $b);
}
else
{
	echo $b;
}

echo '<pre>' . print_r( unpack( 's', decbin( $b ) ), true ) . '</pre>';
if ($binary{0} == "1")
{
	echo -(pow(2, 20) - bindec(substr($binary, 1)));
}
else
{
	echo bindec($binary);
}

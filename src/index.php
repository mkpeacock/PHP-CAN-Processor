<?php

define( "FRAMEWORK_PATH", dirname( __FILE__ ) ."/" );

require_once( 'splClassLoader.php' );
$classLoader = new SplClassLoader('CentralApps\CAN', FRAMEWORK_PATH );
$classLoader->register();

$message = new CentralApps\CAN\Message( '01C', 'AA000000' );

?>
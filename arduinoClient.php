<?php

//Bootstrap
define('ROOTPATH', __DIR__);
require_once (ROOTPATH . '/vendor/autoload.php');
use Colors\Color;
$c = new Color();

$port = rand('2010','2455');

	if(!($sock = socket_create(AF_INET, SOCK_STREAM, 0)))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);

		die("Couldn't create socket: [$errorcode] $errormsg \n");
	}

	// Bind the source address
	if( !socket_bind($sock, "127.0.0.1" , $port) )
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);

		die("Could not bind socket : [$errorcode] $errormsg \n");
	}

	echo $c('socket created and binded to port '.$port." \n")->green();

	if(!socket_listen ($sock , 10))
	{
		$errorcode = socket_last_error();
		$errormsg = socket_strerror($errorcode);

		die("Could not listen on socket : [$errorcode] $errormsg \n");
	}

	echo "Socket listen OK \n";

	echo "Waiting for incoming connections... \n";


	//Accept incoming connection - This is a blocking call
	$client =  socket_accept($sock);

	//display information about the client who is connected
	if(socket_getpeername($client , $address , $port))
	{
		echo "Client $address : $port is now connected to us. \n";
	}

	//start loop to listen for incoming connections
	while (true)
	{

		//read data from the incoming socket
		$input = socket_read($client, 1024000);

		$response = "OK .. $input" ." \n";
if (trim($input) == 'doei') {
	break;
}
		if (trim($input) == 'time') {
			$date = date('H-m');
			socket_write($client,$c($date)->green());
		}
		// Display output  back to client
		echo $c($response)->green();
	}
	socket_close($client);
	socket_close($sock);
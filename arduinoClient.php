<?php

//Bootstrap
define('ROOTPATH', __DIR__);
require_once ('Application/Libraries/autoload.php');
use Colors\Color;
use Poseiden\Core\Model;


$c = new Color();

$port = rand('2010', '2455');

if (!($sock = socket_create(AF_INET, SOCK_STREAM, 0))) {
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);

	die("Couldn't create socket: [$errorcode] $errormsg \n");
}

// Bind the source address
if (!socket_bind($sock, "0.0.0.0", $port)) {
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);

	die("Could not bind socket : [$errorcode] $errormsg \n");
}

echo $c('socket created and binded to port ' . $port . " \n")->green();

if (!socket_listen($sock, 10)) {
	$errorcode = socket_last_error();
	$errormsg = socket_strerror($errorcode);

	die("Could not listen on socket : [$errorcode] $errormsg \n");
}

echo "Socket listen OK \n";

echo "Waiting for incoming connections... \n";


//Accept incoming connection - This is a blocking call
$client = socket_accept($sock);

//display information about the client who is connected
if (socket_getpeername($client, $address, $port2)) {
	socket_close($sock);
	unset($sock);
	echo "Client $address : $port2 is now connected to us. \n";
}
$olddate = null;
@socket_set_nonblock($client);

//start loop to listen for incoming connections
while (true) {
	$mem_usage = memory_get_usage(true);

	usleep(900);
	$date = date('H:i');
	if ($date != $olddate) {
		socket_write($client, $c($date)->green() . '-' . round($mem_usage / 1048576, 2) . "\n");
		$olddate = $date;
	}

	//	socket_write($client, rand(1,100));

	//read data from the incoming socket
	$input = socket_read($client, 1024000);

	$response = "OK .. $input" . " \n";
	if (trim($input) == 'doei') {
		break;
	}
	if (trim($input) == 'time') {
		$date = date('G:i:s');
		socket_write($client, $c($date)->green());
	}

	if (trim($input) == 'weer') {
		$weer = new Model\weatherModel('Rotterdam');
		socket_write($client, $weer->temperature() . " \n");
	}

	// Display output  back to client
	//echo $c($response)->green();
}
socket_close($client);

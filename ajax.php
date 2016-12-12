<?php

require_once "init.php";

$log = new Logger();
$response = new Response();

var_dump($_REQUEST);

switch ($_REQUEST['mode']) {
	case 'send':
		/* request validation */

		break;
	default:
		break;
}

$response->printResponse();
exit;
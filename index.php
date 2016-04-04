<?php

require "vendor/autoload.php";

require "src/middlewares.php";

use LightMiddlewareDispatcher\MiddlewareDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$queue = [];

$queue[] = new FirstMiddleware();
$queue[] = new SecondMiddleware();
$queue[] = new ThirdMiddleware();

$request = Request::create(
	'/boo',
	'GET',
	['boo' => 'foo']
);
$response = new Response();

$request->create(
	'foo',
	'GET',
	['boo' => 'foo']
);

$middlewareDispatcher = new MiddlewareDispatcher($queue);
$response = $middlewareDispatcher->run($request, $response);
//var_dump($response);
$response->send();
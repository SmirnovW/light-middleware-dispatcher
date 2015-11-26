<?php

require "vendor/autoload.php";

$queue = [];

$queue[] = new FirstMiddleware();
$queue[] = new SecondMiddleware();
$queue[] = new ThirdMiddleware();

$request = new Request();
$response = new Response();

$middlewareDispatcher = new MiddlewareDispatcher($queue);
$response = $middlewareDispatcher->run($request, $response);
echo $response.PHP_EOL;
echo "end";
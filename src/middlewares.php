<?php

/**
* 
*/
class FirstMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		echo "This is first middleware".PHP_EOL;
		$next($request, $response);
	}
}

class SecondMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		echo "This is second middleware".PHP_EOL;
		$next($request, $response);
	}
}

class ThirdMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		echo "This is second third".PHP_EOL;
		$next($request, $response);
	}
}
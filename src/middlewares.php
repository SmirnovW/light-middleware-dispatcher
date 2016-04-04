<?php

use LightMiddlewareDispatcher\MiddlewareInterface;

use Symfony\Component\HttpFoundation\Response as Response;
use Symfony\Component\HttpFoundation\Request as Request;

class FirstMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		$response->setContent($request->query->get('boo'));
		return $next($request, $response);
	}
}

class SecondMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		$response->setContent($response->getContent() . ' This is second middleware ');
		return $next($request, $response);
	}
}

class ThirdMiddleware implements MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next)
	{
		$response->setContent($response->getContent() . 'This is third middleware');
		return $response;
	}
}
<?php

/**
* 
*/
interface MiddlewareInterface
{
	public function handler(Request $request, Response $response, callable $next);
}
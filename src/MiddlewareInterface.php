<?php

namespace LightMiddlewareDispatcher;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

interface MiddlewareInterface
{
	/**
	 * @param Request $request
	 * @param Response $response
	 * @param callable $next
	 * @return mixed
	 */
	public function handler(Request $request, Response $response, callable $next);
}
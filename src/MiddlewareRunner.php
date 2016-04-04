<?php

namespace LightMiddlewareDispatcher;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareRunner
{
	private $queue;

	/**
	 * MiddlewareRunner constructor.
	 * @param array $queue
	 */
	function __construct(array $queue)
	{
		$this->queue = $queue;
	}

	/**
	 * @param Request $request
	 * @param Response $response
	 * @return bool
	 */
	public function __invoke(Request $request, Response $response)
	{
		$middleware = array_shift($this->queue);
		if ($middleware) {
			return $middleware->handler($request, $response, $this);
		}
		return false;
	}
}


<?php

/**
* 
*/
class MiddlewareRunner
{
	private $queue;

	function __construct(array $queue)
	{
		$this->queue = $queue;
	}

	public function __invoke(Request $request, Response $response)
	{
		$middleware = array_shift($this->queue);
		if ($middleware) {
			return $middleware->handler($request, $response, $this);
		}
		return false;
	}
}


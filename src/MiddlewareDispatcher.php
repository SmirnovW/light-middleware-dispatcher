<?php

/**
* 
*/
class MiddlewareDispatcher
{
	private $queue;

	function __construct($queue)
	{
		$this->queue = $queue;
	}

	public function run(Request $request, Response $response)
	{
		$runner = new MiddlewareRunner($this->queue);
		return $runner($request, $response);
	}
}
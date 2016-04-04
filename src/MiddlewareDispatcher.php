<?php

namespace LightMiddlewareDispatcher;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MiddlewareDispatcher
{
	private $queue;

	/**
	 * MiddlewareDispatcher constructor.
	 * @param $queue
	 */
	function __construct($queue)
	{
		$this->queue = $queue;
	}

	/**
	 * @param Request $request
	 * @param Response $response
	 * @return mixed
	 */
	public function run(Request $request, Response $response)
	{
		$runner = new MiddlewareRunner($this->queue);
		return $runner($request, $response);
	}
}
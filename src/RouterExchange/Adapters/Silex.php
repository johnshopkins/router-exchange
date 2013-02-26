<?php

namespace RouterExchange\Adapters;

class Silex implements \RouterExchange\Interfaces\Router
{
	/**
	 * Silex object
	 * @var object
	 */
	protected $router;

	/**
	 * Controller object created when a method (i.e. GET)
	 * method is called. This is the object all subesquent
	 * methods (like name()) must be called on.
	 * 
	 * @var object
	 */
	protected $controller;

	public function __construct($silex)
	{
		$this->router = $silex;
	}

	public function setDebug($boolean)
	{
		$this->router["debug"] = (bool) $boolean;
		return $this;
	}

	public function get($pattern, $callable)
	{
		$this->controller = $this->router->get($pattern, $callable);
		return $this;
	}

	public function post($pattern, $callable)
	{
		$this->controller = $this->router->post($pattern, $callable);
		return $this;
	}

	public function put($pattern, $callable)
	{
		$this->controller = $this->router->put($pattern, $callable);
		return $this;
	}
	
	public function delete($pattern, $callable)
	{
		$this->controller = $this->router->delete($pattern, $callable);
		return $this;
	}
	
	public function options($pattern, $callable)
	{
		$this->controller = $this->router->options($pattern, $callable);
		return $this;
	}

	public function name($name)
	{
		$this->controller->bind($name);
		return $this;
	}
	
	public function conditions($array)
	{
		foreach ($array as $arg => $pattern) {
			$this->controller->assert($arg, $pattern);
		}
		return $this;
	}

	public function redirect($url)
	{
		$this->router->redirect($url);
	}

	public function halt()
	{
		$this->router->halt();
	}
	
	public function pass()
	{
		$this->router->pass();
	}

	public function stop()
	{
		$this->router->stop();
	}

	public function error($callable)
	{
		$this->router->error($callable);
	}

	public function run()
	{
		$this->router->run();
	}
}
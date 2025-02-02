<?php

declare(strict_types=1);

namespace App\Core;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('home', 'Home:default');
		$router->addRoute('Sign', 'Sign:in');
		$router->addRoute('reservation', 'Reservation:default');
		$router->addRoute('User', 'User:default');
		$router->addRoute('<presenter>/<action>[/<id>]', 'Home:default');
		$router->addRoute('User/addNew', 'User:edit');
		
		return $router;
	}
}

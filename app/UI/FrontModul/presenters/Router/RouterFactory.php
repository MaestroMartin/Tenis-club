<?php

declare(strict_types=1);

namespace App\UI\FrontModul\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
        $router->withModule('front');
		$router->addRoute('<presenter>/<action>[/<id>]', 'Home:default');
		$router->addRoute('login', 'Sign:in');
		$router->addRoute('reservation', 'Reservation:default');
		$router->addRoute('home', 'Home:default');
		return $router;
	}
}

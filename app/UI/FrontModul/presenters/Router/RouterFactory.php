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
		$router->addRoute('home', 'Home:default');
		$router->addRoute('reservation', 'Reservation:default');
		$router->addRoute('Sign', 'Sign:in');
		$router->addRoute('User', 'User:default');
		$router->addRoute('reservation/add[/<id>]', 'Reservation:add');
		$router->addRoute('User/Edit', 'User:edit');
		$router->addRoute('User/addNew', 'User:add');

		
		
		
		return $router;
	}
}
 
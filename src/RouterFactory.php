<?php declare(strict_types = 1);

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;

final class RouterFactory
{
	use Nette\StaticClass;

	public static function create(): RouteList
	{
		$router = new RouteList();
		$router->addRoute('<presenter>/<action>[/<id>]', 'Default:default');

		return $router;
	}
}

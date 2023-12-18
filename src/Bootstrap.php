<?php declare(strict_types = 1);

namespace App;

use Nette\Bootstrap\Configurator;

final class Bootstrap
{
	public static function boot(): Configurator
	{
		$configurator = new Configurator();
		//$configurator->setDebugMode(false);
		$configurator->enableTracy(__DIR__ . '/../log');
		$configurator->setTempDirectory(__DIR__ . '/../temp');
		$configurator->addConfig(__DIR__ . '/../config/main.neon');

		return $configurator;
	}
}

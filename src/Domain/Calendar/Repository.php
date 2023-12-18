<?php declare(strict_types = 1);

namespace App\Domain\Calendar;

interface Repository
{
	function save(string $startDate): void;
}

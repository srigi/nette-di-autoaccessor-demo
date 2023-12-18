<?php declare(strict_types = 1);

namespace App\Infrastructure\Calendar\Repository;

use App\Domain\Calendar;

final class InMemory implements Calendar\Repository
{
	/** @var array<int, string> */
	private array $calendars = [];

	public function save(string $startDate): void
	{
		$id = count($this->calendars);

		$this->calendars[$id] = $startDate;
	}
}

<?php declare(strict_types = 1);

namespace App\Domain\Calendar;

interface RepositoryAccessor
{
	function get(): Repository;
}

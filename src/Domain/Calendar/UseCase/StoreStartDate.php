<?php declare(strict_types = 1);

namespace App\Domain\Calendar\UseCase;

use App\Domain\Calendar\RepositoryAccessor;

final class StoreStartDate
{
	public function __construct(private RepositoryAccessor $repository)
	{
	}

	public function execute(string $startDate): void
	{
		$this->repository->get()->save($startDate);
	}
}

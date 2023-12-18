<?php declare(strict_types = 1);

namespace App\Infrastructure\Calendar\Repository;

use App\Domain\Calendar;
use Nette\Database as NetteDatabase;

final class Database implements Calendar\Repository
{
	private NetteDatabase\Table\Selection $table;

	public function __construct(NetteDatabase\Explorer $databaseExplorer)
	{
		$this->table = $databaseExplorer->table('calendar');
	}

	public function save(string $startDate): void
	{
		$this->table->insert(['startDate' => $startDate]);
	}
}

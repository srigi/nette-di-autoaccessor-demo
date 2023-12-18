<?php declare(strict_types = 1);

namespace App\Presenters;

use App\Forms;
use App\Domain\Calendar\UseCase;
use Nette\Application\UI;
use Nette\DI\Attributes\Inject;
use Nette\Utils;

final class DefaultPresenter extends UI\Presenter
{
	#[Inject]
	public Forms\StartDate $startDateForm;

	#[Inject]
	public UseCase\StoreStartDate $storeCalendar;

	protected function createComponentStartDateForm(): Forms\StartDate
	{
		$this->startDateForm->onSuccess[] = function(UI\Form $form, Utils\ArrayHash $values): void {
			$this->storeCalendar->execute($values['startDate']);
			$this->redirect('this');
		};

		return $this->startDateForm;
	}
}

<?php declare(strict_types = 1);

namespace App\Forms;

use Nette\Application\UI;
use Nette\Utils;

final class StartDate extends UI\Form
{
	public static function create(): static
	{
		$now = new Utils\DateTime();
		$minimumValue = (clone $now)->modify('-90 years')->format('Y-m-d');
		$maximumValue = $now->format('Y-m-d');

		$form = new self();
		$form->addText('startDate')
			->setHtmlType('date')
			->addRule(
				$form::RANGE,
				"Submitted value out of valid range ({$minimumValue} - {$maximumValue})",
				[$minimumValue, $maximumValue])
			->setRequired();
		$form->addSubmit('submit', 'Save');

		return $form;
	}
}

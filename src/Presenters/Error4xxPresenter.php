<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application;
use Nette\Application\UI;

/** @property-read UI\Template $template */
final class Error4xxPresenter extends UI\Presenter
{
	protected function checkHttpMethod(): void
	{
		// allow access via all HTTP methods and ensure the request is a forward (internal redirect)
		if (!$this->getRequest()->isMethod(Application\Request::FORWARD)) {
			$this->error();
		}
	}

	public function renderDefault(Application\BadRequestException $exception): void
	{
		// load the template corresponding to the HTTP code
		$code = $exception->getCode();
		$file = is_file($file = __DIR__ . "/templates/Error/$code.latte")
			? $file
			: __DIR__ . '/templates/Error/4xx.latte';

			$this->template->httpCode = $code;
		$this->template->setFile($file);
	}
}

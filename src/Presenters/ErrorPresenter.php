<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application;
use Nette\Http;
use Tracy\ILogger;

final class ErrorPresenter implements Application\IPresenter
{
	public function __construct(private ILogger $logger)
	{
	}

	public function run(Application\Request $request): Application\Response
	{
		$exception = $request->getParameter('exception');

		// If the exception is a 4xx HTTP error, forward to the Error4xxPresenter
		if ($exception instanceof Application\BadRequestException) {
			[$module, , $sep] = Application\Helpers::splitName($request->getPresenterName());
			return new Application\Responses\ForwardResponse($request->setPresenterName($module . $sep . 'Error4xx'));
		}

		// Log the exception and display a generic error message to the user
		$this->logger->log($exception, ILogger::EXCEPTION);
		return new Application\Responses\CallbackResponse(function (Http\IRequest $httpRequest, Http\IResponse $httpResponse): void {
			if (preg_match('#^text/html(?:;|$)#', (string) $httpResponse->getHeader('Content-Type'))) {
				require __DIR__ . '/templates/Error/500.phtml';
			}
		});
	}
}

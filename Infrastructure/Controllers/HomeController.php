<?php

declare(strict_types=1);

namespace Flexi\Modules\Home\Infrastructure\Controllers;

use Flexi\Contracts\Classes\HttpHandler;
use Flexi\Contracts\Classes\Traits\FileHandlerTrait;
use Flexi\Contracts\Interfaces\BusInterface;
use Flexi\Modules\Home\Domain\HomePageDTO;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends HttpHandler
{
    use FileHandlerTrait;
    private BusInterface $query_bus;

    public function __construct(ResponseFactoryInterface $response_factory, BusInterface $query_bus)
    {
        parent::__construct($response_factory);
        $this->query_bus = $query_bus;
    }

    /**
     * @throws NotFoundExceptionInterface|\ReflectionException|ContainerExceptionInterface
     */
    protected function process(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->createResponse();
        $template_path = $this->normalize('./modules/Home/Infrastructure/UI/Templates/home.html');
        $dto = new HomePageDTO($template_path);

        $response->getBody()->write($this->query_bus->execute($dto)->__toString());

        return $response;
    }
}

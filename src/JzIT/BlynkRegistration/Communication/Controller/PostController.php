<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Communication\Controller;

use JzIT\BlynkRegistration\BlynkRegistrationConstants;
use JzIT\BlynkRegistration\Business\Processor\PostProcessorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\JsonResponse;

class PostController
{
    /**
     * @var \JzIT\PidApi\Processor\PostProcessorInterface
     */
    protected $postProcessor;

    /**
     * @param \JzIT\PidApi\Processor\PostProcessorInterface $postProcessor
     */
    public function __construct(
        PostProcessorInterface $postProcessor
    )
    {
        $this->postProcessor = $postProcessor;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $data = $this->postProcessor->process($request);
        } catch (Throwable $e) {
            return new JsonResponse(
                [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace()
                ]
            );
        }

        return new JsonResponse(json_decode($data, true));
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return BlynkRegistrationConstants::ROUTE_BLYNK_REGISTRATION;
    }
}

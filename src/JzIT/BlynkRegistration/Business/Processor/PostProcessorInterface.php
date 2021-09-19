<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Processor;

use Psr\Http\Message\ServerRequestInterface;

interface PostProcessorInterface
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return string
     */
    public function process(ServerRequestInterface $request): string;
}

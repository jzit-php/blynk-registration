<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Processor;

use Psr\Http\Message\ServerRequestInterface;

interface PostProcessorInterface
{
    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \JzIT\BlynkRegistration\Business\Processor\PostProcessorInterface
     */
    public function process(ServerRequestInterface $request): PostProcessorInterface;
}

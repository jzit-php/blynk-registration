<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration;

interface BlynkRegistrationConfigInterface
{
    /**
     * @return string
     */
    public function getRegistrationTemplate(): string;
}

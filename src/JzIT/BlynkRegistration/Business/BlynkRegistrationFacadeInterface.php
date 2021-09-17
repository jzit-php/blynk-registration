<?php

namespace JzIT\BlynkRegistration\Business;

use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;

interface BlynkRegistrationFacadeInterface
{
    /**
     * @param string $password
     * @param string $email
     *
     * @return string
     * @throws \Exception
     */
    public function generateHash(string $password, string $email): string;
}

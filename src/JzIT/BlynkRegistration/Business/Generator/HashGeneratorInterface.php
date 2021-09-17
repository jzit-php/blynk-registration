<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Generator;

interface HashGeneratorInterface
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

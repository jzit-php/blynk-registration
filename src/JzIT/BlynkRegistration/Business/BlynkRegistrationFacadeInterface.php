<?php

namespace JzIT\BlynkRegistration\Business;

use Generated\Transfer\Blynk\BlynkUserTransfer;
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

    /**
     * @param \Generated\Transfer\Blynk\BlynkUserTransfer $userTransfer
     *
     * @return string
     */
    public function createUserRegistration(BlynkUserTransfer $userTransfer): string;
}

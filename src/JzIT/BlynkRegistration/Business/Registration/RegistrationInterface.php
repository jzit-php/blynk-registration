<?php

namespace JzIT\BlynkRegistration\Business\Registration;

use Generated\Transfer\Blynk\BlynkUserTransfer;

interface RegistrationInterface
{
    /**
     * @param \Generated\Transfer\Blynk\BlynkUserTransfer $userTransfer
     *
     * @return string
     */
    public function createRegistration(BlynkUserTransfer $userTransfer): string;
}

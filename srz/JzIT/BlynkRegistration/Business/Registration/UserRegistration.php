<?php

namespace JzIT\BlynkRegistration\Business\Registration;

use Generated\Transfer\Blynk\BlynkUserTransfer;
use JzIT\BlynkRegistration\BlynkRegistrationConfigInterface;
use JzIT\BlynkRegistration\BlynkRegistrationConstants;
use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;

class UserRegistration implements RegistrationInterface
{
    /**
     * @var \JzIT\BlynkRegistration\BlynkRegistrationConfigInterface
     */
    protected $confing;

    /**
     * @var \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface
     */
    protected $hashGenerator;

    /**
     * UserRegistration constructor.
     *
     * @param \JzIT\BlynkRegistration\BlynkRegistrationConfigInterface $blynkConfig
     * @param \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface $hashGenerator
     */
    public function __construct(BlynkConfigInterface $blynkConfig, HashGeneratorInterface $hashGenerator)
    {
        $this->confing = $blynkConfig;
        $this->hashGenerator = $hashGenerator;
    }

    public function createRegistration(BlynkUserTransfer $userTransfer): string
    {
        $data = [
            BlynkRegistrationConstants::PARAM_PASSWORD => $userTransfer->getPasswort(),
            BlynkRegistrationConstants::PARAM_EMAIL => $userTransfer->getEmail(),
            BlynkRegistrationConstants::PARAM_BLYNK_SERVER_URL => $userTransfer->getServer(),
            BlynkRegistrationConstants::PARAM_ENERGY => $userTransfer->getEnergy(),
            BlynkRegistrationConstants::PARAM_IP => $userTransfer->getIp(),
            BlynkRegistrationConstants::PARAM_LAST_LOGIN => $userTransfer->getLastLogin(),
            BlynkRegistrationConstants::PARAM_LAST_MODIEFIED => $userTransfer->getLastModified(),
        ];

        return strtr($this->confing->getRegistrationTemplate(), $data);
    }
}

<?php

namespace JzIT\BlynkRegistration\Business;

use Generated\Transfer\Blynk\BlynkUserTransfer;
use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;
use JzIT\BlynkRegistration\Business\Registration\RegistrationInterface;

/**
 * Class BlynkRegistrationFacade
 *
 * @package JzIT\BlynkRegistration\Business
 */
class BlynkRegistrationFacade implements BlynkRegistrationFacadeInterface
{
    /**
     * @var \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface
     */
    protected $hashGenerator;

    /**
     * @var \JzIT\BlynkRegistration\Business\Registration\RegistrationInterface 
     */
    protected $userRegistration;

    /**
     * BlynkRegistrationFacade constructor.
     *
     * @param \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface $hashGenerator
     * @param \JzIT\BlynkRegistration\Business\Registration\RegistrationInterface $registration
     */
    public function __construct(HashGeneratorInterface $hashGenerator, RegistrationInterface $registration)
    {
        $this->hashGenerator = $hashGenerator;
        $this->userRegistration = $registration;
    }

    /**
     * @param string $password
     * @param string $email
     *
     * @return string
     * @throws \Exception
     */
    public function generateHash(string $password, string $email): string
    {
        return $this->hashGenerator->generateHash($password, $email);
    }

    /**
     * @param \Generated\Transfer\Blynk\BlynkUserTransfer $userTransfer
     *
     * @return string
     */
    public function createUserRegistration(BlynkUserTransfer $userTransfer): string
    {
        return $this->userRegistration->createRegistration($userTransfer);
    }
}

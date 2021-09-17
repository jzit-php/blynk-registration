<?php

namespace JzIT\BlynkRegistration\Business;

use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;

class BlynkRegistrationFacade implements BlynkFacadeInterface
{
    /**
     * @var \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface
     */
    protected $hashGenerator;

    /**
     * BlynkFacade constructor.
     *
     * @param \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface $hashGenerator
     */
    public function __construct(HashGeneratorInterface $hashGenerator)
    {
        $this->hashGenerator = $hashGenerator;
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
}

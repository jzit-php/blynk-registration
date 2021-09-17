<?php

namespace JzIT\BlynkRegistration;

use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;
use JzIT\BlynkRegistration\Business\Generator\PasswordHashGenerator;
use JzIT\Kernel\AbstractFactory;
use JzIT\BlynkRegistration\Business\BlynkRegistrationFacade;
use JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface;

/**
 * Class BlynkRegistrationFactory
 *
 * @package JzIT\BlynkRegistration
 *
 * @method \JzIT\BlynkRegistration\BlynkRegistrationConfig getConfig()
 */
class BlynkRegistrationFactory extends AbstractFactory
{
    /**
     * @return \JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface
     */
    public function createFacade(): BlynkRegistrationFacadeInterface
    {
        //ToDo: replace with facade resolve if available
        return new BlynkRegistrationFacade(
            $this->createHashGenerator()
        );
    }

    /**
     * @return \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface
     */
    protected function createHashGenerator(): HashGeneratorInterface
    {
        return new PasswordHashGenerator();
    }
}

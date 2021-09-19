<?php

namespace JzIT\BlynkRegistration;

use JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface;
use JzIT\BlynkRegistration\Business\Generator\PasswordHashGenerator;
use JzIT\BlynkRegistration\Business\Processor\PostProcessor;
use JzIT\BlynkRegistration\Business\Processor\PostProcessorInterface;
use JzIT\BlynkRegistration\Business\Registration\RegistrationInterface;
use JzIT\BlynkRegistration\Business\Registration\UserRegistration;
use JzIT\BlynkRegistration\Communication\Controller\PostController;
use JzIT\Kernel\AbstractFactory;
use JzIT\BlynkRegistration\Business\BlynkRegistrationFacade;
use JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface;
use JzIT\Serializer\SerializerConstants;

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
            $this->createHashGenerator(),
            $this->createUserRegistration()
        );
    }

    /**
     * @return \JzIT\BlynkRegistration\Business\Generator\HashGeneratorInterface
     */
    protected function createHashGenerator(): HashGeneratorInterface
    {
        return new PasswordHashGenerator();
    }

    /**
     * @return \JzIT\BlynkRegistration\Communication\Controller\PostController
     */
    public function createPostController(): PostController
    {
        return new PostController(
            $this->createPostProcessor()
        );
    }

    /**
     * @return \JzIT\PidApi\Processor\PostProcessorInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    protected function createPostProcessor(): PostProcessorInterface
    {
        return new PostProcessor(
            $this->container->get(SerializerConstants::CONTAINER_SERVICE_NAME),
            $this->container->get(BlynkRegistrationConstants::FACADE)
        );
    }

    /**
     * @return \JzIT\BlynkRegistration\Business\Registration\UserRegistration
     */
    public function createUserRegistration(): RegistrationInterface
    {
        return new UserRegistration($this->getConfig(), $this->createHashGenerator());
    }
}

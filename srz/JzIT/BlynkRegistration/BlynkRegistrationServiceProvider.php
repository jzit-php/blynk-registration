<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration;

use Di\Container;
use JzIT\Container\ServiceProvider\AbstractServiceProvider;
use JzIT\Container\ServiceProvider\ServiceProviderInterface;

/**
 * Class BlynkServiceProvider
 *
 * @package JzIT\BlynkRegistration
 *
 * @method \JzIT\BlynkRegistration\BlynkRegistrationFactory getFactory(?string $className = null)
 */
class BlynkRegistrationServiceProvider extends AbstractServiceProvider
{
    /**
     * @param \Di\Container $container
     */
    public function register(Container $container): void
    {
        $this->addFacade($container);

    }

    /**
     * @param \Di\Container $container
     *
     * @return \JzIT\Container\ServiceProvider\ServiceProviderInterface
     */
    protected function addFacade(Container $container): ServiceProviderInterface
    {
        $self = $this;
        $container->set(BlynkRegistrationConstants::FACADE, function () use ($self) {
            return $self->getFactory()->createFacade();
        });

        return $this;
    }
}

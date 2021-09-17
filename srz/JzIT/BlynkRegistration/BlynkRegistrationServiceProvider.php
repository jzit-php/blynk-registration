<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration;

use Di\Container;
use JzIT\Container\ServiceProvider\AbstractServiceProvider;
use JzIT\Container\ServiceProvider\ServiceProviderInterface;
use JzIT\Http\HttpConstants;

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
        $this->addFacade($container)
            ->addPostController($container);

    }

    /**
     * @param \Di\Container $container
     *
     * @return \JzIT\BlynkRegistration\BlynkRegistrationServiceProvider
     */
    protected function addFacade(Container $container): BlynkRegistrationServiceProvider
    {
        $self = $this;
        $container->set(BlynkRegistrationConstants::FACADE, function () use ($self) {
            return $self->getFactory()->createFacade();
        });

        return $this;
    }

    /**
     * @param \Di\Container $container
     *
     * @return \JzIT\BlynkRegistration\BlynkRegistrationServiceProvider
     */
    protected function addPostController(Container $container): BlynkRegistrationServiceProvider
    {
        $self = $this;
        $router = $container->get(HttpConstants::SERVICE_NAME_ROUTER);

        $container->set(HttpConstants::SERVICE_NAME_ROUTER, function () use ($self, $router) {
            $postController = $self->getFactory()->createPostController();
            $router->map(HttpConstants::POST, $postController->getRoute(), $postController);

            return $router;
        });
        return $this;
    }
}

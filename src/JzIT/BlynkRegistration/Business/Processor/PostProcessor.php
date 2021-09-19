<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Processor;

use Generated\Transfer\Blynk\BlynkUserRegistrationRequestTransfer;
use Generated\Transfer\Blynk\BlynkUserTransfer;
use JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface;
use JzIT\BlynkRegistration\Business\Registration\UserRegistration;
use JzIT\Serializer\Wrapper\SerializerInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostProcessor implements PostProcessorInterface
{
    /**
     * @var \JzIT\Serializer\Wrapper\SerializerInterface
     */
    protected $serializer;

    /**
     * @var \JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface
     */
    protected $blynkRegistrationFacade;

    /**
     * PostProcessor constructor.
     *
     * @param \JzIT\Serializer\Wrapper\SerializerInterface $serializer
     * @param \JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface $blynkRegistrationFacade
     */
    public function __construct(SerializerInterface $serializer, BlynkRegistrationFacadeInterface $blynkRegistrationFacade)
    {
        $this->serializer = $serializer;
        $this->blynkRegistrationFacade = $blynkRegistrationFacade;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return string
     * @throws \Exception
     */
    public function process(ServerRequestInterface $request): string
    {
        $json = $request->getBody()->getContents();

        $transfer = $this->serializer->deserialize((string)$json, BlynkUserRegistrationRequestTransfer::class, 'json');

        if (($transfer instanceof BlynkUserRegistrationRequestTransfer) === false) {
            throw new \Exception(sprintf('No valid post request!'));
        }

        //ToDo: extract and create Mapper
        $user = new BlynkUserTransfer();
        $now = time();

        $user
            ->setName($transfer->getEmail())
            ->setEmail($transfer->getEmail())
            ->setServer($transfer->getServerUrl())
            ->setLastModified($now)
            ->setLastLogin($now)
            ->setEnergy(1000)
            ->setServer($transfer->getServerUrl())
            ->setPasswort($transfer->getPassword());

        return $this->blynkRegistrationFacade->createUserRegistration($user);
    }
}

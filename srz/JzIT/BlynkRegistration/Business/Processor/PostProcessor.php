<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Processor;

use Generated\Transfer\Blynk\BlynkUserRegistrationRequestTransfer;
use Generated\Transfer\Blynk\BlynkUserTransfer;
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
    protected $pidFacade;

    /**
     * PostProcessor constructor.
     *
     * @param \JzIT\Serializer\Wrapper\SerializerInterface $serializer
     * @param \JzIT\BlynkRegistration\Business\BlynkRegistrationFacadeInterface $pidFacade
     */
    public function __construct(SerializerInterface $serializer, BlynkRegistrationFacadeInterface $pidFacade)
    {
        $this->serializer = $serializer;
        $this->pidFacade = $pidFacade;
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     *
     * @return \JzIT\PidApi\Processor\PostProcessorInterface
     */
    public function process(ServerRequestInterface $request): PostProcessorInterface
    {
        $json = $request->getBody()->getContents();

        $transfer = $this->serializer->deserialize((string)$json, BlynkUserRegistrationRequestTransfer::class, 'json');

        if (($transfer instanceof BlynkUserRegistrationRequestTransfer) === false) {
            throw new \Exception(sprintf('No valid post request!'));
        }

        //ToDo: extract and create Mapper
        $user = new BlynkUserTransfer();

        return $this;
    }
}

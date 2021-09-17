<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration\Business\Generator;

class PasswordHashGenerator implements HashGeneratorInterface
{
    /**
     * @param string $password
     * @param string $email
     *
     * @return string
     * @throws \Exception
     */
    public function generateHash(string $password, string $email): string
    {
        $salt = $this->createHash(strtolower($mail));
        return base64_encode($this->createHash($password . $salt));
    }

    /**
     * @param string $stringToHash
     * @param string $algo
     *
     * @return string
     */
    protected function createHash(string $stringToHash, string $algo = 'sha256'): string
    {
        $hash = hash($algo, $stringToHash, true);

        if ($hash === false){
            throw new \Exception(sprintf('could not hash %s with algo %s', $stringToHash, $algo));
        }

        return $hash;
    }
}

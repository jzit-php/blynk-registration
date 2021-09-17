<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration;

class BlynkRegistrationConfig implements BlynkRegistrationConfigInterface
{
    /**
     * @return string
     */
    public function getRegistrationTemplate(): string
    {
        return '{"name":"' . BlynkRegistrationConstants::PARAM_EMAIL . '","email":"' . BlynkRegistrationConstants::PARAM_EMAIL . '","appName":"BlynkRegistration","region":"local","ip":"' . BlynkRegistrationConstants::PARAM_BLYNK_SERVER_URL . '","pass":"' . BlynkRegistrationConstants::PARAM_PASSWORD . '","lastModifiedTs":' . BlynkRegistrationConstants::PARAM_LAST_MODIEFIED . ',"lastLoggedIP":"' . BlynkRegistrationConstants::PARAM_IP . '","lastLoggedAt":' . BlynkRegistrationConstants::PARAM_LAST_LOGIN . ',"profile":{},"isFacebookUser":false,"isSuperAdmin":false,"energy":' . BlynkRegistrationConstants::PARAM_ENERGY . ',"id":"' . BlynkRegistrationConstants::PARAM_EMAIL . '-Blynk"}';
    }
}

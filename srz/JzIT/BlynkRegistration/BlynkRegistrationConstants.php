<?php

declare(strict_types=1);

namespace JzIT\BlynkRegistration;

interface BlynkRegistrationConstants
{
    public const FACADE = 'blynk-facade';
    public const PARAM_EMAIL = '%email%';
    public const PARAM_PASSWORD = '%password%';
    public const PARAM_BLYNK_SERVER_URL = '%blynk_server_url%';
    public const PARAM_LAST_MODIEFIED = '%last_modified%';
    public const PARAM_LAST_LOGIN = '%last_login%';
    public const PARAM_IP = '%ip%';
    public const PARAM_ENERGY = '%energy%';
    public const ROUTE_BLYNK_REGISTRATION = '/blynk/registration';
}

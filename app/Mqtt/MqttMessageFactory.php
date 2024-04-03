<?php

namespace App\Mqtt;

use App\Mqtt\Exceptions\MqttMessageException;
use App\Mqtt\Services\AgencyDoorOpeningService;

class MqttMessageFactory
{
    /**
     * @throws MqttMessageException
     */
    public static function handle(string $topic): ?ServiceMqttInterface
    {
        $patterns = [
            '/^agency-door-opening$/' => AgencyDoorOpeningService::class
        ];

        foreach ($patterns as $pattern => $serviceClass) {
            if (preg_match($pattern, $topic)) {
                return $serviceClass();
            }
        }

        return null;
    }
}

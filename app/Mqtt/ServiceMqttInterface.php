<?php

namespace App\Mqtt;

use App\Mqtt\DTO\MqttMessageInterfaceDTO;

interface ServiceMqttInterface
{
    public function handle(string $message) : bool;
}

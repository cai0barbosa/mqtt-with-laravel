<?php

namespace App\Mqtt\DTO;

interface MqttMessageInterfaceDTO
{
    public static function createFromJson(string $json) : ?MqttMessageInterfaceDTO;
}

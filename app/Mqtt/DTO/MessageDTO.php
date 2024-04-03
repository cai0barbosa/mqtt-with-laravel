<?php

namespace App\Mqtt\DTO;

use App\Mqtt\Exceptions\MqttMessageException;

class MessageDTO implements MqttMessageInterfaceDTO
{
    private function __construct(
        public string $command,
        public array $data,
    ) {}

    /**
     * @throws MqttMessageException
     */
    public static function createFromJson(string $json) : ?MqttMessageInterfaceDTO
    {
        $data = json_decode($json, true);
        $requiredFields = [
            'command',
            'data',
        ];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                throw new MqttMessageException("Field '{$field}' is required.");
            }
        }

        return new self(
            $data['command'], $data['data']
        );
    }
}

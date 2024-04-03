<?php

namespace App;

use JsonException;
use PhpMqtt\Client\Contracts\MqttClient as MqttClientContract;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\RepositoryException;

readonly class Alerta
{
    public function __construct(
        private MqttClientContract $client
    )
    {}

    /**
     * @throws RepositoryException
     * @throws DataTransferException
     * @throws JsonException
     */
    public function play() : void
    {
        $mqtt = $this->client;
        $message = [
            'cmd'    => 'play',
            'msgid'  => 11233,
            'mode'   => 'file',
            'file'   => 'marcivan.mp3',
            'volume' => 100,

        ];

        $mqtt->publish('BARIUM/clientid/to', json_encode($message, JSON_THROW_ON_ERROR));
    }

    /**
     * @throws RepositoryException
     * @throws JsonException
     * @throws DataTransferException
     */
    public function pause() : void
    {
        $mqtt = $this->client;
        $message = [
            'cmd'   => 'pause',
            'msgid' => 11233,

        ];

        $mqtt->publish('BARIUM/clientid/to', json_encode($message, JSON_THROW_ON_ERROR));
    }
}

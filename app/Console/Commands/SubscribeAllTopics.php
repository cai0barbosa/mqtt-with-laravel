<?php

namespace App\Console\Commands;

use App\Mqtt\Services\AgencyDoorOpeningService;
use Illuminate\Console\Command;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\InvalidMessageException;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\Exceptions\ProtocolViolationException;
use PhpMqtt\Client\Exceptions\RepositoryException;
use PhpMqtt\Client\Facades\MQTT;
use Symfony\Component\Console\Command\Command as CommandAlias;

class SubscribeAllTopics extends Command
{
    protected $signature   = 'mqtt:subscribe_all_topics';
    protected $description = 'Subscribe To MQTT topic';

    /**
     * @throws ProtocolViolationException
     * @throws InvalidMessageException
     * @throws MqttClientException
     * @throws RepositoryException
     * @throws DataTransferException
     */
    public function handle() : int
    {
        $mqtt = MQTT::connection();

        $mqtt->subscribe('MQTT/neonF8555C54/from/log/#', function (string $topic, string $message) {
            try {
                $this->info("Received message on topic '{$topic}': {$message}");

                (new AgencyDoorOpeningService())->handle($message);

            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        });

        $mqtt->subscribe('BARIUM/clientid/#' , function (string $topic, string $message){
            $this->info("Received message on topic '{$topic}': {$message}");
        });


        $mqtt->loop(true);

        return CommandAlias::SUCCESS;
    }
}

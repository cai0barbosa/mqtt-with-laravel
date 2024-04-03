<?php

namespace App\Mqtt\Services;

use App\Alerta;
use App\Models\Agency;
use App\Models\AgencyDoorOpening;
use App\Mqtt\Exceptions\MqttMessageException;
use App\Mqtt\ServiceMqttInterface;
use DateTime;
use DateTimeZone;
use MQTT;

readonly class AgencyDoorOpeningService implements ServiceMqttInterface
{
    /**
     * @throws MqttMessageException
     */
    public function handle(?string $message) : bool
    {
        $obj = json_decode($message, true);

        if ($obj === null) {
            throw new MqttMessageException('Invalid message format');
        }

        $agency = Agency::where('id' , 1)->first();
        if ($agency === null) throw new MqttMessageException('Agency not found');

        $data = new DateTime();
        $data->setTimezone(new DateTImezone('America/Sao_Paulo'));

        AgencyDoorOpening::create([
            'agency_id' => $agency->id,
            'status' => 'open',
            'date' => $data,
        ]);

        $alerta = new Alerta(MQTT::connection());
        $alerta->play();

        return true;
    }

}

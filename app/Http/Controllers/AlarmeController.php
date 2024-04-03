<?php

namespace App\Http\Controllers;

use App\Alerta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use JsonException;
use MQTT;
use PhpMqtt\Client\Exceptions\DataTransferException;
use PhpMqtt\Client\Exceptions\RepositoryException;

class AlarmeController extends Controller
{
    /**
     * @throws RepositoryException
     * @throws DataTransferException
     * @throws JsonException
     */
    public function send() : RedirectResponse
    {
        $mqtt   = MQTT::connection();
        $alerta = new Alerta($mqtt);

        $alerta->play();
        return Redirect::route('dashboard');
    }

    /**
     * @throws RepositoryException
     * @throws JsonException
     * @throws DataTransferException
     */
    public function pause() : RedirectResponse
    {
        $mqtt   = MQTT::connection();
        $alerta = new Alerta($mqtt);

        $alerta->pause();

        return Redirect::route('dashboard');
    }
}

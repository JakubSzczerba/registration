<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Provider;

use GuzzleHttp\Client;

class RegionProvider
{
    public function integration(): Client
    {
        $client = new Client(['base_uri' => 'http://api.dro.nazwa.pl/']);

        return $client;
    }

    public function deserializeRegion()
    {
        $data = $this->integration()->get('http://api.dro.nazwa.pl/')->getBody()->getContents();

        $result = json_decode($data, true);

        return $result;
    }

}
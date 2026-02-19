<?php

namespace Pringgojs\LaravelItop\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ApiService
{
    public $baseUrl;
    public $username;
    public $password;

    public function __construct($baseUrl = null, $username = null, $password = null)
    {
        $this->baseUrl = $baseUrl;
        $this->username = $username;
        $this->password = $password;
    }

    public function callApi($jsonData = [])
    {
        info($jsonData);
        $encodedCredentials = base64_encode($this->username . ':' . $this->password);
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . $encodedCredentials,
        ])->asForm()->post(
            $this->baseUrl . '/webservices/rest.php',
            [
                'version' => '1.3',
                'json_data' => json_encode($jsonData)
            ]
        );

        return $response->json();
    }

}
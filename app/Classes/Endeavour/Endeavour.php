<?php

namespace App\Classes\Endeavour;

/**
 * Enveadour Mission Control Wrapper
 */
class Endeavour
{
    protected $host;
    protected $token;
    function __construct($token = null)
    {
        $this->token = $token;
        $this->host = "http://" . file_get_contents("/home/rover/endeavour.ip") . ":1021";
    }
    public function login($username, $password) {
        $response = $this->post($this->host . "/raven/login", ['username'=>$username, 'password'=> $password]);
        dd($response);
        return $response;
    }
    protected function setToken($token)
    {
        $this->token = $token;
    }
    public function buildRover($username, $domain, $password)
    {
        $response = $this->post($this->host . "/raven/rover/build", ['username'=>$username, 'password'=> $password, 'domain' => $domain]);
        return $response;
    }
    public function setServerIP($ip)
    {
        $response = $this->post($this->host . "/raven/server/ip/set", ['ip'=>$ip]);
        return $response;
    }
    public function updateSSL($domain_without_www, $chain)
    {
        $response = $this->post($this->host . "/raven/domains/update/ssl", ['domain'=>$domain_without_www, 'chain' => $chain]);
        return $response;
    }
    public function autoSSL($domain_without_www)
    {
        $response = $this->post($this->host . "/raven/domains/auto/ssl", ['domain'=>$domain_without_www]);
        return $response;
    }
    public function getMyDomains()
    {
        $response = $this->post($this->host . "/raven/rover/domains");
        return $response;
    }
    public function getCronStatus()
    {
        $response = $this->post($this->host . "/raven/rover/cron/status");
        return $response;
    }
    public function turnCronOn()
    {
        $response = $this->post($this->host . "/raven/rover/cron/turn/on");
        return $response;
    }
    public function turnCronOff()
    {
        $response = $this->post($this->host . "/raven/rover/cron/turn/off");
        return $response;
    }
    protected function post($url, $parameters = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS ,$parameters);
        if ($this->token) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $this->token,
            ));
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }

}

<?php

namespace Lib;

use GuzzleHttp\Client;
use Lib\Config\Config;
use Psr\Http\Message\ResponseInterface;

class Request
{

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function getHeader()
    {
        $header = [
            'App-Key' => $this->config->getAppKey(),
            'Nonce' => rand(),
            'Timestamp' => time(),
        ];
        $header['Signature'] = sha1($this->config->getAppSecret() . $header['Nonce'] . $header['Timestamp']);
        if ($this->config->getHeaderPre()) {
            array_walk($header, function($value, &$key, $pre) {
                $key = $pre . $key;
            }, $this->config->getHeaderPre());
        }
        return $header;
    }

    /* @return Client */
    public function getClient()
    {
        return new Client([
            'headers' => $this->getHeader(),
            'base_uri' => $this->config->getBaseUrl(),
        ]);
    }

    /**
     * @param $path
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function post($path, array $data)
    {
        return $this->run("POST", $path, $data);
    }

    /**
     * @param $method
     * @param $path
     * @param array $params
     * @return array
     * @throws \Throwable
     */
    private function run($method, $path, array $params = [])
    {
        $retryNum = $this->config->getMaxRetry();
        beginning:
        try {
            $response = $this->getClient()->request($method, $path, [
                'body' => $params
            ]);
            return $this->dataFormat($response);
        } catch (\Throwable $e) {
            if (--$retryNum >= 0) {
                goto beginning;
            }
            throw $e;
        }
    }

    private function dataFormat(ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();
        if ($statusCode == 200) {
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            if (200 == $data['code'] ?? false) {
                return [true, $data];
            }
            return [false, $data['code'] ?? false];
        }
        return [false, $statusCode];
    }


}
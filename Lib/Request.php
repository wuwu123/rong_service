<?php

declare(strict_types=1);

namespace RongLib;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use RongLib\Config\Config;

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
            $list = [];
            foreach ($header as $key => $value) {
                $list[$this->config->getHeaderPre() . $key] = $value;
            }
            unset($header);
            return $list;
        }
        return $header;
    }

    /* @return Client */
    public function getClient()
    {
        $config = [
            'headers' => $this->getHeader(),
            'base_uri' => $this->config->getBaseUrl(),
        ];
        if ($clientClass = $this->config->getClientClass()) {
            return $clientClass($config);
        }
        return new Client($config);
    }

    /**
     * @param $path
     * @throws \Throwable
     * @return array
     */
    public function post($path, array $data)
    {
        return $this->run('POST', $path, ['form_params' => $data]);
    }

    /**
     * @param $method
     * @param $path
     * @throws \Throwable
     * @return array
     */
    private function run($method, $path, array $params = [])
    {
        $retryNum = $this->config->getMaxRetry();
        beginning:
        try {
            $response = $this->getClient()->request(strtoupper($method), $path, $params);
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
            if ($data['code'] == 200 ?? false) {
                return [true, $data];
            }
            return [false, $data['code'] ?? false];
        }
        return [false, $statusCode];
    }
}

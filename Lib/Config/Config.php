<?php

declare(strict_types=1);

namespace RongLib\Config;

class Config
{
    private $appKey = '';

    private $appSecret = '';

    private $headerPre = 'RC-';

    private $maxRetry = 1;

    private $clientClass;

    private $baseUrl = 'http://api-cn.ronghub.com';

    public function __construct($appKey, $appSecret)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

    public function getAppKey(): string
    {
        return $this->appKey;
    }

    public function getAppSecret(): string
    {
        return $this->appSecret;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getHeaderPre(): string
    {
        return $this->headerPre;
    }

    public function getMaxRetry(): int
    {
        return $this->maxRetry;
    }

    /**
     * @return mixed
     */
    public function getClientClass()
    {
        return $this->clientClass;
    }

    /**
     * @return $this
     */
    public function setHeaderPre(string $headerPre)
    {
        $this->headerPre = $headerPre;
        return $this;
    }

    /**
     * @return $this
     */
    public function setMaxRetry(int $maxRetry)
    {
        $this->maxRetry = $maxRetry;
        return $this;
    }

    /**
     * @param mixed $clientClass
     * @return $this
     */
    public function setClientClass($clientClass)
    {
        $this->clientClass = $clientClass;
        return $this;
    }

    /**
     * @return $this
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }
}

<?php

namespace Lib\Config;
class Config
{

    private $appKey = '';

    private $appSecret = '';

    private $headerPre = 'RC-';

    private $maxRetry = 1;

    private $baseUrl = 'http://api-cn.ronghub.com';

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getHeaderPre(): string
    {
        return $this->headerPre;
    }

    /**
     * @return int
     */
    public function getMaxRetry(): int
    {
        return $this->maxRetry;
    }


    public function __construct($appKey, $appSecret)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
    }

}
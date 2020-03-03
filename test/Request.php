<?php

declare(strict_types=1);

namespace RongTest;

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use RongLib\Config\Config;

/**
 * @internal
 * @coversNothing
 */
class Request extends TestCase
{
    public $roomId = '1234qwe';
    public $roomName = '测试';

    public function getConfig()
    {
        Dotenv::createImmutable(__DIR__ . '/../')->safeLoad();
        $model = new Config(getenv('APP_KEY'), getenv('APP_SECRET'));
        $model->setClientClass(function(array $config) {
            return new Client($config);
        });
        return $model;
    }
}
